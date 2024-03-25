<?php 
require_once 'pdo.php';

function getCatalog(){
    $sql = "SELECT * from catalog order by id";
    return pdo_query($sql);
}
function getNameCatalog($id){
    $sql = "SELECT name from catalog where id = $id";
    return pdo_query_value($sql);
}
function getAllProducts($sap_xep){
    switch ($sap_xep){
        case 1:
            $orderby = " order by name ASC";
            break;
        case 2:
            $orderby = " order by name DESC";
            break;
        case 3:
            $orderby = " order by price ASC";
            break;
        case 4:
            $orderby = " order by price DESC";
            break;
            case 5:
                $orderby = " order by sale_price DESC";
                break;
        default:
            $orderby = '';
        break;
    }
    $sql = "SELECT * FROM products ".$orderby;
    return pdo_query($sql);
}
function getProductById($id){
    $sql = "SELECT * FROM products WHERE id = ?";
    return pdo_query_one($sql, $id);
}
function getProductsByCatalog($id_catalog, $sap_xep) {
    
    switch ($sap_xep){
        case 1:
            $orderby = " order by name ASC";
            break;
        case 2:
            $orderby = " order by name DESC";
            break;
        case 3:
            $orderby = " order by price ASC";
            break;
        case 4:
            $orderby = " order by price DESC";
            break;
            case 5:
                $orderby = " order by sale_price DESC";
                break;
        default:
            $orderby = '';
        break;
    }
    $sql = "SELECT * FROM products where id_catalog = $id_catalog ".$orderby;
    return pdo_query($sql);
}
function getRangdomProduct(){
    $sql = "SELECT * FROM products
    ORDER BY RAND()
    LIMIT 4";
    return pdo_query($sql);
}
function getProductsBST($bst){
    $sql = "SELECT * FROM products WHERE bst = $bst limit 4";
    return pdo_query($sql);
}
function getProductsNew($limit){
    $sql = "SELECT * FROM products ORDER BY id desc LIMIT $limit";
    return pdo_query($sql);
}
function find_products($name){
    $sql = "SELECT * FROM products WHERE name LIKE '%".$name."%'
    ";
    return pdo_query($sql);
}

function show_products($products){
    $productOutput='';
        foreach ($products as $item) {
            extract($item);
            if($sale_price != null){
            $productOutput .= '
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
                <button class="buy" name="buy">Mua Ngay</button>
                <button class="add-to-card" name="addToCard">Thêm Giỏ Hàng</button>
            </div>
            </div>
            ';}else{
                $productOutput .= '
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
                <button class="buy" name="buy">Mua Ngay</button>
                <button class="add-to-card" name="addToCard">Thêm Giỏ Hàng</button>
            </div>
            </div>
            ';
            }
        }
        echo $productOutput;
}

//Comment
function insert_comment($id_user, $id_product, $star, $content){
    $sql = "INSERT INTO comment (id_user, id_product, rating, content) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $id_user, $id_product, $star, $content);
}
function get_comments($id_product, $limit){
    if($limit == 0){
        $sql = "SELECT * FROM comment WHERE id_product = ? ORDER BY ngay_comment Desc";
    }else{
    $sql = "SELECT * FROM comment WHERE id_product = ? ORDER BY ngay_comment Desc LIMIT ".$limit;}
    return pdo_query($sql, $id_product);
}
function get_rating($id_product, $star){
    $sql = "SELECT COUNT(rating) AS sao FROM `comment` WHERE id_product = ? AND rating = ? GROUP BY rating";
    return pdo_query_value($sql, $id_product, $star);
}
function get_avg_rating($id_product){
    $sql = "SELECT AVG(rating) AS star FROM `comment` WHERE id_product = ? GROUP BY id_product";
    return pdo_query_value($sql, $id_product);
}
function get_so_luong_comment($id_product){
    $sql = "SELECT COUNT(id_user) as star FROM `comment` WHERE id_product= ? GROUP BY id_product";
    return pdo_query_value($sql, $id_product);
}
// admin

function add_Product($name, $img, $price, $sale_price, $mo_ta, $id_catalog){
    $sql = "INSERT INTO products (name, img, price, sale_price, mo_ta, id_catalog) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $name, $img, $price, $sale_price, $mo_ta, $id_catalog);
}
function edit_Product($name, $img, $price, $sale_price, $mo_ta, $id_catalog, $id){
    $sql = "UPDATE products SET name=?, img=?, price=?, sale_price=?, mo_ta=?, id_catalog=? WHERE id=?";
    pdo_execute($sql, $name, $img, $price, $sale_price, $mo_ta, $id_catalog, $id);
}
function delete_Product($id){
    $sql ="DELETE FROM products WHERE id=?";
    pdo_execute($sql, $id);
}


