<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TUGAS-2-PWEBPR-A-1028/src/php/connect.php";
   include_once($path);

   $id = $_POST['id'];
   $owner = $_POST['owner'];
   $phone = $_POST['phone'];

$sql = "UPDATE `tb_dashboard` SET `owner`='$owner', `phone`='$phone' WHERE `id`='$id'";

$update = mysqli_query($conn, $sql);
if($update)
{
	echo "berhasil update";
	header("Location: http://localhost/TUGAS-2-PWEBPR-A-1028/src/pages/layouts/dashboard.php");

}else{
    echo "gagal update";
}
?>