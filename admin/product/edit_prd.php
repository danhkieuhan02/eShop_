<?php
include("../../include/common.php");
check_login();
$id = $_GET["id"] ?? "-1";

if (is_method_get()) {
    $sql = "select * from product where id=?";
    $data = db_select($sql, [$id]);
    if (empty($data)) {
        redirect_to("admin/product");
    }
    $data = $data[0];
} else if (is_method_post()) {
    //Lấy ds các cột trong tbl student ra
    $name = $_POST["name"] ?? "";
    $price = $_POST["price"] ?? "";
    $content = $_POST["content"] ?? "";
    // Cập nhật data của bản product 
    // $name = $_POST["product"];
    $filename = upload_and_return_filename("img_path", "product");
    if (empty($filename)) {
        $sql = "update product set name=?, price=?, content=?, where id=?";
        $params = [$name, $price, $content, $id];
    } else {
        $sql = "update product set name=?, price=?, content=?, img_path=?, where id=?";
        $params = [$name, $price, $content, $filename, $id];
    }
    db_execute($sql, $params);
    js_alert("Update thành công!");
    js_redirect_to("/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
</head>

<body>
    <h2>Cập nhật chi tiết sản phẩm</h2>
    <form method="post" enctype="multipart/form-data">
        <?php if (!empty($data["img_path"])) { ?>
            <img src="<?php upload($data["img_path"]) ?>" alt="" width="100" /> <?php } ?>
        <br>
        <label class="box name">Tên món</label>
        <input class="box name" type="text" name="prd_name" require value="<?php echo $data["name"] ?>" />
        <br><br>
        <label class="box name">Giá</label>
        <input type="number" name="price" required value="<?php echo $data["price"] ?>" />
        <br><br>
        <label>Mô tả</label>
        <input type="text" name="content" required value="<?php echo $data["content"] ?>" />
        <br><br>
        <label class="box name">Chọn ảnh</label>
        <input class="box text img" type="file" name="img_path" accept=".pnj, .jpg, .jpeg" />
        <br><br>
        <input type="submit" value="Thêm">
    </form>
</body>

</html>