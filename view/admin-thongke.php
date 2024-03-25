<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 ">
            <div class="card text-bg-info mb-3 " style="max-width: 40rem;">
                <div class="card-body rounded-1" style="color: #ffffff; background-color: #2eb85c;">
                    <h5 class="card-text m-0">Tổng Doanh Thu</h5>
                    <br>
                    <h5 class="card-title"><?= number_format($doanhthu, 0, '.', ',')?> VNĐ</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-info mb-3 " style="max-width: 40rem;">
                <div class="card-body rounded-1" style="color: #ffffff; background-color: rgb(32, 42, 228);">
                    <h5 class="card-text m-0">Số Sản Phẩm Hiện Có</h5>
                    <br>
                    <h5 class="card-title"><?= $sosanpham?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container ">
    <div class="row mt-3">
        <div class="col-md-4 ">
            <div class="card text-bg-info mb-3 " style="max-width: 25rem;">
                <div class="card-body rounded-1" style="color: #ffffff; background-color: rgb(32, 42, 228);">
                    <h5 class="card-text m-0">Số Danh Mục Sản Phẩm</h5>
                    <br>
                    <h5 class="card-title"><?=$countcata?> </h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-bg-info mb-3 " style="max-width: 25rem;">
                <div class="card-body rounded-1" style="color: #ffffff; background-color: #e55353;">
                    <h5 class="card-text m-0">Số Người Dùng Đăng Ký</h5>
                    <br>
                    <h5 class="card-title"><?=$countuser?> </h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-bg-info mb-3 " style="max-width: 25rem;">
                <div class="card-body rounded-1" style="color: #ffffff; background-color: #2eb85c;">
                    <h5 class="card-text m-0">Số Đơn Hàng</h5>
                    <br>
                    <h5 class="card-title"><?=$countbill?> </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row mt-1 mb-1">
            <h2> 3 Sản phẩm hot nhất </h2>
            <div class="container">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th class="">Tên</th>
                            <th>Giá</th>
                            <th>Giá giảm</th>
                            <th>Danh mục</th>
                            <th>Lượt mua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($top3 as $item):?>


                        <tr>
                            <td class="d-flex justify-content-center">
                                <div class=" align-middle d-flex justify-content-center"
                                    style="overflow:hidden; width: 100px; height: 100px;">
                                    <img src="img/<?=$item['img']?>" style="height: 100%;" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="product-info-group">
                                    <?=$item['name']?>
                                </div>
                            </td>
                            <td>
                                <div class="product-info-group">
                                    <?= 
                                    number_format($item['price'], 0, '.', ',')?>VND
                                </div>
                            </td>
                            <td>
                                <div class="product-info-group">
                                    <?= ($item['sale_price']=='')?number_format($item['price'], 0, '.', ','):number_format($item['sale_price'], 0, '.', ',')?>
                                    VND
                                </div>
                            </td>
                            <td>
                                <div class="product-info-group">
                                    <?php
                                        switch ($item['id_catalog']){
                                            case '1':
                                                echo 'Áo Thun';
                                                break;
                                                case '2':
                                                    echo 'Quần';
                                                    break;
                                                    case '3':
                                                        echo 'Jacket';
                                                        break;
                                                        case '4':
                                                            echo 'Phụ Kiện';
                                                            break;
                                        }
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div class="product-info-group">
                                    <?=$item['luot_mua']?>
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

</div>
</div>
</div>
</div>