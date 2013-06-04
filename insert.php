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
    <style>
    input.parsley-success, textarea.parsley-success {
        color: #468847 !important;
        background-color: #DFF0D8 !important;
        border: 1px solid #D6E9C6 !important;
      }
      input.parsley-error, textarea.parsley-error {
        color: #B94A48 !important;
        background-color: #F2DEDE !important;
        border: 1px solid #EED3D7 !important;
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
      <form class="form-horizontal" id="insert-game" data-validate="parsley" action="php/__insert_video_game.php" method="post">
        <legend>Insert New Video Game</legend>
        
        <div class="control-group">
          <label class="control-label" for="name">Name</label>
          <div class="controls">
          <input placeholder="Name" type="text" id="name" name="name" data-required="true" data-rangelength="[1,40]"/>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="esbr">ESBR Rating</label>
          <div class="controls">
              <label class="radio inline">
                <input type="radio" name="optionRadios" id="esbr_e" value="3" checked>E
              </label>
              <label class="radio inline">
                <input type="radio" name="optionRadios" id="esbr_t" value="2">T
              </label>
              <label class="radio inline">
                <input type="radio" name="optionRadios" id="esbr_m" value="1">M
              </label>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="game_studio">Game Studio</label>
          <div class="controls">
            <select name="gamestudio">
            <?php 

              ini_set('display_errors',1); 
              error_reporting(E_ALL);
              include_once("php/mysql.php");

              build_game_studio_options()
            ?>
          </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <button type="submit" class="btn" id="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
     
  </body>
</html>