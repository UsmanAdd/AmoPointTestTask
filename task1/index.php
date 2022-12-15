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
    <form enctype="multipart/form-data" action="server.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        Отправить этот файл: <input id="userfile" name="userfile" type="file" accept=".txt" />
        <input type="submit" value="Отправить файл" />
    </form>
    <div id="result"></div>
</body>
<script>
    let file = document.getElementById('userfile');
    let result = document.getElementById('result');

    document.getElementById('userfile').addEventListener('change', function(){
        if(this.value){
            result.className = "success";
        } else {
            result.className = "error";
        } 

    });
</script>
</html>