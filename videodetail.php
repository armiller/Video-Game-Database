



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Video Game Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery-1.10.1.js"></script>
    
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      #info th, #info td { 
          border-top: none; 
      }
      #esbr h4 {

        margin: 0;
      }
      #e1 {

        float: left;
      }
      #e2 {

        float: right;
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
              <li class="active"><a href="videogame.php">Video Games</a></li>
              <li><a href="consoles.php">Consoles</a></li>
              <li><a href="studio.php">Studio</a></li>
            </ul>
            <form class="navbar-search pull-right" action="search.php" action="get">
              <input type="text" class="search-query" name="search" placeholder="Search">
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
      <?php ini_set('display_errors',1); 
      error_reporting(E_ALL);
      include("php/mysql.php");

      if(isset($_GET['name'])) {

        $video_name = $_GET['name'];

        $record = select_video_game($video_name);

        $button = get_next_previous($record[0]);

      }
      else {
        echo "<div class='alert alert-error'>No Video Game Selected!</div>";
      }
      

      ?>
    </div>
    <div class="container">
      <div class="page-header">
      <?php echo "<h1>".$record[0]."</h1>"; ?>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <?php
            echo "<img class='img-rounded' height='325' width='256' src='".$record[3]."'>"; 
          ?>
        </div>
        <div class="span8">
          <div id="esbr" class="row-fluid">
          <div class="span6">
            <h4>Year Released:</h4>
            </div>
            <div class="span6">
              <h4><?php echo $record[5] ?></h4>
            </div>
          </div>
          <div class="row-fluid">
          <div class="span6">
            <h4>Created By:</h4>
            </div>
            <div class="span6">
              <h4><?php echo $record[2] ?></h4>
            </div>
          </div>
          <div class="row-fluid">
          <div class="span6">
            <h4>ESBR Rating:</h4>
            </div>
            <div class="span6">
              <h4><?php echo $record[1] ?></h4>
            </div>
          </div>


        </div>
        <div class="span8">
          <div class="row-fluid">
            <h4>Devices Supported:</h4>
          <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Year Released</th>
                  <th>Manufactuer</th>
                </tr>
              </thead>  
              <tbody>
                <?php get_supported_devices($record[4]); ?>
              </tbody>
            </table>
          </table>
        
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="margin-top: 30px;">
      
      <a id="e1" class="btn" <?php if(!isset($button[0])) echo "style='display:none;'"; ?>href="videodetail.php?name=<?php echo $button[0]; ?>">Previous</a>
      <a id="e2" class="btn" <?php if(!isset($button[1])) echo "style='display:none;'"; ?>href="videodetail.php?name=<?php echo $button[1]; ?>">Next</a>
    </div>

 </body>
</html>