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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  



    public function index()
    {
        $dataset = Employee::where('is_deleted',0)->orderBy('id','DESC')->paginate(20);
        $region = new District();
        return view('employee.index', compact('dataset','region'));
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
       
        return view('employee.create', compact('dataset','dataset_two','dataset_three'));
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
            'emp_name' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'designation' => 'required',
            'district_id' => 'required',
            'area_id' => 'required',
            'region_id' => 'required',
            
        ]);

        $model = new Employee();
         
                $model->name = $request->emp_name;
                $model->designation = $request->designation;
                $model->email = $request->email;
                $model->phone = $request->phone;
                $model->password = Hash::make( $request->password);
                $model->address = $request->address;
                $model->area_id = $request->area_id;
                $model->district_id = $request->district_id;
                $model->region_id = $request->region_id;

                $model->_key = md5(microtime().rand());
                    
        
        
               if($model->save()){
                $message = "Succssfully added data";
               }
               else{
                   $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect('/employee')->with('message',$message);
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
        $data = Employee::where('_key',$id)->first();

        $dataset = Region::where('is_deleted',0)->get();
        $dataset_two = District::where('is_deleted',0)->get();
        $dataset_three = Area::where('is_deleted',0)->get();
        $region = new District();
        return view('employee.edit',compact('data','dataset','dataset_two','dataset_three','region'));
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
            'emp_name' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'designation' => 'required',
            'district_id' => 'required',
            'area_id' => 'required',
            'region_id' => 'required',
            
        ]);

        $model = Employee::where('id',$id)->first();
        $model->name = $request->emp_name;
        $model->designation = $request->designation;
        $model->email = $request->email;
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
       
        return redirect('/employee')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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


}
