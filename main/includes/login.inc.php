<?php
if (isset($_POST["patient_login_button"])){
    $email = $_POST["patient_email_address"];
    $Password = $_POST["patient_password"];


include_once 'dbh.inc.php';
include_once 'functions.inc.php';

// if (emptyInputlogin($email, $Password) !== false){
  //  header("location: ../login.php?error=emptyinput");
   // exit();
// }
// if (invalidEmail($email) !== false){
 //   header("location: ../login.php?error=emptyinput");
    //    exit();
//}



if (emptyInputlogin($email, $Password) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
}
if (invalidEmail($email) !== false){
    header("location: ../login.php?error=invalidemai");
        exit();
}
loginUser($conn, $email, $Password);
}

else {
    header("location: ../login.php");
}