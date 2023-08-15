<?Php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>
        alert('Harus Login Dahulu!!!');
        document.location.href = 'login.php';
      </script>";
    exit;
}
// membatasi halaman login sesuai login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
    echo "<script>
        alert('TIdak memiliki akses!!!');
        document.location.href = 'index.php';
      </script>";
    exit;
}

$title = "Daftar Mahasiswa";


include 'layout/header.php';


//fungsi menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Mahasiswa</h1>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Table Data Mahasiswa</h3>
                                <br><hr>
                                <a href="tambah-mahasiswa.php" class="btn btn-primary mb-2"> <i
                                        class="fas fa-plus-circle"></i> Tambah</a>

                                <a href="download-excel-mahasiswa.php" class="btn btn-success mb-2"> <i
                                        class="fas fa-file-excel"></i> Download Excel</a>

                                <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-2"> <i
                                        class="fas fa-file-pdf"></i> Download PDF</a>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Telpon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php foreach ($data_mahasiswa as $mahasiswa): ?>
                                            <tr>
                                                <td>
                                                    <?= $no++; ?>
                                                </td>
                                                <td>
                                                    <?= $mahasiswa['nama'] ?>
                                                </td>
                                                <td>
                                                    <?= $mahasiswa['prodi'] ?>
                                                </td>
                                                <td>
                                                    <?= $mahasiswa['jk'] ?>
                                                </td>
                                                <td>
                                                    <?= $mahasiswa['telepon'] ?>
                                                </td>
                                                <td class="text-center" width="25%">
                                                    <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'] ?>"
                                                        class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>
                                                        Detail</a>

                                                    <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'] ?>"
                                                        class="btn btn-success btn-sm"><i class="far fa-edit"></i>
                                                        Ubah</a>

                                                    <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'] ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data mahasiswa?')">
                                                        <i class="far fa-trash-alt"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


<?php include 'layout/footer.php' ?>