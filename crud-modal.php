<?php
session_start();

if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('Harus Login Dahulu!!!');
        document.location.href = 'login.php';
      </script>";
  exit;
}

$title = "Daftar Data Akun";

include 'layout/header.php';

//tampil data seluruh akun
$data_akun = select("SELECT * FROM akun ");

//tampil data berdasarkan akun
$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");

//jika tombol di tekan akan menjalankan scrip berikut:
if (isset($_POST['tambah'])) {
  if (create_akun($_POST) > 0) {
    echo "<script>
        alert('Data Akun Berhasil Ditambahkan');
        document.location.href = 'crud-modal.php';
        </script>";
  } else {
    echo "<script>
        alert('Data Akun gagal Ditambahkan');
        document.location.href = 'crud-modal.php';
        </script>";
  }
}

//jika tombol di tekan akan menjalankan scrip berikut:
if (isset($_POST['ubah'])) {
  if (update_akun($_POST) > 0) {
    echo "<script>
    alert('Data Akun Berhasil Diubah');
    document.location.href = 'crud-modal.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Akun gagal Diubah');
    document.location.href = 'crud-modal.php';
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
          <h1 class="m-0">Data Akun Pengguna</h1>
        </div><!-- /.col -->
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
                <h3 class="card-title mb-2">Table Akun</h3>
                <br>
                <hr>
                <?php if ($_SESSION['level'] == 1): ?>
                  <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="fas fa-plus-circle"></i> Tambah</button>
                <?php endif; ?>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>username</th>
                      <th>email</th>
                      <th>password</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php if ($_SESSION['level'] == 1): ?>
                      <?php foreach ($data_akun as $akun): ?>
                        <tr>
                          <td>
                            <?= $no++; ?>
                          </td>
                          <td>
                            <?= $akun['nama']; ?>
                          </td>
                          <td>
                            <?= $akun['username']; ?>
                          </td>
                          <td>
                            <?= $akun['email']; ?>
                          </td>
                          <td>Password Ter-Enkripsi</td>
                          <td class="text-center">
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                              data-bs-target="#modalubah<?= $akun['id_akun'] ?>"><i class="far fa-edit"></i> ubah</button>
                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                              data-bs-target="#modalh<?= $akun['id_akun']; ?>"><i class="far fa-trash-alt"></i>
                              Hapus</button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <?php foreach ($data_bylogin as $akun): ?>
                        <tr>
                          <td>
                            <?= $no++; ?>
                          </td>
                          <td>
                            <?= $akun['nama']; ?>
                          </td>
                          <td>
                            <?= $akun['username']; ?>
                          </td>
                          <td>
                            <?= $akun['email']; ?>
                          </td>
                          <td>Password Ter-Enkripsi</td>
                          <td class="text-center">
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                              data-bs-target="#modalubah<?= $akun['id_akun'] ?>"><i class="far fa-edit"></i> ubah</button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif ?>
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
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="6">
          </div>

          <div class="mb-3">
            <label for="level">Level</label>
            <select name="level" id="level" class="form-control" required>
              <option value="">--- Pilih Level ---</option>
              <option value="1">Admin</option>
              <option value="2">Operator Barang</option>
              <option value="3">Operator Mahasiswa</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" name="tambah" class="btn btn-primary">Tambah Akun</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal ubah -->
<?php foreach ($data_akun as $akun): ?>
  <div class="modal fade" id="modalubah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

            <div class="mb-3">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" required value="<?= $akun['nama']; ?>">
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" required
                value="<?= $akun['username']; ?>">
            </div>

            <div class="mb-3">
              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" required value="<?= $akun['email']; ?>">
            </div>

            <div class="mb-3">
              <label for="password">Password <small>(Masukan Password Baru/Lama)</small></label>
              <input type="password" name="password" id="password" class="form-control" required minlength="6">
            </div>
            <?php if ($_SESSION['level'] == 1): ?>
              <div class="mb-3">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control" required>
                  <?php $level = $akun['level']; ?>
                  <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                  <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator Barang</option>
                  <option value="3" <?= $level == '3' ? 'selected' : null ?>>Operator Mahasiswa</option>
                </select>
              </div>
            <?php else: ?>
              <input type="text" name="level" value="<?= $akun['level']; ?>">
            <?php endif; ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" name="ubah" class="btn btn-success">ubah Akun</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- Modal Hapus -->
<?php foreach ($data_akun as $akun): ?>
  <div class="modal fade" id="modalhapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Yakin ingin menghapus data akun :
            <?= $akun['nama']; ?> .?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger">Hapus Akun</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<?php include 'layout/footer.php' ?>