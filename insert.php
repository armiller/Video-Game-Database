<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Video Game Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/theme.bootstrap.css" rel="stylesheet">
    <!-- scripts -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-2.0.0.min.js"></script>
    <script src="js/parsley.js"></script>
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
              <li><a href="index.php">Home</a></li>
              <li><a href="videogame.php">Video Games</a></li>
              <li><a href="consoles.php">Consoles</a></li>
              <li><a href="studio.php">Studio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <form class="form-horizontal" id="insert-game" data-validation="parsley">
        <legend>Insert New Video Game</legend>
        <div class="control-group">
          <label class="control-label" for="name">Name</label>
          <div class="controls">
          <input placeholder="Name" type="text" id="name" name="name" data-requiored="true" data-rangelength="[1,40]"/>
           </div>
          <div class="control-group">
          <label class="control-label" for=""
        </div>

     
  </body>
</html>