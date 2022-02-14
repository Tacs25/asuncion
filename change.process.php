<?php
require_once 'main/includes/functions.inc.php';
require_once 'main/includes/dbh.inc.php';
require_once 'sendmail.php';

//$mysqli = new mysqli('localhost', 'root', '', 'access') or die(mysqli_error($mysqli));

if (isset($_POST['change'])){
    $Password = $_POST['new_password'];
    $Passwordrp = $_POST['repeat_password'];
    $email = $_POST['email'];

if (pwdMatch($Password, $Passwordrp) !== false){
    header("location: ../signup.php?error=passworddontmatch");
    exit();
}
$hashedpwd = password_hash($Password, PASSWORD_DEFAULT);
$sql = $conn->query("UPDATE data SET Pass = '$hashedpwd' WHERE Email = '$email'");
if($sql){
    header("location: main/login.php?success");
    exit();
}

}
else{
    echo "Something Went Wrong!!";
}

//if (isset($_GET['delete'])){
  //  $id = $_GET['delete'];
    //$mysqli->query("DELETE FROM data WHERE ID=$id") or die($mysqli->error());
//}