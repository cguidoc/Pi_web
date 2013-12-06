<?php
$allowedExts = array("txt");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["type"] == "text/plain")
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    //if (file_exists("upload/" . $_FILES["file"]["name"]))
    //  {
    //  echo $_FILES["file"]["name"] . " already exists. ";
   //   }
   // else
     // {
      move_uploaded_file($_FILES["file"]["tmp_name"], "upload/to_machine.txt");
      echo "Stored in: upload/to_machine.txt";
    //  }
    }
  }
else
  {
  echo "Invalid file";
  }
?>