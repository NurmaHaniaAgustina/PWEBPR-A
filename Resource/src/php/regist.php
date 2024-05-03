<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TUGAS-2-PWEBPR-A-1028/src/php/connect.php";
   include_once($path);

  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $con_password = $_POST['con_password'];

$sql = "INSERT INTO `tb_user` (`id`, `nama`, `email`, `username`, `password`, `con_password`) VALUES ('', '$nama', '$email', '$username', '$password', '$con_password')";


$simpan = mysqli_query($conn, $sql);
if($simpan)
{
	echo "berhasil daftar";
  header("Location: http://localhost/TUGAS-2-PWEBPR-A-1028/");
}else{
    echo "gagal daftar";
}
?>