<?php

$file = @fopen('upload/machine_log.txt', "r") ;  


// while there is another line to read in the file
while (!feof($file))
{
    // Get the current line that the file is reading
    $currentLine = fgets($file) ;
    

}   

fclose($file) ;

?>