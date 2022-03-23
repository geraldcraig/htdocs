<?php
 
$endpoint = "http://localhost/qub/week00/albumsapi/api.php";
 
$result = file_get_contents($endpoint);
 
$data = json_decode($result, true);
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Album Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Record Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class='nav-item'>
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='account.php'>Account</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='useraccounts.php'>User Accounts</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='addalbum.php'>Add Album</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='reviews.php'>Reviews</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Log Out</a>
          </li>
        </ul>
        <form class='form-inline my-2 my-lg-0'>
          <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
          <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
        </form>
  </div>
</nav>
<br>



</body>
</html>
