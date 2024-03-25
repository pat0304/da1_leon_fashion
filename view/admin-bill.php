<div class="product-box">
    <div class="btn-box">
        <h2>Đơn hàng </h2>
    </div>
</div>
<div class="container">
    <table class="table text-center align-middle">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khàch hàng</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Tình trạng</th>
                <th>Tùy chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bill['bill'] as $bill): ?>
            <tr>
                <td>
                    <?= $bill['id']?>
                </td>
                <td>
                    <div class="product-info-group">
                        <?= $bill['fullname']?>
                    </div>
                </td>
                <td>
                    <div class="product-info-group">
                        <?= $bill['sdt']?>
                    </div>
                </td>
                <td>
                    <div class="product-info-group">

                        <?= $bill['total'] ?> VND
                    </div>
                </td>
                <td>
                    <div class="product-info-group">
                        <?php
                                        switch ($bill['status']) {
                                            case '0':
                                                echo 'Chờ xác nhận';
                                                break;
                                            case '1':
                                                echo 'Đã xác nhận';
                                                break;
                                            case '2':
                                                echo 'Đang vận chuyển';
                                                break;
                                            case '3':
                                                echo 'Giao hàng thành công';
                                                break;
                                            default:
                                                echo 'Hủy đơn';
                                                break;
                                        }
                                        ?>
                    </div>
                </td>
                <td class="d-flex justify-content-center">

                    <div class="dropdown-center">
                        <button class="btn btn-light dropdown-toggle p-1" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Chọn trạng thái
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                                        switch ($bill['status']) {  
                                            case '0':
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill&loai=xacnhan&id='.$bill['id'].'">Xác nhận</a></li>';
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill&loai=huydon&id='.$bill['id'].'">Hủy đơn</a></li>';
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill-detail&id='.$bill['id'].'">Chi tiết đơn hàng</a></li>';
                                                break;
                                            case '1':
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill&loai=vanchuyen&id='.$bill['id'].'">Vận chuyển</a></li>';
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill&loai=hoantat&id='.$bill['id'].'">Hoàn tất</a></li>';
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill&loai=huydon&id='.$bill['id'].'">Hủy đơn</a></li>';
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill-detail&id='.$bill['id'].'">Chi tiết đơn hàng</a></li>';
                                                break;
                                            case '2':
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill&loai=hoantat&id='.$bill['id'].'">Hoàn tất</a></li>';
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill&loai=huydon&id='.$bill['id'].'">Hủy đơn</a></li>';
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill-detail&id='.$bill['id'].'">Chi tiết đơn hàng</a></li>';
                                                break;
                                            default:
                                                echo '<li><a class="dropdown-item" href="admin.php?page=bill-detail&id='.$bill['id'].'">Chi tiết đơn hàng</a></li>';
                                                break;
                                        }
                                        ?>
                        </ul>
                    </div>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>