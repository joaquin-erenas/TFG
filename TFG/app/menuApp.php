<aside id="asideOffCanvas">
    <div id="menuContainer">
        <div class="menuSeccion">
            <h4>
                My tasks
            </h4>
            <ul class="list-group">
                <div class="listaScroll">
                    <?php
                    require_once("../bbdd/task.php");

                    $tareas = getTareasActivas();
                    $todasTareas = getTareas();
                    $tareasCompletas = getTareasCompletas();
                    $tareasActivGeneral = getTareasActivasGeneral();
                    
                    $totalTareas = count($todasTareas);
                    $totalActivas = count($tareas);
                    if ($totalActivas > 0) {
                        foreach ($tareas as $tarea) {
                            $taskId = $tarea[0];
                            $tareaNombre = $tarea[2];
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

                            echo <<< EOT
                            <li class="list-group-item d-flex justify-content-between align-items-center btn-terciario" id="{$taskId}">
                            {$emoji}
                            {$tareaNombre}
                            EOT;
                            if ($diasRestantes <= 3) {
                                echo <<< EOT
                                <span class="badge bg-projects-alerta rounded-pill">{$diasRestantes}</span>
                                </li>
                                EOT;
                            } else if ($diasRestantes > 3 && $diasRestantes <= 10) {
                                echo <<< EOT
                                <span class="badge bg-projects-normal rounded-pill">{$diasRestantes}</span>
                                </li>
                                EOT;
                            } else {
                                echo <<< EOT
                                <span class="badge bg-projects-bien rounded-pill">{$diasRestantes}</span>
                                </li>
                                EOT;
                            }
                        }
                    } else {
                        echo <<< EOT
                        <div id="sinTareas">
                            <img src="../media/undraw_blank_canvas_re_2hwy.svg" alt="No tasks"/>
                        </div>
                        EOT;
                    }

                    ?>
                </div>

                <?php

                echo <<< EOT
                    <li class="list-group-item d-flex justify-content-between align-items-center btn-secundario" id="taskButton">
                        Nueva tarea
                        <span class="badge bg-projects rounded-pill" id="badgeAdd">
                        <svg stroke="#000" fill="#000" stroke-width="0" t="1551322312294" viewBox="0 0 1024 1024" version="1.1" pId="10297" height="1.2em" width="1.2em" xmlns="http://www.w3.org/2000/svg"><defs></defs><path d="M474 152m8 0l60 0q8 0 8 8l0 704q0 8-8 8l-60 0q-8 0-8-8l0-704q0-8 8-8Z" pId="10298"></path><path d="M168 474m8 0l672 0q8 0 8 8l0 60q0 8-8 8l-672 0q-8 0-8-8l0-60q0-8 8-8Z" pId="10299"></path></svg>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center btn-secundario" id="taskIA">
                        Tarea con IA 🤖
                        <span class="badge bg-projects rounded-pill" id="badgeAdd">
                        <svg stroke="#000" fill="#000" stroke-width="0" t="1551322312294" viewBox="0 0 1024 1024" version="1.1" pId="10297" height="1.2em" width="1.2em" xmlns="http://www.w3.org/2000/svg"><defs></defs><path d="M474 152m8 0l60 0q8 0 8 8l0 704q0 8-8 8l-60 0q-8 0-8-8l0-704q0-8 8-8Z" pId="10298"></path><path d="M168 474m8 0l672 0q8 0 8 8l0 60q0 8-8 8l-672 0q-8 0-8-8l0-60q0-8 8-8Z" pId="10299"></path></svg>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center btn-principal" id="allTask">
                        See all tasks
                        <span class="badge bg-projects rounded-pill">{$totalTareas}</span>
                    </li>
                EOT;

                ?>
            </ul>
        </div>

        <div class="menuSeccion">
            <h4>Calendar</h4>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center btn-terciario" id="calendarBtn">
                    See calendar
                    <span class="badge bg-projects rounded-pill">🗓️</span>
                </li>
            </ul>
        </div>
        <div class="menuSeccion">
            <h4>Friends</h4>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center btn-terciario" id="friendsBtn">
                    See my friends
                    <span class="badge rounded-pill">👥</span>
                </li>
            </ul>
        </div>
    </div>
    <div id="btnOffCanvas">
        <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.3052 12L18.1299 9.17526L16.7157 7.76105L13.891 10.5858L13.8873 10.5821L12.4731 11.9963L12.4768 12L12.4731 12.0037L13.8873 13.4179L13.891 13.4142L16.7157 16.239L18.1299 14.8248L15.3052 12Z" fill="currentColor"></path>
            <path d="M10.1091 10.5858L10.1128 10.5821L11.527 11.9963L11.5233 12L11.527 12.0037L10.1128 13.4179L10.1091 13.4142L7.28433 16.239L5.87012 14.8248L8.69487 12L5.87012 9.17526L7.28433 7.76105L10.1091 10.5858Z" fill="currentColor"></path>
        </svg>
    </div>
</aside>

<script src="./scripts/btnOffCanvas.js"></script>
<script src="./scripts/abrirTarea.js"></script>

<script>
    let taskButton = document.getElementById("taskButton");

    taskButton.addEventListener("click", function() {
        location.href = './index.php?w=taskForm';
    })
</script>

<script>
    let btnCalendar = document.getElementById("calendarBtn");
    let btnFriends = document.getElementById("friendsBtn");

    btnFriends.addEventListener("click", function() {
        location.href = './index.php?w=friends';
    })

    btnCalendar.addEventListener("click", function() {
        location.href = './index.php?w=calendar';
    })

</script>