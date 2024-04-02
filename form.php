<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="Box">
        <form action="" method="post">
            <table class="form">
                <tr>
                    <td>
                        <label for="nama">Nama </label>
                    </td>
                    <td>
                        <label for="nama">:</label>
                    </td>
                    <td class="input">
                        <input type="text" id="nama" name="nama"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td>
                        <label for="nis">NIS </label>
                    </td>
                    <td>
                        <label for="nis">:</label>
                    </td>
                    <td class="input">
                        <input type="number" id="nis" name="nis"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td>
                        <label for="rayon">Rayon </label>
                    </td>
                    <td>
                        <label for="rayon">:</label>
                    </td>
                    <td class="input">
                        <input type="text" id="rayon" name="rayon"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
            </table>
            <div>
                <button type="submit" value="kirim" name="submit">Submit</button>
                <button type="submit" value="kirim" name="cetak">Cetak</button>
                <button type="submit" value="kirim" name="hapus">Hapus Data</button>
            </div>
            <br>
        </form>
        <?php
        if (!isset($_SESSION["data"])) {
            $_SESSION["data"] = array();
        };
        if (isset($_POST['submit'])) {
            $data = array(
                'nama' => $_POST['nama'],
                'nis' => $_POST['nis'],
                'rayon' => $_POST['rayon']
            );

            if ($data['nama'] == "" || $data['nis'] == "" || $data['rayon'] == "") {
                echo "Data tidak boleh kosong";
            } else {
                array_push($_SESSION["data"], $data);
            }
        };
        if (isset($_POST['cetak'])) {
            header("Location:hasil.php");
        };

        if (isset($_GET['delete'])) {
            $index = $_GET['delete'];
            unset($_SESSION["data"][$index]);
            header('Location:form.php');
            exit;
        };
        if (isset($_GET['edit'])) {
            $_SESSION['i'] = $_GET['edit'];
            header('Location:edit.php');
            exit;
        }

        echo '<table rules="none" class="table">';
        echo "<tr><th>NAMA SISWA</th><th>NIS</th><th>RAYON</th><th colspan='2'>OPSI</th></tr>";
        foreach ($_SESSION["data"] as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value['nama'] . "</td>";
            echo "<td>" . $value['nis'] . "</td>";
            echo "<td>" . $value['rayon'] . "</td>";
            echo "<td><a href=\"form.php?edit={$key}\">Edit</a></td>";
            echo "<td><a href=\"form.php?delete={$key}\">Hapus</a></td>";
            echo "</tr>";
        }
        echo '</table>';
        if (isset($_POST["hapus"])) {
            session_unset();
            session_destroy();
            header('Location:form.php');
        }
        ?>
    </div>

</body>

</html>