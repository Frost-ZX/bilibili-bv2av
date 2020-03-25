var InputID = document.querySelector('#query-box-input');
var BtnSubmit = document.querySelectorAll('.btn-submit div');
for (let i = 0; i < BtnSubmit.length; i++) {
    BtnSubmit[i].addEventListener('click', function () {
        if (InputID.value != '') {
            var Mode = this.getAttribute("name");
            var QueryStr = "";
            if (Mode == "a_getav") {
                QueryStr = "type=a&mode=getav";
            } else if (Mode == "a_getbv") {
                QueryStr = "type=a&mode=getbv";
            } else if (Mode == "b_getav") {
                QueryStr = "type=b&mode=getav";
            }
            window.location.search = QueryStr + "&id=" + InputID.value;
        }
    });
}
