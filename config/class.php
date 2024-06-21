<?php 
include 'connect.php';
class Website {
    function __construct() {
        $this->db = database();
    }
    public function login($username, $password) {
        try {
            $checkUsername = $this->db->prepare('SELECT * FROM users WHERE username = :username');
            $checkUsername->execute([
                ':username'=> $username
            ]);
            $resultCheckUsername = $checkUsername->fetch();
            if ($checkUsername->rowCount() > 0) {
                if (password_verify($password, $resultCheckUsername['password'])) {
                    $updateData = $this->db->prepare('UPDATE users SET date_login = CURRENT_TIMESTAMP WHERE username = :username');
                    $updateData->execute([
                        ':username'=> $username
                    ]);
                    $_SESSION['userId'] = $resultCheckUsername['id'];
                    $_SESSION['username'] = $resultCheckUsername['username'];
                    echo json_encode(array(
                        'success' => true,
                        'status' => 200,
                        'message' => 'เข้าสู่ระบบสำเร็จ'
                    ));
                } else {
                    echo json_encode(array(
                        'success' => false,
                        'status' => 400,
                        'message' => 'ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง'
                    ));
                }
            } else {
                echo json_encode(array(
                    'success' => false,
                    'status' => 400,
                    'message' => 'ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง'
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'success' => false,
                'status' => 500,
                'message' => 'เกิดข้อผิดพลาดเซิฟเวอร์'
            ));
        }
    }
    public function register($username, $password) {
        try {
            $checkUsername = $this->db->prepare('SELECT * FROM users WHERE username = :username');
            $checkUsername->execute([
                ':username' => $username,
            ]);
            if ($checkUsername->rowCount() > 0) {
                echo json_encode(array(
                    'success' => false,
                    'status' => 400,
                    'message' => 'ชื่อผู้ใช้ถูกใช้งานแล้ว'
                ));
            } else {
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                $insertData = $this->db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
                $insertData->execute([
                    ':username' => $username,
                    'password' => $hashPassword
                ]);
                $dataUser = $this->db->prepare('SELECT * FROM users WHERE username = :username');
                $dataUser->execute([
                    ':username'=> $username
                ]);
                $resultDataUser = $dataUser->fetch();
                $_SESSION['userId'] = $resultDataUser['id'];
                $_SESSION['username'] = $resultDataUser['username'];
                echo json_encode(array(
                    'success' => true,
                    'status' => 200,
                    'message' => 'สมัครสมาชิกสำเร็จ'
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'success' => false,
                'status' => 500,
                'message' => 'เกิดข้อผิดพลาดเซิฟเวอร์'
            ));
        }
    }
    public function dataUser() {
        try {
            $dataUser = $this->db->prepare('SELECT * FROM users WHERE id = :id');
            $dataUser->execute([
                ':id'=> $_SESSION['userId']
            ]);
            return $dataUser->fetch();
        } catch (Exception $e) {
            echo json_encode(array(
                'success' => false,
                'status' => 500,
                'message' => 'เกิดข้อผิดพลาดเซิฟเวอร์'
            ));
        }
    }
}
?>