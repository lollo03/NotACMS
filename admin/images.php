<?php

session_start(); /* Starts the session */

if ($_SESSION['Active'] == false) { /* Redirects user to Login.php if not logged in */
  header("location:login.php");
  exit;
}

$strJsonFileContents = file_get_contents("db.json") or die("Fatal error, check db.json.");
$db = json_decode($strJsonFileContents, true);
$strJsonFileContents = file_get_contents("images.json") or die("Fatal error, check images.json!");
$contents = json_decode($strJsonFileContents, true);
?>

<!-- Show password protected content down here -->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <title><?php echo $db["customization"]["admin_title"] ?></title>
</head>

<body>
  <div class="container">
    <div class="header clearfix">
      <nav>
        <ul class="nav nav-pills pull-right">
          <li role="presentation" class=""><a href="/admin/index.php">Home</a></li>
          <li role="presentation" class="active"><a href="/admin/images.php">Images</a></li>
          <li role="presentation" class=""><a href="/admin/change.php">Change password</a></li>
          <li role="presentation"><a href="/admin/logout.php">Logout</a></li>
        </ul>
      </nav>
      <h3 class="text-muted"> <?php echo $db["customization"]["admin_title"] ?> </h3>
    </div>

    <div class="jumbotron">
      <h1><?php echo $db["customization"]["admin_title"] ?></h1>
      <p class="lead"><?php echo $db["customization"]["description"] ?></p>
      <!DOCTYPE html>
      <html>

      <body>

        <form action="upload.php" method="post" enctype="multipart/form-data">
          Select image to upload:
          <input type="file" name="fileToUpload" id="fileToUpload">
          <select id="name" name="name">
            <?php 
              foreach ($contents as $i => $i_value) {
                echo '<option value="' . $i .'">' . $i .'</option>';
              }
            ?>
          </select>
          <input type="submit" value="Upload Image" name="submit">
        </form>

      </body>

      </html>
    </div>



    <form action="delete.php" method="post">
      <?php
      foreach ($contents as $i => $i_value) {
        if($i_value == ""){
          $str = "File not found. Please upload it.";
        }else{
          $str = "Show image";
        }
        echo ('
        <div class="form-group">
          <label>' .  $i . '</label> <a href="' . substr($i_value, 6) .'" target="_blank" >' . $str .'</a>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="' . $i . '">
          <label class="form-check-label" for="defaultCheck1">
            Delete
          </label>
        </div>
        </div>');
      }
      ?>
      <button type="submit" class="btn btn-danger">Delete selected</button>
    </form>




    <footer class="footer">
      <p>&copy; NotACMS 2020</p>
    </footer>

  </div>
</body>

</html>