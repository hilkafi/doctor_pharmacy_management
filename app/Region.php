<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Chamber;
use App\Dispensary;
use App\Region;

class Region extends Model
{
    //
    public $timestamps = false;
    protected $table = 'region';

    public function areas(){
        return $this->hasMany('App\District', 'region_id', 'id')->where('is_deleted', 0);
    }

    public function teritories(){
        return $this->hasMany('App\Area', 'region_id', 'id')->where('is_deleted', 0);
    }

    public function markets(){
        return $this->hasMany('App\Market', 'region_id', 'id')->where('is_deleted', 0);
    }

    public function doctor_percentage($id){
        if (!empty($id)) {
            $query = Chamber::where('region_id', $id)->where('is_deleted','0')->get();
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
        	       } elseif ($doc->is_covered == 'Not Covered') {
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
            $query = Dispensary::where('region_id', $id)->where('is_deleted','0')->get();
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
