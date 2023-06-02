<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="./media/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                FlowPlan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Soluciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Crear tareas</a></li>
                            <li><a class="dropdown-item" href="#">Calendario</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Inteligencia artificial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Suscripciones</a>
                    </li>
                </ul>

                <a class="btn btn-secundario" href="../TFG/update.php">Ver diferentes planes</a>
                <div class="separadorMenu"></div>
                <?php

                if (isset($_SESSION["user"])) {
                    echo <<< EOT
                        <a href="./app/index.php" class="btn btn-principal">{$_SESSION["user"]}</a>
                        <button class="btn btn-logOut" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 13L16 11 7 11 7 8 2 12 7 16 7 13z"></path>
                                <path d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z"></path>
                            </svg>
                        </button>
                    EOT;
                } else {
                    echo <<< EOT
                    <a href="./register.php" class="btn btn-terciario">Unete !</a>
                    <a href="./login.php" class="btn btn-principal">Log in</a>
                    EOT;
                }

                ?>


            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión 😴</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseas cerrar la sesión de <?php echo '<b>'.$_SESSION["user"].'</b> ? '?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="out" class="btn btn-logOut">Si, cerrar sesión</button>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    let btnOut =document.getElementById("out");

    btnOut.addEventListener("click",function(){
        location.href = './index.php?status=out';
    })
</script>