<?php
    global $koneksi;
    include_once("konfigurasi.php");

    $sql = "SELECT id, nama_produk, harga, stok, tanggal_masuk FROM produk;";
    $ps = mysqli_query($koneksi, $sql);

    $h = []; // pastikan variabel array diinisialisasi
    while ($RES = mysqli_fetch_assoc($ps)) {
        $h[] = array(
            "id" => $RES["id"],
            "nama_produk" => $RES["nama_produk"],
            "harga" => $RES["harga"],
            "stok" => $RES["stok"],
            "tanggal_masuk" => $RES["tanggal_masuk"],
        );
    }

    header("Content-type: application/json");
    echo json_encode($h);
?>
