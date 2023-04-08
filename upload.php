<?php
$target_dir = "movies/";
$target_file = $target_dir . basename($_FILES["movie"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["movie"]["size"] > 500000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "mp4" && $fileType != "avi" && $fileType != "mov"
&& $fileType != "wmv" && $fileType != "flv" && $fileType != "mkv") {
  echo "Sorry, only MP4, AVI, MOV, WMV, FLV, and MKV files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["movie"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["movie"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>