<?php
require_once 'main/includes/functions.inc.php';
require_once 'main/includes/dbh.inc.php';
require_once 'sendmail.php';

//$mysqli = new mysqli('localhost', 'root', '', 'access') or die(mysqli_error($mysqli));

if (isset($_POST['forgot'])){
    $email = $_POST['email'];


    //$mysqli->query("INSERT INTO data (Email, Pass, First_Name, Last_Name, Gender, Contact, Home) VALUES('$Email', '$Password', '$First_Name', '$Last_Name', '$Gender', '$Contact_no', '$Address')") or die($mysqli->error);
if (invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidemail");
    exit();
}
sendmail_forgot($email);
}
else{
    header("location: ../signup.php");
    exit();
}