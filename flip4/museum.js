window.onload = function() {
 prepareListener();
}
function prepareListener() {
 var droppy;
 droppy = document.getElementById("Trips");
 droppy.addEventListener("change",getArt);
}
function getArt() {
 this.form.submit();
}
