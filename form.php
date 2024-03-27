<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <form action="" method="post">
        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama"><br><br>
        <label for="nis">NIS : </label>
        <input type="number" id="nis" name="nis"><br><br>
        <label for="rayon">Rayon : </label>
        <input type="text" id="rayon" name="rayon"><br><br>
        <button type="submit" value="kirim" name="submit">Submit</button>
        <button type="submit" value="kirim" name="cetak">Cetak</button>
        <button type="submit" value="kirim" name="hapus">Hapus Data</button>
    </form>
    <?php
    if (!isset($_SESSION["data"])) {
        $_SESSION["data"] = array() ;
    } ;
    if (isset($_POST['submit'])) {
        $data = array(
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon'] 
        );
        
        if ($data['nama'] == "" || $data['nis'] == ""  || $data['rayon'] == "") {
            echo "Data tidak boleh kosong";
        } else {
            //jika semua data terisi maka simpan ke session dan redirect ke halaman berikutnya
            array_push($_SESSION["data"],$data) ;
        }
    } ;
    if (isset($_POST['cetak'])) {
            header("Location:hasil.php");
    };

    if (isset($_GET['delete'])) {
        $index = $_GET['delete'];
        unset($_SESSION["data"][$index]);
        header('Location:form.php');
        exit;
        };
    if (isset( $_GET['edit'])){
        $_SESSION['i']= $_GET['edit'];
        // $temp = $_SESSION['data'][$i];
        header('Location:edit.php'); 
        exit;
    }
    echo '<table  border="1">';
    echo "<tr><th>NAMA SISWA</th><th>NIS</th><th>RAYON</th><th colspan='2'>OPSI</th></tr>";
    foreach ($_SESSION["data"] as $key=>$value){
        echo "<tr>" ;
        echo "<td>".$value['nama']."</td>" ;
        echo "<td>".$value['nis']."</td>" ;
        echo "<td>".$value['rayon']."</td>" ;
        echo "<td><a href=\"form.php?edit={$key}\">Edit</a></td>" ;
        echo "<td><a href=\"form.php?delete={$key}\">Hapus</a></td>" ;
        echo "</tr>" ;
    }
    if (isset ($_POST["hapus"])) {
        session_unset();
        session_destroy();
    }
    ?>

</body>

</html>