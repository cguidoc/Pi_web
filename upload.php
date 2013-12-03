<?php
$folder = “/uploads”;
if (is_uploaded_file($HTTP_POST_FILES['filename']['tmp_name']))  {   
    if (move_uploaded_file($HTTP_POST_FILES['filename']['tmp_name'], $folder.$HTTP_POST_FILES['filename']['name'])) {
         Echo “File uploaded”;
    } else {
         Echo “File not moved to destination folder. Check permissions”;
    };
} else {
     Echo “File is not uploaded.”;
}; 
?>

<html>
<head>
<title>Uploading Complete</title>
</head>
<body>
<h2>Uploaded File Info:</h2>
<ul>
<li>Sent file: <?php echo $_FILES['file']['name'];  ?>
<li>File size: <?php echo $_FILES['file']['size'];  ?> bytes
<li>File type: <?php echo $_FILES['file']['type'];  ?>
</ul>
</body>
</html>
