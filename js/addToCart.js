window.addEventListener('DOMContentLoaded',function() {
let countSL = 0;
const addCart = document.querySelectorAll('.add-to-card');
let card = [];
if(localStorage.getItem('card')){
card = JSON.parse(localStorage.getItem('card'))
card.forEach(item =>{
    countSL += Number(item['sl'])
});
}
let countSLElement = document.getElementById("countSL");
countSLElement.innerHTML = countSL
let product ={};
addCart.forEach(function(button) {
    button.addEventListener('click', function(event) {
        let productElement = event.target.parentElement.parentElement;
        let img = productElement.querySelector('.img-pro').getAttribute('src');
        let name = productElement.querySelector('a').innerHTML;
        let idProduct = productElement.querySelector('.id-product').value;
        let idCatalog = productElement.querySelector('.id-catalog').value;
        let price;
        let pricePro = productElement.querySelector('.price-pro').getAttribute('data-price');
        let salePrice = productElement.querySelector('.sale-price-pro').getAttribute('data-price');
        if(salePrice === '' || salePrice === null) {
            price = pricePro
        }else{
            price = salePrice
        }
            // Nếu người dùng nhấp vào OK, hiển thị form chọn kích thước
            if(idCatalog ==4){
                var size = 'OS'
                countSL++;
            }else if(idCatalog == 2){
                var result = window.confirm("Chọn kích thước quần?");
            if (result) {
                var size = prompt("Nhập kích thước (ví dụ: M, L, XL):");
                if (size !== null && size !== "" && (size == 'M' || size == 'L' || size == 'XL'|| size == 'm' || size == 'l' || size == 'xl' || size == 'Xl' || size =='xL')) {
                    size = size.toUpperCase();
                    alert("Bạn đã chọn kích thước: " + size);
                    countSL++;
                } else {
                    alert("Bạn chưa chọn kích thước.");
                    return false;
                }
            } else {
                alert("Bạn đã hủy bỏ chọn kích thước.");
                return false;
            }
            }
            else{
                var result = window.confirm("Chọn kích thước quần áo?");
            if (result) {
                var size = prompt("Nhập kích thước (ví dụ: S, M, L, XL):");
                if (size !== null && size !== "" && (size == 'S' || size == 'M' || size == 'L' || size == 'XL' || size == 's' || size == 'm' || size == 'l' || size == 'xl' || size == 'Xl' || size =='xL')) {
                    size = size.toUpperCase();
                    alert("Bạn đã chọn kích thước: " + size);
                    countSL++;
                } else {
                    alert("Bạn chưa chọn kích thước.");
                    return false;
                }
            } else {
                alert("Bạn đã hủy bỏ chọn kích thước.");
                return false;
            }}

        product = {'id': idProduct,'img': img, 'name': name,'size': size, 'price': price, 'sl': 1}
        countSLElement.innerHTML = countSL
        let check = card.find(c => c.id == idProduct && c.size == size)
        if(check){
            check.sl = Number(check.sl) + Number(1)
        }else{
        card.push(product)}
        console.log(card)
        localStorage.removeItem('card')
        localStorage.setItem('card', JSON.stringify(card))
    })
})

})