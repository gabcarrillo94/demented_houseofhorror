<?php
if(isset($_POST['clave_publica']) && $_POST['clave_publica']!=''){
	$publicKey = $_POST['clave_publica'];
	$privateKey = 853325;
	$token = sha1( $publicKey * $privateKey + $privateKey );

	if($_POST['token_reservation'] == $token && !empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['date_reservation'])){
		$myemail = 'josuebohorquezc@gmail.com'; //

		$name = $_POST['full_name'];
		$email_address = $_POST['email'];
		$date = $_POST['date_reservation'];

		$to = $myemail;
		$email_subject = "Reservation Data";

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		$logo_url = "http://dementedhaunt.com/assets/img/logo.png";

		//------------------------------------------------
							$email_body = '<div style="background-color: rgb(234, 234, 234);padding:3% 10%;">
							<div style="margin: 30px 0">
									<div style="text-align:center; marging: 0 auto; margin-bottom:10px;">
												 <img src="'.$logo_url.'">
										 </div>
									 <h2 style="text-shadow:2px 2px #ccc;letter-spacing: 2px; text-align:center;color:#c90005;font-weight:600;font-size:2em;"> Reservation Details </h2>
							 </div>
						<div style="background-color: white; margin: 20px auto;padding:3% 5%;">
									<h3 style="margin:1.5em 0; text-align:center;">FULL NAME: <strong> '. $name .  ' </strong></h3>';
		$email_body.= '<h3 style="margin:1.5em 0; text-align:center;"> E-MAIL: <strong> '. $email_address .  ' </strong> </h3>';
		$email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> DATE RESERVATION: <strong> '. $date .  ' </strong> </h3>';
    $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> NUMBER PEOPLE: <strong> '. $_POST['number_people'] .  ' </strong> </h3>';
    $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> TOTAL A PAYMENT: <strong> '. $_POST['total'] .  ' </strong> </h3>';

		$email_body.= '</div> </div>';
		//-----------------------------------------


		@mail($to,$email_subject,$email_body,$headers);
		//redirect to the 'thank you' page
		header('Location: reservation_proccess.php');
    //echo "se envio correo";
	}else{
			header('Location: index.php');
      //echo "correo no se envio porque no coincide con token";
	}
}else{
  //echo "correo no se envio porque no existe clave_publica";
		header('Location: index.php');
}


?>
