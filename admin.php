<?php 
session_start();
ob_start();
include_once './model/pdo.php';
include_once './model/product.php';
include_once './model/user.php';
if ($_SESSION['user']['role']==0) {
    header('Location: index.php?');
}
        $countcata = count_cata();
        $countuser = count_user();
        $countbill = count_bill();
        $doanhthu = doanh_thu();
        $sosanpham = so_san_pham();
        check_bill();
if (isset($_GET['page']) && $_GET['page']){
    $page = $_GET['page'];
    switch ($page) {
    case 'home':
        
        $countcata = count_cata();
        $countuser = count_user();
        $countbill = count_bill();
        $doanhthu = doanh_thu();
        $top3 = get_top_3_product();
        $view_name = 'admin-thongke';
        break;
    case 'catalog':
        $catalog = getCatalog();
        $view_name = 'admin-catalog';
        break;

    case 'catalog-add':
        $data['dsdm']=getCatalog();
        $view_name = 'admin-catalog-add';
        
        if (isset($_POST['submit'])) {
            // print_r($_POST);
            // return;
            add_Catalog(
            $_POST['name']
        );
        header('Location: admin.php?page=catalog');
        }
        break;
    case 'catalog-edit':
        $data['dsdm']=getCatalog();
        $view_name = 'admin-catalog-edit';
        if (isset($_GET['id'])) {
            $cata['cata']=getNameCatalog($_GET['id']);
        }
        $id = $_GET['id'];
        if (isset($_POST['submit'])) {
            // print_r($_POST);
            // return;
            edit_Catalog(
            $_POST['name'],
            $id
        );
        header('Location: admin.php?page=catalog');
        }
        break;
    case 'catalog-delete':
            $kq= delete_Catalog($_GET['id']);
            // if ( $kq ) {
            //     header("Location: admin.php?page=catalog");
            // }else{
            //     $thongbao= "Có lỗi xảy ra. Vui lòng thử lại sau!";
            // }
            header("Location: admin.php?page=catalog");
        break;

    case 'product':
        // $products = getAllProducts();
        
            $soluongSP= so_san_pham();
            $sotrang= ceil($soluongSP /4);
            $products = get_products(($_GET['trang']- 1) *4 ,4);  

        $view_name = 'admin-product';
        break;
        
        // $view_name = 'admin-product';
    case 'product-add':
        $data['dsdm']=getCatalog();
        $view_name = 'admin-product-add';
        if (isset($_POST['submit'])) {
            if($_FILES['img']['name']==''){
                $_FILES['img']['name']='logo-da1.png';
            }
        }
        if (isset($_POST['submit'])) {
            // print_r($_POST);
            // return;
            add_Product(
            $_POST['name'],
            $_FILES['img']['name'], 
            $_POST['price'],
            $_POST['sale_price'],
            $_POST['mo_ta'],
            $_POST['id_catalog']
        );
        if($_FILES['img']['error']==0) {
            move_uploaded_file(
                $_FILES['img']['tmp_name'],
                "img/".$_FILES['img']['name']
            );
        }
    
        header('Location: admin.php?page=product&trang=1');
        }
        break;
    case 'product-edit':
        $data['dsdm']=getCatalog();
        $view_name = 'admin-product-edit';
        if (isset($_GET['id'])) {
            $data['sp']=getProductById($_GET['id']);
        }
        if (isset($_POST['submit'])) {
            if($_FILES['img']['name']==''){
                $_FILES['img']['name']=$data['sp']['img'];
            }
        }
        $id = $_GET['id'];
        if (isset($_POST['submit'])) {
            // print_r($_POST);
            // return;
            edit_Product(
            $_POST['name'],
            $_FILES['img']['name'], 
            $_POST['price'],
            $_POST['sale_price'],
            $_POST['mo_ta'],
            $_POST['id_catalog'],
            $id
        );
        if($_FILES['img']['error']==0) {
            move_uploaded_file(
                $_FILES['img']['tmp_name'],
                "img/".$_FILES['img']['name']
            );
        }
        header('Location: admin.php?page=product&trang=1');
        }
        break;
    case 'product-delete':
            $kq = delete_Product($_GET['id']);
            if ( $kq ) {
                header("Location: admin.php?page=product&trang=1");
            }else{
                $thongbao= "Có lỗi xảy ra. Vui lòng thử lại sau!";
            }
        break;
    case 'user':
        $user['user'] = show_user();
        $view_name = 'admin-user';
        break;
    case 'user-add':
        $view_name = 'admin-user-add';
        if (isset($_POST['submit'])) {
            if($_FILES['img']['name']==''){
                $_FILES['img']['name']='logo-da1.png';
            }
            // print_r($_POST);
            // return;
            admin_register(
            $_POST['username'],
            $_POST['pass'],
            $_POST['fullname'],
            'upload/'.$_FILES['img']['name'], 
            $_POST['email'],
            $_POST['sdt'],
            $_POST['location'],
            $_POST['role']
        );
        if($_FILES['img']['error']==0) {
            move_uploaded_file(
                $_FILES['img']['tmp_name'],
                "upload/".$_FILES['img']['name']
            );
        }
        header('Location: admin.php?page=user');
        }
        break;
    case 'user-edit':
        $view_name = 'admin-user-edit';
        if (isset($_GET['id'])) {
            $user['user']=get_user($_GET['id']);
        }
        
        $id = $_GET['id'];
        if (isset($_POST['submit'])) {
            if($_FILES['img']['name']==''){
                $_FILES['img']['name']=$user['user']['img'];
            admin_edit_user(
                $_POST['username'],
                $_POST['pass'],
                $_POST['fullname'],
                $_FILES['img']['name'], 
                $_POST['email'],
                $_POST['sdt'],
                $_POST['location'],
                $_POST['role'],
                $id
            );
        if($_FILES['img']['error']==0) {
            move_uploaded_file(
                $_FILES['img']['tmp_name'],
                "upload/".$_FILES['img']['name']
            );
        }
        header('Location: admin.php?page=user');
        }else{
            admin_edit_user(
                $_POST['username'],
                $_POST['pass'],
                $_POST['fullname'],
                'upload/'.$_FILES['img']['name'], 
                $_POST['email'],
                $_POST['sdt'],
                $_POST['location'],
                $_POST['role'],
                $id
            );
        if($_FILES['img']['error']==0) {
            move_uploaded_file(
                $_FILES['img']['tmp_name'],
                "upload/".$_FILES['img']['name']
            );
        }
        header('Location: admin.php?page=user');
        }
        }
        break;
    case 'user-delete':
        $kq = delete_user($_GET['id']);
            if ( $kq ) {
                header("Location: admin.php?page=user");
            }else{
                $thongbao= "Có lỗi xảy ra. Vui lòng thử lại sau!";
            }

        break;
    case 'comment':
        $comment= comment();
        $view_name = 'admin-comment';
        break;
    case 'comment-delete':
        $kq = delete_comment($_GET['id']);
            
            // if ( $kq ) {
            //     header("Location: admin.php?page=comment");
            // }else{
            //     $thongbao= "Có lỗi xảy ra. Vui lòng thử lại sau!";
            // }
            header("Location: admin.php?page=comment"); 
        break;
    case 'bill':
        $bill['bill']=show_bill();
        get_ngay_du_kien();
        if (isset($_GET['loai'])) {
            switch ($_GET['loai']) {
                case 'xacnhan':
                    $xacnhan=xacnhan($_GET['id']);
                    break;
                case 'vanchuyen':
                    $xacnhan=vanchuyen($_GET['id']);
                    break;
                case 'hoantat':
                    $xacnhan=hoantat($_GET['id']);
                    break;
                case 'huydon':
                    $xacnhan=huydon($_GET['id']);
                    break;
                
                default:
                    # code...
                    break;
            }
            header('Location: admin.php?page=bill');
        }
        $view_name = 'admin-bill';
        
        break;
    case 'bill-detail':
        $bill_detail['bill_detail']=show_bill_detail($_GET['id']);
        $view_name = 'admin-bill-detail';
        break;
    case 'voucher':
        $data['vc']=show_voucher();
        $view_name = 'admin-voucher';
        break;
    case 'voucher-add':
        $view_name = 'admin-voucher-add';
        if (isset($_POST['submit'])) {
            // print_r($_POST);
            // return;
            add_voucher(
            $_POST['code'],
            $_POST['value'],
            $_POST['sl'], 
            $_POST['ngay_ap_dung'],
            $_POST['ngay_ket_thuc']
        );
        header('Location: admin.php?page=voucher');
        }
        break;
    case 'voucher-edit':
        $view_name = 'admin-voucher-edit';
        if (isset($_GET['id'])) {
            $voucher['vc']=getVouchertById($_GET['id']);
        }
        $id = $_GET['id'];
        if (isset($_POST['submit'])) {
            // print_r($_POST);
            // return;
            edit_voucher(
            $_POST['code'],
            $_POST['value'],
            $_POST['sl'], 
            $_POST['ngay_ap_dung'],
            $_POST['ngay_ket_thuc'],
            $id
        );
        header('Location: admin.php?page=voucher');
        }
        break;
    case 'voucher-delete':
        $kq = delete_voucher($_GET['id']);
            // if ( $kq ) {
            //     header('Location: admin.php?page=voucher');
            // }else{
            //     $thongbao= "Có lỗi xảy ra. Vui lòng thử lại sau!";
            // }
            header('Location: admin.php?page=voucher');
        break;
    case 'logout':
        unset($_SESSION['user']);
        header('Location: index.php');
        break;
    default:
        break;
}
    include_once './view/admin-layout.php';
}else{
    include './view/admin-layout.php';
}

?>