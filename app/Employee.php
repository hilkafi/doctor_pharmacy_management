<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Region;
use App\District;
use App\Area;
use App\Market;

class Employee extends Model
{
    public $timestamps = false;
    protected $table = 'employee';

        public function user(){
            return $this->belongsTo('User', 'user_id'); 
        }

	public function region_name($id)
	{
        if(!empty($id))
        {
            $data = $this->where('user_id',$id)->first();
            $region_id = $data->region_id;
            $region = Region::where('id', $region_id)->first();

        }
        return !empty($region) ? $region->name : " ";

	}

	public function district_name($id)
	{
	    if(!empty($id))
        {
            $data = $this->where('user_id',$id)->first();
            $district_id = $data->district_id;
            $district = District::where('id', $district_id)->first();
        }
        return !empty($district) ? $district->name : " ";

	}

	public function area_name($id)
	{
        if(!empty($id))
        {
           
            $data = $this->where('user_id',$id)->first();
            $area_id = $data->area_id;
            $area = Area::where('id', $area_id)->first();
        }
        return !empty($area) ? $area->name : " ";

	}

	public function market_name($id)
	{
        if(!empty($id))
        {
	        $data = $this->where('user_id',$id)->first();
            $market_id = $data->market_id;
            $market = Market::where('id', $market_id)->first();
	    }
	    return !empty($market) ? $market->name : " ";

	}

}