<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Market;
use App\Area;
use App\District;
use App\Region;
use App\VisitLog;
use App\Chamber;
use Auth;
use DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataset = Doctor::where('is_deleted',0)->orderBy('id', 'DESC')->paginate(20);
        $region = new District();
        $regions = Region::where('is_deleted',0)->get();
        return view('doctor.index', compact('dataset','region','regions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'doc_name' => 'required',
            'designation' => 'required'
            
        ]);

        $model = new Doctor();
         
                $model->name = $request->doc_name;
                $model->designation = $request->designation;
                $model->expertise = $request->expertise;
                $model->department = $request->department;
                $model->degree = $request->degree;
                $model->institute = $request->institute;
                $model->contact = $request->contact;
                $model->mail = $request->mail;
                $model->address = $request->address;
                $model->is_qualified = $request->is_qualified;
                $model->mul_chamber = $request->mul_chamber;
                $model->is_covered = $request->is_covered;
                $model->_key = md5(microtime().rand());

               if($model->save()){
                $message = "Succssfully added data";
               }
               else{
                   $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect('/doctor')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Doctor::where('id', $id)->first();
        $chambers = Chamber::where('doctor_id', $id)->get();

        return view('doctor.details', compact('data', 'chambers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Doctor::where('id',$id)->first();

        $dataset = Region::where('is_deleted',0)->get();
        $region = new District();
        return view('doctor.edit',compact('data','dataset','region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'doc_name' => 'required',
            
        ]);

        $model = Doctor::where('id',$id)->first();
        $model->name = $request->doc_name;
        $model->designation = $request->designation;
        $model->expertise = $request->expertise;
        $model->department = $request->department;
        $model->degree = $request->degree;
        $model->institute = $request->institute;
        $model->contact = $request->contact;
        $model->mail = $request->mail;
        $model->address = $request->address;
        $model->is_qualified = $request->is_qualified;
        $model->mul_chamber = $request->mul_chamber;
        $model->is_covered = $request->is_covered;
       
       if($model->save()){
        $message = "Succssfully updated department";
       }
       else{
           $message = "Data Entry Error";
       }
       
        return redirect('/doctor')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $r){
        $region = new District();
        $region_id = $r->region_id;
        $district_id = $r->district_id;
        $area_id = $r->area_id;
        $market_id = $r->market_id;
        $hospital_id = $r->hospital_id;
        $cc_id = $r->cc_id;
        $qualification = $r->qualification;
        $speciality = $r->speciality;
        $designation = $r->designation;
        $degree = $r->degree;
        $department = $r->department;
        $name = $r->name;
        $is_covered = $r->is_covered;

        $data = DB::table('doctor')->join('chamber', 'doctor.id', '=', 'chamber.doctor_id');
        if(!empty($name)){
            $data = $data->where('name', 'like', '%'.trim($name).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        if(!empty($district_id)){
            $data = $data->where('area_id', $district_id);
        }
        if(!empty($area_id)){
            $data = $data->where('teritory_id', $area_id);
        }
        if(!empty($market_id)){
            $data = $data->where('market_id', $market_id);
        }
        if(!empty($hospital_id)){
            $data = $data->where('hospital_id', $hospital_id);
        }
        if(!empty($cc_id)){
            $data = $data->where('consulting_center_id', $cc_id);
        }
        if(!empty($qualification)){
            $data = $data->where('is_qualified', $qualification);
        }
        if(!empty($speciality)){
            $data = $data->where('expertise', $speciality);
        }
        if(!empty($designation)){
            $data = $data->where('designation', $designation);
        }
        if(!empty($degree)){
            $data = $data->where('degree', $degree);
        }
        if(!empty($department)){
            $data = $data->where('department', $department);
        }
        if(!empty($name)){
            $data = $data->where('name', $name);
        }
        if(!empty($is_covered)){
        $data = $data->where('is_covered', $is_covered);
        }
        $dataset = $data->distinct('name')->paginate(10);

        $regions = Region::where('is_deleted',0)->get();

        return view('doctor._list', compact('dataset', 'region', 'regions'));
    }






    public function destroy($id)
    {
        //
        $data = Doctor::find($id);
        $data->is_deleted = 1;

        if($data->save()){
            $message = "Deleted Successfully";
        }
        else{
            $message = "Data is not deletd successfully";
        }
        return redirect()->back()->with('message',$message);
    }

    public function visit_view($id){
        $data = Doctor::where('_key', $id)->first();
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District();
        return view('doctor.visit', compact('data', 'dataset', 'region'));
    }
    public function visit_confirm(Request $r, $id){

        $doc = Doctor::where('id',$r->doctor_id)->first();
        if($doc->latitude ==$r->latitude || $doc->longitude==$r->longitude){
        $employee_id = Auth::user()->id;
        $model = new VisitLog();
        $model->doctor_id = $r->doctor_id;
        $model->employee_id = $employee_id;



       if($model->save()){
            $message = "Successfully Visited Doctor";
        }
        else{
            $message = "Visit is not complete";
        }
        return redirect('/home')->with('message',$message);


           
        }

        return redirect()->back()->with('message','You are not in current location');


    }

    public function visit_log(){
        $region = new District();
        $regions = Region::where('is_deleted',0)->get();
        $dataset = VisitLog::whereNotNull('doctor_id')->orderBy('id', 'DESC')->paginate(20);
       // $dataset = $dataset->groupBy('doctor_id');
       // return $dataset;
        return view('doctor.visit_log', compact('dataset', 'regions'));
    }

    public function visited_doctor_details($id){
            $dataset = VisitLog::where('doctor_id', $id)->paginate(20);
            //$dataset = $dataset->groupBy('employee_id');
            //return $id;
            $vlog = new VisitLog();
        return view('doctor.visit_details', compact('dataset', 'id', 'vlog'));
    }

        public function add_chamber($id){

            $data = Doctor::where('id',$id)->first();
              $dataset = Region::where('is_deleted',0)->get();

            return view('doctor.add_chamber',compact('data','dataset'));


         }
         public function final_add_chamber(Request $request){

            $validatedData = $request->validate([
            'doctor_id' => 'required',
            'teritory_id' => 'required'
            
        ]);
                $model = new Chamber();
         
                $model->doctor_id= $request->doctor_id;
                $model->region_id = $request->region_id;
                $model->area_id = $request->area_id;
                $model->teritory_id = $request->teritory_id;
                $model->market_id = $request->market_id;
                $model->consulting_center_id = $request->consulting_center_id;
                $model->hospital_id = $request->hospital_id;
                $model->address = $request->address;
                 $model->contact = $request->contact;
                $model->visiting_hour = $request->visiting_hour;
                $model->fee = $request->fee;
                $model->_key = md5(microtime().rand());


               if($model->save()){
                $message = "Succssfully added data";
               }
               else{
                   $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect('/doctor')->with('message',$message);


         }



}
