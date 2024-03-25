<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Leon Fashion</title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <div id="container">
        <header>
            <nav>
                <div class="nav-cata">
                    <a href="index.php?page=products">Sản phẩm</a>
                    <ul>
                        <?php 
                            $cata = getCatalog();
                            $cataOutput ="";
                            foreach ($cata as $item) {
                                extract($item);
                                $cataOutput .= '
                                <li><a href="index.php?page=products&cata='.$id.'">' .$name. '</a></li>
                                ';
                            }
                            echo $cataOutput;
                        ?>
                    </ul>
                </div>
                <form action="index.php?page=search" method="POST" style="position: relative;">
                    <input type="text" placeholder="Tìm kiếm..." name="searchInput" id="search">
                    <input type="submit" name="search" value="  ">
                </form>
            </nav>
            <div id="logo">
                <a href="index.php"><img src="img/logo.jpg" alt=""></a>
            </div>
            <div id="action">
                <div class="item-action cart">
                    <a href="index.php?page=card">
                        <img class="icon-nav" src="img/cart.jpg" alt="card">
                        <div id="countSL"></div>
                        <span>Giỏ hàng</span>
                    </a>
                </div>
                <div class="item-action account" style="position: relative">
                    <?php
                    if(isset($_SESSION['user']['username'])&&$_SESSION['user']['username']!=""){ ?>
                    <a href="index.php?page=user">
                        <img class="icon-nav" src="
                        <?php
                        if(isset($_SESSION['user']) && $_SESSION['user']['img'] != null){
                            echo $_SESSION['user']['img'];
                        }else{
                            echo 'img/account.jpg';
                        }
                        ?>
                        " alt="account">
                        <span><?=$_SESSION['user']['username']?></span>
                    </a>
                    <ul>
                        <li><a href="index.php?page=user">Thông tin</a></li>
                        <li><a href="index.php?page=myvoucher">Voucher của Tôi</a></li>
                        <li><a href="index.php?page=historycard">Lịch sử mua hàng</a></li>
                        <li><a href="index.php?page=logout">Đăng xuất</a></li>
                    </ul>
                    <?php }else{ ?>
                    <a href="index.php?page=login">
                        <img class="icon-nav" src="img/account.jpg" alt="account">
                        <span>Tài khoản</span>
                    </a>
                    <?php } ?>
                </div>
                <div class="item-action contact">
                    <a href="index.php?page=contact">
                        <img class="icon-nav" src="img/contact.png" alt="cart">
                        <span>Liên hệ</span>
                    </a>
                </div>
            </div>
        </header>