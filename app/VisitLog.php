<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Market;
use App\Doctor;

class VisitLog extends Model
{
    //
    public $timestamps = false;
    protected $table = 'visit_log';

    public function doctors(){
    	return $this->belongsTo('Doctor', 'doctor_id');
    }

   	public function doctor_market($id)
	{
        if(!empty($id))
        {
	        $data = Doctor::where('id',$id)->first();
            $market_id = $data->market_id;
            $market = Market::where('id', $market_id)->first();
	    }
	    return !empty($market) ? $market->name : " ";

	}

	public function doctor_name($id)
	{
    $qry = Doctor::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : " ";

	}

	public function employee_name($id)
	{
    $qry = User::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->name : " ";

	}

	public function doctor_designation($id)
	{
    $qry = Doctor::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->designation : " ";

	}

	public function doctor_expertise($id)
	{
    $qry = Doctor::query();
        if(!empty($id))
        {
            $data = $qry->where('id',$id)->first();
        }
        return !empty($data) ? $data->expertise : " ";

	}

	public function sumVisitByMpo($id){
		if(!empty($id)){
			$num_mpo = $this->where('doctor_id', $id)->sum('visited');
			return $num_mpo;
		}
	}

	public function sumDoctorVisitByEmployee($eid, $doc){
		if(!empty($eid)){
			$num_visit = $this->where([['doctor_id', $doc], ['employee_id', $eid]])->sum('visited');
			return $num_visit;
		}
	}

}