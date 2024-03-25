<div id="register">
    <div class="row mb ">
        <div class="boxtitle">Đăng Ký</div>
        <div class="boxcontent formtaikhoan">
            <form action="index.php?page=register" method="post" onsubmit="return checkPassword()">
                <div class="row mb10">
                    Họ và tên:<br>
                    <input required type="text" name="fullname">
                </div>
                <div class="row mb10">
                    Tên đăng nhập:<br>
                    <input required type="text" name="username">
                </div>
                <div class="row mb10">
                    Mật khẩu:<br>
                    <input required type="password" name="password" class="pass">
                </div>
                <div class="row mb10">
                    Nhập Lại Mật khẩu:<br>
                    <input required type="password" name="passwordAgain" class="passAgain">
                </div>
                <div class="row mb10">
                    Email:<br>
                    <input required type="email" name="email">
                </div>
                <div class="row mb10">
                    Số điện thoại:<br>
                    <input required type="tel" name="sdt" pattern="0+[0-9]{9}">
                </div>


                <div class="row mb10">
                    <input type="submit" name="register" value="Đăng ký">
                    <?= $error?>
                </div>

            </form>
        </div>
    </div>
</div>