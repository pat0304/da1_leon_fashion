<div id="detail">
    <div class="detail">
        <div class="img-pro">
            <img src="./img/<?=$sp['img']?>" alt="">
        </div>
        <div class="infor-pro">
            <div class="name-pro"><?=$sp['name']?></div>
            <?php
            if($sp['sale_price'] != null){
            ?>
            <div class="price sale">
                <div class="price-pro">
                    <?= number_format($sp['price'],0,',','.')  ?>đ
                </div>
                <div class="sale-price-pro" data-price="<?=$sp['sale_price']?>">
                    <?= number_format($sp['sale_price'],0,',','.')  ?>đ
                </div>
            </div><?php }else{ ?>
            <div class="price">
                <div class="price-pro" data-price="<?=$sp['price']?>">
                    <?= number_format($sp['price'],0,',','.')  ?>đ
                </div>
                <div class="sale-price-pro">
                </div>
            </div><?php } ?>
            <div class="kichthuoc">
                <span>Kích thước: </span>
                <?php
                if($sp['id_catalog'] == 1){
                ?>

                <input type="radio" name="size" value="S" id="S"><label for="S">S</label>
                <input type="radio" name="size" value="M" id="M"><label for="M">M</label>
                <input type="radio" name="size" value="L" id="L"><label for="L">L</label>
                <input type="radio" name="size" value="XL" id="XL"><label for="XL">XL</label>
                <?php }elseif($sp['id_catalog'] == 2){?>
                <input type="radio" name="size" value="M" id="M"><label for="M">M</label>
                <input type="radio" name="size" value="L" id="L"><label for="L">L</label>
                <input type="radio" name="size" value="XL" id="XL"><label for="XL">XL</label>
                <?php }elseif($sp['id_catalog'] == 3){?>
                <input type="radio" name="size" value="S" id="S"><label for="S">S</label>
                <input type="radio" name="size" value="M" id="M"><label for="M">M</label>
                <input type="radio" name="size" value="L" id="L"><label for="L">L</label>
                <input type="radio" name="size" value="XL" id="XL"><label for="XL">XL</label>
                <?php }elseif($sp['id_catalog'] == 4){?>
                <input type="radio" name="size" value="OS" id="M" checked><label for="M">OS</label>
                <?php }?>
            </div>
            <div class="sl">
                <button class="giam" onclick="giam()">-</button>
                <span class="giatri">1</span>
                <button class="tang" onclick="tang()">+</button>
            </div>
            <div class="action-card">
                <form class="buy" action="index.php?page=buynow" method="POST" style="display: none;">
                    <input type="hidden" class="id-product" value="<?=$sp['id']?>">
                    <input type="hidden" name="sl" id="sldetail" value="1">
                    <input type="hidden" name="price" value="
                    <?php if($sp['sale_price'] != null){
                        echo $sp['sale_price'];
                    }else{
                        echo $sp['price'];
                    }?>
                    ">
                </form>
                <div class="add-detail">Thêm vào giỏ hàng</div>

            </div>
        </div>
        <div class="information">
            <h2>Thông tin về sản phẩm</h2>
            <div class="content">
                <p style="padding: 20px; font-size: 20px;"><?=$sp['mo_ta']?></p>
            </div>
        </div>
        <div class="size-img">
            <h2>Bảng Size</h2>

            <?php if($sp['id_catalog'] == 1){?>
            <img src="./img/bangsizeaothun.jpg" alt="">
            <?php }elseif($sp['id_catalog'] == 2){?>
            <img src="./img/bangsizequan.jpg" alt="">
            <?php }elseif($sp['id_catalog'] == 3){?>
            <img src="./img/bangsize.jpg" alt="">
            <?php }elseif($sp['id_catalog'] == 4){?>
            <?php }?>
        </div>
    </div>
    <div id="action-comment">
        <div id="comment">
            <h2>Đánh giá sản phẩm</h2>
            <?php 
            $show_comment = '';
            foreach($comments as $item){
                extract($item);
                $comment_user = get_user($id_user);
                switch($rating){
                    case 1:
                        $show_star = '
                        <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                </div>
                        ';
                        break;
                    case 2:
                        $show_star = '
                        <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                </div>
                        ';
                        break;
                        case 3:
                            $show_star = '
                            <div class="rate-star">
                        <img src="./img/icon-star.png" alt="" class="star">
                        <img src="./img/icon-star.png" alt="">
                        <img src="./img/icon-star.png" alt="">
                        <img src="./img/icon-star.png" alt="" class="dark-star">
                        <img src="./img/icon-star.png" alt="" class="dark-star">
                    </div>
                            ';
                            break;
                            case 4:
                                $show_star = '
                                <div class="rate-star">
                            <img src="./img/icon-star.png" alt="" class="star">
                            <img src="./img/icon-star.png" alt="">
                            <img src="./img/icon-star.png" alt="">
                            <img src="./img/icon-star.png" alt="">
                            <img src="./img/icon-star.png" alt="" class="dark-star">
                        </div>
                                ';
                                break;
                                case 5:
                                    $show_star = '
                                    <div class="rate-star">
                                <img src="./img/icon-star.png" alt="" class="star">
                                <img src="./img/icon-star.png" alt="">
                                <img src="./img/icon-star.png" alt="">
                                <img src="./img/icon-star.png" alt="">
                                <img src="./img/icon-star.png" alt="">
                            </div>
                                    ';
                                    break;

                }
                $show_comment.= '
                <div class="comment-item">
                <div class="user">
                    <img src="'.$comment_user['img'].'" alt="">
                    <span class="name-user">'.get_user_full_name($id_user).'</span>
                </div>
                '.$show_star.'
                <div class="comment">
                    <div class="date">'.date("H:i - d/m/Y", strtotime($ngay_comment)).'</div>
                    <div class="content">'.$content.'</div>
                </div>
            </div>
                ';
            }
            if($show_comment == ''){
                $note_comment = '<div style="text-align: center; margin-top: 20px">Không có đánh giá nào</div>';
            }else{
                $note_comment = '<a href="index.php?page=allcomment&id='.$_GET['id'].'"><button class="more">Xem thêm</button></a>';
            }
            echo $show_comment;
            echo $note_comment;
            ?>
        </div>
        <div id="total-comment">
            <h2>Tổng quan</h2>
            <div class="danh-gia"><b>Đánh giá: </b> <span> <?= number_format($avg, 1, '.')?> <img
                        src="./img/icon-star.png" style="height: 20px;"></span> (<?= $sl_comments?>
                lượt)</div>
            <h3>Chi tiết đánh giá:</h3>
            <div class="danh-gia-chi-tiet">
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <span>(<?= $sao5?> lượt)</span>
                </div>
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <span>(<?= $sao4?> lượt)</span>
                </div>
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <span>(<?= $sao3?> lượt)</span>
                </div>
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <span>(<?= $sao2?> lượt)</span>
                </div>
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <span>(<?= $sao1?> lượt)</span>
                </div>

            </div>
            <?php if(isset($_SESSION['user'])){?>
            <a id="write-comment" href="index.php?page=writeComment&id=<?= $sp['id']?>">VIẾT BÀI ĐÁNH
                GIÁ</a>
            <?php }?>
        </div>
    </div>
    <?php
    $products = getRangdomProduct();
    $productOutput ='';
    ?>
    <div id="trade">
        <h2 style="width: 1200px; margin: auto;">Sản phẩm liên quan</h2>
        <div class="products">
            <?php
        foreach ($products as $item) {
            extract($item);
            if($sale_price != null){
            $productOutput .= '
            <div class="product">
            <input type="hidden" value="'.$id.'" name="id_product" class="id-product">
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
                <button class="add-to-card" name="addToCard">Thêm vào Giỏ hàng</button>
            </div>
            </div>
            ';}else{
                $productOutput .= '
            <div class="product">
            <input type="hidden" value="'.$id.'" name="id_product" class="id-product">
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
                <button class="add-to-card" name="addToCard">Thêm vào Giỏ hàng</button>
            </div>
            </div>
            ';
            }
        }
        echo $productOutput;
        ?>
        </div>
    </div>
