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
        if (isset($_GET['delete'])) {
            $index = $_GET['delete'];
            unset($_SESSION["data"][$index]);
            header('Location:hasil.php');
            exit;
            };

        echo '<table  border="1">';
        echo "<tr><th>NIS</th><th>NAMA SISWA  </th><th colspan='2'>OPSI</th></tr>";
        foreach ($_SESSION["data"] as $key=>$value){
            echo "<tr>" ;
            echo "<td>".$value['nis']."</td>" ;
            echo "<td>".$value['nama']."</td>" ;
            echo "<td><a href=\"hasil.php?delete={$key}\">Hapus</a></td>" ;
            echo "</tr>" ;
        }
    ?>
    <form action="" method="post">
        <button type="submit" value="reset" name="reset">Reset</button>
    </form>
    <?php
    if (isset ($_POST["reset"])) {
        session_unset();
        session_destroy();
        header("Location: form.php");
    }
    ?>
</body>

</html>