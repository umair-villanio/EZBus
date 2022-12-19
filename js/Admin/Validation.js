var valLicense = /^[x|X|B][0-9]{7}$/;
var valBusNo = /^[A-Z]{2}-[0-9]{4}$/;



function validateBusForm() {
    var dLicense = document.getElementById("dLicense").value;
    var bNum = document.getElementById("bNum").value;
    var bSeats = document.getElementById("bSeats").value;
    var rNum = document.getElementById("rNum").value;
    var errors=[];

    if (!valLicense.test(dLicense)) {
        errors.push("Error: Check License number");
        // return false;
    }

    if (!valBusNo.test(bNum)) {
        errors.push("Error: Check Bus Number (Ex: AB-1234)");
        // return false;
    }

    if (bSeats < 11 && bSeats > 90) {
        errors.push("Error: Check Number of Seats");
        // return false;
    }

    if (errors.length>0){
        // for (var i=0;i<errors.length;i++){
        alert(errors.join("\n"));
    // }
    return false;
    }
 
    

}
