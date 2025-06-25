<?php
include_once("konfigurasi.php");

$response = ["error" => 1];  // default error

if (isset($_POST["id"]) && isset($_POST["nama_produk"]) && isset($_POST["harga"]) && isset($_POST["stok"]) && isset($_POST["tgl_masuk"])) {
    $id = $_POST["id"];
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $tgl_masuk = $_POST["tgl_masuk"];

    // Validasi bisa ditambah sesuai kebutuhan, misal tipe data dan format tanggal

    $sql = "INSERT INTO produk (id, nama_produk, harga, stok, tgl_masuk) VALUES ('$id', '$nama_produk', '$harga', '$stok', '$tgl_masuk');";

    $result = mysqli_query($koneksi, $sql);
    $response["sql"] = $sql;
    $response["affected_rows"] = mysqli_affected_rows($koneksi);

    if ($result) {
        $response["error"] = 0; // sukses
    } else {
        $response["error"] = 2; // gagal query
        $response["message"] = mysqli_error($koneksi);
    }
} else {
    $response["message"] = "Data POST tidak lengkap";
}

header("Content-type: application/json; charset=utf-8");
echo json_encode($response);
?>
