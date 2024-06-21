<?php 
include '../config/class.php';
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
if (empty($username && $password && $confirmPassword)) {
    echo json_encode(array(
        'success' => false,
        'status'=> 400,
        'message' => 'กรุณากรอกข้อมูลให้ครบ'
    ));
} else if ($password !== $confirmPassword) {
    echo json_encode(array(
        'success' => false,
        'status'=> 400,
        'message' => 'กรุณากรอกรหัสผ่านให้ตรงกัน'
    ));
} else {
    $website = new Website();
    $website->register($username, $password);
}
?>