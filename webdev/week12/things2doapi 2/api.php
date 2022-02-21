<?php

    header("Content-Type: application/json");

    // API GET - no ?item query parameter
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['item']))) {

        include ("dbconn.php");
            
        $read = "SELECT * FROM mytodolist";

        $result = $conn->query($read);

        if (!$result) {
            echo $conn -> error;
        }

        // build a response array
        $api_response = array();

        while ($row = $result->fetch_assoc()) {
            
            array_push($api_response, $row);
        }
            
        // encode the response as JSON
        $response = json_encode($api_response);

        // echo out the response
        echo $response;
    }


    // API GET - with ?item query parameter
    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['item']))) {

        include ("dbconn.php");

        $itemid = $conn->real_escape_string($_GET["item"]);

        $read = "SELECT * FROM mytodolist WHERE id='$itemid' ";

        $result = $conn->query($read);

        if (!$result) {
            echo $conn -> error;
        }

        // build a response array
        $api_response = array();

        while ($row = $result->fetch_assoc()) {
            
            array_push($api_response, $row);
        }
            
        // encode the response as JSON
        $response = json_encode($api_response);

        // echo out the response
        echo $response;
    }

    // POST
    if (($_SERVER['REQUEST_METHOD']==='POST') && isset($_GET['newitem'])) {


        include ("dbconn.php");

        $myinfo = $conn->real_escape_string($_POST['addinfo']);
        $mydatedue = $conn->real_escape_string($_POST['adddate']);
        $mytype = $conn->real_escape_string($_POST['addtype']);
        $mydetails = $conn->real_escape_string($_POST['addtask']);
        $mypic = $conn->real_escape_string($_POST['addpic']);
        
        // create INSERT query string
		$insertsql = "INSERT INTO mytodolist(info, datedue, type, details, imgpath) 
					  VALUES('$myinfo', '$mydatedue','$mytype','$mydetails', '$mypic')";	
		 
		// perform the query
		$result = $conn->query($insertsql);
 							  
		if (!$result) {
						 
			echo $conn->error;
						 
		 } else {

            header("HTTP/1.0 201 Creation success");
		}
    }


?>