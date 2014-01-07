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
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="config.html">Config</a></li>
            <li><a href="log.php">Log</a></li>
            <li><a href="list.php">List Files</a></li>
           </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<table class="table table-condensed table-hover">	
<?php
	$file = @fopen("/var/www/Pi_web/upload/machine_log.txt", "r") ; 
	echo "<tr> file opened </tr>" ;

	while (!feof($file)){
			
		$currentLine = fgets($file);
		if (strpos($currentLine, 'ERROR') !== false){
			$status = 'danger';}

		elseif (strpos($currentLine, 'NOTICE') !== false){
			$status = 'success';}

		else {
			$status = '.active';}

		echo "<tr class=" . $status . ">" . $currentLine . "</tr>";
	} 
	fclose($file) ;

?>



</table>
	
back in the html
</body>
</html>