function add_Catalog($name){
    $sql = "INSERT INTO catalog (name) VALUES (?)";
    pdo_execute($sql, $name);
}
function edit_Catalog($name, $id){
    $sql = "UPDATE catalog SET name=? WHERE id=?";
    pdo_execute($sql, $name, $id);
}
function delete_Catalog($id){
    $sql ="DELETE FROM catalog WHERE id=?";
    pdo_execute($sql, $id);
}


// voucher

function show_voucher(){
    $sql = 'SELECT * FROM voucher';
    return pdo_query($sql);
}
function getVouchertById($id){
    $sql = "SELECT * FROM voucher WHERE id = ?";
    return pdo_query_one($sql, $id);
}
function add_voucher($code, $value, $sl, $ngay_ap_dung, $ngay_ket_thuc){
    $sql = "INSERT INTO voucher (code, value, sl, ngay_ap_dung, ngay_ket_thuc) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $code, $value, $sl, $ngay_ap_dung, $ngay_ket_thuc);
}
function edit_voucher($code, $value, $sl, $ngay_ap_dung, $ngay_ket_thuc, $id){
    $sql = "UPDATE voucher SET code=?, value=?, sl=?, ngay_ap_dung=?, ngay_ket_thuc=? WHERE id=?";
    pdo_execute($sql, $code, $value, $sl, $ngay_ap_dung, $ngay_ket_thuc, $id);
}
function delete_voucher($id){
    $sql ="DELETE FROM voucher WHERE id=?";
    pdo_execute($sql, $id);
}

// thong ke
function get_top_3_product(){
    $sql = "SELECT id_product, img, id_catalog, name, products.price, sale_price, SUM(sl) as luot_mua FROM bill_detail INNER JOIN products ON bill_detail.id_product = products.id INNER JOIN bill ON bill_detail.id_bill = bill.id WHERE bill.status = 3 GROUP BY id_product ORDER BY luot_mua DESC LIMIT 3";
    return pdo_query($sql);
}

function count_cata(){
    $sql = 'SELECT COUNT(*) FROM catalog';
    return pdo_query_value($sql);
}

function count_user(){
    $sql = 'SELECT COUNT(*) FROM user WHERE role = 0';
    return pdo_query_value($sql);
}
function count_bill(){
    $sql = 'SELECT COUNT(*) FROM bill WHERE status = 3';
    return pdo_query_value($sql);
}
function get_ngay_du_kien(){
    $sql = "UPDATE bill SET ngay_du_kien = (SELECT DATE_ADD(ngay_dat_hang, INTERVAL 5 DAY)) WHERE status = 1;";
    pdo_execute($sql);
}

function doanh_thu(){
    $sql = "SELECT SUM(total) FROM bill WHERE status = 3";
    return pdo_query_value($sql);
}

function so_san_pham(){
    $sql = "SELECT count(id) FROM products";
    return pdo_query_value($sql);
}
// phan trang 
function get_products($start=0,$limit=0){
    $sql ="SELECT * FROM products ";
    if ($limit > 0) {
        $sql .= " LIMIT $start ,$limit";
    }
    return pdo_query($sql);
}
// bill

function show_bill(){
    $sql = 'SELECT * FROM bill ORDER BY id DESC';
    return pdo_query($sql);
}
function xacnhan($id) {
    $sql = 'UPDATE bill SET status = 1 WHERE id=?';
    pdo_execute($sql, $id);
}
function vanchuyen($id) {
    $sql = 'UPDATE bill SET status = 2 WHERE id=?';
    pdo_execute($sql, $id);
}
function hoantat($id) {
    $sql = 'UPDATE bill SET status = 3 WHERE id=?';
    pdo_execute($sql, $id);
}
function huydon($id) {
    $sql = 'UPDATE bill SET status = -1 WHERE id=?';
    pdo_execute($sql, $id);
}

// 
function show_bill_detail($id){
    $sql = 'SELECT *, bill_detail.price, (bill_detail.price*sl) as thanhtien  FROM bill_detail INNER JOIN products ON bill_detail.id_product = products.id WHERE id_bill =?';
    return pdo_query($sql,$id);
}

function delete_comment($id){
    $sql ="DELETE FROM comment WHERE id=?";
    pdo_execute($sql, $id);
}

function comment(){
    $sql = 'SELECT  products.img, products.name, fullname, content , ngay_comment, comment.id FROM comment INNER JOIN products ON comment.id_product = products.id INNER JOIN user ON user.id = comment.id_user ORDER BY ngay_comment DESC';
    return pdo_query($sql);
}
// tu dong huy don khi qua ngay 
function check_bill(){
    $sql = 'UPDATE bill SET status = -1 WHERE ngay_du_kien < CURDATE() AND status != 1 AND status != 3 AND status != 0';
    return pdo_query($sql);
}