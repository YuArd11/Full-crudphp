<?php 
session_start();

$title="Ubah Data Barang";
include 'layout/header.php'; 


//mengambil data barang sesaui dengan id url
$id_barang = (int)$_GET['id_barang'];
$barang = select("select * from barang where id_barang = $id_barang")[0];

//check fungsi tambah data
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) >0 ) {
        echo "<script>
                alert('Data Barang Berhasil Diubah');
                document.location.href = 'index.php';
                </script>";
    }else {
        echo "<script>
                alert('Data Barang Gagal Diubah');
                document.location.href = 'index.php';
                </script>";
    }
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data barang</a></li>
                        <li class="breadcrumb-item active">Ubah Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <form action="" method="post">

<input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">

<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama'] ?>" 
    placeholder="Masukan Nama Barang" required>
</div>

<div class="mb-3">
    <label for="jumlah" class="form-label">Jumlah</label>
    <input type="number" class="form-control" id="jumlah" name="jumlah" value=<?= $barang['jumlah'] ?> 
    placeholder="Masukan Jumlah Barang" required>
</div>

<div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="number" class="form-control" id="harga" name="harga" value=<?= $barang['harga'] ?> 
    placeholder="Masukan Harga barang" required>
</div>

<button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
</form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php include 'layout/footer.php' ?>