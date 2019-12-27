<?php

namespace App;
use App\Region;
use App\Area;
use APP\User;
use App\Doctor;
use App\Chamber;
use App\Dispensary;
use App\District;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $table = 'district';

    public function teritories(){
        return $this->hasMany('App\Area', 'district_id', 'id')->where('is_deleted', 0);
    }

    public function markets(){
        return $this->hasMany('App\Market', 'area_id', 'id')->where('is_deleted', 0);
    }

    public function region(){
        return $this->belongsTo('App\Region', 'region_id');
    }


    public function region_name($id)
    {
        $qry = Region::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : "N/A";
    }

    public function district_name($id)
    {
        $qry = District::query();
            if(!empty($id))
            {
                $data = $qry->where('id',$id)->first();
            }
        return !empty($data) ? $data->name : "N/A";
    }

    public function area_name($id)
    {
        $qry = Area::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : "N/A";
    }

    public function market_name($id)
    {
        $qry = Market::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : " ";
    }

    public function cc_name($id)
    {
        $qry = Consulting_Center::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : " ";
    }

    public function hospital_name($id)
    {
        $qry = Hospital::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : " ";
    }

    public function user_role($id)
    {
        $data_name;
        $qry = User::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();

            if($data->user_role == '0') return $data_name = "DySM";
            elseif ($data->user_role == '1') return $data_name = "RSM";
            elseif ($data->user_role == '2') return $data_name = "AM";
            elseif ($data->user_role == '3') return $data_name = "MPO";

        }   
    }

    public function doctor_percentage($id){
        if (!empty($id)) {
            $query = Chamber::where('area_id', $id)->where('is_deleted','0')->get();
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
            $query = Dispensary::where('district_id', $id)->where('is_deleted','0')->get();
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

