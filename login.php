<?php
include("include/common.php");
if (is_logged()) {
    js_redirect_to("/");
}
//1. Get thông tin từ form
if (is_method_post()) {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    //2. Select từ database dựa vào username
    $sql = "select * from users where username=?";
    $user = db_select($sql, [$username]);

    //3. Nếu kết quả select là rỗng thì thông báo nhập sai username
    if (empty($user)) {
        js_alert("Nhập sai username rồi đại vương ơi!");
        js_redirect_to("login.php");
        die;
    }
    $user = $user[0];

    //4. Nếu kết quả select không rỗng thì so sánh password trong db với password ở bước 1.
    //đến đây viết bằng funtion => password_verify()
    if (password_verify($password, $user["password"]) == true) {
        js_alert("Đăng nhập thành công");
        $_SESSION["username"] = $username;
        js_redirect_to("/");
    } else {
        js_alert("Lỗi, tên hoặc mật khẩu không hợp lệ!");
        js_redirect_to("login.php");
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Login</title>
</head>
<style>
    body {
        /* background: url('../img/bg.jpg'); */
        /* background-size: cover;
        background-position-y: -80px; */
        font-size: 16px;
    }

    #wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #form-login {
        max-width: 400px;
        background: rgba(0, 0, 0, 0.8);
        flex-grow: 1;
        padding: 30px 30px 40px;
        box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
    }

    .form-heading {
        font-size: 25px;
        color: #f5f5f5;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group {
        border-bottom: 1px solid #fff;
        margin-top: 15px;
        margin-bottom: 20px;
        display: flex;
    }

    .form-group i {
        color: #fff;
        font-size: 14px;
        padding-top: 5px;
        padding-right: 10px;
    }

    .form-input {
        background: transparent;
        border: 0;
        outline: 0;
        color: #f5f5f5;
        flex-grow: 1;
    }

    .form-input::placeholder {
        color: #f5f5f5;
    }

    #eye i {
        padding-right: 0;
        cursor: pointer;
    }

    .form-submit {
        background: transparent;
        border: 1px solid #f5f5f5;
        color: #fff;
        width: 100%;
        text-transform: uppercase;
        padding: 6px 10px;
        transition: 0.25s ease-in-out;
        /* margin-top: 30px; */
    }

    .form-submit:hover {
        border: 1px solid #54a0ff;
    }
</style>

<body>
    <div id="wrapper">
        <form action="" id="form-login" method="post" enctype="multipart/form">
            <h1 class="form-heading">Login</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <!-- <label>Username</label> -->
                <input type="text" class="form-submit" name="username" min="4" required maxlength="50">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <!-- <label>Password</label> -->
                <input type="password" class="form-submit" name="password" min="4" required>
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Login" class="form-submit">
        </form>
    </div>

</body>
<script src="<?php echo asset("js/app.js") ?>"></script>

</html>