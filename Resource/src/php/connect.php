<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="db_users";
	
	$conn = new mysqli($hostname,$username, $password, $dbname);
    if($conn->connect_error){
        die("koneksi db gagal: ". $conn->connect_error);
    }
?>