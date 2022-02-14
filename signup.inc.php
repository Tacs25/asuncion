<?php
require_once 'main/includes/functions.inc.php';
require_once 'main/includes/dbh.inc.php';
require_once 'sendmail.php';

//$mysqli = new mysqli('localhost', 'root', '', 'access') or die(mysqli_error($mysqli));

if (isset($_POST['patient_register_button'])){
    $email = $_POST['patient_email_address'];
    $Password = $_POST['patient_password'];
    $Passwordrp = $_POST['patient_passwordrp'];
    $First_Name = $_POST['patient_first_name'];
    $Last_Name = $_POST['patient_last_name'];
    $Gender = $_POST['patient_gender'];
    $Contact_no = $_POST['patient_phone_no'];
    $Address = $_POST['patient_address'];
    $vkey = md5(time().$email);


    //$mysqli->query("INSERT INTO data (Email, Pass, First_Name, Last_Name, Gender, Contact, Home) VALUES('$Email', '$Password', '$First_Name', '$Last_Name', '$Gender', '$Contact_no', '$Address')") or die($mysqli->error);

if (emptyInputSignup($email, $Password, $Passwordrp, $First_Name, $Last_Name, $Gender, $Contact_no, $Address) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}
if (invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidemail");
    exit();
}
if (pwdMatch($Password, $Passwordrp) !== false){
    header("location: ../signup.php?error=passworddontmatch");
    exit();
}
if (emailexists($conn, $email) !== false){
    header("location: ../signup.php?error=emailtaken");
    exit();
}
createuser($conn, $email, $Password, $First_Name, $Last_Name, $Gender, $Contact_no, $Address, $vkey);
}
else{
    header("location: ../signup.php");
    exit();
}

//if (isset($_GET['delete'])){
  //  $id = $_GET['delete'];
    //$mysqli->query("DELETE FROM data WHERE ID=$id") or die($mysqli->error());
//}