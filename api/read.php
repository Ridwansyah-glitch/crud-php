<?php
require_once "../config/app.php";
$query = query("SELECT * FROM barang ORDER BY id DESC");

echo json_encode(['data_barang'=>$query]);
