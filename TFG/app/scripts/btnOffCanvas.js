var btnOffCanvas = document.getElementById("btnOffCanvas")
var aside = document.getElementById("asideOffCanvas")
var activoOffCanvas = true;

btnOffCanvas.addEventListener("click",function() {
    if(!activoOffCanvas){
        activoOffCanvas = true;
        aside.style.left = "0px";
    }else {
        activoOffCanvas = false;
        aside.style.left = "-260px";
    }
})


