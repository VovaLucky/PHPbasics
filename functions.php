<?php

function printTree(string $fileName, string $directory, string $separator, int $count = 0)
{
    $fullName = $directory . '/' . $fileName;
    echo str_repeat('-', $count);
    if (is_link($fullName)) {
        echo $fileName . $separator;
    } else {
        if (is_file($fullName)) {
            echo $fileName . $separator;
        }
        if (is_dir($fullName)) {
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