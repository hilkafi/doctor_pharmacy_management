<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Region;
use App\Dispensary;
use App\Doctor;
use App\Chamber;
use Auth;

class DistrictController extends Controller
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
        //
         $user_role = Auth::user()->user_role;
         if($user_role == 3 || $user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }


        $dataset = District::where('is_deleted',0)->paginate(3);
        $region = new District();
        $regions = Region::where('is_deleted',0)->paginate(3);
        return view('area.index', compact('dataset','region', 'regions'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         $user_role = Auth::user()->user_role;
         if($user_role == 3 || $user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }


        $dataset = Region::where('is_deleted',0)->get();
        return view('area.create')->with('dataset',$dataset);
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
            'district' => 'required',
            'region_id' => 'required',
            
        ]);

        $model = new District();
            if(District::where('name',$request->district)->doesntExist()){
                $model->name = $request->district;
                $model->region_id = $request->region_id;
                $model->_key = md5(microtime().rand());
                    
        
        
               if($model->save()){
                $message = "Succssfully added department";
               }
               else{
                   $message = "Data Entry Error";
               }
                
            }
            else{
                $message = "The name is already exist";
            }




       
        return redirect('/area')->with('message',$message);
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
         $user_role = Auth::user()->user_role;
         if($user_role == 3 || $user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }


        $data = District::where('_key',$id)->first();
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District;
        return view('area.edit',compact('data','dataset','region'));
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
            'district' => 'required',
            'region_id'=> 'required',
            
        ]);

        $model =  District::where('id',$id)->first();
        $model->name = $request->district;
        $model->region_id = $request->region_id;
       
       if($model->save()){
        $message = "Succssfully updated department";
       }
       else{
           $message = "Data Entry Error";
       }
       
        return redirect('/area')->with('message',$message);
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
        $data = District::where('is_deleted', 0);
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        $dataset = $data->paginate(10);
        return view('area._list', compact('dataset', 'region'));
    }

    public function delete($id)
    {
        //
         $user_role = Auth::user()->user_role;
         if($user_role == 3 || $user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }


        $data = District::find($id);
        $data->is_deleted = 1;

        if($data->save()){
            $message = "Deleted Successfully";
        }
        else{
            $message = "Data is not deletd successfully";
        }
        return redirect()->back()->with('message',$message);
    }


     public function view_details($id)
     {
          $functionality = new District;
          $d = District::where('_key',$id)->first();
          $dataset = Chamber::where('area_id',$d->id)->get();
          $doc_id[] = null;
          foreach ($dataset as $data) {

                 $doc_id[] = $data->doctor_id;
           }


         $final_data = Doctor::whereIn('id',$doc_id)->paginate(10);

          return view('area.details',compact('final_data','d','functionality'));

        }
        public function view_pharmacy_details($id)
        {
          $dis = new District;  
          $functionality = new District;
          $d = District::where('_key',$id)->first();
          $dataset = Dispensary::where('district_id',$d->id)->paginate(10);



          return view('area.pharmacy',compact('dataset','d','functionality','dis'));

        }

}
