<?php 
include '../config/class.php';
$username = $_POST['username'];
$password = $_POST['password'];
if (empty($username && $password)) {
    echo json_encode(array(
        'success' => false,
        'status'=> 400,
        'message' => 'กรุณากรอกข้อมูลให้ครบ'
    ));
} else {
    $website = new Website();
    $website->login($username, $password);
}
?>
