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
        $b_date = date('m-d', strtotime($request->date_of_birth));
        $m_date = date('m-d', strtotime($request->marriage_anniversary));


        $model =PersonalInfo::where('doc_id',$id)->first();
        $model->doc_id = $request->doc_id;
        $model->wife_name = $request->better_half; 
        $model->is_married = $request->is_married;
        $model->child = $request->childrens;
        $model->grad_school = $request->grad_school;
        $model->passing_year = $request->passing_year;
        $model->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        $model->hobby = $request->hobby;
        $model->marriage_anniversary = date('Y-m-d', strtotime($request->marriage_anniversary));
        $model->b_date = $b_date;
        $model->m_date = $m_date;
        $model->fav_writer = $request->fav_writer;
        $model->fav_color = $request->fav_color;
        $model->fav_brand = $request->fav_brand;
        $model->fav_musician = $request->fav_musician;
        $model->fav_dish = $request->fav_dish;
        $model->home_town = $request->hometown;
        $model->current_city = $request->current_city;
        $model->nick_name = $request->nick_name;
        $model->high_school = $request->high_school;
        $model->ssc_year = $request->ssc_year;
        $model->college = $request->college;
        $model->hsc_year = $request->hsc_year;
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
        $b_date = date('m-d', strtotime($request->date_of_birth));
        $m_date = date('m-d', strtotime($request->marriage_anniversary));

        $model = new PersonalInfo();
        $model->doc_id = $request->doc_id;
        $model->wife_name = $request->better_half; 
        $model->is_married = $request->is_married;
        $model->child = $request->childrens;
        $model->grad_school = $request->grad_school;
        $model->passing_year = $request->passing_year;
        $model->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        $model->hobby = $request->hobby;
        $model->marriage_anniversary = date('Y-m-d', strtotime($request->marriage_anniversary));
        $model->b_date = $b_date;
        $model->m_date = $m_date;
        $model->fav_writer = $request->fav_writer;
        $model->fav_color = $request->fav_color;
        $model->fav_brand = $request->fav_brand;
        $model->fav_musician = $request->fav_musician;
        $model->fav_dish = $request->fav_dish;
        $model->home_town = $request->hometown;
        $model->current_city = $request->current_city;
        $model->nick_name = $request->nick_name;
        $model->high_school = $request->high_school;
        $model->ssc_year = $request->ssc_year;
        $model->college = $request->college;
        $model->hsc_year = $request->hsc_year;

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
        $date = date('m-d');
        //return $date;
        $doctor[] = null;

        $date_of_birth = PersonalInfo::where('b_date', $date)->get();
            
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
        $date = date('m-d');
        $doctor[] = null;

        $anniversary = PersonalInfo::where('m_date', $date)->get();
            
            if(!empty($anniversary)){
                foreach ($anniversary as $anni) {

                    $doctor[] = $anni->doc_id;
      
                    
                }
            }

             $num_doc = Doctor::whereIn('id', $doctor)->where('is_deleted','0')->get();
             return view('doctor.anniversary',compact('num_doc'));

    }

    public function count_notification(){
        $str = '';
        $date = date('m-d');
        $birthday = PersonalInfo::where('b_date', $date)->get();
        $anniversary = PersonalInfo::where('m_date', $date)->get();
        $number = count($birthday) + count($anniversary);

        !empty($number) ? $str .= '<span class="badge" >'.$number.'</span>' : '';

        return $number;
    }

    public function notification(){
        $date = date('m-d');
        $doctor[] = null;
        $date_of_birth = PersonalInfo::where('b_date', $date)->get(); 
            if(!empty($date_of_birth)){
                foreach ($date_of_birth as $db) {
                    $doctor[] = $db->doc_id;        
                }
            }
        $number_birthday = Doctor::whereIn('id', $doctor)->where('is_deleted','0')->get();

    //upcoming birthday
        $tomorrow = date('m-d', strtotime('+1 day'));
        $upcoming_date = date('m-d', strtotime('+7 day'));
        $upcoming[] = null;
        $upcoming_birth = PersonalInfo::whereBetween('b_date', [$tomorrow, $upcoming_date])->get(); 
            if(!empty($upcoming_birth)){
                foreach ($upcoming_birth as $db) {
                    $upcoming[] = $db->doc_id;        
                }
            }
        $upcoming_birthday = Doctor::whereIn('id', $upcoming)->where('is_deleted','0')->get();

    //Marriage Annivesary
        $m_anni[] = null;
        $anniversary = PersonalInfo::where('m_date', $date)->get();
            if(!empty($anniversary)){
                foreach ($anniversary as $anni) {
                    $m_anni[] = $anni->doc_id; 
                }
            }
        $number_anniversary = Doctor::whereIn('id', $m_anni)->where('is_deleted','0')->get();

    //upcoming Marriage anniversary
        $upcoming_anni[] = null;
        $upcoming_anniversary = PersonalInfo::whereBetween('m_date', [$tomorrow, $upcoming_date])->get(); 
            if(!empty($upcoming_anniversary)){
                foreach ($upcoming_anniversary as $db) {
                    $upcoming_anni[] = $db->doc_id;        
                }
            }
        $upcoming_anniversary = Doctor::whereIn('id', $upcoming_anni)->where('is_deleted','0')->get();

        return view('doctor.brith_anni', compact('number_birthday', 'number_anniversary', 'upcoming_birthday', 'upcoming_anniversary'));
    }


}
