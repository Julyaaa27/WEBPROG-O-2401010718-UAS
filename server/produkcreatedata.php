<?php
include_once("konfigurasi.php");

$response = ["error" => 1];  

if (isset($_POST["id"]) && isset($_POST["nama_produk"]) && isset($_POST["harga"]) && isset($_POST["stok"]) && isset($_POST["tgl_masuk"])) {
    $id = $_POST["id"];
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $tgl_masuk = $_POST["tgl_masuk"];

    

    $sql = "INSERT INTO produk (id, nama_produk, harga, stok, tgl_masuk) VALUES ('$id', '$nama_produk', '$harga', '$stok', '$tgl_masuk');";

    $result = mysqli_query($koneksi, $sql);
    $response["sql"] = $sql;
    $response["affected_rows"] = mysqli_affected_rows($koneksi);

    if ($result) {
        $response["error"] = 0; 
    }
}
header("Content-type: application/json; charset=utf-8");
echo json_encode($response);
?>
 