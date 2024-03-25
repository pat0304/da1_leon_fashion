<?php
    $show_bill = '';
    foreach ($all_items_bill as $item) {
        extract($item);
        if($status == 0){
            $trangthaidonhang = 'Chờ xác nhận';
        }else if($status == 1){
            $trangthaidonhang = 'Đã xác nhận';
        }else if($status == -1){
            $trangthaidonhang = 'Đã hủy';
        }else if($status == 2){
            $trangthaidonhang = 'Đang vận chuyển';
        }else if($status == 3){
            $trangthaidonhang = 'Giao hàng thành công';
        }
        if($status == -1){
            $btn = '<button><a href="index.php?page=historycard&action=buyagain&dh='.$id.'">Mua lại</a></button>';
        }else if($status == 0){
            $btn = '<button onclick="return sure()"><a href="index.php?page=historycard&action=del&dh='.$id.'">Hủy</a></button>';
        }
        else {
            $btn = '<button id="vohieu" disapled>Hủy</button>';
        }
        $show_bill .=   '<tr>
        <td><a href="index.php?page=billdetail&dh='.$id.'">DH'.$id.'</a></td>
        <td>'.number_format($total,0, '.',',').' VNĐ</td>
        <td>'.date('H:i:s d-m-Y', strtotime($ngay_dat_hang)).'</td>
        <td>'.$trangthaidonhang.'</td>
        <td>'.$btn.'</td>
    </tr>';
    }
?>

<div id="history-card" style="margin-top: 150px">
    <h2 style="margin-bottom: 50px">Lịch sử mua hàng</h2>
    <table>
        <?php
    if(count($all_items_bill)>0){ 
    ?>
        <thead>
            <th>Mã đơn hàng</th>
            <th>Thành tiền</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </thead>
        <?= $show_bill?>
        <?php }else{?>
        <p>Không có đơn hàng nào</p>
        <?php }?>
    </table>
</div>
<script>
function sure() {
    let noteSure = confirm('Bạn có thật sự muốn hủy đơn không?');
    if (noteSure) {
        return true;
    } else {
        return false;
    }
}
</script>