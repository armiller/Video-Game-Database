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
    <link href="css/select2.css" rel="stylesheet">
    <!-- scripts -->
    <script src="js/jquery-1.10.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/parsley.js"></script>
    <script src="js/select2.js"></script>
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
    <script>
        $(document).ready(function() {  
          $("#e4").select2({placeholder: "Select a Game Studio"});
        });
        $(document).ready(function () {
          $("#e5").select2({placeholder: "Select Devices"});
        });
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
            </ul>
            <form class="navbar-search pull-right" action="search.php" action="get">
              <input type="text" class="search-query" name="search" placeholder="Search">
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
      <?php  ini_set('display_errors',1); 
              error_reporting(E_ALL);
            include_once("php/mysql.php");
          
          if(isset($_POST['submit'])) {

            $devices = null;

            if(isset($_POST['name'])) $vg_name = $_POST['name'];
            if(isset($_POST['year'])) $vg_year = $_POST['year'];
            if(isset($_POST['optionRadios'])) $vg_rating = $_POST['optionRadios'];
            if(isset($_POST['gamestudio'])) $vg_studio = $_POST['gamestudio'];
            if(isset($_POST['devices'])) $devices = $_POST['devices'];
            if(isset($_POST['url'])) $url = $_POST['url'];

            $result = insert_new_video_game($vg_name, $vg_year, $vg_rating, $vg_studio, $devices, $url);

            if(!$result) {

              echo "<div class='alert alert-error'>Insert did not work!</div>";
            }

            echo "<div class='alert alert-success'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                     Video Game '".$vg_name."' added!</div>";

          }
      ?>
    </div>

    <div class="container">
      <form class="form-horizontal" id="insert-game" data-validate="parsley" action="insert.php" method="post">
        <legend>Insert New Video Game</legend>
        
        <div class="control-group">
          <label class="control-label" for="name">Name*</label>
          <div class="controls">
          <input placeholder="Name" type="text" id="name" name="name" data-required="true" data-rangelength="[1,40]"/>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="name">Year Released*</label>
          <div class="controls">
          <input placeholder="YYYY" type="text" id="year" name="year" data-required="true" data-type="digits" data-maxlength="4" data-minlength="4"/>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="esbr">ESBR Rating*</label>
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
          <label class="control-label" for="game_studio">Game Studio*</label>
          <div class="controls">
            <select name="gamestudio" style="width: 300px;" id="e4" data-required="true">
              <option></option>
            <?php 

              build_game_studio_options()
            ?>
          </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="devices">Devices Supported</label>
          <div class="controls">
            <select multiple name="devices[]" style="width: 300px;" id="e5">
              <option></option>
              <?php build_device_options(); ?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="picture">Image URL</label>
          <div class="controls">
            <input class="input-xxlarge" type="text" id="url" name="url" data-type="url" data-maxlength="250"/>
          </div>
        </div>


        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-primary" id="submit" name="submit" value="insert">Submit</button>
            <a href="videogame.php" class="btn">Cancel</a>
            <span class="help-block" style="margin-top: 4px;"><small>*required</small></span>
            
          </div>
        </div>
      </form>
    </div>
     
  </body>
</html>