<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>East Branch Machine Bridge - Log</title>
</head>
<body>

	<h1>East Branch Engineering</h1>
	<div class="btn-group">
		<button type="button" class="btn btn-default"><a href="log.html">Log File</a></button>
		<button type="button" class="btn btn-default"><a href="config.html">update serial parameters</a></button>
	</div>
	</br>
	
<?php
		echo "inside the php";
		$file = @fopen("/var/www/Pi_web/upload/machine_log.txt", "r") ; 
		echo "file opened" ;

		while (!feof($file)){
				
			$currentLine = fgets($file);
			if (strpos($currentLine, 'ERROR') !== false){
				$status = 'danger';}

			if (strpos($currentLine, 'NOTICE') !== false){
				$status = 'success';}

			echo $currentLine . "</br>";
		} 
		echo "end of file reached";  
		fclose($file) ;

?>

	<table class="table table-condensed table-hover">
	</table>
		
back in the html
</body>
</html>

