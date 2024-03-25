<?php
require_once "pdo.php";
function register($username, $pass, $fullname, $email, $sdt){
    $sql = "INSERT INTO user (username, pass, fullname, email, sdt) VALUES (?, md5(?), ?, ?, ?)";
    pdo_execute($sql, $username, $pass, $fullname, $email, $sdt);
}
function updateUser($id, $fullname, $email, $sdt, $location){
    $sql = "UPDATE user SET fullname = ?, email = ?, sdt = ?, location = ? WHERE id = ?";
    pdo_execute($sql, $fullname, $email, $sdt, $location, $id);
}
function updateUserWithImg($id, $fullname, $email, $sdt, $location, $img){
    $sql = "UPDATE user SET fullname = ?, email = ?, sdt = ?, location = ?, img = ? WHERE id = ?";
    pdo_execute($sql, $fullname, $email, $sdt, $location, $img, $id);
}
function check_login($username, $pass){
    $sql = "SELECT id FROM user WHERE username = ? AND pass =  md5(?)";
    $user = pdo_query_one($sql, $username, $pass);
    if(is_array($user)){
        return $user['id'];
    }else{
        return 0;
    }
}
function get_user($id){
    $sql = 'SELECT * FROM user WHERE id = ?';
    return pdo_query_one($sql, $id);
}
function get_user_full_name($id){
    $sql = 'SELECT fullname FROM user WHERE id = ?';
    return pdo_query_value($sql, $id);
}
function check_username($username){
    $sql = 'SELECT username FROM user WHERE username = ?';
    return pdo_query_value($sql, $username);
}
function check_sdt($sdt){
    $sql = 'SELECT sdt FROM user WHERE sdt = ?';
    return pdo_query_value($sql, $sdt);
}
//admin

function show_user(){
    $sql = 'SELECT * FROM user';
    return pdo_query($sql);
}
function admin_register($username, $pass, $fullname, $img, $email, $sdt, $location, $role){
    $sql = "INSERT INTO user (username, pass, fullname, img, email, sdt, location, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $username, $pass, $fullname, $img, $email, $sdt, $location, $role);
}
function admin_edit_user($username, $pass, $fullname, $img, $email, $sdt, $location, $role, $id){
    $sql = "UPDATE user SET username=?, pass=?, fullname=?, img=?, email=?, sdt=?, location=?, role=? WHERE id=?";
    pdo_execute($sql, $username, $pass, $fullname, $img, $email, $sdt, $location, $role, $id);
}
function delete_user($id){
    $sql ="DELETE FROM user WHERE id=?";
    pdo_execute($sql, $id);
}