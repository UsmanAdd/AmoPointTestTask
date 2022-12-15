<?php

$uploaddir = "files/";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (!is_dir($uploaddir)){
    mkdir($uploaddir);
}

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
    $separator = ".";

    $file = file_get_contents($uploadfile);
    $strings = explode($separator, $file);
    foreach ($strings as $string){
        if ($string){
            preg_match_all('/\d/m', $string, $matches);
            echo $string . " = " . count($matches[0]) . "<br>";
        }
    }
} else {
    echo "Произошла ошибка";
}

?>