<?php
    $noteVoucher = '';
    $myvouchershow='';
    $allvouchershow='';
    $today = strtotime('today');
    foreach($myvoucher as $item){
        extract($item);
        if($trang_thai == 0 && $today >= strtotime($ngay_ap_dung) && $today <= strtotime($ngay_ket_thuc)){
        $myvouchershow .= '<div class="item-voucher">
        <div class="code">'.$code.'</div>
        <div class="value">Giảm '.number_format($value, 0, '.', ',').'đ</div>
        <div class="ap-dung">Áp dụng từ <span>'.date('d-m-Y',strtotime($ngay_ap_dung)).'</span> đến <span>'.date('d-m-Y',strtotime($ngay_ket_thuc)).'</span></div>
        </div>';
        }
    }
    if($myvouchershow == ''){
        $noteVoucher ='Bạn không có Voucher nào';
    }else{
        $noteVoucher = '';
    }
    foreach($allvoucher as $item){
        extract($item);
        if($today >= strtotime($ngay_ap_dung) && $today <= strtotime($ngay_ket_thuc) && $sl > 0){
            $allvouchershow.='
            <div class="item-voucher">
        <div class="code">'.$code.'</div>
        <div class="value">Giảm '.number_format($value, 0, '.', ',').'đ</div>
        <div class="so-luong">Còn <span>'.$sl.'</span></div>
        <div class="ap-dung">Áp dụng từ <span>'.date('d-m-Y',strtotime($ngay_ap_dung)).'</span> đến <span>'.date('d-m-Y',strtotime($ngay_ket_thuc)).'</span></div>
        <form action="index.php?page=myvoucher" method="post" class="get-item">
            <input type="hidden" value="'.$id.'" name="id_voucher">
            <input type="submit" name="get_voucher" value="Nhận">
        </form>
    </div>
            ';
        }
    }

?><h2 style="margin-top: 150px">Voucher Của Tôi</h2>
<div id="my-voucher">
    <?=$myvouchershow?>

</div>
<?php
    if($noteVoucher !=''){
        echo '<div style="text-align: center; color: #ccc">'.$noteVoucher.'</div>';
    }
    ?>
<h2 style="margin-top: 50px">Nhận thêm ưu đãi</h2>
<div id="get-voucher" style="margin-bottom: 100px">
    <?= $allvouchershow?>
</div>