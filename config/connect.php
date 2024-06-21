<?php 
session_start();
error_reporting(0);
function database() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'login_register';
    try {
        $stmt = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8;", $username, $password);
        $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $stmt;
    } catch (Exception $e) {
        echo 'ERROR : '.$e->getMessage();
    }
}
?>
