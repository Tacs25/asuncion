<?php
require_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start();
$_SESSION['id'];

if (isset($_POST['edit_button'])){
    $First_Name = $_POST['patient_first_name'];
    $Last_Name = $_POST['patient_last_name'];
    $Contact_no = $_POST['patient_phone_no'];
    $Address = $_POST['patient_address'];
    $idd = $_SESSION['id'];
    

//if (emptyInputSignup($email, $First_Name, $Last_Name, $Contact_no, $Address) !== false){
    //header("location: ../signup.php?error=emptyinput");
    //exit();
//}

edit($conn, $First_Name, $Last_Name, $Contact_no, $Address, $idd);
}
else{
    header("location: ../signup.php");
    exit();
}
