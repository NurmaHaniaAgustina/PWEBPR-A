<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TUGAS-2-PWEBPR-A-1028/src/php/connect.php";
   include_once($path);

  $owner = $_POST['owner'];
  $phone = $_POST['phone'];

$sql = "INSERT INTO `tb_dashboard` (`id`, `owner`, `phone`) VALUES ('', '$owner', '$phone')";


$simpan = mysqli_query($conn, $sql);
if($simpan)
{
	echo "berhasil simpan";
	header("Location: http://localhost/TUGAS-2-PWEBPR-A-1028/src/pages/layouts/dashboard.php");

}else{
    echo "gagal simpan";
}
?>