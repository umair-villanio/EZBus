function validate() {
    var c_no = document.getElementById("c_no").value;
    var cvv = document.getElementById("cvv").value;
    var regCardVisa = /^4[0-9]{12}(?:[0-9]{3})?$/;
    var regCardMaster = /^5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$/;
    var regCVV = /^[0-9]{3}$/;


    if (!regCVV.test(cvv)) {
        alert("Enter valid CVV");
        return false;
    }


    if (!regCardVisa.test(c_no) && !regCardMaster.test(c_no)) {
        alert("Enter valid cardno");
        return false;
    }
}
