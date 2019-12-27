<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Chamber;
use App\Dispensary;
use App\Area;

class Area extends Model
{
    public $timestamps = false;
    protected $table = 'area';

    public function markets(){
        return $this->hasMany('App\Market', 'area_id', 'id')->where('is_deleted', 0);
    }

    public function region(){
        return $this->belongsTo('App\Region', 'region_id');
    }

    public function area(){
        return $this->belongsTo('App\District', 'district_id');
    }

    public function doctor_percentage($id){
        if (!empty($id)) {
            $query = Chamber::where('teritory_id', $id)->where('is_deleted','0')->get();
            $doctor[]=null;
            if(!empty($query)){
        	    foreach ($query as $doc) {
        	       $doctor[] = $doc->doctor_id;
                }
            }
        $num_doc = Doctor::whereIn('id', $doctor)->where('is_deleted','0')->get();
        $covered = 0;
        $uncovered = 0;
        $i = 0;
        if(!empty($num_doc)){
            foreach ($num_doc as $doc) {
	           if($doc->is_covered == 'Covered'){
	               $covered += 1;
	           }
	           elseif ($doc->is_covered == 'Not Covered') {
	               $uncovered += 1;
	           }
	           $i++;
	        }		
        }

        $i == 0 ? $percentage = '' : $percentage = ($covered/$i)*100;
        $fdata = Array($i,$covered,round($percentage, 2).'%'); 
    	return $fdata;
        }
    }

    public function pharmacy_covered($id){
        if (!empty($id)) {
            $query = Dispensary::where('area_id', $id)->where('is_deleted','0')->get();
            $covered = 0;
            $i = 0;
            if(!empty($query)){
                foreach ($query as $pharmacy) {
                    if($pharmacy->is_covered == 'Covered'){
                        $covered += 1;
                    }
                $i++;
                }  
            }   
        $i == 0 ? $percentage = '' : $percentage = ($covered/$i)*100;
        $fdata = Array($i,$covered,round($percentage, 2).'%'); 
        return $fdata;
        }       
    }

     
}
