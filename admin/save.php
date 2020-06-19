<?php
$strJsonFileContents = file_get_contents("contents.json");
$contents = json_decode($strJsonFileContents, true);
foreach ($_POST as $i => $i_value) {
    $contents[substr($i, 0, -1)]["text"] = $i_value;
}

$fp = fopen('contents.json', 'w');
fwrite($fp, json_encode($contents));
fclose($fp);
header("location: index.php")
?>