<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Region;
use App\District;
use App\Hospital;
use App\Area;
use App\Market;
use App\Chamber;
use App\Doctor;

class HospitalController extends Controller
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
        $dataset = Hospital::where('is_deleted', 0)->paginate(10);
        $region = new District();
        $regions = Region::where('is_deleted',0)->get();
        return view('hospital.index', compact('dataset', 'region','regions'));
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
            $dataset_four = Market::where('is_deleted',0)->get();
            return view('hospital.create', compact('dataset','dataset_two','dataset_three','dataset_four'));
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
            'name' => 'required',
            'market_id' => 'required',
            'teritory_id' => 'required',

            
        ]);

        $model = new Hospital();
         
                $model->name = $request->name;
                $model->address = $request->address;
                $model->market_id = $request->market_id;
                $model->area_id = $request->area_id;
                $model->teritory_id = $request->teritory_id;
                $model->region_id = $request->region_id;


                $model->_key = md5(microtime().rand());
                    
        
        
               if($model->save()){
                $message = "Succssfully added data";
               }
               else{
                   $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect('/hospital')->with('message',$message);
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
        $data = Hospital::where('_key',$id)->first();
   
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District();
        return view('hospital.edit',compact('data','dataset','region'));
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
            'name' => 'required',
            'market_id' => 'required',
            'teritory_id' => 'required',
            
        ]);

        $model =Hospital::where('id', $id)->first();
         
                $model->name = $request->name;
                $model->address = $request->address;
                $model->market_id = $request->market_id;
                $model->teritory_id = $request->teritory_id;
                $model->area_id = $request->area_id;
                $model->region_id = $request->region_id;
                    
        
        
               if($model->save()){
                $message = "Record Updated Succssfully";
               }
               else{
                   $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect('/hospital')->with('message',$message);
    }

        public function search(Request $r){
        $region = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $teritory_id = $r->teritory_id;
        $area_id = $r->area_id;
        $market_id = $r->market_id;
        $data = Hospital::where('is_deleted', 0);
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
        return view('hospital._list', compact('dataset', 'region'));
 }

        public function view_details($id)
        {
          $functionality = new Hospital;
          $d = Hospital::where('_key',$id)->first();
          $dataset = Chamber::where('hospital_id',$d->id)->get();
          $doc_id[] = null;
          foreach ($dataset as $data) {

                 $doc_id[] = $data->doctor_id;
           }


         $final_data = Doctor::whereIn('id',$doc_id)->paginate(10);

          return view('hospital/details',compact('final_data','d','functionality'));

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
        $data = Hospital::find($id);
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
