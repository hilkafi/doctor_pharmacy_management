<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Employee;
use App\District;
use App\Region;
use App\Area;

class EmployeeController extends Controller
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
        $dataset = Employee::where('is_deleted',0)->orderBy('id','DESC')->paginate(20);
        $district = new District();
        $regions = Region::where('is_deleted', 0)->get();
        return view('mpo.index', compact('dataset','district','regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dataset = Region::where('is_deleted',0)->get();
        $dataset_two = District::where('is_deleted',0)->get();
        $dataset_three = Area::where('is_deleted',0)->get();
       
        return view('mpo.create', compact('dataset','dataset_two','dataset_three'));
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


            'region_id' => 'required',
            
        ]);

        $model = new Employee();

        $model->name = $request->name;
        $model->designation = $request->designation;
        $model->phone = $request->phone;
        $model->mail = $request->email;
        $model->area_id = $request->area_id;
        $model->district_id = $request->district_id;
        $model->region_id = $request->region_id;
        $model->address = $request->address;     
        $model->_key = md5(microtime().rand());
                    
        
        
            if($model->save()){
                $message = "Succssfully added data";
            }
            else{
                $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect('employee')->with('message',$message);
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
        $data = Employee::where('_key',$id)->first();
        $district = new District;
        $teritory = Area::where('id',$data->area_id)->where('is_deleted',0)->first();

        return view('mpo.details',compact('data','district','teritory'));
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
        $datas = Employee::where('_key',$id)->first();

        $dataset = Region::where('is_deleted',0)->get();
        $dataset_two = District::where('is_deleted',0)->get();
        $dataset_three = Area::where('is_deleted',0)->get();
        $region = new District();
        return view('mpo.edit',compact('datas','dataset','dataset_two','dataset_three','region'));
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

            'region_id' => 'required',
            
        ]);

        $model = Employee::where('_key',$id)->first();
        $model->name = $request->name;
        $model->designation = $request->designation;
        $model->mail = $request->email;
        $model->phone = $request->phone;
        $model->address = $request->address;
        $model->area_id = $request->area_id;
        $model->district_id = $request->district_id;
        $model->region_id = $request->region_id;
       
       if($model->save()){
        $message = "Succssfully updated department";
       }
       else{
           $message = "Data Entry Error";
       }
       
        return redirect('employee')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $data = Employee::find($id);
        $data->is_deleted = 1;

        if($data->save()){
            $message = "Deleted Successfully";
        }
        else{
            $message = "Data is not deletd successfully";
        }
        return redirect()->back()->with('message',$message);
    }

     public function search(Request $r){
        $district = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $teritory_id = $r->area_id;
        $area_id = $r->district_id;
        $market_id = $r->market_id;
        $data = Employee::where('is_deleted', 0);
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
        return view('mpo._list', compact('dataset', 'district'));
    }


}
