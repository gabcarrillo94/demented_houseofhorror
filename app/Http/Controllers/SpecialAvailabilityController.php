<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTables;
use App\SpecialAvailability;

class SpecialAvailabilityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index () {
        $data['timetables'] =  TimeTables::with(['activities'])->orderBy('created_at', 'desc')->paginate(7);
      
        if(count($data['timetables']) > 0){
          return view('vendor.adminlte.availability', $data);
        } else{
            //return view('showmsgnothing');
        }
    }
    
    public function create_availability (Request $request) {
        $avlb = new SpecialAvailability;

        $avlb->function_id = (str_split($request->function))[0];
        
        list($m, $d, $y) = explode('-', $request->date);
        
        if(($m > 12 || $m < 1) && ($d > 31 || $d < 1) && ($y > 2100 || $y < 2000))
        {
          return redirect()->back()->with('error', 'Wrong Date');
        }
        else
        {
            $avlb->date = $request->date;
        }
        
        $avlb->availability = $request->tickets;
        
        $avlb->save();
        return redirect('tickets')->with('success', 'Availability Was Successfully Changed!');
    }
}
