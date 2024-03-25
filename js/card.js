if(localStorage.getItem('card')=="[]"||localStorage.getItem('card') == undefined){
    const cardElement = document.getElementById('card');
    cardElement.innerHTML =`<p>Giỏ hàng rỗng</p>`
}else{
let cardInput = document.getElementById('AllItemsCard');
cardInput.value = localStorage.getItem('card');
let totalPrice = document.querySelector('.total-price');

function showcard(){
    if(localStorage.getItem('card')=="[]"||localStorage.getItem('card') == undefined){
        const cardElement = document.getElementById('card');
        cardElement.innerHTML =`<p>Giỏ hàng rỗng</p>`}
    let items = JSON.parse(localStorage.getItem('card'))
        const tableElement = document.querySelector('table')
        let cardRow =`<thead>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
        </thead>`
            items.forEach(item => {
                cardRow += 
                `<tr>
        <td class="infor-product"><img src="${item['img']}" alt="">
            <div class="product">
                <div class="name">${item['name']}</div>
                <div class="size">Size: ${item['size']}</div>
                <div class="price">${Intl.NumberFormat('vn').format(item['price']) + 'đ'}</div>
            </div>
        </td>
        <td><div class="thay-doi-sl"><button class="giamsl" onclick="giamSL(${item['id']}, '${item['size']}')"><i class="bi bi-dash"></i></button>${item['sl']}<button class="tangsl" onclick="tangSL('${item['id']}', '${item['size']}')"><i class="bi bi-plus-lg"></i></button></div></td>
        <td class="thanhtien">${Intl.NumberFormat('vn').format(item['price']*item['sl']) + 'đ'}</td>
        <td><button class="delete-item-card" onclick="del(${item['id']}, '${item['size']}')"><i class="bi bi-trash"></i></button></td>
        </tr>`;
            });
            tableElement.innerHTML=cardRow;
            
const addCart = document.querySelectorAll('.add-to-card');
let card = [];
let countSL = 0;
if(localStorage.getItem('card')){
card = JSON.parse(localStorage.getItem('card'))
if(card.length > 0){
card.forEach(item =>{
    countSL += Number(item['sl'])
});}else{
    countSL = 0
}
}
let countSLElement = document.getElementById("countSL");
countSLElement.innerHTML = countSL
total();
}
console.log(JSON.parse(localStorage.getItem('card')))
showcard();
function del(idProduct, sizeProduct){
    let card = JSON.parse(localStorage.getItem('card'));
    console.log(idProduct + " " + card[0]['id'])
    let afterDel = card.filter(c => c.id != idProduct || c.size != sizeProduct)
    console.log(afterDel)
    localStorage.removeItem('card')
    localStorage.setItem('card', JSON.stringify(afterDel))
    showcard()
}
function total(){
    card = JSON.parse(localStorage.getItem('card'));
    let total=0;
    if(card.length>0){
    card.forEach(value => {
    total += value['sl'] * value['price'];
});}
let formatNum = Intl.NumberFormat('vn').format(total) ;
let tongtien = document.getElementById('tongtien');
let thanhtoan = document.getElementById("total");
let voucher = document.querySelector("#gia-tri-voucher");
if(voucher){
valueVoucher = voucher.value;
tongtien.innerText = Intl.NumberFormat('vn').format(total- valueVoucher)
thanhtoan.value = total - valueVoucher;
totalPrice.innerHTML = formatNum}
else{
    tongtien.innerText = Intl.NumberFormat('vn').format(total)
thanhtoan.value = total;
totalPrice.innerHTML = formatNum
}
}
function tangSL(idProduct, sizeProduct){
    card = JSON.parse(localStorage.getItem('card'));
    let check = card.find(c => c.id == idProduct && c.size == sizeProduct)
        if(check){
            check.sl = Number(check.sl) + Number(1)}
        localStorage.removeItem('card')
        localStorage.setItem('card', JSON.stringify(card))
        showcard()
}
function giamSL(idProduct, sizeProduct){
    card = JSON.parse(localStorage.getItem('card'));
    let check = card.find(c => c.id == idProduct && c.size == sizeProduct)
        if(check){
            if(check.sl > 1)
            check.sl = Number(check.sl) - Number(1)
            else{
                return false;
            }
        }
        localStorage.removeItem('card')
        localStorage.setItem('card', JSON.stringify(card))
        showcard()
}
}