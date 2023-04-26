<h2>Đây là trang order</h2>
<?php
include("../../include/common.php");
if (!is_logged()) {
    redirect_to("index.php");
}
$sql = "select * from order";
$id = $_POST["id"] ?? -1;

if (isset($_POST["order"])) {
    $sql = "delete from `order` where id = ?";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang order</title>
</head>

<body>
    <form method="post">
        <div class="order">
            <thead>
                <th>id đơn hàng</th>
                <th>id </th>
            </thead>
        </div>
    </form>
</body>

</html>