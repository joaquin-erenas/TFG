const botonesMaxi = document.getElementsByClassName("maxiVentana");
const botonesCerrar = document.getElementsByClassName("cerrarVentana");
const ventanas = document.getElementsByClassName("ventana");


for (let i = 0; i < botonesMaxi.length; i++) {
    botonesMaxi[i].addEventListener('click', function () {
        let abierto = false;
        if(ventanas[i].style.height == "100%") {
            abierto = true;
        }
        if(!abierto){
            ventanas[i].style.height = "100%";
            ventanas[i].style.width = "100%";
            ventanas[i].style.top = "50%";
            ventanas[i].style.left = "50%";
            ventanas[i].style.translate = "translate(-50%, -50%)";
        }else {
            let random = Math.floor(Math.random() * 31) + 40;
            ventanas[i].style.height = random+"%";
            ventanas[i].style.width = random+"%";
        }

        console.log("VENTANA -> " + ventanas[i].className+ " BOTON -> "+botonesMaxi[i])

    });
}

for (let i = 0; i < botonesCerrar.length; i++) {
    botonesCerrar[i].addEventListener('click', function () {
        ventanas[i].style.display = "none";


    });
}




