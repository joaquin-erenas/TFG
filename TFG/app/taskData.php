<?php


try {
    $conn = mysqli_connect('localhost', 'joakin', '1234', 'flowplan');
} catch (Exception $e) {
    header("Location: ./error/5xx.php");
    die();
}


$sentencia = "SELECT * FROM task";

$resultado = mysqli_query($conn, $sentencia);

mysqli_data_seek($resultado, 0);


$extraido = mysqli_fetch_array($resultado);

while ($extraido !== null) {
    $split = explode("-", $extraido["fecha_inicio"]);
    $dia = $split[2];
    $mes = $split[0];

    $jsonobj = $extraido["fecha_inicio"];

    $extraido = mysqli_fetch_array($resultado);
}


echo json_encode($jsonobj);
