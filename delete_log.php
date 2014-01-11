<?php

$handle = fopen("/var/www/Pi_web/data/machine_log.txt", "w") ;

echo "<script>window.location = 'log.php?message=delete_success' </script>";
?>
