<h2>Belanja</h2>
<h3>Daftar Stok</h3>
<form method="POST" action="">
    <p>Obat : <br />
        <select name="obat">
            <option value="">-- Pilih Obat --</option>
            <option value="pil">pil</option>
            <option value="tablet">tablet</option>
            <option value="sirup">sirup</option>
        </select>
    </p>
    <p>Penyakit : <br />
        <select name="penyakit">
            <option value="">-- Pilih Penyakit --</option>
            <option value="demam">demam</option>
            <option value="flu">flu</option>
            <option value="lainnya">lainnya</option>
        </select>
    </p>
    <button type="submit">Beli</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obat = $_POST['obat'] ?? '';
    $penyakit = $_POST['penyakit'] ?? '';
    $message = array();

    if (empty($obat) || empty($penyakit)) {
        $message[] = "Harap lengkapi semua data.";
    }

    if (!empty($message)) {
        foreach ($message as $msg) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($msg) . " !!</p>";
        }
    } else {
        switch (strtolower($obat)) {
            case 'pil':
                $hargaObat = 30000;
                break;
            case 'tablet':
                $hargaObat = 20000;
                break;
            case 'sirup':
                $hargaObat = 10000;
                break;
            default:
                $hargaObat = 0;
                break;
        }

        switch (strtolower($penyakit)) {
            case 'demam':
                $hargaKategori = 40000;
                break;
            case 'flu':
                $hargaKategori = 30000;
                break;
            case 'lainnya':
                $hargaKategori = 0;
                break;
            default:
                $hargaKategori = 0;
                break;
        }

        $totalBayar = $hargaObat + $hargaKategori;

        if (strtolower($penyakit) === 'lainnya') {
            echo "<p>Maaf, untuk penyakit lainnya silahkan konsultasikan dengan dokter.</p>";
        } else {
            function dapatDiskon($totalBayar) {
                if ($totalBayar >= 60000) {
                    return 0.2;
                } else {
                    return 0;
                }
            }

            function totalHarga($diskon, $totalBayar) {
                return $totalBayar - ($totalBayar * $diskon);
            }

            $diskon = dapatDiskon($totalBayar);
            $totalHarga = totalHarga($diskon, $totalBayar);

            echo "<h2>Informasi Belanja</h2>";
            echo "<p><strong>Penyakit: </strong>" . htmlspecialchars($penyakit) . "</p>";
            echo "<p><strong>Obat: </strong>" . htmlspecialchars($obat) . "</p>";
            echo "<p><strong>Total Harga: </strong>Rp" . htmlspecialchars($totalHarga) . "</p>";
            echo "<p><strong>Diskon: </strong>" . htmlspecialchars($diskon) . "</p>";

            if ($diskon == 0) {
                echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
            } else {
                echo "<p>Selamat! Anda mendapatkan diskon " . (htmlspecialchars($diskon * 100)) . "%.</p>";
            }
        }
    }
} else {
    echo "<p>Silahkan pilih produk yang ingin dibeli.</p>";
}
?>
