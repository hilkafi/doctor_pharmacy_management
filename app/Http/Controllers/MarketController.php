<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;
use App\District;
use App\Region;
use App\Area;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        $dataset = Market::where('is_deleted',0)->paginate(3);
        $region = new District();
        $regions = Region::where('is_deleted',0)->paginate(3);
        return view('market.index', compact('dataset','region', 'regions'));
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
        return view('market.create', compact('dataset','dataset_two','dataset_three'));
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
            'market' => 'required',
            'district_id' => 'required',
            'area_id' => 'required',
            'region_id' => 'required',
            
        ]);

        $model = new Market();
         
                $model->name = $request->market;
                $model->area_id = $request->area_id;
                $model->district_id = $request->district_id;
                $model->region_id = $request->region_id;
                $model->_key = md5(microtime().rand());
                    
        
        
               if($model->save()){
                $message = "Succssfully added department";
               }
               else{
                   $message = "Data Entry Error";
               
                
            }
           
              
            

            return redirect('/market')->with('message',$message);

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
        $data = Market::where('_key',$id)->first();
        $dataset_three = Area::where('is_deleted',0)->get();
        $dataset_two = District::where('is_deleted',0)->get();
        $dataset = Region::where('is_deleted',0)->get();
        return view('market.edit',compact('data','dataset','dataset_two','dataset_three'));
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
            'market' => 'required',
            'area_id'=> 'required',
            'district_id'=> 'required',
            'region_id'=> 'required',
            
        ]);

        $model =  Market::where('id',$id)->first();
        $model->name = $request->market;
        $model->area_id = $request->area_id;
        $model->district_id = $request->district_id;
        $model->region_id = $request->region_id;
       
       if($model->save()){
        $message = "Succssfully updated department";
       }
       else{
           $message = "Data Entry Error";
       }
       
        return redirect('/market')->with('message',$message);
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
        $district_id = $r->district_id;
        $area_id = $r->area_id;
        $data = Market::where('is_deleted', 0);
        if(!empty($search)){
            $data = $data->where('name', 'like', '%'.trim($search).'%' );
        }
        if(!empty($region_id)){
            $data = $data->where('region_id', $region_id);
        }
        if(!empty($district_id)){
            $data = $data->where('district_id', $district_id);
        }
        if(!empty($area_id)){
            $data = $data->where('area_id', $area_id);
        }
        $dataset = $data->paginate(10);
        return view('market._list', compact('dataset', 'region'));
    }

    public function destroy($id)
    {
        //
        $data = Market::find($id);
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
