<?php
session_start();
include "config/app.php";

$id= (int)$_GET['id'];

if (delete_mahasiswa($id)> 0) {
    echo "<script>
    alert('Data Mahasiswa berhasil dihapus');
    document.location.href='mahasiswa.php';
    </script>";

}else {
    echo "<script> alert('Data Mahasiswa gagal dihapus');
     document.location.href='mahasiswa.php';
    </script>";

}
