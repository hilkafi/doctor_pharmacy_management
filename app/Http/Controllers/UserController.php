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
    public function __construct()
    {
        $this->middleware('auth');
    }
	  public function index()

    {
        $user_role = Auth::user()->user_role;
        if($user_role == 2){
          return redirect()->back()->with('message', 'You do not have the permission');
        }

         $dataset = User::where('is_deleted',0)->paginate(20);
        //$dataset = User::where('is_deleted',0)->orderBy('id','DESC')->paginate(20);
        //$employee= Employee::all();
        $region = Region::where('is_deleted', 0)->get();
        $district = new District();
         return view('user.index', compact('dataset','district', 'region'));
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

            	//$lastId = DB::getPdo()->lastInsertId();

            	//$modelEmp = new Employee();             
                //$modelEmp->user_id = $lastId;
               // $modelEmp->phone = $request->phone;
                //$modelEmp->address = $request->address;
                //$modelEmp->designation = $request->designation;
                //$modelEmp->area_id = $request->area_id;
                //$modelEmp->district_id = $request->district_id;
                //$modelEmp->region_id = $request->region_id;
               	//if(!$modelEmp->save()){
               		//throw new Exception("Error Processing Request");
               		
              // }

              // DB::commit();
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
        $user = User::where('_key', $id)->first();
        //$employee = Employee::where('user_id',$user->id)->first();
        $district = new District();
        return view('user.details', compact('user', 'district'));
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
        $data = User::where('_key',$id)->first();
        $data_id = $data->id;
        //$employee = DB::table('users')->join('employee', 'users.id', '=', 'employee.user_id');

         $employee = Employee::where('user_id',$data_id)->first();
         //return $employee;

        $dataset = Region::where('is_deleted',0)->get();
        $dataset_two = District::where('is_deleted',0)->get();
        $dataset_three = Area::where('is_deleted',0)->get();
        $region = new District();
        return view('user.edit',compact('data','dataset', 'employee','dataset_two','dataset_three','region'));
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
            'name' => ['required','string'],

            'district_id' => 'required',
            'area_id' => 'required',
            'region_id' => 'required',
            
        ]);

        DB::begintransaction();
        try{
                $model =User::find($id);
                $model->name = $request->name;
                $model->email = $request->email;
                //$model->password = Hash::make( $request->password);
                $model->user_role = $request->user_role;
                //$model->_key = md5(microtime().rand());
                if(!$model->save()){
                    throw new Exception("Error Processing Request");
               }

              

                $modelEmp = Employee::where('id',$id)->first();             
                $modelEmp->user_id = $id;
                $modelEmp->phone = $request->phone;
                $modelEmp->address = $request->address;
                $modelEmp->designation = $request->designation;
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = User::find($id);
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