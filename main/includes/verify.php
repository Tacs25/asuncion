<?php
include_once 'dbh.inc.php';

if (isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];
    $sq = $conn->query("SELECT verified,vkey FROM data WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
    if($sq->num_rows == 1){
        $update = $conn->query("UPDATE data set verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        if($update){
            echo "Your Account has been verified you may now log in";
            //header("location: ../login.php");
            //exit();
        }
        else {
            echo "error";
        }
    }
    else {
        echo "This account invalid or already taken";
    }

}
else {
    die("Something went wrong!!");
}


?>