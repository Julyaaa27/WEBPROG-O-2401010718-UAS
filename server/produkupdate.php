<?php
    include_once("konfigurasi.php");
    $dta["error"] = '1';

    if (isset($_POST["id"])) {
        $dta["error"] = '2';

        $id = $_POST["id"];
        $nama = $_POST["nama_produk"];
        $harga = $_POST["harga"];
        $stok = $_POST["stok"];
        $tgl_masuk = $_POST["tgl_masuk"];

        $sql = "UPDATE produk SET 
                    nama_produk = '$nama',
                    harga = '$harga',
                    stok = '$stok',
                    tgl_masuk = '$tgl_masuk'
                WHERE id = '$id';";

        $hasil = mysqli_query($koneksi, $sql);
        $jAfrow = mysqli_affected_rows($koneksi);

        if ($jAfrow > 0) {
            $dta["error"] = '0';
        }

        mysqli_close($koneksi);
    }

    header("Content-type: application/json");
    echo json_encode($dta);
?>
