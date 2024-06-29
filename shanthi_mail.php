<?php
if(isset($_POST['sub'])) 
{
$message = '';
function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

    // $path = 'upload/'. $_FILES["choosefile"]["name"];
	//   move_uploaded_file($_FILES["choosefile"]["tmp_name"], $path);
    $message = '
		<h3 align="center"> Applicant Details</h3>
		<table border="1" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Name</td>
				<td width="70%">'.$_POST["fname"].'</td>
			</tr>
			<tr>
				<td width="30%">Phone Number</td>
				<td width="70%">'.$_POST["fname"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Email</td>
				<td width="70%">'.$_POST["email"].'</td>
			</tr>
			<tr>
				<td width="30%">Current Location</td>
				<td width="70%">'.$_POST["mobile"].'</td>
			</tr>
			<tr>
				<td width="30%">Who You Are ?</td>
				<td width="70%">'.$_POST["message"].'</td>
			</tr>
		</table>
	  '
	  ;
	
	
	  require 'class/PHPMailerAutoload.php';
	  //require 'class/class.smtp.php';

	  $mail = new PHPMailer;
	  //$mail-> IsSMTP();								//Sets Mailer to send message using SMTP
	  $mail->Host = 'mail.evvisolutions.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	  $mail->Port = '465';								//Sets the default SMTP server port
	  $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	  $mail->Username = 'test@evvisolutions.com';					//Sets SMTP username
	  $mail->Password = 'Welcome@1234';					//Sets SMTP password
	  $mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
	  $mail->From = $_POST["email"];					//Sets the From email address for the message
	  $mail->FromName = $_POST["fname"];				//Sets the From name of the message
	  $mail->addAddress('test@evvisolutions.com');		//Adds a "To" address
	  $mail->WordWrap = 60;							//Sets word wrapping on the body of the message to a given number of characters
	  $mail->IsHTML(true);							//Sets message type to HTML
	  $mail->AddAttachment($path);					//Adds an attachment from a path on the filesystem
	  $mail->Subject = 'Portfolio Form';				//Sets the Subject of the message
	  $mail->Body = $message;							//An HTML or plain text message body
	  if($mail->Send())								//Send an Email. Return true on success or false on error
	  {
		  $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
		  unlink($path);
	  }
	  else
	  {
		  $message = '<div class="alert alert-danger">There is an Error</div>';
	  }
	}
?>