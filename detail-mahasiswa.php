<?Php 
session_start();
$title="Detail Mahasiswa";

include 'layout/header.php';


//mengambil id mahasiswa
$id_mahasiswa =(int)$_GET['id_mahasiswa'];

//fungsi menampilkan data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

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
                        <li class="breadcrumb-item"><a href="mahasiswa">Data barang</a></li>
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

        <table class="table table-bordered table-primary  table-striped mb-2" i>
    <tr>
        <td>Nama</td>
        <td>: <?= $mahasiswa['nama']; ?></td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>: <?= $mahasiswa['prodi']; ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>: <?= $mahasiswa['jk']; ?></td>
    </tr>
    <tr>
        <td>Telpon Mahasiswa</td>
        <td>: <?= $mahasiswa['telepon']; ?></td>
    </tr>
    <tr>
        <td>Alamat Mahasiswa</td>
        <td>: <?= $mahasiswa['alamat']; ?></td>
    </tr>
    <tr>
        <td>Email Mahasiswa</td>
        <td>: <?= $mahasiswa['email']; ?></td>
    </tr>
    <tr>
        <td width="50%">Photo Mahasiswa</td>
        <td>
        <a href="assets/img/<?= $mahasiswa['foto']; ?>">
        <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="50%">
        </a>
        </td>
    </tr>
  </table>

  <a href="mahasiswa.php" class="btn btn-secondary btn-sm" style="float:right;">Kembali</a>
  <br><br>
  </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php include 'layout/footer.php' ?>