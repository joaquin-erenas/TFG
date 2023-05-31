let todasTareas = document.getElementsByClassName("allTasks");

for (let i = 0; i < todasTareas.length; i++) {
    todasTareas[i].addEventListener("click", function () {
        location.href = './index.php?w=task&t='+todasTareas[i].id;
        
    })

}
