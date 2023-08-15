<?php 
session_start();

$title="Tambah Data Mahasiswa";

include 'layout/header.php'; 

//check fungsi tambah data
if (isset($_POST['tambah'])) {
    if (create_mahasiswa($_POST) >0 ) {
        echo "<script>
                alert('Data mahasiswa Berhasil Ditambahkan');
                document.location.href = 'mahasiswa.php';
                </script>";
    }else {
        echo "<script>
                alert('Data mahasiswa gagal Ditambahkan');
                document.location.href = 'mahasiswa.php';
                </script>";
    }
}

?>

<div class="container mt-3">
    <h1>Tambah Data Mahasiswa</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Mahasiswa"
            required>
        </div>

        <div class="row">
        <div class="mb-3 col-6">
            <label for="prodi" class="form-label">Program Studi</label>
            <select name="prodi" id="prodi" class="form-control" required>
                <option value="">--Pilih Prodi--</option>
                <option value="Teknik Infromatika">Teknik Infromatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Komunikasi Visual">Komunikasi Visual</option>
            </select>
        </div>

        <div class="mb-3 col-6">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">No Telpon Mahasiswa</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukan No Telpon Mahasiswa"
            required>
        </div>
       
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Mahasiswa</label>
            <textarea name="alamat" id="alamat" ></textarea>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email Mahasiswa</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email Mahasiswa"
            required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Mahasiswa</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan foto Mahasiswa"
            onchange="previewImg()">

            <img src="" alt="" class="img-thumbnail img-preview mt-2" width="150px">
        </div>
        
        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
        </form>

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

<?php include 'layout/footer.php'; ?>