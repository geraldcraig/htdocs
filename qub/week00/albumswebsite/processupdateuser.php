<?php

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $uname = $_POST["username"];
    $upass = $_POST["password"];
    $userid = $_GET['userid'];

    $endpoint = "http://localhost/qub/week00/albumsapi/api.php?updateuser";

    //$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?updateuser";

    $postdata = http_build_query(

        array(
            'adduserid' => $userid,
            'addfirstname' => $fname,
            'addlastname' => $lname,
            'addusername' => $uname,
            'addpassword' => $upass
        )

    );

    $opts = array(

        'http' => array(
            'method' => 'PUT',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
        )

    );

    $context = stream_context_create($opts);
    $resource = file_get_contents($endpoint, false, $context);
    

    if ($resource !== FALSE ) {
        $_SESSION['user'] = $uname;
	    header("Location: account.php");
    } else {
	    header("Location: login.php");
    }
?>