<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispensary;
use App\Doctor;
use App\Market;
use App\Area;
use App\District;
use App\Region;
use Auth;
use App\VisitLog;
use App\Employee;
use App\User;

class DispensaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataset = Dispensary::where('is_deleted', 0)->paginate(10);
        $region = new District();
        $regions = Region::where('is_deleted',0)->get();
        return view('dispensary.index', compact('dataset', 'region','regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataset = Region::where('is_deleted',0)->get();
        $dataset_two = District::where('is_deleted',0)->get();
        $dataset_three = Area::where('is_deleted',0)->get();
        $dataset_four = Market::where('is_deleted',0)->get();
        return view('dispensary.create', compact('dataset','dataset_two','dataset_three','dataset_four'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'owner' => 'required',
            'market_id' => 'required',
            'district_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $model = new Dispensary();
         
                $model->consulting_center_id = $request->consulting_center_id;
                $model->hospital_id = $request->hospital_id;
                $model->name = $request->name;
                $model->owner = $request->owner;
                $model->contact = $request->contact;
                $model->mail = $request->mail;
                $model->address = $request->address;
                $model->market_id = $request->market_id;
                $model->area_id = $request->area_id;
                $model->district_id = $request->district_id;
                $model->region_id = $request->region_id;

                $model->is_covered = $request->is_covered;

                    if($files = $request->file('image'))
                    {
                        //$files = $files->resize(150,150);
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
           
              
            

            return redirect('/dispensary')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Dispensary::where('_key', $id)->first();
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District();
     
        $employee = Employee::where('area_id',$data->area_id)->first();
            

        //$user = Employee::where('is_deleted','0')->where('id',$employee->user_id)->first();
        return view('dispensary.visit', compact('data', 'dataset', 'region','employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dispensary::where('_key',$id)->first();
   
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District();
        return view('dispensary.edit',compact('data','dataset','region'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'owner' => 'required',
            'market_id' => 'required',
            'district_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $model = Dispensary::where('id', $id)->first();
         
                $model->consulting_center_id = $request->consulting_center_id;
                $model->hospital_id = $request->hospital_id;
                $model->name = $request->name;
                $model->owner = $request->owner;
                $model->address = $request->address;
                $model->market_id = $request->market_id;
                $model->area_id = $request->area_id;
                $model->district_id = $request->district_id;
                $model->region_id = $request->region_id;
                $model->is_covered = $request->is_covered;

                
                    if($files = $request->file('image'))
                    {
                        //$files = $files->resize(150,150);
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
           
              
            

            return redirect('/dispensary')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $r){
        $region = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $district_id = $r->district_id;
        $area_id = $r->area_id;
        $market_id = $r->market_id;
        $is_covered = $r->is_covered;
        $data = Dispensary::where('is_deleted', 0);
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        if(!empty($district_id)){
            $data = $data->where('district_id', $district_id);
        }
        if(!empty($area_id)){
            $data = $data->where('area_id', $area_id);
        }
        if(!empty($market_id)){
            $data = $data->where('market_id', $market_id);
        }
        if(!empty($is_covered)){
        $data = $data->where('is_covered', $is_covered);
        }
        $dataset = $data->paginate(10);
        return view('dispensary._list', compact('dataset', 'region'));
 }



        public function visit_view($id){
        $data = Dispensary::where('_key', $id)->first();
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District();
        $employee = Employee::where('area_id',$data->area_id)->first();
        //$user = Employee::where('is_deleted','0')->where('id',$employee->user_id)->first();
        return view('dispensary.visit', compact('data', 'dataset', 'region','employee'));
    }


        public function visit_confirm(Request $r, $id){

        $doc = Dispensary::where('id',$r->dispensary_id)->first();
        if($doc->latitude ==$r->latitude || $doc->longitude==$r->longitude){    
        $employee_id = Auth::user()->id;
        $model = new VisitLog();
        $model->dispensary_id = $r->dispensary_id;
        $model->employee_id = $employee_id;

       if($model->save()){
            $message = "Successfully Visited";
        }
        else{
            $message = "Visit is not complete";
        }
        return redirect('/home')->with('message',$message);
    }
     return redirect()->back()->with('message','You are not in current location');
    }






    public function destroy($id)
    {
        $data = Dispensary::find($id);
        $data->is_deleted = 1;

        if($data->save()){
            $message = "Deleted Successfully";
        }
        else{
            $message = "Data is not deletd successfully";
        }
        return redirect()->back()->with('message',$message);
    }
}
