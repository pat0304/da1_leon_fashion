<h2 style="margin-top: 150px;  text-align: center;font-size: 30px;">Giỏ Hàng</h2>
<div id="card">
    <table>

    </table>
    <div id="pay">
        <div id="general-pay">
            <div class="total item-bill">Tổng tiền: <span class="total-price"></span></div>
            <?php if(isset($_SESSION['user'])){?>
            <?php if($valueVoucher !=0){ ?>
            <div class="voucher item-bill">Mã giảm giá: <span
                    class="value-voucher">-<?=number_format($valueVoucher['value'], 0, '.', ',');?></span>
                <input type="hidden" id="gia-tri-voucher" value="<?=$valueVoucher['value']?>">
            </div>
            <?php }else{?>
            <div class="voucher item-bill">Mã giảm giá: <span class="value-voucher"
                    style="font-size: 10px; color: #7B716D;">Chưa
                    nhập mã Voucher</span>
            </div>
            <?php }}else{?>
            <div class="voucher item-bill">Mã giảm giá: <span class="value-voucher"><a href="index.php?page=login"
                        style="text-decoration: underline; color: blue;">Đăng
                        nhập để nhận ưu đãi</a></span>
            </div>
            <?php }?>
            <div class="total-thanh-toan item-bill">Thanh toán (VNĐ): <span id="tongtien"></span></div>
            <?php if(isset($_SESSION['user'])){?>
            <form action="index.php?page=card" method="post" id="add-voucher">
                <?php
                    $today = strtotime('today');
                    $selectvouchershow ='';
                    $selectvoucher = get_all_my_voucher($_SESSION['user']['id']);
                    foreach($selectvoucher as $item){
                        extract($item);
                        if($trang_thai == 0 && $today >= strtotime($ngay_ap_dung) && $today <= strtotime($ngay_ket_thuc)){
                        $selectvouchershow .= '
                        <option value="'.$id_voucher.'">'.$code.': Giảm '.number_format($value, 0, '.',',').'</option>';
                        }
                    }
                ?>
                <select name="voucher-input" id="">
                    <option value="">Chọn Voucher</option>
                    <?= $selectvouchershow?>
                </select>
                <input type="submit" name="voucher-input-submit" value="Áp dụng">
            </form>
            <?php }?>
        </div>
        <form action="index.php?page=card" class="dulieu" method="POST">
            <input type="hidden" name="AllItemsCard" id="AllItemsCard">


            <input type="hidden" id="total" name="total" value="">
            <?php if(isset($_SESSION['user'])){?>
            <?php if($valueVoucher!=0){?>
            <input type="hidden" name="id_voucher" value="<?=$valueVoucher['id']?>">
            <?php }else{?>
            <input type="hidden" name="id_voucher" value="0">
            <?php } ?>
            <?php } ?>
            <br>
            <input type="submit" name="pay" class="pay" value="Thanh Toán">
        </form>
    </div>
</div>