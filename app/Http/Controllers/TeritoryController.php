<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\District;
use App\Market;
use App\Hospital;
use App\Consulting_Center;
use App\Chamber;
use App\Doctor;
use App\Dispensary;
use App\Employee;
use Auth;
use App\Region;

class TeritoryController extends Controller
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
         if($user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }


        $dataset = Area::where('is_deleted',0)->paginate(30);
        $region = new District();
        $regions = Region::where('is_deleted',0)->paginate(30);
        return view('teritory.index', compact('dataset','region', 'regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $user_role = Auth::user()->user_role;
         if($user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }


        $dataset = Region::where('is_deleted',0)->get();
        $dataset_two = District::where('is_deleted',0)->get();
        return view('teritory.create', compact('dataset','dataset_two'));
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
            'area' => 'required',
            'district_id' => 'required',
            'region_id' => 'required',
            
        ]);

        $model = new Area();
            if(Area::where('name',$request->area)->doesntExist()){
                $model->name = $request->area;
                $model->district_id = $request->district_id;
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

            return redirect('/teritory')->with('message',$message);
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

         $user_role = Auth::user()->user_role;
         if($user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }



        $data = Area::where('_key',$id)->first();
        $dataset_two = District::where('is_deleted',0)->get();
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District;
        return view('teritory.edit',compact('data','dataset','dataset_two','region'));
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

            'region_id'=> 'required',
            
        ]);

        $model =  Area::where('id',$id)->first();
        $model->name = $request->area;
        $model->district_id = $request->district_id;
        $model->region_id = $request->region_id;
       
       if($model->save()){
        $message = "Succssfully updated department";
       }
       else{
           $message = "Data Entry Error";
       }
       
        return redirect('/teritory')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function list_district(Request $r){
         $dataset = District::where([['is_deleted', 0], ['region_id', $r->region]])->get();
         $str = "";
         if(!empty($dataset)){
            $str .="<option value = ''>Select Area</option>";
             foreach($dataset as $data){
                $str .= "<option value='{$data->id}'>{$data->name}</option>";
             }
            return $str;
         }
     }

     public function list_area(Request $r){
        $dataset = Area::where([['is_deleted', 0], ['district_id', $r->district]])->get();
        $str = "";
        if(!empty($dataset)){
           $str .="<option value = ''>Select Teritory</option>";
            foreach($dataset as $data){
               $str .= "<option value='{$data->id}'>{$data->name}</option>";
            }
           return $str;
        }
    }
       public function list_market(Request $r){
            $dataset = Market::where([['is_deleted', 0], ['area_id', $r->area]])->get();
            $str = "";
            if(!empty($dataset)){
               $str .="<option value = ''>Select Market</option>";
                foreach($dataset as $data){
                   $str .= "<option value='{$data->id}'>{$data->name}</option>";
                }
               return $str;
            }
    }

        public function list_consulting_center(Request $r){
            $dataset = Consulting_Center::where([['is_deleted', 0], ['market_id', $r->market]])->get();
            $str = "";
            if(!empty($dataset)){
               $str .="<option value = ''>Select Consulting Center</option>";
                foreach($dataset as $data){
                   $str .= "<option value='{$data->id}'>{$data->name}</option>";
                }
               return $str;
            }
    }

            public function list_hospital(Request $r){
            $dataset = Hospital::where([['is_deleted', 0], ['market_id', $r->market]])->get();
            $str = "";
            if(!empty($dataset)){
               $str .="<option value = ''>Select Hospital</option>";
                foreach($dataset as $data){
                   $str .= "<option value='{$data->id}'>{$data->name}</option>";
                }
               return $str;
            }
        }

            public function list_mpo(Request $r){
            $dataset = Employee::where([['is_deleted', 0], ['area_id', $r->area]])->get();
            $str = "";
            if(!empty($dataset)){
               $str .="<option value = ''>Select MPO</option>";
                foreach($dataset as $data){
                   $str .= "<option value='{$data->id}'>{$data->name}</option>";
                }
               return $str;
            }
        }

            public function list_dis_mpo(Request $r){
            $dataset = Employee::where([['is_deleted', 0], ['district_id', $r->district]])->get();
            $str = "";
            if(!empty($dataset)){
               $str .="<option value = ''>Select MPO</option>";
                foreach($dataset as $data){
                   $str .= "<option value='{$data->id}'>{$data->name}</option>";
                }
               return $str;
            }
        }

           public function list_reg_mpo(Request $r){
            $dataset = Employee::where([['is_deleted', 0], ['region_id', $r->region]])->get();
            $str = "";
            if(!empty($dataset)){
               $str .="<option value = ''>Select MPO</option>";
                foreach($dataset as $data){
                   $str .= "<option value='{$data->id}'>{$data->name}</option>";
                }
               return $str;
            }
        }
    
    public function search(Request $r){
        $region = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $district_id = $r->district_id;
        $data = Area::where('is_deleted', 0);
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        if(!empty($district_id)){
            $data = $data->where('district_id', $district_id);
        }
        $dataset = $data->paginate(30);
        return view('teritory._list', compact('dataset', 'region'));
    }

    public function delete($id)
    {
        //
         $user_role = Auth::user()->user_role;
         if($user_role == 4){
         $message = "You are not authorised to perform this action";
         return redirect()->back()->with('message',$message);
          }


        $data = Area::find($id);
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
          $functionality = new Area;
          $d = Area::where('_key',$id)->first();
          $dataset = Chamber::where('teritory_id',$d->id)->get();
          $doc_id[] = null;
          foreach ($dataset as $data) {

                 $doc_id[] = $data->doctor_id;
           }


         $final_data = Doctor::whereIn('id',$doc_id)->paginate(10);

          return view('teritory.details',compact('final_data','d','functionality'));

        }
        public function view_pharmacy_details($id)
        {
          $dis = new District;  
          $functionality = new District;
          $d = Area::where('_key',$id)->first();
          $dataset = Dispensary::where('area_id',$d->id)->paginate(10);



          return view('teritory.pharmacy',compact('dataset','d','functionality','dis'));

        }

}
