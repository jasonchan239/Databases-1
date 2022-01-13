// this file is the javascript that listens to various parts of the website

window.onload = function() {
    prepareListener1();
    prepareListener0();
    prepareListener2();
    prepareListener3();
}
function prepareListener0() {
    var droppy;
    droppy = document.getElementById("countryTrip");
    droppy.addEventListener("change",getArt);
}

function prepareListener1() {
    var droppy;
    droppy = document.getElementById("Trips");
    droppy.addEventListener("change",getArt);
}
function prepareListener2() {
    var droppy;
    droppy = document.getElementById("passengerInfo");
    droppy.addEventListener("change",getArt);
}
function prepareListener3() {
    var droppy;
    droppy = document.getElementById("passengerTrip");
    droppy.addEventListener("change",getArt);
}
function getArt() {
    this.form.submit();
}
