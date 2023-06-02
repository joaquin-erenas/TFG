<?php
require_once("../bbdd/amigoBBDD.php");

if (isset($_GET["friendName"]) && !empty($_GET["friendName"])) {
    $amigo = buscarAmigo(htmlspecialchars($_GET["friendName"]));
    if (isset($amigo[0])) {
        $idAmigo = $amigo[0][0];
        $nombreAmigo = $amigo[0][1];
        if (!empty($idAmigo) and $nombreAmigo != $_SESSION["user"]) {
            $encontrado = true;
        } else {
            $noEncontrado = true;
        }
    } else {
        $noEncontrado = true;
    }
}

if (isset($_GET["add"]) && !empty($_GET["add"])) {
    if (agregarAmigo($_GET["add"])) {
        echo <<< EOT
        <script>
            location.href = './index.php?w=friends&status=nFri';

        </script>
        EOT;
    } else {
        echo <<< EOT
        <script>
            location.href = './index.php?w=friends&status=nFri_no';

        </script>
        EOT;
    }
}

if (isset($_GET["eli"]) && !empty($_GET["eli"])) {
    if (eliminarAmigo($_GET["eli"])) {
        echo <<< EOT
        <script>
            location.href = './index.php?w=friends&status=nEli';

        </script>
        EOT;
    } else {
        echo <<< EOT
        <script>
            location.href = './index.php?w=friends&status=nEli_no';
        </script>
        EOT;
    }
}

?>

<div id="dashboardVentana">
    <div class="appInfo">
        <h2>Comunidad</h2>
        <p>05 Apr 2023, Wednesday</p>
    </div>
    <div class="appContainer">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="h6 font-weight-bold text-center mb-4">Filtrar</h2>
                    <form action="./index.php" method="get">
                        <div class="search">
                            <input type="text" class="search-input" placeholder="Buscar usuario..." name="friendName" required>
                            <input type="hidden" name="w" value="friends">
                            <button class="search-icon">

                                <svg stroke="black" fill="black" stroke-width="0" version="1" viewBox="0 0 48 48" enable-background="new 0 0 48 48" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="#3F51B5">
                                        <polygon points="44,24 30,35.7 30,12.3"></polygon>
                                        <rect x="6" y="20" width="27" height="8"></rect>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <?php

                    if (isset($encontrado)) {
                        echo '<ul class="list-group">';
                        echo <<<EOT
                        <li class="list-group-item d-flex justify-content-between align-items-center btn-terciario btnAgregar" id="$idAmigo">
                            <img src="https://cdn.icon-icons.com/icons2/906/PNG/512/question_icon-icons.com_69970.png" alt="Perfil" class="pPicture shadow">
                            <h4>$nombreAmigo</h4>
                            <span class="badge bg-projects-normal rounded-pill" id="agregarBtn">Agregar</span>
                        </li>
                        EOT;
                        echo '</ul>';
                    } else if (isset($noEncontrado)) {

                        echo '<img src="../media/undraw_void_-3-ggu.svg" alt="No encontrado" id="noEncontrado">';
                    }

                    ?>
                </div>
                <div class="col-6">
                    <h2 class="h6 font-weight-bold text-center mb-4 ">Listado de amigos</h2>
                    <ul class="list-group">
                        <?php
                        $amigos = getAmigos();
                        if (isset($amigos[0])) {
                            foreach ($amigos as $amigo) {
                                $totalTareas = count(getTareasAmigo($amigo[0]));
                                echo <<<EOT
                                    <li class="list-group-item d-flex justify-content-between align-items-center btn-terciario amigo" id="{$amigo[1]}">
                                EOT;
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


                                echo <<<EOT
                                        <h4>{$amigo[1]}</h4>
                                        <span class="badge bg-projects-alerta rounded-pill">{$totalTareas}</span>
                                    </li>
                                EOT;
                            }
                        } else {
                            echo '<img src="../media/undraw_taken_re_yn20.svg" id="noEncontrado" alt="Sin amigos">';
                        }

                        ?>
                    </ul>


                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>


<script>
    let addAmigoBtn = document.getElementsByClassName("btnAgregar");

    if (addAmigoBtn[0] != null) {
        addAmigoBtn[0].addEventListener("click", function() {
            location.href = './index.php?w=friends&add=' + addAmigoBtn[0].id;
        })
    }
</script>


<script>
    let amigos = document.getElementsByClassName("amigo");


    for (let i = 0; i < amigos.length; i++) {
        amigos[i].addEventListener("click", function() {
            location.href = './index.php?w=profile&u=' + amigos[i].id;
        })
    }
</script>