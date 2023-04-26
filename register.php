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

<body>
    <h2>Đăng ký tài khoản</h2>
    <form method="post">
        <div>
            <label>Tên đăng nhập</label>
            <input type="text" name="username" minlength="4" required maxlength="50">
        </div>
        <br><br>
        <div>
            <label>Mật khẩu</label>
            <input type="password" name="password" minlength="4" required>
        </div>
        <br><br>
        <div>
            <label>Nhập lại mật khẩu</label>
            <input type="password" name="cf_password">
        </div>
        <br><br>
        <div>
            <input type="submit" value="Đăng ký">
        </div>
    </form>
</body>

</html>