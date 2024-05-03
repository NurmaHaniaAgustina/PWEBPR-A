<?php
    session_start();
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TUGAS-2-PWEBPR-A-1028/src/php/connect.php";
   include_once($path);

   if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `tb_user` WHERE `email` = '$email' AND `password` = '$password' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 1){
        $_SESSION['email'] = $email;

	header("Location: http://localhost/TUGAS-2-PWEBPR-A-1028/src/pages/layouts/dashboard.php");

    }else{
    echo "gagal login";
    }

   }
  $conn->close();




// $login_cek = mysqli_query($conn, $sql);
// if($login_cek)
// {
// 	header("Location: http://localhost//TUGAS-2-PWEBPR-A-1028/src/pages/layouts/dashboard.html");;
// }else{
//     echo "gagal login";
// }
?>