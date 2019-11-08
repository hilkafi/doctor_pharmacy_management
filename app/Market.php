<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Chamber;
use App\Dispensary;
use App\Market;

class Market extends Model
{
    //
    public $timestamps = false;
    protected $table = 'market';

     public function doctor_percentage($id){
        if (!empty($id)) {
        $query = Chamber::where('market_id', $id)->get();
        $doctor[]=null;
        if(!empty($query)){
	    foreach ($query as $doc) {
	    $doctor[] = $doc->doctor_id;
	    }
    }
        

        $num_doc = Doctor::whereIn('id', $doctor)->get();

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
        		//return $i;
        	
        }

        public function pharmacy_covered($id){
            if (!empty($id)) {
                $query = Dispensary::where('market_id', $id)->get();
               
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
