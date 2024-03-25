function checkPassword(){
    let pass = document.querySelector('.pass').value;
    let passAgain = document.querySelector('.passAgain').value;
    if(passAgain != pass){
        alert('Mật khẩu không trùng nhau. Vui lòng kiểm tra lại');
        return false;
    }else{
        return true;
    }
}