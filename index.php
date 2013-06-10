
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Video Game Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery-1.10.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
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
          <a class="brand" href="index.php">Game On!</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="videogame.php">Video Games</a></li>
              <li><a href="consoles.php">Consoles</a></li>
              <li><a href="studio.php">Studio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container hero-unit">

      <h1>Video Game Database</h1>
      <p>This database is a collection of video games and information concerning them.</p>
      <p>Want to view video games?
        <a class="btn btn-primary" href="videogame.php">Games</a>
      </p>
      <p>Want to insert a new video game?
        <a class="btn btn-success" href="insert.php">Insert</a>
      </p>
      <p>Want to delete a video game?
        <a class="btn btn-danger" href="delete.php">Delete</a>
      <p>

    </div>

    
 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    

  </body>
</html>
