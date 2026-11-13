<?php

require_once __DIR__ . "/./koneksi.php";

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $id = $_GET['id'] ?? '';

    if($id == '' || !ctype_digit($id)){
        echo '<p style="color:red;"> !! Id Tidak Valid !!< /p>';
        exit();
    }

    $stmt = mysqli_prepare($conn, 'DELETE FROM menu WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);


    if(mysqli_stmt_affected_rows($stmt)){
        echo '<p>Data berhasil dihapus .</p>';
    }else{
        echo '<p>Data gagal di hapus .</p>';
    }

    echo '<a href="index.php">kembali</a>';


}