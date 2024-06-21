<?php 
include './config/class.php';
if (!$_SESSION['userId']) {
    header('Location: /login.php');
}
$website = new Website();
$dataUser = $website->dataUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                        <h5 class="text-center">ข้อมูลผู้ใช้</h5>
                        <div class="mt-2">
                            <h6>ชื่อผู้ใช้ : <?php echo $dataUser['username']; ?></h6>
                            <h6>เข้าสู่ระบบล่าสุด : <?php echo $dataUser['date_login']; ?></h6>
                            <h6>สมัครสมาชิกเมื่อ : <?php echo $dataUser['date_register']; ?></h6>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-danger w-100" id="logout">ออกจากระบบ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#logout').on('click', function() {
            $.ajax({
                type: 'GET',
                url: '/api/logout.php',
                dataType: 'json',
                data: {},
                success: function(data) {
                    alert(data.message);
                    window.location.reload();
                }
            })
        })
    </script>
</body>
</html>