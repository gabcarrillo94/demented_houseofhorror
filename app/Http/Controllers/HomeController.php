<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Reservations;
use App\Models\TimeTables;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = Reservations::where('type_payment', '=', '1')->get();
        $payments = Reservations::where('type_payment', '=', '0')->get();
        $data['reservation_count'] = $reservations->count();
        $data['payment_count'] = $payments->count();

        return view('adminlte::home', $data);
    }

    public function view_reservactions()
    {
      $reservations =  Reservations::with(['functions'])->orderBy('date', 'desc')->paginate(15);
      if(count($reservations) > 0){
        return view('adminlte::reservations', ['reservations' => $reservations]);
      }else{
          //return view('showmsgnothing');
      }
    }

    public function view_activities()
    {
      $timetable =  TimeTables::with(['activities'])->orderBy('created_at', 'desc')->paginate(7);
      if(count($timetable) > 0){
        return view('adminlte::timetables', ['timestables' => $timetable]);
      }else{
          //return view('showmsgnothing');
      }
    }

    public function delete_reservation(Request $request)
    {
      $reservations =  Reservations::where('id_reservation', '=', $request->id);
      $response = $reservations->delete();
      return json_encode($response);
    }

    public function filter(Request $request)
    {
      $reservations =  Reservations::with(['functions'])->where('full_name_user', 'LIKE', "%$request->full_name_user%")->orderBy('date', 'desc')->paginate(10);
      if(count($reservations) > 0){
        return view('adminlte::reservations', ['reservations' => $reservations]);
      }else{
          //return view('showmsgnothing');
      }
    }

}
