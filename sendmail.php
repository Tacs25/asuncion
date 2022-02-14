<?php
require __DIR__.'/PHPMailer/src/Exception.php';
require __DIR__.'/PHPMailer/src/PHPMailer.php';
require __DIR__.'/PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


//require('/PHPMailer/src/PHPMailer.php');
//require('/PHPMailer/src/SMTP.php');

//$mailTo = "zanreno1085@yahoo.com";
//$body = "<h2>You have registered in Asuncion Optical Webpage</h2>
//<h5>Verify your email to log in with the given link below</h5>
//<br/><br/>
//<a href='http://localhost/clinic/main/includes/verify.php?vkey=sad2312jjasda2'>Click Here Wag Muna </a></h1>";

//$mail = new PHPMailer(true);
//$mail = new PHPMailer\PHPMailer\PHPMailer;

//$mail->SMTPDebug = 3;

//$mail->isSMTP();

//$mail->Host = "mail.smtp2go.com";
//$mail->SMTPAuth = true;

//$mail->Username = "zanreno01";
//$mail->Password = "testing2252";

//$mail->SMTPSecure = "tls";

//$mail->Port = "2525";

//$mail->From = "zan.reno.carreon.student@access.edu.ph";
//$mail->FromName = "ZanReno";

//$mail->addAddress($mailTo, "Zan");

//$mail->isHTML(true);

//$mail->Subject = "Test Email Notification";
//$mail->Body = $body;
//$mail->AltBody = "This is the Plain text version of the email content";

//if (!$mail->send()){
    //echo "Mailer Error". $mail->ErrorInfo;
//}
//else {
    //echo "Message has been sent";
//}


function sendmail_getmail($email, $id, $appid, $idd, $sched, $startt, $endd){
    $mailTo = $email;
    $body = "<h2>You have booked an Appointment with the following Details</h2>
    <h5>Appointment ID: #$appid</h5>
    <h5>Booking ID: #$id</h5>
    <h5>Your User ID: #$idd</h5>
    <h5>Date of your Appointment: $sched</h5>
    <h5>Start Time: $startt</h5>
    <h5>End Time: $endd</h5>
    <br/><br/>";
    
    $mail = new PHPMailer(true);
    //$mail = new PHPMailer\PHPMailer\PHPMailer;
    
    //$mail->SMTPDebug = 3;
    
    $mail->isSMTP();
    
    $mail->Host = "mail.smtp2go.com";
    $mail->SMTPAuth = true;
    
    $mail->Username = "zanreno01";
    $mail->Password = "testing2252";
    
    $mail->SMTPSecure = "tls";
    
    $mail->Port = "2525";
    
    $mail->From = "zan.reno.carreon.student@access.edu.ph";
    $mail->FromName = "ZanReno";
    
    $mail->addAddress($mailTo, "Zan");
    
    $mail->isHTML(true);
    
    $mail->Subject = "Booking Schedule Details";
    $mail->Body = $body;
    $mail->AltBody = "This is the Plain text version of the email content";
    
    if (!$mail->send()){
        echo "Mailer Error". $mail->ErrorInfo;
    }
    else {
        header("location: ../patient/myappointment.php?error=getmailsuccess");
        exit(); 
    }
}

function sendmail_usercanc($id, $idd,$sched){
    $mailTo = "zanreno1085@yahoo.com";
    $body = "<h2>The User with a User ID of #$idd </h2>
    <h5>Has canceled an appointment booking at this date $sched</h5>
    <h5>With a booking Id of #$id</h5>
    <br/><br/>";
    
    $mail = new PHPMailer(true);
    //$mail = new PHPMailer\PHPMailer\PHPMailer;
    
    //$mail->SMTPDebug = 3;
    
    $mail->isSMTP();
    
    $mail->Host = "mail.smtp2go.com";
    $mail->SMTPAuth = true;
    
    $mail->Username = "zanreno01";
    $mail->Password = "testing2252";
    
    $mail->SMTPSecure = "tls";
    
    $mail->Port = "2525";
    
    $mail->From = "zan.reno.carreon.student@access.edu.ph";
    $mail->FromName = "ZanReno";
    
    $mail->addAddress($mailTo, "Zan");
    
    $mail->isHTML(true);
    
    $mail->Subject = "User Canceled Booking";
    $mail->Body = $body;
    $mail->AltBody = "This is the Plain text version of the email content";
    
    if (!$mail->send()){
        echo "Mailer Error". $mail->ErrorInfo;
    }
    else {
        header("location: ../patient/myappointment.php?canceledsuccess");
        exit(); 
    }
}

