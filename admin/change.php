<?php

$strJsonFileContents = file_get_contents("db.json");
$db = json_decode($strJsonFileContents, true);
session_start();
if ($_SESSION['Active'] == false) { /* Redirects user to Login.php if not logged in */
    header("location:login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Change password</title>
</head>

<body>
    <div class="container">
        <form action="" method="post" name="Login_Form" class="form-signin">
            <h2 class="form-signin-heading">Change password</h2>
            <label for="inputUsername" class="sr-only">New password</label>
            <input name="password1" type="password" id="inputUsername" class="form-control" placeholder="New password" required autofocus>
            <label for="inputPassword" class="sr-only">Repeat new password</label>
            <input name="password2" type="password" id="inputPassword" class="form-control" placeholder="Repeat new password" required>
            <button name="Submit" value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Change</button>

            <?php

            /* Check if login form has been submitted */
            if (isset($_POST['Submit'])) {
                /* Check if form's username and password matches */
                if ($_POST['password1'] == $_POST['password2']) {

                    $db["credentials"]["password"] = crypt($_POST['password1']);

                    $fp = fopen('db.json', 'w');
                    fwrite($fp, json_encode($db));
                    fclose($fp);

                    $_SESSION['Active'] = true;
                    header("location:index.php");
                    exit;
                } else {
            ?>
                    <!-- Show an error alert -->
                    &nbsp;
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> The 2 passwords doesn't match.
                    </div>
            <?php
                }
            }
            ?>

        </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>