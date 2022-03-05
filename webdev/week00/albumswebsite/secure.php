<?php

    include("dbconn.php");

    if (!isset($_SERVER['PHP_AUTH_USER'])) {

        header("WWW-Authenticate: Basic realm='Admin Dashboard'");
        header("HTTP/1.0 401 Unauthorized");
        echo "You need to enter a valid username and password.";
        exit;
        
    } else {
        
        $user = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];
        
        $authquery = "SELECT * FROM user WHERE username = '$user' AND userpassword = '$pass' ";
        
        $result = $conn->query($authquery);
        
        if (!$result) {
            echo $conn->error;
        }
        
        $num = $result->num_rows;
        
        if ($num <= 0) {
        
            header("WWW-Authenticate: Basic realm='Admin Dashboard'");
            header("HTTP/1.0 401 Unauthorized");
            echo "You need to enter a valid username and password.";
            exit;
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>Basic Authentication Demo</title>
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
        <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    </head>
    
    <body>
        <div class="container">

            <div class="row">
                <div class="column">
                    <h1>Private Webpage</h1>
                    <?php echo "<h2>Welcome $user</h2>"; ?>
                </div>
            </div>
            
            <div class="row">
                <div class="column">
                    This is content is for admin only.
                </div>
            </div>

        </div>
    </body>
</html>