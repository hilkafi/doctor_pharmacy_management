<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispensary;
use App\Doctor;
use App\Market;
use App\Area;
use App\District;
use App\Region;
use Auth;

use App\User;

class ApprovalController extends Controller
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
        $doctors = Doctor::where([['is_verified', 0], ['is_deleted', 0]])->get();
        $pharmacys = Dispensary::where([['is_verified', 0], ['is_deleted', 0]])->get();
        $region = new District();
        return view('approval.index', compact('doctors', 'pharmacys', 'region'));
    }

    public function doctor_approved($id){
      $doctor = Doctor::find($id);
      $doctor->is_verified = 1;
      $doctor->save();

      return redirect('/doctor')->with('message', 'Doctor Approved Successfully');
    }

    public function pharmacy_approved($id){
      $pharmacy = Dispensary::find($id);
      $pharmacy->is_verified = 1;
      $pharmacy->save();

      return redirect('/dispensary')->with('message', 'Pharmacy Approved Successfully');
    }

}