function sendmail_book($id, $idd,$sched){
    $mailTo = "zanreno1085@yahoo.com";
    $body = "<h2>The User with a User ID of #$idd </h2>
    <h5>Has booked an appointment at this date $sched</h5>
    <h5>With an appointment Id of #$id</h5>
    <br/><br/>";
    
    $mail = new PHPMailer(true);
    //$mail = new PHPMailer\PHPMailer\PHPMailer;
    
    //$mail->SMTPDebug = 3;
    
    $mail->isSMTP();
    
    $mail->Host = "mail.smtp2go.com";
    $mail->SMTPAuth = true;
    
    $mail->Username = "zanreno01";
    $mail->Password = "testing2252";
    
    $mail->SMTPSecure = "tls";
    
    $mail->Port = "2525";
    
    $mail->From = "zan.reno.carreon.student@access.edu.ph";
    $mail->FromName = "ZanReno";
    
    $mail->addAddress($mailTo, "Zan");
    
    $mail->isHTML(true);
    
    $mail->Subject = "Appointment Booking";
    $mail->Body = $body;
    $mail->AltBody = "This is the Plain text version of the email content";
    
    if (!$mail->send()){
        echo "Mailer Error". $mail->ErrorInfo;
    }
    else {
        header("location: ../patient/myappointment.php?error=none");
        exit();
    }
}

function sendmail_cancel($email, $sched){
$mailTo = $email;
$body = "<h2>Unfortunately The Doctor is not Available</h2>
<h5>Your appointment at this date $sched has been canceled</h5>
<br/><br/>";

$mail = new PHPMailer(true);
//$mail = new PHPMailer\PHPMailer\PHPMailer;

//$mail->SMTPDebug = 3;

$mail->isSMTP();

$mail->Host = "mail.smtp2go.com";
$mail->SMTPAuth = true;

$mail->Username = "zanreno01";
$mail->Password = "testing2252";

$mail->SMTPSecure = "tls";

$mail->Port = "2525";

$mail->From = "zan.reno.carreon.student@access.edu.ph";
$mail->FromName = "ZanReno";

$mail->addAddress($mailTo, "Zan");

$mail->isHTML(true);

$mail->Subject = "Canceled Appointment";
$mail->Body = $body;
$mail->AltBody = "This is the Plain text version of the email content";

if (!$mail->send()){
    echo "Mailer Error". $mail->ErrorInfo;
}
else {
    header("location: ../../app.php?canceledsuccess");
    exit();
}
}

function sendmail_forgot($email){
$mailTo = $email;
$body = "<h2>You have registered in Asuncion Optical Webpage</h2>
<h5>Verify your email to log in with the given link below</h5>
<br/><br/>
<a href='http://localhost/clinic/changeforgot.php?error=$email'>Click Here</a></h1>";

$mail = new PHPMailer(true);
//$mail = new PHPMailer\PHPMailer\PHPMailer;

//$mail->SMTPDebug = 3;

$mail->isSMTP();

$mail->Host = "mail.smtp2go.com";
$mail->SMTPAuth = true;

$mail->Username = "zanreno01";
$mail->Password = "testing2252";

$mail->SMTPSecure = "tls";

$mail->Port = "2525";

$mail->From = "zan.reno.carreon.student@access.edu.ph";
$mail->FromName = "ZanReno";

$mail->addAddress($mailTo, "Zan");

$mail->isHTML(true);

$mail->Subject = "Forgot Password Verify";
$mail->Body = $body;
$mail->AltBody = "This is the Plain text version of the email content";

if (!$mail->send()){
    echo "Mailer Error". $mail->ErrorInfo;
}
else {
    header("location: ty.php");
    exit();
}
}

function sendmail_verify($email, $vkey){
$mailTo = $email;
$body = "<h2>You have registered in Asuncion Optical Webpage</h2>
<h5>Verify your email to log in with the given link below</h5>
<br/><br/>
<a href='http://localhost/clinic/main/includes/verify.php?vkey=$vkey'>Click Here</a></h1>";

$mail = new PHPMailer(true);
//$mail = new PHPMailer\PHPMailer\PHPMailer;

//$mail->SMTPDebug = 3;

$mail->isSMTP();

$mail->Host = "mail.smtp2go.com";
$mail->SMTPAuth = true;

$mail->Username = "zanreno01";
$mail->Password = "testing2252";

$mail->SMTPSecure = "tls";

$mail->Port = "2525";

$mail->From = "zan.reno.carreon.student@access.edu.ph";
$mail->FromName = "ZanReno";

$mail->addAddress($mailTo, "Zan");

$mail->isHTML(true);

$mail->Subject = "Test Email Notification";
$mail->Body = $body;
$mail->AltBody = "This is the Plain text version of the email content";

if (!$mail->send()){
    echo "Mailer Error". $mail->ErrorInfo;
}
else {
    echo "Message has been sent";
    header("location: ty.php");
    exit();
}


}

//$email_template = "
        //<h2>You have registered in Asuncion Optical Webpage</h2>
        //<h5>Verify your email to log in with the below given link</h5>
        //<br/><br/>
        //<a href='http://localhost/clinic/main/includes/verify.php?vkey=$vkey'>Click Here </a>
    //";