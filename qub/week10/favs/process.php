<?php
      session_start();

      // get favourite colour & pet from user
      // store them in a local PHP variables
      $mycolour = $_POST['fcolour'];
      $mypet = $_POST['fpet'];

      // create two SESSIONS with the data collected from the local variables set above
      $_SESSION['favcolour'] = $mycolour;
      $_SESSION['favpet'] = $mypet;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sessions Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
  </head>

  <body>
    <section class="section">
      <div class="container">
        
        <h2 class="title">Thanks!</h2>
        
        <?php
        
        ?>
        
        <p>
          <a href='page2.php'> Next Page 2</a>
        </p>
      
      </div>
    </section>
  </body>
</html>