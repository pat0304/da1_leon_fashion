<div class="product-box">
                <div class="btn-box">
                    <h2>Đơn hàng </h2>
                    <a href="#"><button class="btn-add">Thêm</button></a>
                </div>
            </div>
            <div class="container">
            <table class="table text-center align-middle">
                        <thead>
                            <tr>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($bill_detail['bill_detail'] as $bill_detail): ?> 
                            <tr>
                                <td class="d-flex justify-content-center">
                                    <div class=" align-middle d-flex justify-content-center"  style="overflow:hidden; width: 100px; height: 100px;">
                                        <img src="img/<?= $bill_detail['img'] ?>" style="height: 100%;"  alt="">
                                    </div>
                                    
                                </td>
                                <td>
                                    <div class="product-info-group">
                                        <?= $bill_detail['name']?>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info-group">
                                        <?= $bill_detail['size']?>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info-group">
                                        <?= $bill_detail['sl'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info-group">
                                        <?= $bill_detail['price'] ?>
                                    </div>
                                </td>
                                <td >
                                <div class="product-info-group">
                                        <?= $bill_detail['thanhtien'] ?>
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