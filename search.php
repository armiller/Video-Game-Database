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
            <form class="navbar-search pull-right" action="search.php" action="get">
              <input type="text" class="search-query" name="search" placeholder="Search">
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <?php ini_set('display_errors',1); 
                    error_reporting(E_ALL);
                    include_once("php/mysql.php"); 

                if(isset($_GET['search'])) $input = $_GET['search'];
    ?>

    <div class="container">
      <div class="page-header"><h3>Search Results for "<?php echo $input ?>"<h3></div>
      <ul class="nav nav-list">
        <li class="nav-header"><h3>Video Games<h3></li>
      <?php 
               $return = search($input);

                while($row = mysql_fetch_array($return)) {
                  echo "<li><a href='videodetail.php?name=".$row[0]."'><strong>".$row[0]."</strong></a></li>";
                }

                
      ?>

      </ul>
      

    </div>

    
 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    

  </body>
</html>