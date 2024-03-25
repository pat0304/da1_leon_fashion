<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin/css/css-layout.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-2 p-0 collapse collapse-horizontal show" id="openmenu"
                style="background-color: #3c4b64; min-height: 100vh;" data-bs-theme="dark">
                <nav class="navbar bg-body-tertiary p-0 m-0">
                    <div class="container p-0 m-0 justify-content-center ">
                        <a class="navbar-brand p-2 m-0" href="#">
                            <img src="img/logo.jpg" style="filter: brightness(0) invert(1);" alt="" height="65">
                        </a>
                    </div>
                </nav>
                <div class="list-group pt-3">
                    <a href="admin.php?page=home" class="menu <?= (strpos($view_name,'thongke'))?'active':'' ?>"><i
                            class="bi bi-speedometer"></i> Thống kê </a>
                    <a href="admin.php?page=catalog" class="menu <?= (strpos($view_name,'catalog'))?'active':'' ?>"><i
                            class="bi bi-collection-fill"></i> Danh mục </a>
                    <a href="admin.php?page=product&trang=1" class="menu <?= (strpos($view_name,'product'))?'active':'' ?>"><i
                            class="bi bi-box-fill"></i> Sản phẩm </a>
                    <a href="admin.php?page=user" class="menu <?= (strpos($view_name,'user'))?'active':'' ?>"><i
                            class="bi bi-person-bounding-box"></i> Người dùng</a>
                    <a href="admin.php?page=comment" class="menu <?= (strpos($view_name,'comment'))?'active':'' ?>"><i
                            class="bi bi-chat-left-text"></i> Bình luận</a>
                    <a href="admin.php?page=bill" class="menu <?= (strpos($view_name,'bill'))?'active':'' ?>"><i
                            class="bi bi-bag-check-fill"></i> Đơn hàng</a>
                    <a href="admin.php?page=voucher" class="menu <?= (strpos($view_name,'voucher'))?'active':'' ?>"><i
                            class="bi bi-ticket-perforated-fill"></i> Voucher</a>
                    <!-- <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a> -->
                </div>
            </div>
            <div class="col-md p-0">
                <nav class="navbar navbar-expand-lg" style="background-color: #ffffff;" data-bs-theme="">
                    <div class="container-fluid">
                        <button class="btn btn-primary" style="background-color: #ffffff;" type="button"
                            data-bs-toggle="collapse" data-bs-target="#openmenu" aria-expanded="false"
                            aria-controls="openmenu">
                            <i class="bi bi-list" style="font-size: 30px;"></i>
                        </button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-4">
                                <ul class="img-user">
                                    <img src="<?= $_SESSION['user']['img']?>" alt="">
                                </ul>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Admin, <br>
                                        <?=$_SESSION['user']['fullname']?>
                                    </a>
                                    <ul class="dropdown-menu">

                                        <li><a class="dropdown-item" href="index.php">Xem trang chủ</a></li>
                                        <li><a class="dropdown-item" href="admin.php?page=logout">Đăng Xuất</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--  -->

                <?php include_once './view/'.$view_name.'.php'; ?>


                <!--  -->
                <footer>

                </footer>
</body>
<script src="admin/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

</html>