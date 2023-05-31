<?php

if (isset($_GET["dia"]) && !empty($_GET["dia"])) {
    $month = date('m');
    $year = date('Y');
    $day = $_GET["dia"];
}

if (isset($_GET["m"]) && !empty($_GET["m"])) {
    if ($_GET["m"] == "comp") {
        $completas = true;
        $tareasMostrar = $tareasCompletas;
    } else if ($_GET["m"] == "active") {
        $activas = true;
        $tareasMostrar = $tareasActivGeneral;
    } else if ($_GET["m"] == "all") {
        $tareasMostrar = $todasTareas;
        $todas = true;
    }
} else {
    $todas = true;
    $tareasMostrar = $todasTareas;
}

?>
<div id="taskForm">
    <div class="appInfo">
        <?php
        if (isset($day)) {
            echo "<h2>Todas las tareas del día $day</h2>";
        } else {
            echo "<h2>Todas las tareas</h2>";
        }

        ?>
        <p>05 Apr 2023, Wednesday</p>
    </div>
    <div class="appContainer">
        <div class="row" id="btnesAllTask">
            <?php
            if (isset($completas)) {
                echo <<< EOT
                <button id="muestraComple" class="btn btn-secundario" disabled>Mostrar completadas ✅</button>
                <button id="muestraActiva" class="btn btn-principal">Mostrar activas 🔓</button>
                <button id="muestraToda" class="btn btn-principal">Mostrar todas 💾</button>
                EOT;
            } else if (isset($activas)) {
                echo <<< EOT
                <button id="muestraComple" class="btn btn-principal">Mostrar completadas ✅</button>
                <button id="muestraActiva" class="btn btn-secundario" disabled>Mostrar activas 🔓</button>
                <button id="muestraToda" class="btn btn-principal">Mostrar todas 💾</button>
                EOT;
            } else {
                echo <<< EOT
                <button id="muestraComple" class="btn btn-principal">Mostrar completadas ✅</button>
                <button id="muestraActiva" class="btn btn-principal">Mostrar activas 🔓</button>
                <button id="muestraToda" class="btn btn-secundario" disabled>Mostrar todas 💾</button>
                EOT;
            }
            ?>
        </div>
        <div id="newTaskGrid">
            <?php

            if ($tareasMostrar > 0) {
                foreach ($tareasMostrar as $tarea) {
                    $taskId = $tarea[0];
                    $tareaNombre = $tarea[2];
                    $fechaInicio = new DateTime($tarea[4]);
                    $fechaFin = new DateTime($tarea[5]);
                    $tipo = $tarea[7];
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
                    // OBTENER DÍAS RESTANTES
                    $fechaHoy = new DateTime(); // Obtener la fecha de hoy en formato YYYY-MM-DD

                    $intervalo = $fechaHoy->diff($fechaFin); // Calcula la diferencia entre las fechas
                    $diasRestantes = $intervalo->format("%a") + 1;
                    // FIN OBTENER DÍAS RESTANTES

                    if (!isset($day)) {
                        $mostrar = true;
                    } else {
                        if ($tarea[4] == $year . '-' . $month . '-' . $day) {
                            $mostrar = true;
                        } else {
                            unset($mostrar);
                        }
                    }

                    if (isset($mostrar) && $mostrar) {
                        echo <<< EOT
                        <div id="$taskId" class="taskCard allTasks shadow">
                        <div class="taskCard-footer allTasks shadow-sm" >
                        <span>$tareaNombre</span>
                        <span>$emoji</span>
                        EOT;
                        if ($tarea[6] == 1) {
                            echo <<< EOT
                            <span class="badge bg-project rounded-pill">✅</span>
                            </div></div>
                            EOT;
                        } else if ($diasRestantes <= 3) {
                            echo <<< EOT
                            <span class="badge bg-projects-alerta rounded-pill">{$diasRestantes}</span>
                            </div></div>
                            EOT;
                        } else if ($diasRestantes > 3 && $diasRestantes <= 10) {
                            echo <<< EOT
                            <span class="badge bg-projects-normal rounded-pill">{$diasRestantes}</span>
                            </div></div>
                            EOT;
                        } else {
                            echo <<< EOT
                            <span class="badge bg-projects-bien rounded-pill">{$diasRestantes}</span>
                            </div></div>
                            EOT;
                        }
                    }
                }
            }

            ?>

        </div>
    </div>
</div>


<script>
    let comple = document.getElementById("muestraComple");
    let activ = document.getElementById("muestraActiva");
    let todas = document.getElementById("muestraToda");

    comple.addEventListener("click", function() {
        location.href = './index.php?w=allTask&m=comp';
    })

    activ.addEventListener("click", function() {
        location.href = './index.php?w=allTask&m=active';
    })

    todas.addEventListener("click", function() {
        location.href = './index.php?w=allTask&m=all';
    })
</script>


<script src="./scripts/abrirTareaTodas.js"></script>