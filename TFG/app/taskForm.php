<?php

if (isset($_GET["taskDateStart"]) && !empty($_GET["taskDateStart"])) {
    $year = date('Y');
    $month = date('m');
    $day = $_GET["taskDateStart"];
}

?>
<div id="taskForm">
    <div class="appInfo">
        <?php
        if(isset($day)){
            echo "<h2>Tarea para el $day-$month-$year</h2>";
        }else {
            echo "<h2>Nueva tarea</h2>";
        }
        
        ?>
        <p>05 Apr 2023, Wednesday</p>
    </div>
    <div class="appContainer">
        <div id="newTaskGrid">
            <div class="taskCard shadow" id="tareaDeporte">
                <div class="taskCardImage">
                    <img src="../media/undraw_pilates_ltw9.svg" alt="">
                </div>
                <div class="taskCard-footer shadow-sm">
                    <span>🏃Deporte</span>
                </div>
            </div>
            <div class="taskCard shadow" id="tareaCocina">
                <div class="taskCardImage">
                    <img src="../media/undraw_pancakes_238t.svg" alt="">
                </div>
                <div class="taskCard-footer shadow-sm">
                    <span>🍳 Cocina</span>
                </div>
            </div>
            <div class="taskCard shadow" id="tareaMecanica">
                <div class="taskCardImage">
                    <img src="../media/undraw_automobile_repair_ywci.svg" alt="">
                </div>
                <div class="taskCard-footer shadow-sm">
                    <span>🚗 Mecánica</span>
                </div>
            </div>
            <div class="taskCard shadow" id="tareaEstudios">
                <div class="taskCardImage">
                    <img src="../media/undraw_learning_sketching_nd4f.svg" alt="">
                </div>
                <div class="taskCard-footer shadow-sm">
                    <span>🎒 Estudios</span>
                </div>
            </div>
            <div class="taskCard shadow" id="tareaCrecimiento">
                <div class="taskCardImage">
                    <img src="../media/undraw_blooming_re_2kc4.svg" alt="">
                </div>
                <div class="taskCard-footer shadow-sm">
                    <span>🌼 Crecimiento</span>
                </div>
            </div>
            <div class="taskCard shadow" id="tareaOtro">
                <div class="taskCardImage">
                    <img src="../media/undraw_coffee_with_friends_3cbj.svg" alt="">
                </div>
                <div class="taskCard-footer shadow-sm">
                    <span>🥷 Otro tipo</span>
                </div>
            </div>



            <!--
                <form>
                    <div class="col-md-10">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" name="taskName" class="form-control" id="inputNombre">
                    </div>
                    <div class="col-md-10">
                        <label for="descTask" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descTask" rows="1" id="descTask"></textarea>
                    </div>
                    <div class="col-md-10">
                        <label for="exampleFormControlTextarea1" class="form-label">Importancia</label>
                        <select class="form-select" name="importanceTask" aria-label="Importancia tarea">
                            <option selected disabled>Importancia de la tarea</option>
                            <option value="1">Alta</option>
                            <option value="2">Media</option>
                            <option value="3">Baja</option>
                        </select>
                    </div>
                    <div class="col-md-10">
                        <label for="inputAddress" class="form-label">Fecha inicio</label>
                        <input type="date" name="startTask" class="form-control">
                    </div>
                    <div class="col-md-10">
                        <label for="inputAddress" class="form-label">Fecha fin</label>
                        <input type="date" name="endTask" class="form-control">
                    </div>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-principal">Crear tarea</button>
                    </div>
                </form>-->

            <!--
            <div>

                <table id="calendario">
                    <tr>
                        <th colspan="7">Mayo 2023</th>
                    </tr>
                    <tr>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                        <th>Domingo</th>
                    </tr>


                </table>-->

            <!--<img src="../media/undraw_elements_re_25t9.svg" alt="Nueva tarea" style="max-width: 90%;">

            </div>-->
        </div>
        <div id="taskFormContainer" style="display: none;">
            <div class="container">
                <h2 id="taskFormContainer-title">Tarea de</h2><br>
                <form action="./index.php" method="get">
                    <input type="hidden" name="taskType" id="tipoTarea" value="">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="taskName" required class="form-control" id="floatingInputNombre">
                                <label for="floatingInputGrid">Nombre de la tarea</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="taskDesc" required class="form-control" id="floatingInputDesc">
                                <label for="floatingInputGrid">Descripción</label>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <?php        
                                if(isset($_GET["taskDateStart"]) && !empty($_GET["taskDateStart"])) {
                                    echo <<< EOT
                                        <input type="date" name="taskDateStart" required class="form-control" id="floatingInputGrid" min="
                                        EOT;                                       
                                    echo date('Y-m-d').'"';
                                    echo "value='".$year."-".$month."-".$day."'>";
                                }else {
                                    echo <<< EOT
                                    <input type="date" name="taskDateStart" required class="form-control" id="floatingInputGrid" min="
                                    EOT;                                       
                                    echo date('Y-m-d').">";
                                }
                                ?>
                                <label for="floatingInputGrid">Fecha de inicio</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="date" name="taskDateEnd" required class="form-control" id="floatingInputGrid" min="<?php echo date('Y-m-d'); ?>">
                                <label for="floatingInputGrid">Fecha de fin</label>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <input type="submit" class="btn btn-principal" style="margin-bottom: 20px;" value="Crear tarea">
                        <button class="btn btn-secundario" id="btnVolverTask">Volver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./scripts/botonesTask.js"></script>