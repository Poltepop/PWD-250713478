<?php
    $conn = mysqli_connect('localhost', 'root', '', 'mp9_kantin', '3307');

    if(!$conn){
        die('Koneksi gagal: '. mysqli_connect_errno());
    }
?>