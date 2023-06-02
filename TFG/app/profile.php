<?php


if (isset($_GET["u"]) && !empty($_GET["u"])) {
    $usuario = $_GET["u"];
    require_once("../bbdd/amigoBBDD.php");
    $datosUser = buscarAmigo($usuario);
    if (isset($datosUser[0])) {
        if ($usuario == $_SESSION["user"]) {
            $perfilPersonal = true;
        } else {
            $esAmigo = comprobarAmigo($usuario);
        }
    } else {
        $usuario = $_SESSION["user"];
    }
} else {
    $usuario = $_SESSION["user"];
}

$premiumUsuario = obtenerPremiumUsuario($usuario);


?>

<div id="dashboardVentana">
    <div class="appInfo">
        <h2>Perfil de <?php echo $usuario ?></h2>
        <p>05 Apr 2023, Wednesday</p>
    </div>
    <div class="appContainer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner">
                        <div class="fotoPerfil shadow-sm">
                            <?php
                            if (isset($premiumUsuario)) {
                                echo '<img src="../media/corona.png" alt="Corona" id="corona">';
                            }
                            $randomFoto = rand(1, 6);
                            switch ($randomFoto) {
                                case 1:
                                    echo '<img src="../media/pPicture/chihua.png" alt="Perfil" class="pPicture">';
                                    break;
                                case 2:
                                    echo '<img src="../media/pPicture/boxer.png" alt="Perfil" class="pPicture">';
                                    break;
                                case 3:
                                    echo '<img src="../media/pPicture/bows.png" alt="Perfil" class="pPicture">';
                                    break;
                                case 4:
                                    echo '<img src="../media/pPicture/cocktail.png" alt="Perfil" class="pPicture">';
                                    break;
                                case 5:
                                    echo '<img src="../media/pPicture/huski.png" alt="Perfil" class="pPicture">';
                                    break;
                                case 6:
                                    echo '<img src="../media/pPicture/labra.png" alt="Perfil" class="pPicture">';
                                    break;
                                default:
                                    echo '<img src="../media/pPicture/chihua.png" alt="Perfil" class="pPicture">';
                                    break;
                            }
                            ?>
                            
                        </div>
                    </div>
                    <div class="contenidoPerfil">
                        <div id="headerContenido">
                            <div id="infoPerfil">
                                <?php
                                if (isset($esAmigo)) {
                                    if ($esAmigo) {
                                        echo '<button class="btn btn-logOut btnEliminar" id="' . $esAmigo[0][1] . '">Eliminar amigo</button>';
                                    } else {
                                        $idUsuario = obtenerId($usuario);
                                        echo '<button class="btn btn-success btnAgregar" id="' . $idUsuario . '" >Agregar</button>';
                                    }
                                } else {
                                    echo '<button class="btn btn-principal" id="btnNueva">Nueva tarea</button>';
                                    echo '<button class="btn btn-secundario" id="btnDashboard">Dashboard</button>';
                                }

                                ?>

                            </div>
                        </div>
                        <div id="newTaskGrid">
                            <?php
                            $tareasMostrar = getTareasNombre($usuario);
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
                                            <div id="$taskId" class="taskCard allTasks shadow" style="cursor:initial">
                                            <div class="taskCardImage">
                                            EOT;
                                        if ($tipo == "deporte") {
                                            echo '<img src="../media/undraw_pilates_ltw9.svg" alt="Tarea deporte">';
                                        } else if ($tipo == "cocina") {
                                            echo '<img src="../media/undraw_cooking_p7m1.svg" alt="Tarea de cocina">';
                                        } else if ($tipo == "mecanica") {
                                            echo '<img src="../media/undraw_automobile_repair_ywci.svg" alt="Tarea de mecanica">';
                                        } else if ($tipo == "estudios") {
                                            echo '<img src="../media/undraw_mathematics_-4-otb.svg" alt="Tarea de estudios">';
                                        } else if ($tipo == "crecimiento") {
                                            echo '<img src="../media/undraw_book_lover_re_rwjy.svg" alt="Tarea de crecimiento">';
                                        } else {
                                            $fotoRand = rand(1, 3);
                                            if ($fotoRand == 1) {
                                                echo '<img src="../media/undraw_coffee_with_friends_3cbj.svg" alt="Otra tarea">';
                                            } else if ($fotoRand == 2) {
                                                echo '<img src="../media/undraw_artificial_intelligence_re_enpp.svg" alt="Otra tarea">';
                                            } else {
                                                echo '<img src="../media/undraw_into_the_night_vumi.svg" alt="Otra tarea">';
                                            }
                                        }

                                        echo <<< EOT
                            </div>
                            <div class="taskCard-footer" style="justify-content:space-around">
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
            </div>
        </div>

    </div>
</div>
</div>
</div>

<script>
    let btnNuevaTarea = document.getElementById("btnNueva");
    let btnDashboard = document.getElementById("btnDashboard");

    if (btnDashboard != null) {
        btnDashboard.addEventListener("click", function() {
            location.href = './index.php';
        })
    }

    if (btnNuevaTarea != null) {
        btnNuevaTarea.addEventListener("click", function() {
            location.href = './index.php?w=taskForm';
        })
    }
</script>

<script>
    let addAmigoBtn = document.getElementsByClassName("btnAgregar");

    if (addAmigoBtn[0] != null) {
        addAmigoBtn[0].addEventListener("click", function() {
            location.href = './index.php?w=friends&add=' + addAmigoBtn[0].id;
        })
    }
</script>

<script>
    let eliminarAmigo = document.getElementsByClassName("btnEliminar");

    if (eliminarAmigo[0] != null) {
        eliminarAmigo[0].addEventListener("click", function() {
            location.href = './index.php?w=friends&eli=' + eliminarAmigo[0].id;
        })
    }
</script>