<?php 

function obtenerId($user){
    global $conn;
    if ($conn) {
        $sentencia = "SELECT * FROM user where nickname='{$user}'";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);

        $id = $extraido[0][0];

        return $id;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function obtenerPremium(){
    global $conn;

    $id = $_SESSION["idUser"];
    if ($conn) {
        $sentencia = "SELECT plan FROM user where id_user='{$id}'";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);

        $plan = $extraido[0][0];

        return $plan;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function obtenerPremiumUsuario($user){
    global $conn;

    if ($conn) {
        $sentencia = "SELECT plan FROM user where nickname='{$user}'";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        if (isset($extraido[0])) {
            $plan = $extraido[0][0];
        }else {
            $plan = null;
        }

        return $plan;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function planPremium(){
    global $conn;

    $id = $_SESSION["idUser"];
    try {
        if ($conn) {
            $query = "UPDATE `user` SET `plan` = 'premium' WHERE `user`.`id_user` = $id;";
    
            $completado = mysqli_query($conn, $query);

            mysqli_close($conn);
    
            return $completado;
        } else {
            die('<strong>No pudo conectarse:</strong>');
        }
    } catch (Exception $e) {
        return false;
    }
}

function quitarPremium(){
    global $conn;

    $id = $_SESSION["idUser"];
    try {
        if ($conn) {
            $query = "UPDATE `user` SET `plan` = null WHERE `user`.`id_user` = $id;";
    
            $completado = mysqli_query($conn, $query);

            mysqli_close($conn);
    
            return $completado;
        } else {
            die('<strong>No pudo conectarse:</strong>');
        }
    } catch (Exception $e) {
        return false;
    }
}