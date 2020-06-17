<?php
$strJsonFileContents = file_get_contents("images.json") or die("Fatal error, check images.json!");
$images = json_decode($strJsonFileContents, true);

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $images[$_POST["name"]] = "admin/" . $target_file;
    $fp = fopen('images.json', 'w');
    fwrite($fp, json_encode($images));
    fclose($fp);
    header("location: /admin/images.php");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
