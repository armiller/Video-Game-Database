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
    <link href="css/select2.css" rel="stylesheet"/>
    <!-- scripts -->
    <script src="js/jquery-1.10.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/select2.js"></script>
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <script>
        $(document).ready(function() { $("#e1").select2({ placeholder: "Select a Video Game",width: "element"}); });
    </script>
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
      <?php  ini_set('display_errors',1); 
              error_reporting(E_ALL);
            include_once("php/mysql.php");
          
          if(isset($_POST['submit'])) {

            if(isset($_POST['id'])) {

              $vg_info = explode(',',$_POST['id']);  

              $result = delete_video_game($vg_info[0]);

              if(!$result) {

                echo "<div class='alert alert-error'>
                        <button type='button' class='close' data-dismiss='alert'></button>
                        Video Game Deletetion failed!
                      </div>"
              } else {

                  echo "<div class='alert alert-warning'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  Video Game '".$vg_info[1]."' Deleted!</div>";
                echo "<center><a href='videogame.php' class='btn btn-primary'>Back to Video Games</a></center>";
              }
            } 
          }
          

      ?>
    </div>

    <div class="container">
      <form class="form-horizontal" id="delete-game" action="delete.php" method="post" data-validate="parsley">
        <legend>Delete Video Game</legend>
        <div class="control-group">
          <label class="control-label" for="name">Video Game</label>
          <div class="controls">
            <select style="width: 300px;" id="e1" name="id" data-required="true">
              <option></option>
            <?php 
                
                build_video_game_options();
            ?>
            </select>
          </div>
        </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-danger" id="delete" name="submit" value="delete">Delete</button>
          <a href="videogame.php" class="btn">Cancel</a>
        </div>

      </form>
    </div>
  </div>

</body>
</html>