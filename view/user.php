<h2 style="margin: 150px auto 30px auto">Thông tin Khách hàng</h2>
<div id="user">
    <img src="<?=$_SESSION['user']['img']?>" alt="">
    <div class="information">
        <div class="name">
            <label for="fullname">Họ và tên:</label>
            <input type="text" value="<?=$_SESSION['user']['fullname']?>" class="fullname" disabled>
        </div>
        <div class="email">
            <label for="email">Email:</label>
            <input type="text" value="<?=$_SESSION['user']['email']?>" class="email" disabled>
        </div>
        <div class="sdt">
            <label for="fullname">Số điện thoại</label>
            <input type="text" value="<?=$_SESSION['user']['sdt']?>" class="sdt" disabled>
        </div>
        <div class="location">
            <label for="location">Địa chỉ:</label>
            <input type="text" value="<?=$_SESSION['user']['location']?>" class="location" disabled>
        </div>
        <button id="go-to-update">Chỉnh sửa</button>
    </div>
</div>
<form action="index.php?page=user" method="post" id="update-user" enctype="multipart/form-data">
    <div class="background">
        <div id="close">x</div>
        <div class="update-img-user">
            <img src="<?=$_SESSION['user']['img']?>" alt="">
            <input type="file" name="updateIMG">
        </div>
        <div class="update-information">
            <div class="name">
                <label for="fullname">Họ và tên:</label>
                <input type="text" value="<?=$_SESSION['user']['fullname']?>" name="updateFullname" id="fullname">
            </div>
            <div class="email">
                <label for="updateEmail">Email:</label>
                <input type="text" value="<?=$_SESSION['user']['email']?>" name="updateEmail" id="updateEmail">
            </div>
            <div class="sdt">
                <label for="updateSDT">Số điện thoại:</label>
                <input type="tel" value="<?=$_SESSION['user']['sdt']?>" name="updateSDT" id="updateSDT">
            </div>
            <div class="location">
                <label for="updateLocation">Địa chỉ:</label>
                <input type="text" value="<?=$_SESSION['user']['location']?>" name="updateLocation" id="updateLocation">
            </div>
            <input type="submit" name="update" value="Cập nhật">
        </div>
    </div>
</form>
<script>
const goToUpdate = document.getElementById("go-to-update");
const updatePopUp = document.getElementById("update-user");
const close = document.getElementById("close");
goToUpdate.addEventListener("click", function(button) {
    updatePopUp.style.visibility = "unset";
    updatePopUp.style.opacity = 1
})
close.addEventListener("click", function(button) {
    updatePopUp.style.visibility = "hidden";
    updatePopUp.style.opacity = 0
})
</script>