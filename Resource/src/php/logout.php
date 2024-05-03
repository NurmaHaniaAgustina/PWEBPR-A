<?php
session_start();
if(isset($_SESSION['email'])){
        session_destroy();
        header("location: http://localhost/TUGAS-2-PWEBPR-A-1028/");
        exit;
    }else{
        header("location: http://localhost/TUGAS-2-PWEBPR-A-1028/");
    }

?>