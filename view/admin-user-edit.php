<form action="" method="post" enctype="multipart/form-data">
    <div class="product-box">
        <div class="btn-box">
            <h2>Sửa người dùng </h2>
            <input type="submit" class="btn-add" name="submit" value="Lưu">
        </div>
    </div>
    <div class="container">
        <div class="flex-user-add d-flex flex-row">
            <div class="col-8">
                <div class=" mb-3 mt-2">
                    <label for="disabledTextInput" class="form-label">
                        <h5>Tên</h5>
                    </label>
                    <input type="text" id="disabledTextInput" class="form-control" name="fullname"
                        value="<?=$user['user']['fullname']?>">
                </div>
                <div class="mb-3 mt-2">
                    <label for="disabledTextInput" class="form-label">
                        <h5>Tài khoản </h5>
                    </label>
                    <input type="text" id="disabledTextInput" class="form-control" name="username"
                        value="<?=$user['user']['username']?>">
                </div>
                <div class="mb-3 mt-2">
                    <label for="disabledTextInput" class="form-label">
                        <h5>Mật khẩu</h5>
                    </label>
                    <input type="text" id="disabledTextInput" class="form-control" name="pass"
                        value="<?=$user['user']['pass']?>">
                </div>
                <div class="mb-3 mt-2">
                    <label for="disabledTextInput" class="form-label">
                        <h5>Số điện thoại</h5>
                    </label>
                    <input type="number" id="disabledTextInput" class="form-control" name="sdt"
                        value="<?=$user['user']['sdt']?>">
                </div>
            </div>
            <div class="col-4 p-4 pb-0" style="overflow:hidden;">
                <div class=" box-img">
                    <img src="<?=$user['user']['img']?>" id="img" style="height: 100%;" alt="">
                </div>
                <div>
                    <input type="file" name="img" id="" onchange="chooseFile(this)"
                        accept="image/gif, image/jpeg, image/png, image/jpg, image/jfif">
                </div>
            </div>

        </div>

        <div class="mb-3 mt-2">
            <label for="disabledTextInput" class="form-label">
                <h5>Email</h5>
            </label>
            <input type="email" id="disabledTextInput" class="form-control" name="email"
                value="<?=$user['user']['email']?>">
        </div>
        <div class="mb-3 mt-2">
            <label for="disabledTextInput" class="form-label">
                <h5>Địa chỉ </h5>
            </label>
            <input type="text" id="disabledTextInput" class="form-control" name="location"
                value="<?=$user['user']['location']?>">
        </div>
        <div class="mb-5">
            <label for="disabledSelect" class="form-label">Quyền</label>
            <select id="disabledSelect" class="form-select" name="role">
                <option value='0' <?=($user['user']['role']==0)?'selected':''?>>User</option>
                <option value='1' <?=($user['user']['role']==1)?'selected':''?>>Admin</option>
            </select>
        </div>

    </div>
</form>

<script>
function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>