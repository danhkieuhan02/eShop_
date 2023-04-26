<?php

/*
 * Thay "php_common_function" bằng tên thư mục của bạn ở htdocs
 */

// Thư mục gốc ở htdocs (đối với XAMPP)
define('ROOT_PATH', "eShop_");

// Thư mục chứa file asset (css/js/img)
define('ASSET_PATH', "/eShop_/asset"); //accet path 

// Thư mục chứa file upload bởi user
define('UPLOAD_PATH', "/eShop_/upload");

// Đường dẫn đầy đủ đến thư mục hiện tại, không cần chỉnh sửa nếu dùng XAMPP
define('DOCUMENT_ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);

// Thông tin đăng nhập database
$database = [
    "host" => "localhost",
    "db" => "project_eshop",
    "username" => "root",
    "password" => "",
];
