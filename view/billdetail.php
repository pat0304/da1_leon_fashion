<?php 
switch($item_bill['status']){
    case -1:
        $trangthaidonhang = 'Đã hủy';
        break;
        case 0:
            $trangthaidonhang = 'Chờ xác nhận';
            break;
            case 1:
                $trangthaidonhang = 'Đã xác nhận';
                break;
                case 2:
                    $trangthaidonhang = 'Đang vận chuyển';
                    break;
                    case 3:
                        $trangthaidonhang = 'Giao hàng thành công';
                        break;
}
$total_price = 0;
    $show_bill_details = '';
    foreach($all_items_bill_detail as $item){
        extract($item);
        if($sale_price != null){
            $price_output = $sale_price;
        }else{
            $price_output = $price;
        }
        $show_bill_details .= '<tr>
        <td class="infor-product"><img src="img/'.$img.'" alt="">
            <div class="product">
                <div class="name">'.$name.'</div>
                <div class="size">Size: '.$size.'</div>
                <div class="price">'.number_format($price_output, 0, '.', ',').' VNĐ</div>
            </div>
        </td>
        <td>'.$sl.'</td>
        <td class="thanhtien">'.number_format($sl * $price_output, 0, '.', ',').' VNĐ</td>
        </tr>';
        $total_price += $sl * $price_output;
    }
?>
<h2 style="margin-top: 150px">Chi tiết đơn hàng #DH<?= $id_dh?></h2>
<div id="bill-detail">
    <table>
        <thead>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </thead>
        <?= $show_bill_details?>
    </table>
    <div id="bill">
        <div class="item-bill">
            <div class="text-bill ">Tổng cộng:
                <span><?= number_format(($item_bill['total'] + $voucher_value), 0, '.', ',')?>
                </span>
            </div>
        </div>
        <div class="item-bill">
            <div class="text-bill total-bill">Voucher:
                <span><?= number_format($voucher_value, 0, '.', ',')?></span>
            </div>
        </div>
        <div class="item-bill" style="border-radius: 0 0 8px 8px;">
            <div class="text-bill total-bill">Thành tiền (VNĐ):
                <span style="font-size: 16px;"><?= number_format($item_bill['total'], 0, '.', ',')?></span>
            </div>
        </div>
        <div class="name item-bill" style="border-radius: 8px 8px 0 0;
        margin-top: 10px">
            <div class="text-bill ">Họ tên: <span><?= $item_bill['fullname']?></span></div>
        </div>
        <div class="sdt item-bill">
            <div class="text-bill ">Số điện thoại: <span><?= $item_bill['sdt']?></span></div>
        </div>
        <div class="dia-chi item-bill">
            <div class="text-bill ">Địa chỉ: <span><?= $item_bill['location']?></span></div>
        </div>
        <div class="ngay-dat-hang item-bill">
            <div class="text-bill ">Ngày đặt hàng:
                <span><?= date('d/m/Y',strtotime($item_bill['ngay_dat_hang']))?></span>
            </div>
        </div>
        <?php
                if($item_bill['ngay_du_kien'] != null && $trangthaidonhang != 'Đã hủy'){
            ?>
        <div class="ngay-du-kien item-bill">
            <div class="text-bill ">
                <?php
                    if($trangthaidonhang == 'Giao hàng thành công'){
                ?>
                Ngày giao hàng: <?php }else{?>
                Ngày dự kiến: <?php }?>
                <span><?= date('d/m/Y',strtotime($item_bill['ngay_du_kien']))?></span>
            </div>
        </div><?php }?>
        <div class="trang-thai item-bill">
            <div class="text-bill ">Trạng thái: <span><?= $trangthaidonhang?></span></div>
        </div>
    </div>
</div>
</div>