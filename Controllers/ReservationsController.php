<?php

/**
 *
 */
require_once('./Models/Activity.php');


class ReservationsController 
{

  function __construct()
  {
    # code...
  }

  public function save ()
  {
    $function = Place::where('id', '=', $request->function_id)->get();
    if(empty($function)){
      return json_encode(true);
    }
    else{
      $reservation = new Reservation;
      $reservation->function_id = $request->function_id;
      $reservation->date =  $request->date_booking;

      $reservation->number_people_adult = $request->adults;
      $reservation->number_people_children =  $request->children;

      $reservation->price_total = $function[0]->price;
      $reservation->email_user = $function[0]->price;
      $reservation->full_name_user = $function[0]->price;

      $response = $reservation->save();
      if($response)
      {
        return json_encode('save');
      }
  }
}



 ?>
