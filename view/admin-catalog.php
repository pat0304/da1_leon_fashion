<div class="product-box">
                <div class="btn-box">
                    <h2>Danh mục</h2>
                    <a href="admin.php?page=catalog-add"><button class="btn-add">Thêm</button></a>
                </div>
            </div>
            <div class="container">


            

                <div class="row mt-3">
                    <?php foreach ($catalog as $cata): ?>
                        <div class="col-md-4 ">
                        <div class="card mb-4 text-bg-success">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start rounded-1" style="color: white;">
                        <div>
                            <h5 class="card-text m-0">Mã danh mục: <?= $cata['id']?></h5>
                            <br>
                            <h5 class="card-title"><?= $cata['name']?> </h5>
                        </div>
                            <div class="btn-group " role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle" style="color: white; background-color: #198754;" data-bs-toggle="dropdown" aria-expanded="false">
                                Tùy chỉnh 
                                </button>
                                <ul class="dropdown-menu ">
                                <li><a class="dropdown-item" href="admin.php?page=catalog-edit&id=<?=$cata['id']?>">Sửa</a></li>
                                <li><a class="dropdown-item" onclick="deleteCatalog(<?= $cata['id']?>)" href="#">Xóa</a></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteCatalog(id) {
        var kq = confirm("Bạn có muốn xóa danh mục này không?");  
        if( kq){ 
            //KQ đúng là người ta muốn xóa đó 
            window.location='admin.php?page=catalog-delete&id='+id;
        }
    }
</script>