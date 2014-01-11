<?php

$handle = fopen("/var/www/Pi_web/data/machine_log.txt", "r") ;
ftruncate($handle, 0);
fclose($handle);

echo "<script>window.location = 'log.php?message=delete_success' </script>";
?>
