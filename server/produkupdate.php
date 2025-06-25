<?php
    include_once("konfigurasi.php");

    $dta["error"] = '1';

    if (isset($_POST["txID"])) {
        $dta["error"] = '2';
        $id = $_POST["txID"];

        $sql = "SELECT * FROM produk WHERE id='$id';";
        $hasil = mysqli_query($koneksi, $sql);
        $jAfrow = mysqli_affected_rows($koneksi);

        if ($jAfrow > 0 && $hasil) {
            $h = mysqli_fetch_assoc($hasil);
            $dta["isi"] = [
                'id' => $h["id"],
                'nama_produk' => $h["nama_produk"],
                'harga' => $h["harga"],
                'stok' => $h["stok"],
                'tanggal_masuk' => $h["tanggal_masuk"]
            ];
            $dta["error"] = '0';
        }
    }

    header("Content-type: application/json");
    echo json_encode($dta);
?>
