<div id="login">
    <div class="row mb ">
        <div class="boxtitle">Đăng Nhập</div>
        <div class="boxcontent formtaikhoan">
            <form action="index.php?page=login" method="post">
                <div class="row mb10">
                    Tên đăng nhập <br>
                    <input required type="text" name="username">
                </div>
                <div class="row mb10">
                    Mật khẩu <br>
                    <input required type="password" name="password">
                </div>

                <div class="row mb10">
                    <input type="checkbox" name="remember">Ghi nhớ tài khoản
                </div>
                <div class="row mb10">
                    <input type="submit" name="login" value="Đăng nhập">
                </div>
            </form>
            <ul>
                <li>
                    <a href="#">Quên mật khẩu</a>
                    <?php
                if ($error != ''){
                    echo '<div class="error">'.$error.'</div>';
                }
            ?>
                </li>
                <li id="dangky">
                    <a href="index.php?page=register">Đăng kí thành viên</a>
                </li>
            </ul>
        </div>
    </div>
</div>