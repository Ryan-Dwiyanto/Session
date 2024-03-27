<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $_SESSION['nama'] = 'Juan';
    $_SESSION['umur'] = 23;
    echo  "Nama : {$_SESSION['nama']} <br>";
    echo  "Umur : {$_SESSION['umur']}";
    ?>
</body>
</html>