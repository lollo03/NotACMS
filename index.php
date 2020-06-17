<?php
$strJsonFileContents = file_get_contents("admin/contents.json") or die("Fatal error, check contents.json! It must not be empty.");
$contents = json_decode($strJsonFileContents, true);
$strJsonFileContents = file_get_contents("admin/images.json") or die("Fatal error, check images.json! It must not be empty.");
$images = json_decode($strJsonFileContents, true);
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title><?php echo $contents["title"]?></title>
</head>

<style>
    .centered {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body>
    <div class="jumbotron centered">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead"><?php echo $contents["intro"]?></p>
        <hr class="my-4">
        <p><?php echo $contents["body"]?></p>
        <a class="btn btn-primary btn-lg" href="https://github.com/lollo03/NotACMS" role="button">Documentation</a>
        <a class="btn btn-primary btn-lg" href="/admin/index.php" role="button">Admin page</a>
        <img src="<?php echo $images["test_image"]?>" width="100px" height="100px">
    </div>
</body>