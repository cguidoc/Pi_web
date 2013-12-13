<?php
	echo "php"
foreach (glob("/upload/") as $filename) {
    echo "$filename size " . filesize($filename) . "\n";
}
?>
