<?php

session_start(); /* Starts the session */

if ($_SESSION['Active'] == false) { /* Redirects user to Login.php if not logged in */
  header("location:login.php");
  exit;
}

$strJsonFileContents = file_get_contents("db.json") or die("Fatal error, check db.json.");
$db = json_decode($strJsonFileContents, true);
$strJsonFileContents = file_get_contents("contents.json") or die("Fatal error, check contents.json! It must not be empty.");
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

  <script>
    function auto_grow(element) {
      element.style.height = "5px";
      element.style.height = (element.scrollHeight) + "px";
    }
  </script>

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
    </div>

    <form action="save.php" method="post">
      <?php
      foreach ($contents as $i => $i_value) {
        echo ('
        <div class="form-group">
          <label>' .  $i . '</label>
          <textarea oninput="auto_grow(this)" onclick="auto_grow(this)" name="' .  $i . ' " class="form-control">' . $i_value . '</textarea>
        </div>');
      }
      ?>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>




    <footer class="footer">
      <p>&copy; NotACMS 2020</p>
    </footer>

  </div>

</body>

</html>