<?php
require_once 'config/connect-db.php';

class Contact{
    static function select(){
        global $conn;
        $sql = "SELECT * FROM akun";
        $result = $conn->query($sql);
        $arr = array();
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }
    static function insert($no_id, $owner, $no_hp, $email){
        global $conn;
        $sql = "INSERT INTO akun (no_id, owner, no_hp, email) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $no_id, $owner, $no_hp, $email);
        $stmt->execute();
    }
    static function update(){

    }
    
    static function delete($no_id){
        global $conn;
        $stmt = $conn->prepare("DELETE FROM akun WHERE no_id = ?");
        $stmt->bind_param("i", $no_id);
        $stmt->execute();
        return $stmt->affected_rows;
        }
    }
?>