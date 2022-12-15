<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form enctype="multipart/form-data" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        Отправить этот файл: <input id="userfile" name="userfile" type="file" accept=".txt" />
        <input type="submit" value="Отправить файл" />
    </form>
    <div id="result"></div>
</body>
</html>

<?php
    if ($_FILES && $_FILES["userfile"]["error"] == UPLOAD_ERR_OK) {
        echo "<div id='result' class='success'></div>";
        $uploaddir = "files/";
        $uploadfile = $uploaddir . basename($_FILES["userfile"]["name"]);

        if (!is_dir($uploaddir)) {
            mkdir($uploaddir);
        }

        if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile)) {
            $separator = ".";

            $file = file_get_contents($uploadfile);
            $strings = explode($separator, $file);
            foreach ($strings as $string) {
                if ($string) {
                    preg_match_all('/\d/m', $string, $matches);
                    echo $string . " = " . count($matches[0]) . "<br>";
                }
            }
        } else {
            echo "Произошла ошибка";
        }
    } else {
        echo "<div id='result' class='error'></div>";
    }
?>