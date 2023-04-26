<?php
include('../../include/common.php');
check_login();
$id = $_GET["id"] ?? -1;
$sql_select = ("select * from product where id =?");
$sql_delete = ("delete from product where id =?");
$data = db_select($sql_select, ["$id"]);

if (empty($data)) {
    js_alert("Không có dữ liệu để xóa!");
    js_redirect_to("/");
    die;
}

//thực hiện xóa file ảnh
$data = $data[0];
remove_file($data["img_path"]);

//thực hiện xóa dữ liệu trong database
db_execute($sql_delete, ["$id"]);
js_alert("Xóa sản phẩm thành công!");
js_redirect_to("/");
