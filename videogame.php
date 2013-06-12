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
    <script src="js/jquery-1.10.1.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
    <script src="js/jquery.tablesorter.widgets.js"></script>
    <script src="js/jquery.tablesorter.pager.js"></script>
    <script type="text/javascript" src="js/table.js"></script>
    
    <script src="js/bootstrap.js"></script>
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
      <div class="row">
        <div class="span4">
            <a style="float: left;" href="insert.php" class="btn btn-success">Insert a Record</a>
        </div>
        <div class="span4">
            <center><a href="update.php" class="btn btn-warning">Update a Record</a></center>
        </div>
        <div class="span4">
          <a href="delete.php" style="float: right;" class="btn btn-danger">Delete A Record</a>
        </div>
      </div>

      <table class="tablesorter">
        <center><h2>Video Games</h2></center>
        <thead>
          <tr>
            <th>Name</th>
            <th>Year Released</th>
            <th>Rating</th>
            <th>Game Studio</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th colspan="7" class="pager form-horizontal">
              <button type="button" class="btn first"><i class="icon-step-backward"></i></button>
              <button type="button" class="btn prev"><i class="icon-arrow-left"></i></button>
              <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
              <button type="button" class="btn next"><i class="icon-arrow-right"></i></button>
              <button type="button" class="btn last"><i class="icon-step-forward"></i></button>
              <select class="pagesize input-mini" title="Select page size">
                <option selected="selected" value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
              </select>
              <select class="pagenum input-mini" title="Select page number"></select>
          </tr>
              <tbody>
        <?php 
            ini_set('display_errors',1); 
            error_reporting(E_ALL);
            include_once("php/mysql.php");
            view_all_video_games();
        ?>
        </tbody>
      </table>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    

  </body>
</html>
