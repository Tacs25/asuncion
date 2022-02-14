<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
require_once '../../sendmail.php';

if(isset($_POST['cancel'])){
    $id = $_POST['id'];
    $appid = $_POST['appid'];
    $idd = $_POST['User_ID'];
    $sched = $_POST['sched'];
    $startt = $_POST['startt'];
    $endd = $_POST['endd'];
    $stats = $_POST['stats'];

    $sq = "UPDATE booked SET status = 'canceled' WHERE ID = '$id';";
    $result = mysqli_query($conn, $sq) or die(mysqli_error($conn));
     header("location: ../patient/bookappointment.php?error=canceled");
      exit(); 
    // sendmail_usercanc($id, $idd, $sched);
       
}

if(isset($_POST['getmail'])){
    $id = $_POST['id'];
    $appid = $_POST['appid'];
    $idd = $_POST['User_ID'];
    $sched = $_POST['sched'];
    $startt = $_POST['startt'];
    $endd = $_POST['endd'];

    $resultt = $conn->query("SELECT * FROM data WHERE ID = $idd");
	$row = $resultt->fetch_assoc();
    $email = $row['Email'];

    sendmail_getmail($email, $id, $appid, $idd, $sched, $startt, $endd);
}
else{
    header("location: ../../index.php");
}