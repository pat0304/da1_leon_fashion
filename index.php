<?php 
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_SESSION['user'])&&$_SESSION['user']['role'] == 1){
    header('Location: admin.php');
}else{
include_once './model/pdo.php';
include_once './model/product.php';
include_once './model/user.php';
include_once './model/card.php';
include_once './model/bill.php';
include './view/header.php';
if (isset($_GET['page']) && $_GET['page']){
    $page = $_GET['page'];
    switch ($page) {
    case 'search':
        $note = '';
    if (isset($_POST['search']) && $_POST['search']){
        $searchInput = $_POST['searchInput'];
        $searchOutput = find_products($searchInput);
        if(count( $searchOutput)>0){
            $note = 'Kết quả tìm kiếm của bạn theo từ khóa: "'.$searchInput.'" gồm có '.count( $searchOutput).' sản phẩm';
        }else{
            $note = 'Không tìm thấy sản phẩm nào theo từ khóa: "'.$searchInput.'"';
        }
    }
        include './view/search.php';
        break;
    case 'products':
        $productOutput = '';
        $title = '';
        if(isset($_GET['cata']) && $_GET['cata']){
            $catalog_id = $_GET['cata'];
            if(isset($_POST['orderby']) && $_POST['orderby'] != "")
            $products = getProductsByCatalog($catalog_id, $_POST['orderby']);
            else $products = getProductsByCatalog($catalog_id, 0);
            $title = getNameCatalog($catalog_id);
        }else{
            $title = 'Tất cả sản phẩm';
            if(isset($_POST['orderby']) && $_POST['orderby'] != "")
            $products = getAllProducts($_POST['orderby']);
            else $products = getAllProducts(0);
        }
        include './view/products.php';
        break;
    case 'detail':
            if(isset($_GET['id']) && $_GET['id']!=''){
                $id=$_GET['id'];
                $sp = getProductById($id);
                $comments = get_comments($id, 2);
                $sao5 = get_rating($id, 5);
                $sao4 = get_rating($id, 4);
                $sao3 = get_rating($id, 3);
                $sao2 = get_rating($id, 2);
                $sao1 = get_rating($id, 1);
                $avg = get_avg_rating($id);
                $sl_comments = get_so_luong_comment($id);
            }
        include './view/detail.php';
        break;
    case 'card':
        $voucher_value = 0;
        if(isset($_SESSION['user'])){
        $all_voucher = get_all_my_voucher($_SESSION['user']['id']);
        if(isset($_POST['voucher-input-submit']) && $_POST['voucher-input'] != ''){
            $voucher_input = $_POST['voucher-input'];
            $valueVoucher = get_voucher_user($voucher_input);
            $voucher_value = $valueVoucher['value'];
        }else{
            $valueVoucher = 0;
        }
    }
        if(isset($_POST['pay']) && $_POST['pay']){
            $all_items_card = $_POST['AllItemsCard'];
            $card = json_decode($all_items_card, true);
            $_SESSION['card'] = $card;
            $_SESSION['card_details'] = ['thanhtoan' => $_POST['total'], 'id_voucher' => $_POST['id_voucher']];
            header('location: index.php?page=payment');
        }
        
        include './view/card.php';
        break;
        case 'payment':
            if(isset($_POST['payment']) && $_POST['payment']){
                $fullname =$_POST['getFullname'];
                $sdt = $_POST['getSDT'];
                $location =$_POST['getLocation'];
                $total = $_SESSION['card_details']['thanhtoan'];
                $id_voucher = $_SESSION['card_details']['id_voucher'];
                $id_voucher_detail = get_id_voucher_detail($_SESSION['user']['id'], $id_voucher);
                if(isset($_SESSION['user']) && $id_voucher != 0){
                    $id_user = $_SESSION['user']['id'];
                    insert_new_bill_with_user_and_voucher($id_user,$fullname, $sdt, $location, $total, $id_voucher);
                }else if(isset($_SESSION['user']) && $id_voucher == 0){
                    $id_user = $_SESSION['user']['id'];
                    insert_new_bill_with_user_no_voucher($id_user,$fullname, $sdt, $location, $total);
                }else{
                    insert_new_bill_not_user($fullname, $sdt, $location, $total);
                }
                $id_bill = get_id_new_bill();
                for($i=0; $i <count($_SESSION['card']); $i++){
                    insert_bill_detail($id_bill, $_SESSION['card'][$i]['id'], $_SESSION['card'][$i]['sl'], $_SESSION['card'][$i]['size'], $_SESSION['card'][$i]['price']);
                }
                used_voucher($id_voucher_detail);
                unset($_SESSION['card']);
                unset($_SESSION['card_details']);
                header('location: index.php?page=successPayment');
            }
            include './view/payment.php';
            break;
        case 'register':
            $error = '';
            if(isset($_POST['register']) && $_POST['register']){
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                if(check_sdt($sdt) == 0 && check_username($username) == 0){
                register($username, $password, $fullname, $email, $sdt);
                
                header('location: index.php?page=login');}else{
                    $error = 'Tên đăng nhập hoặc Số điện thoại đã được đăng kí.';
                }
            }
            include './view/register.php';
            break;
    case 'successPayment':
        include './view/pay_success.php';
        break;
    case 'login':
        $error = '';
        if(isset($_POST['login']) && $_POST['login']){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $check_user = check_login($username, $password);
            if($check_user>0){
                $isAdmin = get_user($check_user);
                if($isAdmin['role']==1){
                    $_SESSION['user'] = get_user($check_user);
                    header('Location: admin.php?page=home');
                }else{
                $_SESSION['user'] = get_user($check_user);
                header('Location: index.php');}
            }else{
                $error = 'Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng kiểm tra lại';
            }
        }
        include './view/login.php';
        break;
    case 'user':
        if(isset($_POST['update']) && $_POST['update']){   $updateFullname = $_POST['updateFullname'];
            $updateEmail = $_POST['updateEmail'];
            $updateSDT = $_POST['updateSDT'];
            $updateLocation = $_POST['updateLocation'];
            $updateID = $_SESSION['user']['id'];
            if ($_FILES['updateIMG']['error'] === UPLOAD_ERR_OK){
            $tmp_name = 'upload/'.basename($_FILES['updateIMG']['name']);
            echo $_FILES["updateIMG"]['name'];
            move_uploaded_file($_FILES['updateIMG']['tmp_name'], $tmp_name);
            updateUserWithImg($updateID,$updateFullname, $updateEmail, $updateSDT, $updateLocation, $tmp_name);}
            else{
                updateUser($updateID,$updateFullname, $updateEmail, $updateSDT, $updateLocation);
            }
            $_SESSION['user'] = get_user($_SESSION['user']['id']);
            header('Location: index.php?page=user');
        }
        include './view/user.php';
        break;
    case 'historycard':
        $all_items_bill = get_all_bill_by_id_user($_SESSION['user']['id']);
        if(isset($_GET['action'])){
            $action = $_GET['action'];
            $id_action = $_GET['dh'];
            switch($action){
            case 'buyagain':
                update_status($id_action, 0);
                header('Location: index.php?page=historycard');
                break;
            case 'del':
                update_status($id_action, -1);
                header('Location: index.php?page=historycard');
                break;
            }
        }
        include './view/historycard.php';
        break;
    case 'billdetail':
        if(isset($_GET['dh'])&& $_GET['dh']!=0){
            $id_dh= $_GET['dh'];
            $all_items_bill_detail = get_bill_detail($id_dh);
            $item_bill = get_bill_by_id($id_dh);$voucher_value = get_voucher_by_id($item_bill['id_voucher']);
        }
        include './view/billdetail.php';
        break;
    case 'myvoucher':
        $myvoucher = get_all_my_voucher($_SESSION['user']['id']);
        $allvoucher = get_all_voucher($_SESSION['user']['id']);
        if(isset($_POST['get_voucher'])){
            $voucher_id = $_POST['id_voucher'];
            insert_voucher_detail($voucher_id, $_SESSION['user']['id']);
            update_sl_voucher($voucher_id);
            header('Location: index.php?page=myvoucher');
        }
        include './view/myvoucher.php';
        break;
    case 'writeComment':
        if(isset($_GET['id']) && $_GET['id'] != ''){
            $id_product = $_GET['id'];
            $sp = getProductById($id_product);
            if(isset($_POST['comment'])){
                $content = $_POST['comment-text'];
                $star = $_POST['star'];
                insert_comment($_SESSION['user']['id'], $id_product, $star, $content);
                
                header('Location: index.php?page=detail&id='.$id_product.'');$note = 'Đánh giá của bạn đã được gửi...';
            }else{
                $note = '';
            }
        }
        include './view/writeComment.php';
        break;
    case 'allcomment':
        if(isset($_GET['id']) && $_GET['id']!=''){
            $id=$_GET['id'];
            $sp = getProductById($id);
            $comments = get_comments($id, 2);
            $sao5 = get_rating($id, 5);
            $sao4 = get_rating($id, 4);
            $sao3 = get_rating($id, 3);
            $sao2 = get_rating($id, 2);
            $sao1 = get_rating($id, 1);
            $avg = get_avg_rating($id);
            $sl_comments = get_so_luong_comment($id);
        }
        $id_product = $_GET['id'];
        $comments = get_comments($id_product, 0);
        include './view/allcomment.php';
        break;
    case 'logout':
        unset($_SESSION['user']);
        header('Location: index.php');
        break;
    case 'contact':
        include './view/contact.php';
        break;
    default:
        include './view/home.php';
        break;
}
}else{
    include './view/home.php';
}

include './view/footer.php';
}
?>