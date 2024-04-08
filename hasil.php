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

    echo '<table  border="1">';
    echo "<tr><th>NAMA SISWA  </th><th>NIS </th><th>RAYON </th></tr>";
    foreach ($_SESSION["data"] as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['nama'] . "</td>";
        echo "<td>" . $value['nis'] . "</td>";
        echo "<td>" . $value['rayon'] . "</td>";
        echo "</tr>";
    }
    ?>
    <form action="" method="post">
        <button type="submit" value="reset" name="reset">Reset</button>
        <button type="submit" value="kembali" name="kembali">Kembali</button>
    </form>
    <?php
    if (isset($_POST["reset"])) {
        session_unset();
        session_destroy();
        header("Location: form.php");
    }
    if (isset($_POST["kembali"])) {
        header("Location: form.php");
    }
    ?>
</body>

</html>