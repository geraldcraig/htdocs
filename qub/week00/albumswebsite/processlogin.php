<?php

    session_start();

    $uname = $_POST["username"];
    $upass = $_POST["password"];

    $endpoint = "http://localhost/qub/week00/albumsapi/api.php?userlogin";

    //$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?userlogin";

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
    $resource = file_get_contents($endpoint, true, $context);

    echo $resource;

    //$num = $resourse->num_rows;

    
        if ($resource !== FALSE) {
            //$_SESSION['user'] = $uname;
            header("Location: login.php");
        } else {
        $_SESSION['user'] = $uname;
	    header("Location: index.php");
    }

?>