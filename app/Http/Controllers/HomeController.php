<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispensary;
use App\Doctor;
use App\Chamber;
use App\Region;
use App\District;
use App\Area;
use App\Market;
use App\Hospital;
use App\Consulting_Center;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pharmacy = Dispensary::where('is_deleted','0')->get();
        $pharmacy = count($pharmacy);
        $cov_phar = Dispensary::where('is_covered','Covered')->where('is_deleted','0')->get();
        $cov_phar = count($cov_phar);
        $percentage = ($cov_phar/$pharmacy) * 100;
        $percentage = round($percentage,2) . "%";

        $chamber = Chamber::where('is_deleted','0')->get();
        $doc_id[] = null;
            foreach ($chamber as $data) {

                $doc_id[] = $data->doctor_id;
            }


         $final_data = Doctor::whereIn('id',$doc_id)->where('is_deleted','0')->get();
         $cov_doc = Doctor::whereIn('id',$doc_id)->where('is_covered','Covered')->where('is_deleted','0')->get();
         $cov_doc = count($cov_doc);
         $doctor = count($final_data);
         $doc_per = ($cov_doc/$doctor)*100;
         $doc_per = round($doc_per,2) . "%";

         $region = Region::where('is_deleted','0')->get();
         $region = count($region);
         $area = District::where('is_deleted','0')->get();
         $area = count($area);
         $teritory = Area::where('is_deleted','0')->get();
         $teritory = count($teritory);
         $market = Market::where('is_deleted','0')->get();
         $market = count($market);

         $hospital = Hospital::where('is_deleted','0')->get();
         $hospital = count($hospital);

         $con_cen = Consulting_Center::where('is_deleted','0')->get();
         $con_cen = count($con_cen);






        return view('home',compact('pharmacy','cov_phar','percentage','doctor','cov_doc','doc_per','region','area','teritory','market','hospital','con_cen'));
    }
}
