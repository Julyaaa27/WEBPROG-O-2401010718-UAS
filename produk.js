function caridata(){
    let query = window.location.search;
    let params = new URLSearchParams(query);
    let idProduk = params.get("id");

    let urltarget = "server/produkbyid.php";
    let dataSend = `id=${idProduk}`;
    $.ajax({
        url: urltarget,
        type: 'GET',
        dataType: 'json',
        data: dataSend,
        success: function(response){
            
            $("#txID").val(response["isi"]["id"]);
            $("#txNamaProduk").val(response["isi"]["nama_produk"]);
            $("#txHarga").val(response["isi"]["harga"]);
            $("#txStok").val(response["isi"]["stok"]);
            $("#txTglMasuk").val(response["isi"]["tgl_masuk"]);
        },
        error: function(){
            $("#gagal").show();
        }
    });
}
