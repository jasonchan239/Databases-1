// this file listens to passenger info, and gets the info of that passenger
window.onload = function() {
 prepareListener2();
}
function prepareListener2() {
 var droppy;
 droppy = document.getElementById("passengerInfo");
 droppy.addEventListener("change",getPassinfo);
}
function getPassinfo() {
 this.form.submit();
}
