<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Video Game Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="../index.php">Game On!</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="../index.php">Home</a></li>
              <li><a href="../videogame.php">Video Games</a></li>
              <li><a href="../consoles.php">Consoles</a></li>
              <li><a href="../studio.php">Studio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
    <?php include_once("mysql.php");
    
      if(isset($_POST['id'])) $vg_id = $_POST['id'];

      $result = delete_video_game($vg_id);

      if(!$result) {

        echo "<div class='alert alert-error'>Delete did not work!</div>";
      }

      echo "<div class='alert alert-danger'>Video Game Deleted!</div>";


    ?>
  </div>
 
  <div class="container">
    <center><a href="../videogame.php" class="btn btn-primary">Back to Video Games</a></center>
  </div>
    
 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-2.0.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>