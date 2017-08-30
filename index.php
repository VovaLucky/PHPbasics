<?php

include "functions.php";

$directory = getcwd();
try{
    if ($argc == null) {
        getTree($directory, "<br>");
    } else {
        getTree($directory, "\n");
    }
} catch (Exception $e) {

}
