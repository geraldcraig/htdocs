<?php

    session_start();

    $uname = $_POST["username"];
    $upass = $_POST["password"];

    $endpoint = "http://localhost/qub/week00/albumsapiold/api.php?userlogin";

    $postdata = http_build_query(

        array('addusername' => $uname,
                'addpassword' => $upass)

    );

    $opts = array(

        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
        )

    );

    $context = stream_context_create($opts);
    $resource = file_get_contents($endpoint, false, $context);
    

    if ($resource !== FALSE ) {
        $_SESSION['user'] = $uname;
	    header("Location: index.php");
    } else {
	    header("Location: login.php");
    }
?>