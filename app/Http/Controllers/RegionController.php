<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Chamber;
use App\Doctor;
use App\Dispensary;
use App\District;
use Auth;

class RegionController extends Controller
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
         $user_role = Auth::user()->user_role;
         if($user_role == 2 || $user_role == 3 || $user_role == 4){
            $message = "You are not authorised to perform this action";
            return redirect()->back()->with('message',$message);
            }
    


         $dataset = Region::where('is_deleted',0)->paginate(3);
        return view('region.index')->with('dataset',$dataset);
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $user_role = Auth::user()->user_role;
         if($user_role == 2 || $user_role == 3 || $user_role == 4){
         return redirect()->back()->with('message','You are not authorised to perform this action');
         }

        return view('/region.create');
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
            'region' => 'required',
            
        ]);

        $model = new Region();
            if(Region::where('name',$request->region)->doesntExist()){
                $model->name = $request->region;
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




       
        return redirect('/region')->with('message',$message);
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
         if($user_role == 2 || $user_role == 3 || $user_role == 4){
          $message = "You are not authorised to perform this action";
           return redirect()->back()->with('message',$message);
          }
        $data = Region::where('_key',$id)->first();
        return view('region.edit')->with('data',$data);
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
            'region' => 'required',
            
        ]);

        $model =  Region::where('id',$id)->first();
        $model->name = $request->region;
       
       if($model->save()){
        $message = "Succssfully updated department";
       }
       else{
           $message = "Data Entry Error";
       }
       
        return redirect('/region')->with('message',$message);
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function search(Request $r){
        $search = $r->search;
        $data = Region::where('is_deleted', 0);
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        $dataset = $data->paginate(10);
        return view('region._list', compact('dataset'));
    }

     public function view_details($id)
        {
          $functionality = new Region;
          $d = Region::where('_key',$id)->first();
          $dataset = Chamber::where('region_id',$d->id)->get();
          $doc_id[] = null;
          foreach ($dataset as $data) {

                 $doc_id[] = $data->doctor_id;
           }


         $final_data = Doctor::whereIn('id',$doc_id)->paginate(10);

          return view('region.details',compact('final_data','d','functionality'));

        }
        public function view_pharmacy_details($id)
        {
          $dis = new District;  
          $functionality = new Region;
          $d = Region::where('_key',$id)->first();
          $dataset = Dispensary::where('region_id',$d->id)->paginate(10);



          return view('region.pharmacy',compact('dataset','d','functionality','dis'));

        }


    public function destroy($id)
    {
        //
         $user_role = Auth::user()->user_role;
         if($user_role == 2 || $user_role == 3 || $user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }
    


        $data = Region::find($id);
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
