<?php
require $_SERVER['DOCUMENT_ROOT'] . '/admin/import.php';
setPage("index");
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title><?php getContent("title", $page); ?></title>
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
        <p class="lead"><?php getContent("intro", $page); ?></p>
        <hr class="my-4">
        <p><?php getContent("body", $page); ?></p>
        <a class="btn btn-primary btn-lg" href="https://github.com/lollo03/NotACMS" role="button">Documentation</a>
        <a class="btn btn-primary btn-lg" href="/admin/index.php" role="button">Admin page</a>
        <img src="<?php getImage("test_image") ?>" width="100px" height="100px">
    </div>
</body>