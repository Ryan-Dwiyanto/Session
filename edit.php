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
    <form action="" method="post">
        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama"><br><br>
        <label for="nis">NIS : </label>
        <input type="number" id="nis" name="nis"><br><br>
        <label for="rayon">Rayon : </label>
        <input type="text" id="rayon" name="rayon"><br><br>
        <button type="submit" value="kirim" name="edit">Edit</button><br>
    </form>
    <?php 
    if (isset($_POST['edit'])) {
        $data = array(
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon']
        );
        $_SESSION["data"][$_SESSION['i']] = $data;
        echo "Data berhasil diubah";
        header("Location: form.php");
    }
        ?>
</body>
</html>