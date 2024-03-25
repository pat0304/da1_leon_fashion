<div class="product-box">
                <div class="btn-box">
                    <h2>Voucher</h2>
                    <a href="admin.php?page=voucher-add"><button class="btn-add">Thêm</button></a>
                </div>
            </div>
            <div class="container">

            


                <div class="row mt-3">
                <?php foreach ($data['vc'] as $vc): ?>
                    <div class="col-md-4 ">
                    <div class="card mb-4 text-white bg-primary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start rounded-1" style="color: white; background-color: rgb(32, 42, 228);">
                    <div>
                        <h5 class="card-text m-0">Mã: <?= $vc['code']?></h5>
                        <br>
                        <h5 class="card-title"><?= $vc['value']?> </h5>
                    </div>
                        <div class="btn-group " role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" style=" background-color: rgb(32, 42, 228);" data-bs-toggle="dropdown" aria-expanded="false">
                            Tùy chỉnh 
                            </button>
                            <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="admin.php?page=voucher-edit&id=<?= $vc['id']?>">Sửa</a></li>
                            <li><a class="dropdown-item" onclick="delete_voucher(<?= $vc['id']?>)" href="#">Xóa</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer rounded-0">
                            <div class="">
                                <?= $vc['ngay_ap_dung']?>
                            </div>
                            <div class="">
                                ---
                            </div>
                            <div class="">
                                <?= $vc['ngay_ket_thuc']?>
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
    function delete_voucher(id) {
        var kq = confirm("Bạn có muốn xóa sản phẩm này không?");  
        if( kq){ 
            //KQ đúng là người ta muốn xóa đó 
            window.location='admin.php?page=voucher-delete&id='+id;
        }
    }
    
</script>