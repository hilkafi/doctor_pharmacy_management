<?php

namespace App;
use App\Region;
use App\Area;

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

}

