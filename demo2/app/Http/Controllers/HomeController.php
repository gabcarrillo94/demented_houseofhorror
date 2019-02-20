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

    }

}
