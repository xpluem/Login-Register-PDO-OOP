<?php
session_start();
session_destroy();
echo json_encode(array(
    'success' => true,
    'status' => 200,
    'message' => 'ออจากระบบสำเร็จ'
));
?>