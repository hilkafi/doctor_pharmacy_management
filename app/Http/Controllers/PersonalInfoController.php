<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\PersonalInfo;
use DB;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = Doctor::where('id',$id)->where('is_deleted','0')->first();
        $personal = PersonalInfo::where('doc_id',$data->id)->first();

        return view('personal_info.edit',compact('data','personal'));
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
        $model =PersonalInfo::where('doc_id',$id)->first();
        $model->doc_id = $request->doc_id;
        $model->wife_name = $request->better_half; 
        $model->is_married = $request->is_married;
        $model->child = $request->childrens;
        $model->grad_school = $request->grad_school;
        $model->passing_year = $request->passing_year;
        $model->date_of_birth = $request->date_of_birth;
        $model->hobby = $request->hobby;
        $model->marriage_anniversary = $request->marriage_anniversary;
        $model->fav_writer = $request->fav_writer;
        $model->fav_color = $request->fav_color;
        $model->fav_brand = $request->fav_brand;
        $model->fav_musician = $request->fav_musician;
        $model->fav_dish = $request->fav_dish;
        $model->home_town = $request->hometown;
        $model->current_city = $request->current_city;
            if($model->save()){
                $message = "Succssfully added data";
            }
            else{
                $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect()->back()->with('message',$message); 
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
    }

    public function personal_info($id)
    {   
        $data = Doctor::where('id',$id)->where('is_deleted','0')->first();
       // $personal = DB::table('doctor')->join('personal_info','doctor.id', '=','personal_info.doc_id')->first();
        $personal = PersonalInfo::where('doc_id',$data->id)->first();
        return view('personal_info.create',compact('data','personal'));
    }

    public function add_personal_info(Request $request)
    {
        $model = new PersonalInfo();
        $model->doc_id = $request->doc_id;
        $model->wife_name = $request->better_half; 
        $model->is_married = $request->is_married;
        $model->child = $request->childrens;
        $model->grad_school = $request->grad_school;
        $model->passing_year = $request->passing_year;
        $model->date_of_birth = $request->date_of_birth;
        $model->hobby = $request->hobby;
        $model->marriage_anniversary = $request->marriage_anniversary;
        $model->fav_writer = $request->fav_writer;
        $model->fav_color = $request->fav_color;
        $model->fav_brand = $request->fav_brand;
        $model->fav_musician = $request->fav_musician;
        $model->fav_dish = $request->fav_dish;
        $model->home_town = $request->hometown;
        $model->current_city = $request->current_city;
            if($model->save()){
                $message = "Succssfully added data";
            }
            else{
                $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect()->back()->with('message',$message);  
    }



    public function show_personal_index($id){

        $data = Doctor::where('id',$id)->where('is_deleted','0')->first();
        //$personal = DB::table('doctor')->join('personal_info','doctor.id', '=','personal_info.doc_id')->first();

        $personal = PersonalInfo::where('doc_id',$data->id)->first();
            if(!empty($personal))
            {
                return view('personal_info.index',compact('data','personal'));
            }
            else{

                $message = "No Personal Info to display.Please add personal info first";
                return redirect()->back()->with('message',$message);
            }

        
    }


    public function show_birthday(){
        $date = date('Y-m_d');
        $doctor[] = null;

        $date_of_birth = PersonalInfo::where('date_of_birth',$date)->get();
            
            if(!empty($date_of_birth)){
                foreach ($date_of_birth as $db) {

                    $doctor[] = $db->doc_id;
      
                    
                }
            }

             $num_doc = Doctor::whereIn('id', $doctor)->where('is_deleted','0')->get();
             return view('doctor.birthday',compact('num_doc'));
    }

    public function show_marriage_anniversary()
    {
        $date = date('Y-m_d');
        $doctor[] = null;

        $anniversary = PersonalInfo::where('marriage_anniversary',$date)->get();
            
            if(!empty($anniversary)){
                foreach ($anniversary as $anni) {

                    $doctor[] = $anni->doc_id;
      
                    
                }
            }

             $num_doc = Doctor::whereIn('id', $doctor)->where('is_deleted','0')->get();
             return view('doctor.anniversary',compact('num_doc'));

    }
}
