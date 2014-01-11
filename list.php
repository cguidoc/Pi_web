<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<title>East Branch Machine Bridge</title>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">East Branch Engineering</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="config.html">Config</a></li>
            <li><a href="log.php">Log</a></li>
            <li class="active"><a href="list.php">List Files</a></li>
           </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>

<div class="container">
  <div class="row">
    <div class="panel panel-default col-md-6">
      <div class="panel-heading">Queued files (going to the machine)</div>
      <div class="panel-body">
        <form action="manage-files.php" method="post">
          <table class="table table-condensed table-hover"> 
            <tr><td><input type="submit" name="formSubmit" value="delete files" /></td></tr>
              <?php
                foreach (glob("/var/www/Pi_web/data/queued/*") as $filename) {
                  echo "<tr><td><input type='checkbox' name='filelist[]' value='" . $filename . "'/></td>";
                  echo "<td>";
                  echo "$filename size " . filesize($filename);
                  echo "</td></tr>" . PHP_EOL;
                }
              ?>
         </table>
       </form>
     </div>
    </div>
    <div class="panel panel-default col-md-6">
      <div class="panel-heading">Received Files (Ccoming from the machine)</div>
      <div class="panel-body">
        <form action="manage-files.php" method="post">
          <table class="table table-condensed table-hover"> 
            <tr><td><input type="submit" name="formSubmit" value="delete files" /></td></tr>
              <?php
                foreach (glob("/var/data/Pi_web/data/received/*") as $filename) {
                  echo "<tr><td><input type='checkbox' name='filelist[]' value='" . $filename . "'/></td>";
                  echo "<td><a href='" . str_replace("/var/data/Pi_web", "", $filename) ."'> download file</a></td>";
                  echo "<td>";
                  echo $filename . " | size " . filesize($filename);
                  echo "</td></tr>" . PHP_EOL;
                }
              ?>
          </table>
        </form>
      </div>
     </div>
  </div>    
</div>
</body>
</html>
