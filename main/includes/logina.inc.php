<?php
include_once 'dbh.inc.php';
include_once 'functions.inc.php';

if(isset($_POST["admin_login_button"])){
    $emaila = $_POST["admin_email_address"];
    $Passworda = $_POST["admin_password"];

loginAdmin($conn, $emaila, $Passworda);
}
else {
    header("location: ../logina.php");
}