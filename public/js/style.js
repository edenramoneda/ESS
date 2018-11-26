function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("overlay").classList.remove('overlay3');
}
function openNav(){
    document.getElementById("sidebar").style.width = "240px";
    document.getElementById("overlay").classList.toggle('overlay3');
}