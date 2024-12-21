<?php
require_once "../config/app.php";

//menerima request put/delete
parse_str(file_get_contents('php://input'),$delete);

//Menerima inputan
$id     = $delete['id'];

$query ="DELETE FROM barang WHERE id='$id'";
mysqli_query($conn,$query);

if ($query) {
    echo json_encode(['pesan'=> 'Data Barang Berhasil Dihapus']);
}else {
    echo json_encode(['pesan'=> 'Data Barang Gagal Dihapus']);

}
