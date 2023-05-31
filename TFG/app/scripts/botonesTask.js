let collectionTask = document.getElementsByClassName("taskCard");
let taskFormContainer = document.getElementById("taskFormContainer");
let taskGrid = document.getElementById("newTaskGrid");
let btnVolver = document.getElementById("btnVolverTask");
let nombreTipo = document.getElementById("taskFormContainer-title");
let hiddenTipo = document.getElementById("tipoTarea");



btnVolver.addEventListener("click", function () {
    mostrarForm();
    mostrarBotones();
})

for (let i = 0; i < collectionTask.length; i++) {
    collectionTask[i].addEventListener("click", function () {
        ocultarBotones();
        mostrarForm();
        switch (collectionTask[i].id) {
            case "tareaDeporte":
                nombreTipo.innerHTML = "Tarea de deporte 🏃";
                hiddenTipo.value = "deporte";
                break;
            case "tareaCocina":
                nombreTipo.innerHTML = "Tarea de cocina 🍳"
                hiddenTipo.value = "cocina";
                break;
            case "tareaMecanica":
                nombreTipo.innerHTML = "Tarea de mecánica 🚗"
                hiddenTipo.value = "mecanica";
                break;
            case "tareaEstudios":
                nombreTipo.innerHTML = "Tarea de estudios 🎒"
                hiddenTipo.value = "estudios";
                break;
            case "tareaCrecimiento":
                nombreTipo.innerHTML = "Tarea de crecimiento 🌼"
                hiddenTipo.value = "crecimiento";
                break;
            case "tareaOtro":
                nombreTipo.innerHTML = "Tarea de otro tipo 🥷"
                hiddenTipo.value = "otro";
                break;
            default:
                nombreTipo.innerHTML = "Tarea de otro tipo 🥷"
                hiddenTipo.value = "otro";
                break;
        }



    })
}


function ocultarBotones() {
    for (let i = 0; i < collectionTask.length; i++) {
        collectionTask[i].style.display = "none";
    }
}

function mostrarBotones() {
    for (let i = 0; i < collectionTask.length; i++) {
        collectionTask[i].style.display = "grid";

    }
}

function mostrarForm() {
    if (taskFormContainer.style.display == "none") {
        taskFormContainer.style.display = "flex";
        taskGrid.style.display = "none";
    } else {
        taskFormContainer.style.display = "none";
        taskGrid.style.display = "grid";
    }
}