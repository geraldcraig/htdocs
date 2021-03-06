<?php

    header("Content-Type: application/json");

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['item'])) && (!isset($_GET['user']))) {

        include ("dbconn.php");
    
        $read = "SELECT * FROM album";
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['user'])) && (isset($_GET['item']))) {

        include ("dbconn.php");

        $itemid = $conn->real_escape_string($_GET['item']);
    
        $read = "SELECT * FROM album WHERE number = $itemid";
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['item'])) && (isset($_GET['user']))) {

        include ("dbconn.php");
    
        $read = "SELECT * FROM user";
        
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


    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser']))) {

        include('dbconn.php');

        $newfirstname = $conn->real_escape_string($_POST['addfirstname']);
        $newlastname = $conn->real_escape_string($_POST['addlastname']);
        $newusername = $conn->real_escape_string($_POST['addusername']);
        $newpassword = $conn->real_escape_string($_POST['addpassword']);
    
        $insertquery="INSERT INTO user (firstname, lastname, username, userpassword) VALUES ('$newfirstname', '$newlastname', '$newusername', SHA1('$newpassword'))";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "POST request performed";
            
        }
    }

?>