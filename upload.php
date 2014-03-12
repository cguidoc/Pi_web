<?php
$allowedExts = array("txt", "ncf");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
// $delete_flag = $_POST['delete'];
$flist = [];

if (in_array($extension, $allowedExts)){
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  
  else {
    if (isset($_POST['delete'])){
      // Create a list of files in the queued directory then delete them
      foreach (glob("/var/www/Pi_web/data/queued/*") as $filename) {
        array_push($flist, $filename);
      }

      $N = count($flist);     
      for($i=0; $i < $N; $i++) {
        echo($flist[$i] . "</br>" . PHP_EOL);
        unlink($flist[$i]);
      }
    }

    // echo some file info for debugging
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    //check to see if file already exists, and if it does, redirect with error
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. "; 
      echo "<script>window.location = 'index.html?message=fail_upload_overwrite'</script>";
    }

    // if file doesn't exist, save fhe file
    else {
      $folder = "/var/www/Pi_web/data/queued/";
      // change the file extension so python can handle it properly
      $newname = basename($_FILES["file"]["tmp_name"], ".ncf").".txt";
      rename($_FILES["file"]["tmp_name"], $newname);
      //now upload the file
      move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$_FILES["file"]["name"]);
      echo "Stored in: " . $folder;
      echo "<script>window.location = 'index.html?message=success_upload'</script>";
    }
  }
}
else {
  echo "Invalid file";
  echo "<script>window.location = 'index.html?message=fail_upload_invalid_file'</script>";
}
  ?>
