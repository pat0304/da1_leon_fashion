<a href="index.php?page=detail&id=<?= $_GET['id']?>"
    style="margin-left: 150px;margin-top: 150px ;display:block; font-weight:600; text-decoration:underline">Quay lại
    trang chi
    tiết</a>
<h2>Đánh giá sản phẩm: <?= $sp['name']?></h2>
<div id="writeComment">
    <form action="index.php?page=writeComment&id=<?= $sp['id']?>" class="writeComment" method="POST">
        <h2>Viết bài đánh giá</h2>
        <div class="star-rating">
            <label for="">Đánh giá: </label>
            <label for="one-star" class="rate-star one-star">
                <input type="radio" name="star" value="1" id="one-star">
                <img src="./img/icon-star.png" value="1" class="star" alt="">
            </label>
            <label for="two-star" class="rate-star two-star">
                <input type="radio" name="star" value="2" id="two-star">
                <img src="./img/icon-star.png" value="2" class="star" alt="">
            </label>
            <label for="three-star" class="rate-star three-star">
                <input type="radio" name="star" value="3" id="three-star">
                <img src="./img/icon-star.png" value="3" class="star" alt="">
            </label>
            <label for="four-star" class="rate-star four-star">
                <input type="radio" name="star" value="4" id="four-star">
                <img src="./img/icon-star.png" value="4" class="star" alt="">
            </label>
            <label for="five-star" class="rate-star five-star">
                <input type="radio" name="star" value="5" id="five-star">
                <img src="./img/icon-star.png" value="5" class="star" alt="">
            </label>
        </div>
        <label for="comment-text">Bình luận:<br> <textarea rows="4" cols="50" required
                name="comment-text"></textarea></label>
        <br><input type="submit" onclick="return checkedStar()" name="comment" value="Gửi">
        <div class="note"><?= $note?></div>
    </form>
    <img src="./img/<?= $sp['img']?>" class="img-pro">
</div>


<script>
let stars = document.querySelectorAll('.star');
let checkChecked = document.querySelectorAll("input[type='radio']");
checkChecked.forEach(starss => {
    starss.addEventListener('click', () => {
        stars.forEach((star, index) => {
            if (index < starss.value) {
                star.classList.add('checked');
            } else {
                star.classList.remove('checked');
            }
        });
    });
})

function checkedStar() {
    let checkStar = document.getElementsByName('star')
    console.log(checkStar)
    let valueStar = 0;
    if (checkStar[0].checked || checkStar[1].checked || checkStar[2].checked || checkStar[3].checked || checkStar[4]
        .checked) {
        valueStar = 1;
    } else {
        valueStar = 0;
    }
    if (valueStar == 1) {
        return true;
    } else {
        alert('Vui lòng đánh giá')
        return false;
    }
}
</script>