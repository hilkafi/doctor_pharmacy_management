<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\District;
use App\Area;
use App\Market;
use App\Consulting_Center;
use App\Chamber;
use App\Doctor;
use App\Dispensary;
use App\Employee;
use auth;

class ConsultingCenterController extends Controller
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
        $dataset = Consulting_Center::where('is_deleted', 0)->paginate(10);
        $region = new District();
        $regions = Region::where('is_deleted',0)->get();
        return view('consulting_center.index', compact('dataset', 'region','regions'));
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
            return view('consulting_center.create', compact('dataset','dataset_two','dataset_three','dataset_four'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            
        ]);

        $model = new Consulting_Center();
         
                $model->name = $request->name;
                $model->address = $request->address;
                $model->market_id = $request->market_id;
                $model->area_id = $request->area_id;
                $model->teritory_id = $request->teritory_id;
                $model->region_id = $request->region_id;

                  if($files = $request->file('image'))
                  {
                        //$files = $files->resize(150,150);
                        $destination = "public/images/";
                        $profile =date('YmdHis') . "." . $files->getClientOriginalExtension();
                        $insert = $files->move($destination, $profile);
                            if($insert)
                            {
                                $model->img_loc = $destination.$profile;
                            }
                            else{
                                echo "Say some error";
                            }

                }



                $model->_key = md5(microtime().rand());
                    
        
        
               if($model->save()){
                $message = "Succssfully added data";
               }
               else{
                   $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect('/consulting_center')->with('message',$message);
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
        $data = Consulting_Center::where('_key',$id)->first();
   
        $dataset = Region::where('is_deleted',0)->get();
        $region = new District();
        return view('consulting_center.edit',compact('data','dataset','region'));
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

        $model = Consulting_Center::where('id', $id)->first();
         
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
           
              
            

            return redirect('/consulting_center')->with('message',$message);
    }

        public function search(Request $r){
        $region = new District();
        $search = $r->search;
        $region_id = $r->region_id;
        $teritory_id = $r->teritory_id;
        $area_id = $r->area_id;
        $market_id = $r->market_id;
        $data = Consulting_Center::where('is_deleted', 0);
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
        return view('consulting_center._list', compact('dataset', 'region'));
 }


    public function view_details($id)
    {
          $functionality = new Consulting_Center;
          $d = Consulting_Center::where('_key',$id)->first();
          $dataset = Chamber::where('consulting_center_id',$d->id)->get();
          $doc_id[] = null;
           foreach ($dataset as $data) {

                 $doc_id[] = $data->doctor_id;
            }


         $final_data = Doctor::whereIn('id',$doc_id)->paginate(10);

          return view('consulting_center/details',compact('final_data','d','functionality'));

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
        $data = Consulting_Center::find($id);
        $data->is_deleted = 1;

        if($data->save()){
            $message = "Deleted Successfully";
        }
        else{
            $message = "Data is not deletd successfully";
        }
        return redirect()->back()->with('message',$message);
    }

    public function visit_cc_pharmacy($id){

        $data = Dispensary::where('consulting_center_id',$id)->where('is_deleted','0')->first();

            if(!empty($data))
            {

                $dataset = Region::where('is_deleted',0)->get();
                $region = new District();
                $employee = Employee::where('area_id',$data->area_id)->first();

                return view('consulting_center.pharmacy_details',compact('data','dataset','region','employee'));

            }

            else{

                $message = "This Consultation Center has no pharmacy record yet. Please Add a pharmacy first ";
                return redirect()->back()->with('message',$message);
            }


    }
}
