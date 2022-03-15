<?php

    header("Content-Type: application/json");

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user']))) {

        include ("dbconn.php");
    
        $read = "SELECT album.id, album.number, album.title, album.image, artist.name, year.year FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id";
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['userid'])) && (isset($_GET['album'])) && (!isset($_GET['user']))) {

        include ("dbconn.php");

        $itemid = $conn->real_escape_string($_GET['album']);
    
        $read = "SELECT album.id, album.number, album.title, album.image, artist.name, year.year FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id
        WHERE number = $itemid";
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (isset($_GET['user']))) {

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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['album'])) && (!isset($_GET['user'])) && (isset($_GET['userid']))) {

        include ("dbconn.php");

        $userid = $conn->real_escape_string($_GET['userid']);
    
        $read = "SELECT * FROM user WHERE id = $userid";
        
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


    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser'])) && (!isset($_GET['newalbum']))) {

        include('dbconn.php');

        $newfirstname = $conn->real_escape_string($_POST['addfirstname']);
        $newlastname = $conn->real_escape_string($_POST['addlastname']);
        $newusername = $conn->real_escape_string($_POST['addusername']);
        $newpassword = $conn->real_escape_string($_POST['addpassword']);
    
        $insertquery="INSERT INTO user (firstname, lastname, username, userpassword) VALUES ('$newfirstname', '$newlastname', '$newusername', '$newpassword')";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "POST request performed";
            
        }
    }

    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (isset($_GET['newalbum']))) {

        include('dbconn.php');

        $number = $conn->real_escape_string($_POST['addnumber']);
        $title = $conn->real_escape_string($_POST['addtitle']);
        $image = $conn->real_escape_string($_POST['addimage']);
        $artistid = $conn->real_escape_string($_POST['addartist_id']);
        $yearid = $conn->real_escape_string($_POST['addyear_id']);
    
        $insertquery="INSERT INTO album (number, title, image, artist_id, year_id) VALUES ('$number', '$title', '$image', '$artistid', '$yearid')";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "POST request performed";
            
        }
    }

?>