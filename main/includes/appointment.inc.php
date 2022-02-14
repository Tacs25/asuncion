<?php
include_once 'dbh.inc.php';

if(isset($_POST['booking'])){
    $sched = $_POST['book_date'];
    $startt = $_POST['book_time'];
    $endt = $_POST['book_two'];
    $stats = $_POST['status'];

    $sql = "INSERT INTO appointment (sched, start_time, end_time, status) VALUES ('$sched', '$startt', '$endt', '$stats')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($result){
        echo'<script> alert ("Data Saved"); </script>';
        header("Location: ../../ds.php");
    }
    else{
        echo'<script> alert ("Data not Saved"); </script>';
    }

}