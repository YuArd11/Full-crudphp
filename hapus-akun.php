<?php 
session_start();

include 'config/app.php';

//mengambil id akun yang di pilih
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) >0 ){
    echo"<script>
        alert('Data akun Berhasil Dihapus');
        document.location.href = 'crud-modal.php';
    </script>;";
}else{
    echo"<script>
        alert('Data akun Gagal Dihapus');
        document.location.href = 'crud-modal.php';
    </script>;";
}

?>