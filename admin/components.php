<?php

session_start(); /* Starts the session */

if ($_SESSION['Active'] == false) { /* Redirects user to Login.php if not logged in */
    header("location:login.php");
    exit;
}

$strJsonFileContents = file_get_contents("db.json") or die("Fatal error, check db.json.");
$db = json_decode($strJsonFileContents, true);
$strJsonFileContents = file_get_contents("components/index.json");
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
                    <li role="presentation" class=""><a href="/admin/index.php"><?php echo $db["customization"]["home"] ?></a></li>
                    <li role="presentation" class="active"><a href="/admin/images.php"><?php echo $db["customization"]["images"] ?></a></li>
                    <li role="presentation" class="active"><a href="/admin/components.php"><?php echo $db["customization"]["components"] ?></a></li>
                    <li role="presentation" class=""><a href="/admin/change.php"><?php echo $db["customization"]["change_password"] ?></a></li>
                    <li role="presentation"><a href="/admin/logout.php"><?php echo $db["customization"]["logout"] ?></a></li>
                </ul>
            </nav>
            <h3 class="text-muted"> <?php echo $db["customization"]["admin_title"] ?> </h3>
        </div>

        <div class="jumbotron">
            <h1><?php echo $db["customization"]["admin_title"] ?></h1>
            <p class="lead"><?php echo $db["customization"]["description"] ?></p>
        </div>

        <div style="background-color: #eee; border-radius: 6px; padding: 6px;">
            <h3>
                Crea nuovo componente
            </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio cumque totam quibusdam! Amet perferendis maiores enim in, corporis ipsam officia id fugiat laudantium possimus, illo tempore distinctio optio, animi odio.</p>
            <form action="components.php">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="test1">
                </div>
                <div class="form-group">
                    <label>HTML</label>
                    <textarea oninput="auto_grow(this)" onclick="auto_grow(this)" name="test2" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Campi modificabili</label>
                    <input type="number" class="form-control" name="test3" min=0 placeholder=0>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


        <?php
        if ($contents) {
            echo ("ok");
        }
        ?>



        <footer class="footer">
            <p>&copy; NotACMS 2020</p>
        </footer>

    </div>

</body>

</html>