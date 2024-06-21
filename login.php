<?php 
include './config/class.php';
if ($_SESSION['userId']) {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="submitLogin">
                            <h5 class="text-center">เข้าสู่ระบบ</h5>
                            <div class="mt-2">
                                <div class="mb-2">ชื่อผู้ใช้</div>
                                <input type="text" class="form-control" id="username" placeholder="กรุณากรอก ชื่อผู้ใช้" required>
                            </div>
                            <div class="mt-2">
                                <div class="mb-2">รหัสผ่าน</div>
                                <input type="password" class="form-control" id="password" placeholder="กรุณากรอก รหัสผ่าน" required>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
                            </div>
                            <div class="mt-2">
                                <span>ยังไม่มีบัญชี ? <a href="/register.php">สมัครสมาชิก</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#submitLogin').on('submit', function(e) {
            e.preventDefault();
            const username = $('#username').val();
            const password = $('#password').val();
            $.ajax({
                type: 'POST',
                url: '/api/login.php',
                dataType: 'json',
                data: {
                    username, password
                },
                success:function(data) {
                    if (data.success) {
                        alert(data.message);
                        window.location.href = '/';
                    } else {
                        alert(data.message);
                    }
                }
            })
        })
    </script>
</body>
</html>