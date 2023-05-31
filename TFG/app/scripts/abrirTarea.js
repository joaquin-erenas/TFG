let tarea = document.getElementsByClassName("list-group-item");

for (let i = 0; i < tarea.length; i++) {
    tarea[i].addEventListener("click", function () {
        if (tarea[i].id == "taskIA") {
            location.href = './index.php?w=taskIA';
        }else if(tarea[i].id == "allTask"){
            location.href = './index.php?w=allTask';
        } else {
            location.href = './index.php?w=task&t='+tarea[i].id;
        }

    })

}
