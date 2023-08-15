<?php

//render halaman menjadi json
header('Content-Type: application/json');

include '../config/app.php';


$query = select("SELECT * FROM barang ORDER BY Id_barang DESC");

echo json_encode(['data_barang' => $query]);

?>