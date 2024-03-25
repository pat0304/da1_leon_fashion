<form action="" method="post" enctype="multipart/form-data">

<div class="product-box">
                    <div class="btn-box">
                        <h2>Thêm sản phẩm </h2>
                        <input type="submit" class="btn-add" name="submit" value="Thêm">
                    </div>
                </div>
                <div class="container">
                    <div class="flex-user-add d-flex flex-row">
                        <div class="col-8">
                            <div class=" mb-3 mt-2">
                                <label for="disabledTextInput" class="form-label"> <h5>Tên</h5></label>
                                <input type="text" id="disabledTextInput" class="form-control" name="name" placeholder="">
                            </div>
                            <div class="mb-3 mt-2">
                                <label for="disabledTextInput" class="form-label"> <h5>Giá </h5></label>
                                <input type="number" id="disabledTextInput" class="form-control" name="price" placeholder="">
                            </div>
                            <div class="mb-3 mt-2">
                                <label for="disabledTextInput" class="form-label"> <h5>Giá khuyến mãi</h5></label>
                                <input type="number" id="disabledTextInput" class="form-control" name="sale_price" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Danh mục</label>
                                <select id="disabledSelect" class="form-select" name="id_catalog">
                                    <?php foreach($data['dsdm'] as $dm): ?>
                                        <option value="<?=$dm['id']?>"><?=$dm['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                              </div>
                        </div>
                        <div class="col-4 p-4 pb-0">
                            <div class=" box-img">
                                <img src="img/logo-da1.png" id="img" style="height: 100%;" alt="">
                            </div>
                            <div>
                                <input type="file" name="img" id="" onchange="chooseFile(this)" accept="image/gif, image/jpeg, image/png, image/jpg, image/jfif">
                            </div>
                        </div>
                        
                    </div>     
                    
                    <div class="mb-3 mt-2">
                        <label for="disabledTextInput" class="form-label"> <h5>Mô tả </h5></label>
                        <textarea type="text" id="disabledTextInput" class="form-control" style="height: 100px" name="mo_ta" placeholder=""></textarea>
                    </div>
                       
                </div>

</form>
<script>
function chooseFile(fileInput) {
        if (fileInput.files && fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
        $('#img').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>