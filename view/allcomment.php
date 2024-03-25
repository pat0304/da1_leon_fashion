<div id="detail">
    <a href="index.php?page=detail&id=<?= $_GET['id']?>"
        style="margin-left: 150px; font-weight:600; text-decoration:underline">Quay lại trang chi
        tiết</a>
    <h1 style="color: black; font-size: 30px;margin-left: 150px;
    margin-bottom: 20px;"><?= getProductById($_GET['id'])['name']?></h1>
    <div id="action-comment">
        <div id="comment">
            <h2>Tất Cả Bài Đánh Giá</h2>
            <?php 
            $show_comment = '';
            foreach($comments as $item){
                extract($item);
                $comment_user = get_user($id_user);
                switch($rating){
                    case 1:
                        $show_star = '
                        <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                </div>
                        ';
                        break;
                    case 2:
                        $show_star = '
                        <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                </div>
                        ';
                        break;
                        case 3:
                            $show_star = '
                            <div class="rate-star">
                        <img src="./img/icon-star.png" alt="" class="star">
                        <img src="./img/icon-star.png" alt="">
                        <img src="./img/icon-star.png" alt="">
                        <img src="./img/icon-star.png" alt="" class="dark-star">
                        <img src="./img/icon-star.png" alt="" class="dark-star">
                    </div>
                            ';
                            break;
                            case 4:
                                $show_star = '
                                <div class="rate-star">
                            <img src="./img/icon-star.png" alt="" class="star">
                            <img src="./img/icon-star.png" alt="">
                            <img src="./img/icon-star.png" alt="">
                            <img src="./img/icon-star.png" alt="">
                            <img src="./img/icon-star.png" alt="" class="dark-star">
                        </div>
                                ';
                                break;
                                case 5:
                                    $show_star = '
                                    <div class="rate-star">
                                <img src="./img/icon-star.png" alt="" class="star">
                                <img src="./img/icon-star.png" alt="">
                                <img src="./img/icon-star.png" alt="">
                                <img src="./img/icon-star.png" alt="">
                                <img src="./img/icon-star.png" alt="">
                            </div>
                                    ';
                                    break;

                }
                $show_comment.= '
                <div class="comment-item">
                <div class="user">
                    <img src="'.$comment_user['img'].'" alt="">
                    <span class="name-user">'.get_user_full_name($id_user).'</span>
                </div>
                '.$show_star.'
                <div class="comment">
                    <div class="date">'.date("H:i - d/m/Y", strtotime($ngay_comment)).'</div>
                    <div class="content">'.$content.'</div>
                </div>
            </div>
                ';
            }
            echo $show_comment;
            ?>
        </div>
        <div id="total-comment">
            <h2>Tổng quan</h2>
            <div class="danh-gia"><b>Đánh giá: </b> <span> <?= number_format($avg, 1, '.')?> <img
                        src="./img/icon-star.png" style="height: 20px;"></span> (<?= $sl_comments?>
                lượt)</div>
            <h3>Chi tiết đánh giá:</h3>
            <div class="danh-gia-chi-tiet">
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <span>(<?= $sao5?> lượt)</span>
                </div>
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <span>(<?= $sao4?> lượt)</span>
                </div>
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <span>(<?= $sao3?> lượt)</span>
                </div>
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <span>(<?= $sao2?> lượt)</span>
                </div>
                <div class="rate-star">
                    <img src="./img/icon-star.png" alt="" class="star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <img src="./img/icon-star.png" alt="" class="dark-star">
                    <span>(<?= $sao1?> lượt)</span>
                </div>

            </div>
            <?php if(isset($_SESSION['user'])){?>
            <a id="write-comment" href="index.php?page=writeComment&id=<?= $sp['id']?>">VIẾT BÀI ĐÁNH
                GIÁ</a>
            <?php }?>
        </div>
    </div>
</div>