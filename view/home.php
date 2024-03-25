<div id="banner">
    <a href="#">
        <div class="banner-feature">
            <img class="banner" src="img/banner1.png" alt="">
            <img class="banner" src="img/banner2.png" alt="">
            <img class="banner" src="img/banner3.png" alt="">
        </div>
    </a>
    <script>
    window.addEventListener("load", function() {
        const img = document.querySelectorAll('.banner')
        const bannerFeature = document.querySelector('.banner-feature')
        var imgWidth = img[0].offsetWidth
        bannerFeature.style.width = `${img.length * imgWidth}+'px'`
        var i = 1;
        let move = 0;
        setInterval(function() {
            move = Number(imgWidth) * i
            bannerFeature.style.transform = 'translateX(-' + move + 'px)'
            if (i == img.length - 1) {
                i = -1
            }
            i++
        }, 3000)
    })
    </script>
</div>

<div id="trade">
    <h2>Sản phẩm mới</h2>
    <div class="products">
        <?php 
                    $productNew = getProductsNew(4);
                    $productNewOutput = '';
                    foreach ($productNew as $item) {
                        extract($item);
                        if($sale_price != null){
                        $productNewOutput .= '
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
                            $productNewOutput .= '
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
                    echo $productNewOutput;
                    ?>
    </div>
    <a href="index.php?page=products">
        <button class="more">Xem thêm</button></a>
    <div class="banner-bst" style="margin-bottom: 50px;">
    <div class="bst-feature">
        <img src="./img/bst.jpg" alt="">
        <img src="./img/bst2.jpg" alt="">
        <img src="./img/bst3.jpg" alt="">
    </div>
    <h1>Bộ sưu tập</h1>

    </div>
    <script>
    const bstFeature = document.querySelector('.bst-feature');
    const imgBst = document.querySelectorAll('.bst-feature img')
    let count = 1;
    let imgHeight = 250;
    let trans = 0
    setInterval(function() {
        trans = Number(imgHeight) * count
        bstFeature.style.transform = `translateY(-${trans}px)`
        if (count == imgBst.length - 1) {
            count = -1
        }
        count++
    }, 2000)
    </script>
    <h2>Sản phẩm hot</h2>
    <div class="hot-product">
        <div class="slider-hot-pro">
            <div class="slider-feature">
                <img src="./img/slider-hot-pro1.jpg" alt="">
                <img src="./img/slider-hot-pro2.jpg" alt="">
                <img src="./img/slider-hot-pro3.jpg" alt="">
                <img src="./img/slider-hot-pro4.jpg" alt="">
            </div>
        </div>
        <script>
        const hotProFeature = document.querySelector('.slider-feature');
        const imgHotPro = document.querySelectorAll('.slider-feature img')
        let c = 1;
        let imgHot = 530;
        let tran = 0
        setInterval(function() {
            tran = Number(imgHot) * c
            hotProFeature.style.transform = `translateX(-${tran}px)`
            if (c == imgHotPro.length - 1) {
                c = -1
            }
            c++
        }, 2000)
        </script>
        <div class="products">
            <?php 
$productHot = getProductsBST(1);
$productHotOutput = '';
foreach ($productHot as $item) {
    extract($item);
    if($sale_price != null){
    $productHotOutput .= '
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
        $productHotOutput .= '
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
echo $productHotOutput;
?>
        </div>
    </div>
    <h2>Sản phẩm khác</h2>
    <div class="another-products">
        <div class="another another1">
            <a href="index.php?page=products&cata=1">
                <img src="./img/tshirt.jpg" alt="">
                <div class="name-another">Áo Thun</div>
            </a>
        </div>
        <div class="another another2">
            <a href="index.php?page=products&cata=2">
                <img src="./img/jackets.jpg" alt="">
                <div class="name-another">Jackets</div>
            </a>
        </div>
        <div class="another another3">
            <a href="index.php?page=products&cata=3">
                <img src="./img/jeans.jpg" alt="">
                <div class="name-another">Quần</div>
            </a>
        </div>

        <div class="another another4">
            <a href="index.php?page=products&cata=4">
                <img src="./img/accessories.jpg" alt="">
                <div class="name-another">Phụ Kiện</div>
            </a>
        </div>
    </div>
</div>