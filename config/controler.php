<?php 

// menampilkan data
function select($query)
{
  //panggil konkeis db
  global $db; 

  $result = mysqli_query($db, $query);
  $rows =[];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

//fungsi tambah barang
function create_barang($POST)
{
  global $db;

  $nama     = strip_tags($POST ['nama']) ;
  $jumlah   = strip_tags($POST ['jumlah']);
  $harga    = strip_tags($POST ['harga']);
  $barcode  = rand(100000,999999);

  //query tambah barang
  $query = "INSERT INTO barang values (null, '$nama', '$jumlah', '$harga','$barcode', CURRENT_TIMESTAMP())";
  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

//fungsi update data barang
function update_barang($POST)
{
  global $db;
  
  $id_barang  = $POST ['id_barang'];
  $nama       = $POST ['nama'];
  $jumlah     = $POST ['jumlah'];
  $harga      = $POST ['harga'];

  
  //query ubah barang
  $query = "UPDATE barang SET nama='$nama', jumlah='$jumlah', harga='$harga' WHERE id_barang=$id_barang";

  mysqli_query($db,$query);
  return mysqli_affected_rows($db);
}

//fungsi hapus barang
function delete_barang($id_barang)
{
  global $db;

  //query hapus data barang
  $query = "DELETE FROM barang WHERE id_barang=$id_barang";

  mysqli_query($db,$query);
  return mysqli_affected_rows($db);
}

//fungsi menginput data mahasiswa
function create_mahasiswa($POST)
{
  global $db;

  $nama     = strip_tags($POST ['nama']) ;
  $prodi    = strip_tags($POST ['prodi']);
  $jk       = strip_tags($POST ['jk']);
  $telepon  = strip_tags($POST ['telepon']);
  $alamat   = $POST ['alamat'];
  $email    = strip_tags($POST ['email']);  
  $foto     = upload_file();


  //check upload foto
  if(!$foto){
    return false;
  }

  //query tambah mahasiswa 
  $query = "INSERT INTO mahasiswa values (null, '$nama', '$prodi', '$jk', '$telepon','$alamat','$email', '$foto')";
 
  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


//fungsi mengubah data mahasiswa
function update_mahasiswa($POST)
{
  global $db;

  $id_mahasiswa = strip_tags($POST['id_mahasiswa']);
  $nama         = strip_tags($POST['nama']);
  $prodi        = strip_tags($POST['prodi']);
  $jk           = strip_tags($POST['jk']);
  $telepon      = strip_tags($POST['telepon']);
  $alamat       = $POST ['alamat'];
  $email        = strip_tags($POST['email']);
  $fotolama     = strip_tags($POST['fotolama']);

  //check upload foto baru atau tidak
  if($_FILES['foto']['error']==4){
    $foto = $fotolama;
  } else{
    $foto = upload_file();
  }

  //query ubah data
  $query = "UPDATE mahasiswa SET nama = '$nama', prodi='$prodi', jk='$jk', telepon='$telepon',alamat='$alamat', email='$email', foto='$foto' WHERE id_mahasiswa = $id_mahasiswa";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

//fungsi upload gambar
function upload_file()
{
  $namafile    = $_FILES['foto']['name'];
  $ukuranfile  = $_FILES['foto']['size'];
  $eror        = $_FILES['foto']['eror'];
  $tmpname     = $_FILES['foto']['tmp_name'];

  //check file yang di upload
  $extensifileValid =['jpg','jpeg','png'];
  $extensifile      =explode('.',$namafile);
  $extensifile      =strtolower(end($extensifile));

  if (!in_array($extensifile, $extensifileValid)) {
    //pesan gagal
    echo"<script>
      alert('Format File Tidak Valid');
      document.location.href = 'tambah-mahasiswa.php';
    </script>";
    die();
  }

  if ($ukuranfile>2048000) {
    //pesan gagal
    echo"<script>
      alert('File Tidak Boleh Lebih Dari 2 MB');
      document.location.href = 'tambah-mahasiswa.php';
    </script>";
    die();
  }

  //generate nama file baru
  $namaFileBaru  = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extensifile;

  //pindah ke folder local
  move_uploaded_file($tmpname, 'assets/img/'.$namaFileBaru);
  return $namaFileBaru;
}

//fungsi menghapus barang
function delete_mahasiswa($id_mahasiswa){
  global $db;

  //ambil foto sesuai data yang di pilih
  $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
  unlink("assets/img/". $foto['foto']);

  //query menghapus data mahasiswa
  $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


//fungsi menambah akun
function create_akun($POST){
  
  global $db;

  $nama       =strip_tags($POST['nama']);
  $username   =strip_tags($POST['username']);
  $email      =strip_tags($POST['email']);
  $password   =strip_tags($POST['password']);
  $level      =strip_tags($POST['level']);

  //enskiprsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //query tambah data mahasiswa
  $query = "INSERT INTO akun VALUES (null, '$nama', '$username', '$email', '$password', '$level')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

//fungsi menambah akun
function update_akun($POST){
  
  global $db;

  $id_akun    =strip_tags($POST['id_akun']);
  $nama       =strip_tags($POST['nama']);
  $username   =strip_tags($POST['username']);
  $email      =strip_tags($POST['email']);
  $password   =strip_tags($POST['password']);
  $level      =strip_tags($POST['level']);

  //enskiprsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //query ubah data mahasiswa
  $query = "UPDATE akun SET nama='$nama',username='$username',email='$email',password='$password',level='$level' WHERE id_akun=$id_akun";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


function delete_akun($id_akun){
  global $db;

  //query menghapus data akun
  $query = "DELETE FROM akun WHERE id_akun = $id_akun";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

?>