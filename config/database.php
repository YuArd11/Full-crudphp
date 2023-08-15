<?php

// konfigurasi koneksi
// $host       =  "localhost";
// $dbuser     =  "postgres";
// $dbpass     =  "yudha68";
// $port       =  "5432";
//  $dbname    =  "crud_php";

// script koneksi php postgree
// $link = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass); 
 
// if($link)
// {
//     echo "Koneksi Berhasil";
// }else
// {
//     echo "Gagal melakukan Koneksi";
// }

$db = mysqli_connect('localhost', 'root', '','crud-php');

// //cek koneksi
// if (!$db) {
//     echo 'gagal';
// }else{
//     echo 'berhasil';
// }
?>




