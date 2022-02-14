<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
require_once '../../sendmail.php';
session_start();

if (isset($_POST['booking'])){
    $id = $_POST['id'];
    $idd = $_SESSION['id'];
    $sched = $_POST['sched'];
    $startt = $_POST['start_time'];
    $endd = $_POST['end_time'];
    $stats = 'booked';
    if (datemailex($conn, $sched, $idd, $stats)!== false){
        header("location: ../patient/bookappointment.php?error=alreadybookedforthisday");
        
    exit();
    }

    $sq = "DELETE FROM appointment WHERE ID=$id";
    $result = mysqli_query($conn, $sq) or die(mysqli_error($conn));
    $sql = "INSERT INTO booked(Appointment_ID, User_ID, sched, start_time, end_time, status) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=somethingwentwrong");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $id, $idd, $sched, $startt, $endd, $stats);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    sendmail_book($id, $idd, $sched);
    header("location: ../patient/myappointment.php?error=none");
    exit();

}
else{
    header("location: ../login.php");
    exit();
}
