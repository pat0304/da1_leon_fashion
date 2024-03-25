<?php 
require_once 'pdo.php';
/* ------------------ Voucher -------------------- */
function get_all_voucher($id_user){
    $sql = "SELECT * FROM voucher WHERE id NOT IN (SELECT id_voucher FROM voucher_detail WHERE id_user = ?)";
    return pdo_query($sql, $id_user);
}
function get_all_my_voucher($id_user){
    $sql = "SELECT * FROM voucher INNER JOIN voucher_detail ON voucher.id = voucher_detail.id_voucher WHERE voucher_detail.id_user = ?;
";
    return pdo_query($sql,$id_user);
}
function update_sl_voucher($id_voucher){
    $sql = "UPDATE voucher SET sl = sl - 1 WHERE id = ?"; 
    pdo_execute($sql,$id_voucher);
}
function get_voucher_user($id){
    $sql = "SELECT * FROM voucher WHERE id = ?";
    return pdo_query_one($sql,$id);
}
function get_voucher_by_id($id){
    $sql = "SELECT value FROM voucher WHERE id = ?";
    return pdo_query_value($sql,$id);
}
function get_id_voucher_detail($id_user, $id_voucher){
    $sql = 'SELECT id FROM voucher_detail WHERE id_user = ? and id_voucher = ?';
    return pdo_query_value($sql, $id_user, $id_voucher);
}
function used_voucher($id_voucher_detail){
    $sql = 'UPDATE voucher_detail SET trang_thai = 1 WHERE id = ?';
    pdo_execute($sql, $id_voucher_detail);
}
function insert_voucher_detail($id_voucher, $id_user) {
    $sql = 'INSERT INTO voucher_detail (id_voucher, id_user, trang_thai) VALUES (?, ?, 0)';
    pdo_execute($sql, $id_voucher, $id_user);
}
/* ------------------ Bill -------------------- */
function get_all_bill_by_id_user($id_user) {
    $sql = 'SELECT * FROM `bill` WHERE id_user = ? ORDER BY id DESC';
    return pdo_query($sql,$id_user);
}