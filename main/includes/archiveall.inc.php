<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST['archiveall'])){
    $id = $_POST['id'];

    $sql = $conn->query("INSERT INTO `access`.`archive`(`Booking_ID`, `Appointment_ID`, `User_ID`, `sched`, `start_time`, `end_time`, `status`) SELECT `ID`, `Appointment_ID`,`User_ID`, `sched`, `start_time`, `end_time`, `status` FROM `access`.`booked` WHERE status = 'doctorcanceled' OR status = 'canceled' OR status = 'done';");
    $sqll = $conn->query("INSERT INTO `access`.`archive`(`Appointment_ID`, `sched`, `start_time`, `end_time`, `status`) SELECT  `ID`, `sched`, `start_time`, `end_time`, `status` FROM `access`.`appointment` WHERE status = 'unbooked';");
    $sq = $conn->query("DELETE FROM booked WHERE status = 'canceled' OR status = 'doctorcanceled'");
    $s = $conn->query("DELETE FROM appointment WHERE status = 'unbooked'");
    header("location: ../../app.php?error=none");
    $ss = $conn->query("DELETE FROM booked WHERE status = 'done'");
    exit();
}
else{
    header("location: ../../index.php?error=somethingwentwrong");
        exit();
}