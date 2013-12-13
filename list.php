<?php
	echo "php"
foreach (glob("/upload/*.txt") as $filename) {
    echo "$filename size " . filesize($filename) . "\n";
}
?>
