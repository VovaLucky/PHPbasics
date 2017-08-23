<?php

include "functions.php";

error_reporting(0);

$directory = getcwd();
if ($argc == null) {
    getTree($directory, "<br>");
} else {
    getTree($directory, "\n");
}