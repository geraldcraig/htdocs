<?php

    $newfact = $_POST['myfact'];

    $endpoint = "http://localhost/amazingfactsapi/api.php?newfact";

    $postdata = http_build_query(
        array(
            'addfact' => $newfact
        )
    );

    $opts = array(

        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content'=> $postdata
        )
    );

    $context = stream_context_create($opts);
    $resource = file_get_contents($endpoint, false, $context);

    echo $resource;

    if($resource !== FALSE) {
        
        header("Location: index.php");
        exit();

    } else {
        echo "Problem with INSERT!";
    }

?>
