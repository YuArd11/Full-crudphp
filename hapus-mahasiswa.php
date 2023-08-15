<?php 
session_start();

include 'config/app.php';

//mengambil id mahasiswa yang di pilih
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if (delete_mahasiswa($id_mahasiswa) >0 ){
    echo"<script>
        alert('Data Mahasiswa Berhasil Dihapus');
        document.location.href = 'mahasiswa.php';
    </script>;";
}else{
    echo"<script>
        alert('Data Mahasiswa Gagal Dihapus');
        document.location.href = 'mahasiswa.php';
    </script>;";
}

?>