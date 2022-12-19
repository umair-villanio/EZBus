// ##############  NO OF STATION IN ROUTE ADD ########################

function update() {
    var select = document.getElementById('station');
    var option = select.options[select.selectedIndex];
    var num = option.value;

    document.getElementById("stationprice").innerHTML = ""
    for (var i = 0; i < num; i++) {
        document.getElementById("stationprice").innerHTML += "<input type='text' name='station[]' class= 'stationName' required><input type='number' name='price[]' class= 'stationPrice' required><br>";
    }
}
update();

//#################################################################################

document.getElementById('bImg').onchange = function(e){
                
    document.querySelector('#preview-img').src = URL.createObjectURL(event.target.files[0]);
}