function checkform() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if ((username == '') && (password == '')) {
        alert('Nhập tài khoản và mật khẩu ');
    } else if (username == '') {
        alert('Bạn chưa nhập tài khoản');
    } else if (password == '') {
        alert('Bạn Chưa Nhập Mật Khẩu');
    } else {
        return true;
    }
    return false;
    x
}