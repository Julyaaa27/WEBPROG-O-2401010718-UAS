<?php
    global $koneksi;
    include_once("konfigurasi.php");

    $sql = "SELECT id, nama_produk, harga, stok, tgl_masuk FROM produk;";
    $ps = mysqli_query($koneksi, $sql);

    $h = []; 
    while ($res = mysqli_fetch_assoc($ps)) {
        $h[] = array(
            "id"          => $res["id"],
            "nama_produk" => $res["nama_produk"],
            "harga"       => $res["harga"],
            "stok"        => $res["stok"],
            "tgl_masuk"   => $res["tgl_masuk"],
        );
    }

    header("Content-type: application/json");
    echo json_encode($h);
?>
