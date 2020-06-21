<?php

function setPage($arg){
    global $page;
    $page = $arg;
}

function getContent($tag, $page) {
    $strJsonFileContents = file_get_contents("admin/contents.json") or die("Fatal error, check contents.json! It must not be empty.");
    $contents = json_decode($strJsonFileContents, true);
    echo $contents[$page][$tag]["text"];
  }

function getImage($tag){
    $strJsonFileContents = file_get_contents("admin/images.json") or die("Fatal error, check images.json! It must not be empty.");
    $images = json_decode($strJsonFileContents, true);
    echo $images[$tag];
}

?>