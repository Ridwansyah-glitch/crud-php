<?php
require_once "../config/app.php";


parse_str(file_get_contents('php://input'),$put);

//Menerima inputan
$id     = $put['id'];
$nama   = $put['nama'];
$jumlah = $put['jumlah'];
$harga  = $put['harga'];

//validasi data
if ($nama == null) {
    echo json_encode(['pesan'=> 'Nama Barang Tidak Boleh Kosong']);
    exit;
}

$query ="UPDATE barang SET nama_barang='$nama',jumlah='$jumlah',harga='$harga',tanggal=CURRENT_TIMESTAMP() WHERE id='$id'";
mysqli_query($conn,$query);

if ($query) {
    echo json_encode(['pesan'=> 'Data Barang Berhasil Diupdate']);
}else {
    echo json_encode(['pesan'=> 'Data Barang Gagal Diupdate']);

}
