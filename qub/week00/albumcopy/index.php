<?php

include ("dbconn.php");

?>

<!DOCTYPE html>
<html>
<body>

<h1>Album Count Test</h1>

<?php

$currentUser = 'admin';
$albumid = '5';
$count = '1';

$checkuser = "SELECT * FROM album_plays
WHERE album_plays.user_id IN (SELECT user.id FROM user WHERE username = '$currentUser')
AND album_plays.album_id = '$albumid' ";

$result = $conn->query($checkuser);

if (!$result) {
    echo $conn->error;
}

$num = $result->num_rows;

if ($num > 0) {

     $updatequery = "UPDATE album_plays SET plays = plays + 1 
     WHERE album_plays.user_id IN (SELECT user.id FROM user WHERE username = '$currentUser')
     AND album_plays.album_id = '$albumid' ";

     $result = $conn->query($updatequery);
    
     if(!$result) {
         
         echo $conn->error;
     
     } else {
 
         echo "Update request performed";
         
     }

} else {

    //$userid = '2';
    //$albumid = '2';
    //$count = '1';
    
    /*$stmt = $conn->prepare("INSERT INTO album_plays (user_id, album_id, count) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", '2', '2', '2');
    $stmt->execute();

    $stmt->close();*/

    $insertquery = "INSERT INTO album_plays (user_id, album_id, plays) 
    VALUES ((SELECT user.id FROM user WHERE username = '$currentUser'), '$albumid', '$count')";
           
    $result = $conn->query($insertquery);
    
    if(!$result) {
        
        echo $conn->error;
    
    } else {

        echo "POST request performed";
        
    }
}

?> 

</body>
</html>