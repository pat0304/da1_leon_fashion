<div class="product-box">
    <div class="btn-box">
        <h2>Người dùng</h2>
        <a href="admin.php?page=user-add"><button class="btn-add">Thêm</button></a>
    </div>
</div>
<div class="container">
    <table class="table text-center align-middle">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th class="">Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Quyền</th>
                <th>Tùy chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user['user'] as $user): ?>
            <tr>
                <td class="d-flex justify-content-center">
                    <div class=" align-middle d-flex justify-content-center"
                        style="overflow:hidden; width: 100px; height: 100px;">
                        <img src="<?= $user['img'] ?>" style="height: 100%;" alt="">
                    </div>

                </td>
                <td>
                    <div class="product-info-group">
                        <?= $user['fullname'] ?>
                    </div>
                </td>
                <td>
                    <div class="product-info-group">
                        <?= $user['email'] ?>
                    </div>
                </td>
                <td>
                    <div class="product-info-group">
                        <?= $user['sdt'] ?>
                    </div>
                </td>
                <td>
                    <?php 
                                    switch ($user['role']) {
                                        case '1':
                                            echo 'Admin';
                                            break;
                                        
                                        default:
                                            echo 'User';
                                            break;
                                    }
                                ?>
                </td>
                <td>
                    <div class="dropdown dropstart d-flex justify-content-center">
                        <button class="btn btn-sa-muted btn-sm" type="button"
                            id="product-context-menu-0" data-bs-toggle="dropdown"
                            aria-expanded="false" aria-label="More">
                            <i class="bi bi-three-dots-vertical" style="color:black;"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="product-context-menu-0">
                            <li>
                                <a class="dropdown-item" href="admin.php?page=user-edit&id=<?=$user['id']?>">Sửa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="delete_User(<?=$user['id']?>)" href="">Xóa</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
</div>
</div>
</div>
</div>
<script>
function delete_User(id) {
    var kq = confirm("Bạn có muốn xóa sản phẩm này không?");
    if (kq) {
        //KQ đúng là người ta muốn xóa đó 
        window.location = 'admin.php?page=user-delete&id='+id;
    }
}
</script>