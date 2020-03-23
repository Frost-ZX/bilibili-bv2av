var InputBVID = document.querySelector('#query-box-input');
var BtnSubmit = document.querySelector('.btn-submit div');
BtnSubmit.addEventListener('click', function () {
    if (InputBVID.value != '') {
        window.location.search = "BV=" + InputBVID.value;
    }
});
