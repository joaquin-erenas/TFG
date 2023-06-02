<div id="taskForm">
    <div class="appInfo">
        <h2>Calendario</h2>
        <p>05 Apr 2023, Wednesday</p>
    </div>
    <div class="appContainer">
        <div>
            <table id="calendario">
                <?php
                    // Obtener el año y el mes actual
                    $year = date('Y');
                    $month = date('m') ;
                    $meses = array('Nulo','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

                    $monthTXT = $meses[ltrim($month, '0')];
                ?>
                <tr>
                    <?php
                        echo '<th colspan="7">'.$monthTXT.' de '.$year.'</th>';
                    ?>            
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
                <?php
                // Obtener el primer día del mes
                $firstDay = mktime(0, 0, 0, $month, 1, $year);

                // Obtener el número de días en el mes
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                // Obtener el día de la semana del primer día del mes
                $dayOfWeek = date('w', $firstDay);

                // Calcular el número de celdas vacías antes del primer día
                $emptyCells = $dayOfWeek == 0 ? 6 : $dayOfWeek - 1;

                // Iniciar el contador de días
                $currentDay = 1;


                // Obtener tareas

                $diasOcupados = array();
                // Generar las celdas del calendario
                for ($row = 0; $row < 6; $row++) {
                    echo "<tr>";
                    for ($col = 0; $col < 7; $col++) {
                        if ($emptyCells > 0) {
                            echo "<td></td>";
                            $emptyCells--;
                        } elseif ($currentDay <= $daysInMonth) {
                            if($currentDay >= 1 && $currentDay<=9){
                                $currentDay = '0'.$currentDay;
                            }
                            foreach ($todasTareas as $tarea) {
                                if ($tarea[4] == $year . "-" . $month . "-" . $currentDay) {
                                    array_push($diasOcupados, $currentDay);
                                }
                            }
                            // Generar valores RGB aleatorios
                            $red = rand(0, 255);
                            $green = rand(0, 255);
                            $blue = rand(0, 255);

                            // Construir el código hexadecimal del color
                            $hexColor = sprintf("#%02x%02x%02x", $red, $green, $blue);

                            if ($currentDay == date('j') && $month == date('m') && $year == date('Y')) {
                                if (in_array($currentDay, $diasOcupados)) {
                                    echo "<td class='dia today ocupado' id='noDispo' style='background-color:$hexColor'>$currentDay</td>";
                                } else {
                                    echo "<td class='dia today'>$currentDay</td>";
                                }
                            } else if (in_array($currentDay, $diasOcupados)) {
                                echo "<td class='dia ocupado' id='noDispo' style='background-color:$hexColor'>$currentDay</td>";

                            } else {
                                if($currentDay < date('j')){
                                    echo "<td>$currentDay</td>";
                                }else {
                                    echo "<td class='dia'>$currentDay</td>";
                                }

                            }

                            $currentDay++;
                        } else {
                            break;
                        }
                    }
                    echo "</tr>";
                    if ($currentDay > $daysInMonth) {
                        break;
                    }
                }
                ?>
            </table>
        </div>
    </div>

</div>
</div>


<script>
    let dias = document.getElementsByClassName("dia");

    for (let i = 0; i < dias.length; i++) {
        dias[i].addEventListener("click", function() {
            if(dias[i].id == "noDispo"){
                location.href = './index.php?w=allTask&dia='+dias[i].innerHTML;
            }else {
                location.href = './index.php?w=taskForm&taskDateStart='+dias[i].innerHTML;
            }

        })

    }

</script>