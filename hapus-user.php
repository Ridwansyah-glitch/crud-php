<?php
session_start();
include "config/app.php";

$id = (int)$_GET['id'];


if (delete_user($id)> 0) {
    echo "<script>
    alert('Data user berhasil dihapus');
    document.location.href='akun.php';
    </script>";

}else {
    echo "<script> alert('Data user gagal dihapus');
     document.location.href='akun.php';
    </script>";

}
