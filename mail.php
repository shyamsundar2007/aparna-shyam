<?php 
$errors = array(); // array to hold validation errors

$data = array(); // array to pass back data
$data['success'] = true;
$data['messageSuccess'] = 'Hey! Gracias por contactarnos, en breve nos comunicaremos contigo';
print_r($_POST);
// CHANGE THE TWO LINES BELOW
$email_from = $_POST['email']; // required
$email_to = "sundar.vinod@gmail.com@gmail.com";
$email_subject = "this is a test"; // required
$name = $_POST['name']; // required
$subject = $_POST['email']; // required
$message = $_POST['message']; // required
//$date = $_POST['date'];
$date='';
$number='';
$notes='';
$message='';
$guest='';
if(isset($_POST['date'])){
    $date= "Date:".$_POST['date']."";
}
if(isset($_POST['number'])){
    $number= "Number:".$_POST['number']."";
}
$notes= "Notes:".$_POST['notes']."";
if(isset($_POST['message'])){
    $message= "Enquiry:".$_POST['message']."";
}
if(isset($_POST['guest'])){
    $number= "Number:".$_POST['guest']."";
}

$sangeet = "Sangeet: ".$_POST['sangeet'].""; 	
$engagement = "Engagement: ".$_POST['nichayathartham']."";
$wedding = "Wedding: ".$_POST['wedding']."";
$reception = "Reception: ".$_POST['reception']."";

// Form Message begin

$email_message = "Name: ".$name.";
Email: ".$email_from.";
".$number.";
".$notes.";
".$sangeet.";
".$engagement.";
".$wedding.";
".$reception.";
";		

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'Reply-To: '.$email_from."\r\n";
$headers .= 'From: '.$email_from . "\r\n";
$headers .= 'Cc: '.$cc . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

echo $email_to."====".$email_subject."------".$email_message.'--------'.$headers;
// Send Mail

if(@mail($email_to, $email_subject, $email_message, $headers))
    echo json_encode($data);
    $myfile = file_put_contents('logs.txt', $email_message.PHP_EOL , FILE_APPEND | LOCK_EX);
    // return all our data to an AJAX call

    ?>
