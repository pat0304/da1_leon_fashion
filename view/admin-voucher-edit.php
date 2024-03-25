<form action="" method="post" enctype="multipart/form-data">
<div class="product-box">
                    <div class="btn-box">
                        <h2>Sửa danh mục </h2>
                        <input type="submit" class="btn-add" name="submit" value="Lưu">
                    </div>
                </div>
                <div class="container">     
                    <div class="mb-3 mt-2">
                        <label for="disabledTextInput" class="form-label"> <h5>Mã Voucher</h5></label>
                        <input type="text" id="disabledTextInput" class="form-control" name="code" value="<?=$voucher['vc']['code']?>" placeholder="">
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="disabledTextInput" class="form-label"> <h5>Giá trị</h5></label>
                        <input type="number" id="disabledTextInput" class="form-control" name="value" value="<?=$voucher['vc']['value']?>" placeholder="">
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="disabledTextInput" class="form-label"> <h5>Số lượng</h5></label>
                        <input type="number" id="disabledTextInput" class="form-control" name="sl" value="<?=$voucher['vc']['sl']?>" placeholder="">
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="disabledTextInput" class="form-label"> <h5>Ngày bắt đầu</h5></label>
                        <input type="datetime-local" id="disabledTextInput" class="form-control" name="ngay_ap_dung" value="<?=$voucher['vc']['ngay_ap_dung']?>" placeholder="">
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="disabledTextInput" class="form-label"> <h5>Ngày kết thúc</h5></label>
                        <input type="datetime-local" id="disabledTextInput" class="form-control" name="ngay_ket_thuc" value="<?=$voucher['vc']['ngay_ket_thuc']?>" placeholder="">
                    </div>
                    
                </div>
            </form>