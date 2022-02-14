<?php
require_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start();
$_SESSION['id'];

if (isset($_POST['edit_button'])){
    $oldpass = $_POST['current_password'];
    $newpass = $_POST['new_password'];
    $passrp = $_POST['repeat_password'];
    $id = $_SESSION['id'];

if (chk($conn, $oldpass, $id) === false){
    header("location: ../patient/update.php?error=wrongpass");
    exit();
}

updatepass($conn, $oldpass, $newpass, $passrp);
}
else {
    header("location: ../../index.php");
    exit();
}