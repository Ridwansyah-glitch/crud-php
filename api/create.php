<?php
require_once "../config/app.php";

//Menerima inputan

$nama   = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga  = $_POST['harga'];

//validasi data
if ($nama == null) {
    echo json_encode(['pesan'=> 'Nama Barang Tidak Boleh Kosong']);
    exit;
}

$query ="INSERT INTO barang VALUES (null,'$nama','$jumlah','$harga',CURRENT_TIMESTAMP())";
mysqli_query($conn,$query);

if ($query) {
    echo json_encode(['pesan'=> 'Data Barang Berhasil Ditambahkan']);
}else {
    echo json_encode(['pesan'=> 'Data Barang Gagal Ditambahkan']);

}