</div>
<script>
let slElement = document.querySelector('.giatri')
let giamElement = document.querySelector('.giam')
let tangElement = document.querySelector('.tang')
let slValue = document.getElementById('sldetail').value
let valueSL = 1
if (valueSL == 1) {
    giamElement.style.opacity = '0.5'
    giamElement.style.cursor = 'not-allowed'
} else {
    giamElement.style.opacity = '1'
    
}

function giam() {
    if (valueSL > 1) {
        giamElement.style.opacity = '1'
        valueSL -= 1
        slElement.innerHTML = valueSL
        slValue = valueSL
    }
    if (valueSL == 1) {
        giamElement.style.opacity = '0.5'
        giamElement.style.cursor = 'not-allowed'
    }else{
        giamElement.style.opacity = '1'
        giamElement.style.cursor = 'pointer'
    }
}

function tang() {
    valueSL += 1
    slElement.innerHTML = valueSL
    slValue = valueSL
    if (valueSL == 1) {
        giamElement.style.opacity = '0.5'
        giamElement.style.cursor = 'not-allowed'
    }else{
        giamElement.style.opacity = '1'
        giamElement.style.cursor = 'pointer'
    }
}
</script>
<script>
let addDetail = document.querySelector('.add-detail');
addDetail.addEventListener('click', function(button) {
    let sizeElement = document.getElementsByName('size');
    let countSL = 0;
    let countSLElement = document.getElementById("countSL");
    let size = ''
    if (localStorage.getItem('card')) {
        card = JSON.parse(localStorage.getItem('card'));
        card.forEach(item => {
            countSL += Number(item['sl'])
        })
    } else {
        card = [];
    }
    countSLElement.innerHTML = countSL
    for (let i = 0; i < sizeElement.length; i++) {
        if (sizeElement[i].checked) {
            size = sizeElement[i].value
        }
    }
    if (size == '') {
        alert('Vui lòng chọn Size');
    } else {
        let productElement = button.target.parentElement.parentElement;
        let img = document.querySelector('.img-pro img').getAttribute('src');
        let name = productElement.querySelector('.name-pro').innerText;
        let idProduct = productElement.querySelector('.id-product').value;
        let price;
        let pricePro = productElement.querySelector('.price-pro').getAttribute('data-price');
        let salePrice = productElement.querySelector('.sale-price-pro').getAttribute('data-price');
        let sl = document.querySelector('.giatri').innerText;
        if (salePrice === '' || salePrice === null) {
            price = pricePro
        } else {
            price = salePrice
        }
        product = {
            'id': idProduct,
            'img': img,
            'name': name,
            'size': size,
            'price': price,
            'sl': sl
        }
        countSL = Number(countSL) + Number(sl)
        countSLElement.innerHTML = countSL
        let check = card.find(c => c.id == idProduct && c.size == size)
        if (check) {
            check.sl = Number(check.sl) + Number(sl)
        } else {
            card.push(product)
        }
        console.log(card)
        localStorage.removeItem('card')
        localStorage.setItem('card', JSON.stringify(card))
    }
});
</script>