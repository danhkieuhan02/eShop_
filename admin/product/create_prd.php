<?php
include("../../include/common.php");
check_login();
// //Xử lý thêm 
// $data = db_select("select * from product");

if (is_method_post()) {
    $id = $_POST["id"] ?? "";
    $name = $_POST["prd_name"] ?? "";
    $price = $_POST["price"] ?? "";
    $content = $_POST["content"] ?? "";
    $filename = upload_and_return_filename("img_path", "product");

    $sql = "insert into product(id, name, price, content, img_path) values(default, ?, ?, ?, ?)";
    $params = [$name, $price, $content, $filename];
    db_execute($sql, $params);

    js_alert("Thêm mới thành công!!");
    js_redirect_to("/");
}

$title = "Thêm thông tin món ăn";
include("../_header.php");

?>
<h2>Thêm sản phẩm mới</h2>
<form method="post" enctype="multipart/form-data">
    <label>Tên sản phẩm</label>
    <input type="text" name="prd_name">
    <br><br>
    <label>Giá</label>
    <input type="text" name="price">
    <br><br>
    <label>Mô tả</label>
    <input type="text" name="content">
    <br><br>
    <label>Chọn ảnh</label>
    <input type="file" name="img_path" accept=".pnj, .png, .jpg, .gif">
    <br><br>
    <input type="submit" value="Thêm">
</form>

<?php
include("../_footer.php");
