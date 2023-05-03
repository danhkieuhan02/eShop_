<?php
include("include/common.php");

if (is_method_post()) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cf_password = $_POST["cf_password"];
    if ($password != $cf_password) {
        js_alert("Mật khẩu không trùng khớp!");
        js_redirect_to("register.php");
        die;
    }

    $sql = "insert into users values(default, ?, ?)";
    $sql_sel = "select * from users where username=?";
    $data = db_select($sql_sel, [$username]);

    if (!empty($data)) {
        js_alert("Lỗi! Tên tài khoản đã tồn tại!");
        js_redirect_to("register.php");
        die;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $params = [$username, $password_hash];
    db_execute($sql, $params);
    js_alert("Đăng ký thành công!");
    js_redirect_to("/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-image: url(asset/assets/bg.jpg);
        background-size: cover;
        background-position-y: -80px;
        font-size: 16px;
    }

    #wrapper {
        min-height: 100vh;
        display: block;
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

    .form-group {
        color: #fff;
        font-size: 14px;
        padding-top: 5px;
        padding-right: 10px;
    }

    .form-group {
        padding: 8px;
    }

    .form-input::placeholder {
        color: #f5f5f5;
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

    .lb-group {
        color: #fff;
    }
</style>

<body>
    <div class="wrapper">
        <form method="post" id="form-login">
            <h2 class="form-heading">Registration</h2>
            <div class="form-group">
                <label class="lb-group">Username</label>
                <input type="text" name="username" class="form-submit" minlength="4" required maxlength="50">
            </div>
            <br><br>
            <div class="form-group">
                <label class="lb-group">Password</label>
                <input type="password" name="password" class="form-submit" minlength="4" required>
            </div>
            <br><br>
            <div class="form-group">
                <label class="lb-group">Enter Password</label>
                <input type="password" name="cf_password" class="form-submit" minlength="4" required>
            </div>
            <br><br>
            <div>
                <input type="submit" value="Register" class="form-submit">
            </div>
        </form>
    </div>
</body>

</html>