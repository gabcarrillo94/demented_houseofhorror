<?php

include('Models/Reservation.php');

$obj_reservation = new Reservation();

if(isset($_POST['date_booking']) && $_POST['date_booking']!= '')
{
  $array_reservations = $obj_reservation->getReservationsDate($_POST['date_booking']);
  echo json_encode($array_reservations);

}



?>
