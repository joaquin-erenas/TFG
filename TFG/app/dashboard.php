<div id="dashboardVentana">
    <div class="appInfo">
        <h2>Dashboard</h2>
        <p>05 Apr 2023, Wednesday</p>
    </div>
    <div class="appContainer">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="h6 font-weight-bold text-center mb-4">Progreso actual</h2>

                    <?php
                    $tareasHechas = count($tareasCompletas);
                    if ($tareasHechas > 0) {
                        $porcentaje = ($tareasHechas / $totalTareas) * 100;
                    }else {
                        $porcentaje = 0;
                    }


                    echo <<< EOT
                    <div class="progress mx-auto" data-value='$porcentaje'>
                        <span class="progress-left">
                            <span class="progress-bar" style="border-color:#6c63ff"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar " style="border-color:#6c63ff"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">$tareasHechas / $totalTareas </div>
                        </div>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-6 border-right">
                            <div class="h4 font-weight-bold mb-0">$tareasHechas</div><span class="small text-gray">Tareas hechas</span>
                        </div>
                        <div class="col-6">
                            <div class="h4 font-weight-bold mb-0">$totalTareas</div><span class="small text-gray">Tareas totales</span>
                        </div>
                    </div>

                    EOT;

                    ?>
                </div>
                <div class="col-6">
                    <h2 class="h6 font-weight-bold text-center mb-4 ">Estadísticas</h2>
                    <?php
                    if (isset($_SESSION["premium"])) {
                        $numDeporte = count(getTareasTipo("deporte"));
                        $numCocina = count(getTareasTipo("cocina"));
                        $numMeca = count(getTareasTipo("mecanica"));
                        $numEstudios = count(getTareasTipo("estudios"));
                        $numCreci = count(getTareasTipo("crecimiento"));
                        $numOtro = count(getTareasTipo("otro"));

                        echo <<< EOT
                        <div id="estadisticas" >
                        <p><b>Tareas de 🏃 deporte: $numDeporte</b></p>
                        <p><b>Tareas de 🍳 cocina: $numCocina</b></p>
                        <p><b>Tareas de 🚗 mecánica: $numMeca</b></p>
                        <p><b>Tareas de 🎒 estudios: $numEstudios</b></p>
                        <p><b>Tareas de 🌼 crecimiento: $numCreci</b></p>
                        <p><b>Tareas de 🥷 otro tipo: $numOtro</b></p>
                        </div>
                        EOT;
                    } else {
                        echo <<< EOT
                        <div class="bloqueado shadow-sm">
                        <img id="imgBlock" src="../media/undraw_secure_files_re_6vdh.svg" alt="Locked">
                        <img id="imgUnlock" src="../media/undraw_online_wishes_dlmr.svg" alt="Locked">
                        <h4 id="txtBlock" >Obtener FlowPlan +</h4>
                        </div>
                        EOT;
                    }

                    ?>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>


<script>
    $(function() {

        $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {
            return percentage / 100 * 360

        }

    });
</script>


<script>
    let btnEstadisticas = document.getElementsByClassName("bloqueado");


    if (btnEstadisticas[0] != null) {
        btnEstadisticas[0].addEventListener("click", function() {
            location.href = '../update.php';
        })
    }

</script>