<div id="trade" style="margin-top: 150px">
    <h2><?=$title?></h2>
    <form
        action="<?php echo isset($catalog_id)?'index.php?page=products&cata='.$catalog_id.'':'index.php?page=products' ?>"
        id="myForm" method="POST">
        <div class="sap-xep">Sắp xếp theo: <select name="orderby" onchange="submitForm()">
                <option value="">Chọn</option>
                <option value="1" onchange="submitForm()">A-Z</option>
                <option value="2" onchange="submitForm()">Z-A</option>
                <option value="3" onchange="submitForm()">Giá tăng dần</option>
                <option value="4" onchange="submitForm()">Giá giảm dần</option>
                <option value="5" onchange="submitForm()">Sale</option>
            </select></div>
    </form>
    <div class="products">
        <?php
        foreach ($products as $item) {
            extract($item);
            if($sale_price != null){
            $productOutput .= '
            <div class="product">
            <input type="hidden" value="'.$id.'" name="id_product" class="id-product">
            <input type="hidden" value="'.$id_catalog.'" name="id_catalog" class="id-catalog">
            <img class="img-pro" src="./img/'.$img.'" alt="">
            <div class="name-pro">
                <a href="index.php?page=detail&id='.$id.'">'.$name.'</a>
            </div>
            <div class="price sale">
                <div class="price-pro" >'.number_format($price,0,",",'.').'đ</div>
                <div class="sale-price-pro" data-price="'.$sale_price.'">'.number_format($sale_price, 0 ,',', '.').'đ
                </div>
            </div>
            <div class="buy-action">
                <button class="add-to-card" name="addToCard">Thêm Giỏ Hàng</button>
            </div>
            </div>
            ';}else{
                $productOutput .= '
            <div class="product">
            <input type="hidden" value="'.$id.'" name="id_product" class="id-product">
            <input type="hidden" value="'.$id_catalog.'" name="id_catalog" class="id-catalog">
            <img class="img-pro" src="./img/'.$img.'" alt="">
            <div class="name-pro">
                <a href="index.php?page=detail&id='.$id.'">'.$name.'</a>
            </div>
            <div class="price">
                <div class="price-pro" data-price="'.$price.'">'.number_format($price,0,",",'.').'đ</div>
                <div class="sale-price-pro">
                </div>
            </div>
            <div class="buy-action">
                <button class="add-to-card" name="addToCard">Thêm Giỏ Hàng</button>
            </div>
            </div>
            ';
            }
        }
        echo $productOutput;
        ?>
    </div>
</div>
<script>
function submitForm() {
    document.getElementById("myForm").submit();
}
</script>