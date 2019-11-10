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
        $pharmacy = Dispensary::All();
        $pharmacy = count($pharmacy);
        $cov_phar = Dispensary::where('is_covered','Covered')->get();
        $cov_phar = count($cov_phar);
        $percentage = ($cov_phar/$pharmacy) * 100;
        $percentage = $percentage . "%";

        $chamber = Chamber::All();
        $doc_id[] = null;
            foreach ($chamber as $data) {

                $doc_id[] = $data->doctor_id;
            }


         $final_data = Doctor::whereIn('id',$doc_id)->get();
         $cov_doc = Doctor::whereIn('id',$doc_id)->where('is_covered','Covered')->get();
         $cov_doc = count($cov_doc);
         $doctor = count($final_data);
         $doc_per = ($cov_doc/$doctor)*100;
         $doc_per = $doc_per . "%";

         $region = Region::All();
         $region = count($region);
         $area = District::All();
         $area = count($area);
         $teritory = Area::All();
         $teritory = count($teritory);
         $market = Market::All();
         $market = count($market);





        return view('home',compact('pharmacy','cov_phar','percentage','doctor','cov_doc','doc_per','region','area','teritory','market'));
    }
}
