<?php
$modo = $_POST['modo'];
$id = $_POST['id'];


require_once("../bbdd/task.php");

try {
    $conn = mysqli_connect('localhost', 'joakin', '1234', 'flowplan');
} catch (Exception $e) {
    header("Location: ./error/5xx.php");
    die();
}

if ($modo == "completada") {
    if (setCompleta($id)) {
        unset($_GET);
        unset($_POST);
        $respuesta = array("mensaje" => "completada");
    }else {
        $respuesta = array("mensaje" => "errorCompletada");
    }
} else if($modo == "borrar"){
    if(borrarTarea($id)){
        unset($_GET);
        unset($_POST);
        $respuesta = array("mensaje" => "borrada");
    }else {
        $respuesta = array("mensaje" => "noBorrada");
    }
}



echo json_encode($respuesta);

