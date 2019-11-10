<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Chamber;
use App\Dispensary;
use App\Consulting_Center;

class Consulting_Center extends Model
{
    //
        public $timestamps = false;
        protected $table = 'consulting_center';

        public function doctor_percentage($id){
        	if (!empty($id)) {
        		$query = Chamber::where('consulting_center_id', $id)->get();
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
	        			}elseif ($doc->is_covered == 'Not Covered') {
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
        	$cc = Dispensary::where('consulting_center_id', $id)->first();
            $cover = null;
            empty($cc) ? $cover = '' : $cover = $cc->is_covered; 
        	return $cover;
        }

}
