<?php

namespace App;
use App\Region;
use App\Area;
use APP\User;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    public $timestamps = false;
    protected $table = 'district';


public function region_name($id)
{
    $qry = Region::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : " ";

}

public function district_name($id)
{
    $qry = District::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : " ";

}

public function area_name($id)
{
    $qry = Area::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : " ";

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

}

