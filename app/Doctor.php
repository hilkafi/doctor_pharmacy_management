<?php

namespace App;
use App\Region;
use App\District;
use App\Area;
use App\Market;
use App\Consulting_Center;
use App\Hospital;
use App\Employee;
use App\PersonalInfo;
use App\User;

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

	public function consalting_center_name($id)
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
	public function employee_name($id)
	{
		$qry = Employee::query();
		if(!empty($id)){
			
		$user = Employee::where('is_deleted','0')->where('area_id',$id)->first();

		
		return !empty($user) ? $user->name : " ";

		}
	}

	 public function get_birthday($id){
    	$query = '';
    	if(!empty($id)){
    		$query = PersonalInfo::where('doc_id', $id);
    	}
    	$data = $query->first();

    	return !empty($data) ? date('j M', strtotime($data->date_of_birth)) : '' ;

    }
  	 public function get_anniversary($id){
    	$query = '';
    	if(!empty($id)){
    		$query = PersonalInfo::where('doc_id', $id);
    	}
    	$data = $query->first();

    	return !empty($data) ? date('j M', strtotime($data->marriage_anniversary )) : '' ;

    }
}
