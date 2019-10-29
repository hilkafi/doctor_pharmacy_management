<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;
use App\District;
use App\Region;
use App\Area;
use App\User;
use App\Employee;
use DB;
use Exception;
use Hash;

class UserController extends Controller
{
	  public function index()
    {
        $dataset = User::orderBy('id','DESC')->paginate(20);
        $employee = new Employee();
        $region = Region::where('is_deleted', 0)->get();
        return view('user.index', compact('dataset','employee', 'region'));
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
       
        return view('user.create', compact('dataset','dataset_two','dataset_three'));
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
            'name' => ['required','string'],
            'user_role' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'district_id' => 'required',
            'area_id' => 'required',
            'region_id' => 'required',
            
        ]);

        DB::begintransaction();
        try{
        		$model = new User();
                $model->name = $request->name;
                $model->email = $request->email;
                $model->password = Hash::make( $request->password);
                $model->user_role = $request->user_role;
                $model->_key = md5(microtime().rand());
                if(!$model->save()){
               		throw new Exception("Error Processing Request");
               }

            	$lastId = DB::getPdo()->lastInsertId();

            	$modelEmp = new Employee();             
                $modelEmp->user_id = $lastId;
                $modelEmp->phone = $request->phone;
                $modelEmp->address = $request->address;
                $modelEmp->area_id = $request->area_id;
                $modelEmp->district_id = $request->district_id;
                $modelEmp->region_id = $request->region_id;
               	if(!$modelEmp->save()){
               		throw new Exception("Error Processing Request");
               		
               }

               DB::commit();
               return redirect('/user')->with('message', 'User Created Successfully');

          	}catch(Exception $e){
          		DB::rollback();
          		return $e->getMessage();
          	}
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