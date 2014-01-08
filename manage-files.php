<?php
	$flist = $_POST['filelist'];
	  if(empty($flist)) {
	    echo("You didn't select any files."); } 
	  else {
	    $N = count($flist);
	 
	    for($i=0; $i < $N; $i++) {
	      echo($flist[$i] . "</br>" . PHP_EOL);
	      unlink($flist[$i]);
	    }
	  }
?>