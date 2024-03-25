<div class="product-box">
                <div class="btn-box">
                    <h2>Sản phẩm</h2>
                    <a href="admin.php?page=product-add"><button class="btn-add">Thêm</button></a>
                </div>
            </div>
            <div class="container">
                <table class="table text-center align-middle">
                        <thead>
                            <tr>
                            <th >Ảnh</th>
                            <th class="">Tên</th>
                            <th>Mô tả</th>
                            <th>Giá </th>
                            <th>Giá giảm</th>
                            <th>Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $sp): ?> 
                            <tr>
                                <td class="d-flex justify-content-center">
                                <div class=" align-middle d-flex justify-content-center"  style="overflow:hidden; width: 100px; height: 100px;">
                                    <img src="img/<?= $sp['img']?>" style="height: 100%;"  alt="">
                                </div>
                                        
                                </td>
                                <td>
                                    <div class="product-info-group">
                                        <?= $sp['name']?>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info-group">
                                        <?= $sp['mo_ta']?>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info-group">
                                        <?= $sp['price']?> VND
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info-group">
                                        <?= ($sp['sale_price']==0)?$sp['price']:$sp['sale_price'] ?> VND 
                                    </div>
                                </td>
                                <td class="">

                                <div class="dropdown dropstart d-flex justify-content-center">
                                    <button class="btn btn-sa-muted btn-sm" type="button"
                                        id="product-context-menu-0" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-label="More">
                                        <i class="bi bi-three-dots-vertical" style="color:black;"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="product-context-menu-0">
                                        <li>
                                            <a class="dropdown-item" href="admin.php?page=product-edit&id=<?=$sp['id']?>">Sửa</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" onclick="deleteProduct(<?=$sp['id']?>)" href="">Xóa</a>
                                        </li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
                </div>
                <div class="container ">
                    <div class="phantrang ">
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>
                                <?php for($i=1; $i<=$sotrang; $i++): ?>
                                <li class="page-item">
                                    <a class="page-link" href="admin.php?page=product&trang=<?=$i?>">
                                        <?=$i?>
                                    </a>
                                </li>
                                <?php endfor;?>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
    function deleteProduct(id) {
        var kq = confirm("Bạn có muốn xóa sản phẩm này không?");  
        if( kq){ 
            //KQ đúng là người ta muốn xóa đó 
            window.location='admin.php?page=product-delete&id='+id;
        }
    }
    
</script>