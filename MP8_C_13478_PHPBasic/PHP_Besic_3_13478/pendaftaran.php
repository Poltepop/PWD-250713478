<h2>Pendaftaran Konsultasi</h2>
<form method="POST" action="">
    <p>Nama : <br /><input type="text" name="nama" /></p>
    <p>Penyakit : <br /><input type="text" name="penyakit" /></p>
    <p>Sesi : <br />
        <select name="sesi">
            <option value="">-- Pilih Sesi --</option>
            <option value="sesi 1">sesi 1</option>
            <option value="sesi 2">sesi 2</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $penyakit = $_POST['penyakit'] ?? '';
    $sesi = $_POST['sesi'] ?? '';
    $message = array();

    if (empty($nama) || empty($penyakit) || empty($sesi)) {
        $message[] = "Harap lengkapi semua data.";
    }

    if (!empty($nama) && !preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $message[] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    if (!empty($message)) {
        foreach ($message as $msg) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($msg) . " !!</p>";
        }
    } else {
        if (strtolower($sesi) == 'sesi 1') {
            $tempat = "Ruang dr. Jung di Lantai 3";
        } elseif (strtolower($sesi) == 'sesi 2') {
            $tempat = "Online Meeting (Zoom)";
        } else {
            $tempat = "-";
        }

        echo "<h2>Informasi Pendaftaran</h2>";
        echo "<p><strong>Nama: </strong>" . htmlspecialchars($nama) . "</p>";
        echo "<p><strong>Penyakit: </strong>" . htmlspecialchars($penyakit) . "</p>";
        echo "<p><strong>Sesi: </strong>" . htmlspecialchars($sesi) . "</p>";
        echo "<p><strong>Tempat Konsultasi: </strong>" . htmlspecialchars($tempat) . "</p>";
        echo "<p>Anda mendaftar pada " . htmlspecialchars($sesi) . " di " . htmlspecialchars($tempat) . ". Silahkan hadir tepat waktu.</p>";
    }
} else {
    echo "<p>Silahkan lengkapi formulir di atas.</p>";
}
?>
