<?php

function printTree(string $fileName, string $directory, string $separator, int $count = 0)
{
    $fullName = $directory . '/' . $fileName;
    for ($i = 0; $i < $count; $i++) {
        echo '-';
    }
    if (is_link($fullName)) {
        echo $fileName . $separator;
    } else {
        if (is_file($fullName) == true) {
            echo $fileName . $separator;
        }
        if (is_dir($fullName) == true) {
            echo $fileName . $separator;
            getTree($fullName, $separator, $count + 1);
        }
    }
}

function getTree(string $directory, string $separator, int $count = 0)
{
    if (($dir = opendir($directory)) == false) {
        return ;
    }
    while (($fileName = readdir($dir)) !== false) {
        if (($fileName !== '.') && ($fileName !== '..')) {
            printTree($fileName, $directory, $separator, $count);
        }
    }
    closedir($dir);
}