<?php

    session_start();

    include("dbconn.php");

    $uname = $_POST["uname"];
    $upass = $_POST["pword"];

    $checkuser = "SELECT * FROM user WHERE username ='$uname' AND userpassword = MD5('$upass') ";

    $result = $conn->query($checkuser);
    
    if (!$result) {
	    echo $conn->error;
    }

    $num = $result->num_rows;

    if ($num > 0) {
        $_SESSION['editpermission123'] = $uname;
	    header("Location: index.php");
    } else {
	    header("Location: login.php");
    }
?>