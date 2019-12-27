<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Region;
use App\District;
use App\Hospital;
use App\Area;
use App\Market;
use App\Chamber;
use App\Doctor;
use App\Dispensary;
use App\Employee;

class HospitalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataset = Hospital::where('is_deleted', 0)->paginate(10);
        $region = new District();
        $regions = Region::where('is_deleted',0)->get();
        return view('hospital.index', compact('dataset', 'region','regions'));
    }

    public function create()
    {
        $dataset = Region::where('is_deleted',0)->get();
        $dataset_two = District::where('is_deleted',0)->get();
        $dataset_three = Area::where('is_deleted',0)->get();
        $dataset_four = Market::where('is_deleted',0)->get();
        return view('hospital.create', compact('dataset','dataset_two','dataset_three','dataset_four'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'market_id' => 'required',
            'teritory_id' => 'required',
        ]);

        $model = new Hospital();
        $model->name = $request->name;
        $model->address = $request->address;
        $model->market_id = $request->market_id;
        $model->area_id = $request->area_id;
        $model->teritory_id = $request->teritory_id;
        $model->region_id = $request->region_id;
        $model->type = $request->type;
        $model->sub_type = $request->subtype;
        if($files = $request->file('image'))
        {
            $destination = "public/images/";
            $profile =date('YmdHis') . "." . $files->getClientOriginalExtension();
            $insert = $files->move($destination, $profile);
            if($insert)
            {
                $model->img_loc = $destination.$profile;
            }
            else{
                echo "Say some error";
            }

        }
        $model->_key = md5(microtime().rand());
        if($model->save()){
            $message = "Succssfully added data";
        }
        else{
           $message = "Data Entry Error";
        }
        return redirect('/hospital')->with('message',$message);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $data = Hospital::where('_key',$id)->first();
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District();
        return view('hospital.edit',compact('data','dataset','region'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'market_id' => 'required',
            'teritory_id' => 'required',
        ]);

        $model =Hospital::where('id', $id)->first();
        $model->name = $request->name;
        $model->address = $request->address;
        $model->market_id = $request->market_id;
        $model->teritory_id = $request->teritory_id;
        $model->area_id = $request->area_id;
        $model->region_id = $request->region_id;
        if($files = $request->file('image'))
        {
            $destination = "public/images/";
            $profile =date('YmdHis') . "." . $files->getClientOriginalExtension();
            $insert = $files->move($destination, $profile);
            if($insert)
            {
                $model->img_loc = $destination.$profile;
            }
            else{
                echo "Say some error";
            }

        }
        if($model->save()){
            $message = "Record Updated Succssfully";
        }
        else{
           $message = "Data Entry Error";
        }
        return redirect('/hospital')->with('message',$message);
    }

    public function search(Request $r){
        $region = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $teritory_id = $r->teritory_id;
        $area_id = $r->area_id;
        $market_id = $r->market_id;
        $data = Hospital::where('is_deleted', 0);
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        if(!empty($area_id)){
            $data = $data->where('area_id', $area_id);
        }
        if(!empty($teritory_id)){
            $data = $data->where('teritory_id', $teritory_id);
        }
        if(!empty($market_id)){
            $data = $data->where('market_id', $market_id);
        }
        $dataset = $data->paginate(10);
        return view('hospital._list', compact('dataset', 'region'));
    }


    public function hospital_search(Request $r){
        $region = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $teritory_id = $r->teritory_id;
        $area_id = $r->area_id;
        $market_id = $r->market_id;
        $hospital_type = $r->hospital_type;
        $data = Hospital::where('type', 'hospital')->where('is_deleted','0');
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        if(!empty($area_id)){
            $data = $data->where('area_id', $area_id);
        }
        if(!empty($teritory_id)){
            $data = $data->where('teritory_id', $teritory_id);
        }
        if(!empty($market_id)){
            $data = $data->where('market_id', $market_id);
        }
        if(!empty($hospital_type)){
            $data = $data->where('sub_type', $hospital_type);
        }

        $dataset = $data->paginate(10);
        return view('hospital._hos_list', compact('dataset', 'region'));
    }

    public function clinic_search(Request $r){
        $region = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $teritory_id = $r->teritory_id;
        $area_id = $r->area_id;
        $market_id = $r->market_id;
        $data = Hospital::where('is_deleted', 0)->where('type','clinic');
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        if(!empty($area_id)){
            $data = $data->where('area_id', $area_id);
        }
        if(!empty($teritory_id)){
            $data = $data->where('teritory_id', $teritory_id);
        }
        if(!empty($market_id)){
            $data = $data->where('market_id', $market_id);
        }
        $dataset = $data->paginate(10);
        return view('hospital._clinic_list', compact('dataset', 'region'));
    }

    public function others_search(Request $r){
        $region = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $teritory_id = $r->teritory_id;
        $area_id = $r->area_id;
        $market_id = $r->market_id;
        $data = Hospital::where('is_deleted', 0)->where('type','other');
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        if(!empty($area_id)){
            $data = $data->where('area_id', $area_id);
        }
        if(!empty($teritory_id)){
            $data = $data->where('teritory_id', $teritory_id);
        }
        if(!empty($market_id)){
            $data = $data->where('market_id', $market_id);
        }

        $dataset = $data->paginate(10);
        return view('hospital._others_list', compact('dataset', 'region'));
    }



    public function view_details($id)
    {
        $functionality = new Hospital;
        $d = Hospital::where('_key',$id)->first();
        $dataset = Chamber::where('hospital_id',$d->id)->get();
        $doc_id[] = null;
        foreach ($dataset as $data) {
            $doc_id[] = $data->doctor_id;
        }
        $final_data = Doctor::whereIn('id',$doc_id)->paginate(10);

        return view('hospital/details',compact('final_data','d','functionality'));

    }

    public function hospitals()
    {
        $dataset = Hospital::where('is_deleted','0')->where('type','hospital')->paginate(10);
        $region = new District;
        $regions = Region::where('is_deleted',0)->get();
        return view('hospital.hospitalindex',compact('dataset','region','regions'));
    }

    public function show_clinics(){
        $dataset = Hospital::where('is_deleted','0')->where('type','clinic')->paginate(10);
        $region = new District;
        $regions = Region::where('is_deleted',0)->get();

        return view('hospital.clinic',compact('dataset','region','regions'));
    }
    public function show_others(){
        $dataset = Hospital::where('is_deleted','0')->where('type','other')->paginate(10);
        $region = new District;
        $regions = Region::where('is_deleted',0)->get();

        return view('hospital.others',compact('dataset','region','regions'));
    }

    public function delete($id)
    {
        $data = Hospital::find($id);
        $data->is_deleted = 1;
        if($data->save()){
            $message = "Deleted Successfully";
        }
        else{
            $message = "Data is not deletd successfully";
        }
        return redirect()->back()->with('message',$message);
    }

    public function view_pharmacy($id){
        $data = Dispensary::where('hospital_id',$id)->where('is_deleted','0')->first();
        if(!empty($data)){
            $dataset = Region::where('is_deleted',0)->get();
            $region = new District();
            $employee = Employee::where('area_id',$data->area_id)->first();

            return view('hospital.pharmacy_details',compact('data','dataset','region','employee'));
        }
        else{
            $message = "This Institute has no pharmacy record yet. Please Add a pharmacy first ";
            return redirect()->back()->with('message',$message);
        }
    }

}
