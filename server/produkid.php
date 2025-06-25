<?php
    include_once("konfigurasi.php");
    $dta["error"] = '1';

    if (isset($_GET["id"])) {
        $dta["error"] = '2';
        $id = $_GET["id"];
        $sql = "SELECT * FROM produk WHERE id='$id';";
        $hasil = mysqli_query($koneksi, $sql);
        $jAfrow = mysqli_affected_rows($koneksi);

        if ($jAfrow > 0) {
            $h = mysqli_fetch_assoc($hasil);
            $dta["isi"] = [
                'id'          => $h["id"],
                'nama_produk' => $h["nama_produk"],
                'harga'       => $h["harga"],
                'stok'        => $h["stok"],
                'tgl_masuk'   => $h["tgl_masuk"]
            ];
            $dta["error"] = '0';
        }
        mysqli_close($koneksi);
    }

    header("Content-type: application/json");
    echo json_encode($dta);
?>
