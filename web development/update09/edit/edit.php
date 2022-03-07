<?php
//add PHP code from external conn.php
include("../conn.php");

$find = $_GET["editid"] ;
 
?>
<!DOCTYPE html>
<html>
 
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>EDIT my list</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="#">
      <img src="https://image.flaticon.com/icons/svg/1721/1721929.svg"  >
    </a>
        <a class="navbar-item" href='index.php'>
          My List Edit
        </a>

        <a class="navbar-item " href='select.php'>
        Edit Items
        </a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
</nav>

<div class="container">

<?php
 
$read = "SELECT * FROM mylist09 WHERE id = $find";
 
$result = $conn->query($read);
 
if(!$result){
        echo $conn->error;
}

?>

<h1 class="title is-1">
 Edit my list
</h1>

<?php
while ($row = $result->fetch_assoc()) {
 
  $info_data = $row["info"];
  $get_date = $row["datedue"];
  $get_date = date('d-m-Y', strtotime($get_date));
  $row_id = $row['id'];
  $type_data = $row['type'];
  $details_data = $row['details'];

    echo "<div class='box'>
      <article class='media'>
        <div class='media-left'>
          <figure class='image is-64x64'>
            <img src='https://bulma.io/images/placeholders/128x128.png' alt='Image'>
          </figure>
        </div>
        <div class='media-content'>
        <form action='processedit.php' method='POST'>
        <input type='hidden' value='$row_id' name='rowid'/>
        <div class='content'>
            <div class='field'>
            <label class='label'>Title: </label>
            <div class='control'>
                <input class='input' type='text' value='$info_data' name='updateinfo'>
            </div>

            <div class='field is-horizontal'>
              <div class='field-label is-normal'>
                <label class='label'>Details</label>
              </div>
              <div class='field-body'>
                <div class='field'>
                  <div class='control'>
                    <textarea class='textarea' name='updatedetailsdata'>$details_data</textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class='field is-grouped'>
                <div class='control'>
                    <button class='button is-link'>Submit</button>
                </div>
                <div class='control'>
                    <a class='button is-link is-light' href='select.php'>Cancel</a>
                </div>
                </div>
            </div>
            </form>
          </div>
          
        </div>
      </article>
    </div>";

}
?>

<br>
</div>

<?php

include("../static/footer.html");

?>
       
</body>
</html>