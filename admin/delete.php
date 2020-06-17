<?php
$strJsonFileContents = file_get_contents("images.json");
$contents = json_decode($strJsonFileContents, true);
$base_directory = dirname(__FILE__);
foreach ($_POST as $i => $i_value) {
    unlink($base_directory . "/images/" . $contents[$i]);
    $contents[$i] = "";
}
$fp = fopen('images.json', 'w');
fwrite($fp, json_encode($contents));
fclose($fp);
header("location: images.php")
?>