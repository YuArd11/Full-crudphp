<?php
session_start();

$title = "Ubah Data Mahasiswa";

include 'layout/header.php';

//check fungsi ubah data
if (isset($_POST['ubah'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data mahasiswa Berhasil Diupdate');
                document.location.href = 'mahasiswa.php';
                </script>";
    } else {
        echo "<script>
                alert('Data mahasiswa gagal Diupdate ');
                document.location.href = 'mahasiswa.php';
                </script>";
    }
}

//ambil id mahasiswa dari url
$id_mahasiswa = (int) $_GET['id_mahasiswa'];


//query ambil data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="mahasiswa">Ubah Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Ubah Mahasiswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
                <input type="hidden" name="fotolama" value="<?= $mahasiswa['foto']; ?>">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Mahasiswa"
                        required value="<?= $mahasiswa['nama']; ?>">
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="prodi" class="form-label">Program Studi</label>
                        <select name="prodi" id="prodi" class="form-control" required>
                            <?php $prodi = $mahasiswa['prodi']; ?>
                            <option value="Teknik Infromatika" <?php $prodi == 'Teknik Infromatika' ? 'selected' : null ?>>
                                Teknik Infromatika</option>
                            <option value="Teknik Mesin" <?= $prodi == 'Teknik Mesin' ? 'selected' : null ?>>Teknik Mesin
                            </option>
                            <option value="Komunikasi Visual" <?= $prodi == 'Komunikasi Visual' ? 'selected' : null ?>>
                                Komunikasi Visual</option>
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <?php $jk = $mahasiswa['jk']; ?>
                            <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
                            <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                        </select>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">No Telpon Mahasiswa</label>
                    <input type="number" class="form-control" id="telepon" name="telepon"
                        placeholder="Masukan No Telpon Mahasiswa" required value="<?= $mahasiswa['telepon']; ?>">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Mahasiswa</label>
                    <textarea name="alamat" id="alamat"><?= $mahasiswa['alamat']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Mahasiswa</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukan email Mahasiswa" required value="<?= $mahasiswa['email']; ?>">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Mahasiswa</label>
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan foto Mahasiswa"
                        onchange="previewImg()">

                    <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto" class="img-thumbnail img-preview mt-2"
                        width="150px">
                </div>

                <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
                <br><br>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- fungsi preview image -->
<script>
    function previewImg(){
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e){
            imgPreview.src = e.target.result;
        }
        
        }
</script>


<?php include 'layout/footer.php' ?>