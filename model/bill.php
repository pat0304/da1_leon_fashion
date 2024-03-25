<?php 
require_once 'pdo.php';
function insert_new_bill_with_user_and_voucher($id_user, $fullname, $sdt, $location, $total, $id_voucher){
    $sql = "INSERT INTO bill (id_user, fullname, total, sdt, location, id_voucher) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $id_user, $fullname, $total, $sdt, $location, $id_voucher);
}
function insert_new_bill_with_user_no_voucher($id_user, $fullname, $sdt, $location, $total){
    $sql = "INSERT INTO bill (id_user, fullname, total, sdt, location) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $id_user, $fullname, $total, $sdt, $location);
}
function insert_new_bill_not_user($fullname, $sdt, $location, $total){
    $sql = "INSERT INTO bill (fullname, total, sdt, location) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $fullname, $total, $sdt, $location);
}
function get_id_new_bill(){
    $sql = "SELECT id FROM bill ORDER BY id DESC LIMIT 1";
    return pdo_query_value($sql);
}
function get_bill_by_id($id_bill){
    $sql = "SELECT * FROM bill where id = ?";
    return pdo_query_one($sql, $id_bill);
}
function insert_bill_detail($id_bill, $id_sp, $sl, $size, $price){
    $sql = "INSERT INTO bill_detail (id_bill, id_product, size, sl, price) VALUES(?, ?, ?, ?, ?)";
    pdo_execute($sql, $id_bill, $id_sp, $size, $sl, $price);
}
function update_status($id, $status){
    $sql = "UPDATE bill SET status = ? WHERE id = ?";
    pdo_execute($sql, $status, $id);
}
function get_bill_detail($id){
    $sql = 'SELECT * FROM `bill_detail` INNER JOIN products ON bill_detail.id_product = products.id WHERE id_bill = ?';
    return pdo_query($sql, $id);
}