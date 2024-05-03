<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/TUGAS-2-PWEBPR-A-1028/src/php/connect.php";
include_once($path);

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    // $sql = "DELETE FROM calon_siswa WHERE id=$id";
    $sql = "DELETE FROM `tb_dashboard` WHERE `id`='$id'";

    $query = mysqli_query($conn, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header("Location: http://localhost/TUGAS-2-PWEBPR-A-1028/src/pages/layouts/dashboard.php");
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>