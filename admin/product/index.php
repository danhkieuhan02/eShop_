<?php
include('../../include/common.php');

//upload data từ database
$data = db_select("select * from product");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web bán thức ăn</title>
  <link rel="stylesheet" href="<?php asset("style.css"); ?>" />
</head>

<body>
  <div id="wrapper">
    <div id="header">
      <a href="" class="logo">
        <img src="<?php asset("assets/logo.png"); ?>" alt="" />
      </a>
      <div id="menu">
        <div class="item">
          <a href="">Trang chủ</a>
        </div>
        <div class="item">
          <ul id="main-menu">
            <a href="admin/product/index.php">Sản phẩm</a>
          </ul>
        </div>
        <div class="item">
          <a href="">Liên hệ</a>
        </div>
        <?php
        if (is_logged()) {
        ?>
          <a href="../../logout.php" class="item">Đăng xuất</a>
        <?php } else { ?>
          <a href="../../login.php" class="item">Đăng nhập</a>
          <a href="register.php" class="item">Tạo tài khoản</a>
        <?php } ?>
      </div>
      <div id="actions">
        <div class="item">
          <img src="<?php asset("assets/user.png"); ?>" alt="" />
        </div>
        <div class="item">
          <img src="<?php asset("assets/cart.png"); ?>" alt="" />
        </div>
      </div>
    </div>
    <div id="banner">
      <div class="box-left">
        <h2>
          <span>THỨC ĂN</span>
          <br />
          <span>THƯỢNG HẠNG</span>
        </h2>
        <p>
          Chuyên cung cấp các món ăn đảm bảo dinh dưỡng hợp vệ sinh đến người
          dùng, phục vụ người dùng 1 cách hoàn hảo nhất
        </p>
        <!-- <button>Mua ngay</button> -->
      </div>
      <div class="box-right">
        <img src="<?php asset("assets/img_1.png"); ?>" alt="" />
        <img src="<?php asset("assets/img_2.png"); ?>" alt="" />
        <img src="<?php asset("assets/img_3.png"); ?>" alt="" />
      </div>
      <div class="to-bottom">
        <a href="">
          <img src="<?php asset("assets/to_bottom.png"); ?>" alt="" />
        </a>
      </div>
    </div>
    <div id="wp-products">
      <h2>SẢN PHẨM CỦA CHÚNG TÔI</h2>

      <ul id="list-products">
        <?php
        //Xử lý thêm 
        $data = db_select("select * from product");

        foreach ($data as $items) {
          $id = $items["id"];
          $name = $items["name"];
          $price = number_format($items["price"]);
          $content = $items["content"];
          $file  = upload($items["img_path"] ?? "", true);
          echo <<<EQL
                <div class="item">
                    <img src="$file" alt="">
                    <div class="stars">
                        <span>
                            <img src="/eShop_/asset/assets/star.png" alt="">
                        </span>
                        <span>
                            <img src="/eShop_/asset/assets/star.png" alt="">
                        </span>
                        <span>
                            <img src="/eShop_/asset/assets/star.png" alt="">
                        </span>
                        <span>
                            <img src="/eShop_/asset/assets/star.png" alt="">
                        </span>
                        <span>
                            <img src="/eShop_/asset/assets/star.png" alt="">
                        </span>
                    </div>

                    <div class="name">$name</div>
                    <div class="desc">$content</div>
                    <div class="price">$price VND</div>
                </div>
EQL;
        }
        ?>
      </ul>
    </div>
    <div class="list-page">
      <div class="item">
        <a href="#">1</a>
      </div>
      <div class="item">
        <a href="#">2</a>
      </div>
      <div class="item">
        <a href="#">3</a>
      </div>
      <div class="item">
        <a href="#">4</a>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div id="saleoff">
    <div class="box-left">
      <h1>
        <span>GIẢM GIÁ LÊN ĐẾN</span>
        <span>45%</span>
      </h1>
    </div>
    <div class="box-right"></div>
  </div>

  <div id="comment">
    <h2>NHẬN XÉT CỦA KHÁCH HÀNG</h2>
    <div id="comment-body">
      <div class="prev">
        <a href="#">
          <img src="<?php asset("assets/prev.png"); ?>" alt="" />
        </a>
      </div>
      <ul id="list-comment">
        <li class="item">
          <div class="avatar">
            <img src=<?php asset("assets/avarta_1.png"); ?> alt="" />
          </div>
          <div class="stars">
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
          </div>
          <div class="name">Nguyễn Đình Vũ</div>

          <div class="text">
            <p>
              Lorem Ipsum is simply dummy text of the printing and
              typesetting industry. Lorem Ipsum has been the industry's
              standard dummy text ever since the 1500s, when an unknown
              printer took a galley of type and scrambled it to make a type
              specimen book.
            </p>
          </div>
        </li>
        <li class="item">
          <div class="avatar">
            <img src="<?php asset("assets/avatar_1.png"); ?>" alt="" />
          </div>
          <div class="stars">
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
          </div>
          <div class="name">Trần Ngọc Sơn</div>

          <div class="text">
            <p>
              Lorem Ipsum is simply dummy text of the printing and
              typesetting industry. Lorem Ipsum has been the industry's
              standard dummy text ever since the 1500s, when an unknown
              printer took a galley of type and scrambled it to make a type
              specimen book.
            </p>
          </div>
        </li>
        <li class="item">
          <div class="avatar">
            <img src="<?php asset("assets/avatar_1.png"); ?>" alt="" />
          </div>
          <div class="stars">
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
            <span>
              <img src="<?php asset("assets/star.png"); ?>" alt="" />
            </span>
          </div>
          <div class="name">Nguyễn Trần Vi</div>

          <div class="text">
            <p>
              Lorem Ipsum is simply dummy text of the printing and
              typesetting industry. Lorem Ipsum has been the industry's
              standard dummy text ever since the 1500s, when an unknown
              printer took a galley of type and scrambled it to make a type
              specimen book.
            </p>
          </div>
        </li>
      </ul>
      <div class="next">
        <a href="#">
          <img src="<?php asset("assets/next.png"); ?>" alt="" />
        </a>
      </div>
    </div>
  </div>

  <div id="footer">
    <div class="box">
      <div class="logo">
        <img src="<?php asset("assets/logo.png"); ?>" alt="" />
      </div>
      <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
    </div>
    <div class="box">
      <h3>NỘI DUNG</h3>
      <ul class="quick-menu">
        <div class="item">
          <a href="">Trang chủ</a>
        </div>
        <div class="item">
          <a href="">Sản phẩm</a>
        </div>
        <div class="item">
          <a href="">Blog</a>
        </div>
        <div class="item">
          <a href="">Liên hệ</a>
        </div>
      </ul>
    </div>
    <div class="box">
      <h3>LIÊN HỆ</h3>
      <form action="">
        <input type="text" placeholder="Địa chỉ email" />
        <button>Nhận tin</button>
      </form>
    </div>
  </div>
  </div>
  <script src="<?php asset("js/script.js"); ?>"></script>
</body>

</html>