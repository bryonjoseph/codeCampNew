<?php
// Check for empty fields
if(empty($_POST['name'])  		      ||
   empty($_POST['email']) 		      ||
   empty($_POST['phone']) 		      ||
   empty($_POST['orientationDate']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$orientationDate = $_POST['orientationDate'];
$heardAbout = $_POST['heardAbout'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'brandonjbem@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Potential Student - Web Developement Bootcamp:  $name";
$email_body = "You have received a new orientation application form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nOrientation Date:\n$orientationDate\n\nI heard about this program from:\n$heardAbout\n\nMessage:\n$message";
$headers = "From: noreply@jobtrainworks.org\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);

//Send confirmation email
$to_2 = "$email_address";
$email_subject_2 = "Confirmation - Jobtrain Orientation";
$email_body_2 = "Thank you for your interest in Jobtrain's Web Developement Bootcamp, $name!\n\nWe look forward to seeing you at this appointment date: $orientationDate.\n\nUpon arrival, please check in with the front desk, and let them know you're here for orientation!";
$headers_2 = "From: noreply@jobtrainworks.org\n";
mail($to_2,$email_subject_2,$email_body_2,$headers_2);
return true;			
?>