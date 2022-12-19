// JavaScript source code
function validate()
{
    var payment_method = document.getElementsByName("ptype").value;
    var card_no = document.getElementsByName("c_no").value;
    var cvv = document.getElementsByName("cvv").value;
   

    if (payment_method == "") {
        alert("Choose payment type");
        document.form1.ptype.focus();
    }

    if (card_no == "") {
        alert("Choose payment type");
        document.form1.c_no.focus();
    }

    if (cvv == "") {
        alert("Choose payment type");
        document.form1.cvv.focus();
    }

    return true;
}