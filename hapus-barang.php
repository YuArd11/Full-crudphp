<?php 
session_start();

include 'config/app.php';

//mengambil id brang yang di pilih
$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang) >0 ){
    echo"<script>
        alert('Data Barang Berhasil Dihapus');
        document.location.href = 'index.php';
    </script>;";
}else{
    echo"<script>
        alert('Data Barang Gagal Dihapus');
        document.location.href = 'index.php';
    </script>;";
}

?>