<?php 
$myemail = 'dementedhaunt@gmail.com';

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 



if(isset($_POST['anti']) && $_POST['anti'] == '')
{
	$to = $myemail; 
	$email_subject = "You have recieved a message from: $name";
	$email_body = "Message content: \n\n".
	"Name: $name \n".
        "Email: $email_address \n\n".
        "Message: $message \n"; 
	
	$headers = "From: $email_address\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thanks.html');
} 
?>