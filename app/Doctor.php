<?php

namespace App;
use App\Region;
use App\District;
use App\Area;
use App\Market;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    public $timestamps = false;
    protected $table = 'doctor';

    public function visitLogs(){
    	return $this->hasMany('VisitLog');
    }

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
