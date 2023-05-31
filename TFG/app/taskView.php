<?php

if (isset($_GET["t"]) && !empty($_GET["t"])) {
    $t = $_GET["t"];
    require_once("../bbdd/task.php");
    $tareas = getTareas_IDTarea($t);
    if (!isset($tareas[0])) {
        $_GET["status"] = "erT";
        $task404 = true;
    } else {
        $tipo = $tareas[0][7];

        switch ($tipo) {
            case 'deporte':
                $emoji = "🏃";
                break;
            case 'cocina':
                $emoji = "🍳";
                break;
            case 'mecanica':
                $emoji = "🚗";
                break;
            case 'estudios':
                $emoji = "🎒";
                break;
            case 'crecimiento':
                $emoji = "🌼";
                break;
            default:
                $emoji = "🥷";
                break;
        }
    }
}

?>

<div id="taskForm">
    <div class="appInfo">
        <?php
        if (!isset($task404)) {
            echo <<< EOT
            <h2>Vista de tarea</h2>
            <p>05 Apr 2023, Wednesday</p>

            EOT;
        } else {
            echo <<< EOT
            <h2>Tarea no encontrada 😭</h2>
            <p>05 Apr 2023, Wednesday</p>
            EOT;
        }


        ?>

    </div>
    <div class="appContainer">
        <div id="taskFormContainer">

            <?php
            if (!isset($task404)) {
                echo <<< EOT
                <div class="container">
                <h2 id="taskFormContainer-title">Tarea de {$tareas[0][7]}{$emoji}</h2><br>
                <input type="hidden" name="taskType" id="tipoTarea" value="">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" name="taskName" disabled class="form-control" id="floatingInputGrid" value={$tareas[0][2]}>
                            <label for="floatingInputGrid">Nombre de la tarea</label>
                        </div>
                    </div>
                </div><br><br>
                <div class="row g-2">
                    <div class="col-md">
                    <div class="form-floating">
                        <textarea class="form-control" id="textAreaExample1" rows="15" disabled>
                            {$tareas[0][3]}
                        </textarea>
                        <label class="form-label" for="textAreaExample">Descripción</label>
                    </div>
                    </div>
                </div><br><br>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="taskDateStart" disabled class="form-control" id="floatingInputGrid" min="<?php echo date('Y-m-d'); ?>" value={$tareas[0][4]}>
                            <label for="floatingInputGrid">Fecha de inicio</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="taskDateEnd" disabled class="form-control" id="floatingInputGrid" min="<?php echo date('Y-m-d'); ?>" value={$tareas[0][5]}>
                            <label for="floatingInputGrid">Fecha de fin</label>
                        </div>
                    </div>
                </div>
                <div class="row">

                EOT;

                if ($tareas[0][6] != 1) {
                    echo '<button class="btn btn-principal completada" style="margin-top: 20px;" id="' . $tareas[0][0] . '">Completar tarea</button>';
                } else {
                    echo '<button class="btn btn-principal completada" disabled style="margin-top: 20px;">Tarea completada</button>';
                }


                echo '<button class="btn btn-logOut borrar" style="margin-bottom: 20px;margin-top: 20px;margin-right:0px;margin-left:0px" id="'.$tareas[0][0].'">Borrar tarea</button>';
                echo <<< EOT
                </div>
                </div>
                EOT;
            } else {
                echo '<img id="taskNotFound"src="../media/undraw_page_not_found_re_e9o6.svg" alt="Not Found">';
            }

            ?>



        </div>
    </div>
</div>


<script>
    let btnCompletada = document.getElementsByClassName("completada");
    let btnBorrar = document.getElementsByClassName("borrar");

    btnCompletada[0].addEventListener("click", function() {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };


        xhttp.open("POST", "./taskAJAX.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send("modo=completada&id=" + btnCompletada[0].id);


    })

    btnBorrar[0].addEventListener("click", function() {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == '{"mensaje":"borrada"}') {
                    location.href = './index.php?status=tB';
                }else if(this.responseText == '{"mensaje":"noBorrada"}'){
                    location.href = './index.php?status=tBer';
                }else if(this.responseText == '{"mensaje":"completada"}'){
                    location.href = './index.php?status=tComp';
                }else if(this.responseText == '{"mensaje":"noCompletada"}'){
                    location.href = './index.php?status=tCompEr';
                }

            }
        };


        xhttp.open("POST", "./taskAJAX.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send("modo=borrar&id=" + btnCompletada[0].id);
    })
</script>