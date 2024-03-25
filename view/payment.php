<div id="payment-page" style="margin-top: 150px;">
    <h2 style="margin-bottom: 30px">XÁC NHẬN THÔNG TIN</h2>
    <form action="index.php?page=payment" method="post" id="payment">
        <div class="pay-information">
            <h3>Thông tin khách hàng</h3>
            <?php 
        if(isset($_SESSION['user'])) {
        ?>
            <div class="name">
                <label for="fullname">Họ và tên:</label>
                <input type="text" value="<?=$_SESSION['user']['fullname']?>" name="getFullname" id="fullname" required>
            </div>
            <div class="sdt">
                <label for="updateSDT">Số điện thoại:</label>
                <input type="tel" value="<?=$_SESSION['user']['sdt']?>" name="getSDT" id="getSDT" required>
            </div>
            <div class="location">
                <label for="updateLocation">Địa chỉ:</label>
                <input type="text" value="<?=$_SESSION['user']['location']?>" name="getLocation" id="getLocation"
                    required>
            </div><?php }else{?>
            <div class="name">
                <label for="fullname">Họ và tên:</label>
                <input type="text" value="" name="getFullname" id="fullname" required>
            </div>
            <div class="sdt">
                <label for="updateSDT">Số điện thoại:</label>
                <input type="tel" value="" name="getSDT" id="getSDT" required>
            </div>
            <div class="location">
                <label for="updateLocation">Địa chỉ:</label>
                <input type="text" value="" name="getLocation" id="getLocation" required>
            </div>
            <?php }?>
            <input onclick="remove()" type="submit" name="payment" value="Xác nhận đơn hàng">
        </div>
        <div class="chotdon">
            <h3>Thanh toán</h3>
            <div id="bill">
                <?php if($_SESSION['card_details']['id_voucher']!= 0){ $giatri = get_voucher_by_id($_SESSION['card_details']['id_voucher']); ?>
                <div class="item-bill">
                    <div class="text-bill ">Tổng cộng:
                        <span><?= number_format($giatri + $_SESSION['card_details']['thanhtoan'], 0, '.', ',')?>
                        </span>
                    </div>
                </div>
                <div class="item-bill">
                    <div class="text-bill ">Voucher:
                        <span>- <?= number_format($giatri, 0, '.', ',') ?></span>
                    </div>
                </div>
                <div class="item-bill">
                    <div class="text-bill total-bill">Thành tiền (VNĐ):
                        <span><?= number_format($_SESSION['card_details']['thanhtoan'], 0, '.', ',')?></span>
                    </div>
                </div>
                <?php }else{?>
                <div class="item-bill">
                    <div class="text-bill ">Tổng cộng:
                        <span><?= number_format($_SESSION['card_details']['thanhtoan'], 0, '.', ',')?>
                        </span>
                    </div>
                </div>
                <div class="item-bill">
                    <div class="text-bill total-bill">Voucher:
                        <span>0</span>
                    </div>
                </div>
                <div class="item-bill">
                    <div class="text-bill total-bill">Thành tiền (VNĐ):
                        <span><?= number_format($_SESSION['card_details']['thanhtoan'], 0, '.', ',')?></span>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
</div>
</form>
</div>
<script>
function remove() {
    localStorage.removeItem('card');
}
</script>