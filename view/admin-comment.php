<div class="product-box">
                <div class="btn-box">
                    <h2>Bình luận</h2>
                    <a href="#"><button class="btn-add">Thêm</button></a>
                </div>
            </div>
            <div>

            </div>
            <div class="container">


            <table class="table text-center align-middle">
        <thead>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Tên khách hàng</th>
                <th>Nội dung</th>
                <th>Tùy chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comment as $comment): ?>
         <tr>
                <td class="d-flex justify-content-center">
                    <div class=" align-middle d-flex justify-content-center"style="overflow:hidden; width: 100px; height: 100px;">
                        <img src="img/<?=$comment['img']?>" style="height: 100%;" alt="">
                    </div>
                </td>
                <td>
                    <div class="product-info-group">
                        <?= $comment['name']?>
                    </div>
                </td>
                <td>
                    <div class="product-info-group">

                        <?= $comment['fullname'] ?>
                    </div>
                </td>
                <td>
                    <div class="product-info-group">
                        <?= $comment ['content'] ?>
                    </div>
                </td>
                <td >  

                <div class="dropdown dropstart d-flex justify-content-center" style="z-index:100 ;">
                    <button class="btn btn-sa-muted btn-sm" type="button"
                        id="product-context-menu-0" data-bs-toggle="dropdown"
                        aria-expanded="false" aria-label="More">
                        <i class="bi bi-three-dots-vertical" style="color:black;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="product-context-menu-0">
                        <li>
                            <a class="dropdown-item" onclick="delete_comment(<?=$comment ['id']?>)">Xóa</a>
                        </li>
                    </ul>
                </div>

                    <!-- <div class="product-info-group " style="text-align:center;">
                        <input type="button" class="btn btn-light" value="Xóa">
                    </div>   -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
</div>
<script>
function delete_comment(id) {
    var kq = confirm("Bạn có muốn xóa sản phẩm này không?");
    if (kq) {
        //KQ đúng là người ta muốn xóa đó 
        window.location = 'admin.php?page=comment-delete&id=' + id;
    }
}
</script>