

var phone = /^[0][7][0-9]{8}$/;


function phonecheck()
{
    var tel = document.getElementById("telNo").value ;
    if ( !phone.test(tel)) 
    {
        alert("Incorrect phone number") ;
        return false ;
    }
}



var today = new Date().toISOString().split('T')[0];
document.getElementsByName("date")[0].setAttribute('min', today);




    