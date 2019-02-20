<?php
require_once('Models/Reservation.php');
$reservation = new Reservation();
echo $reservation->delete($_POST['id']);

 ?>
