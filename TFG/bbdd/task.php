<?php

require_once("../bbdd/userData.php");


function getTareas()
{
    global $conn;

    $id = $_SESSION["idUser"];

    if ($conn) {
        $sentencia = "SELECT * FROM task where id_user='" . $id . "'";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}


function getTareasAmigo($id)
{
    global $conn;

    if ($conn) {
        $sentencia = "SELECT * FROM task where id_user='" . $id . "'";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function getTareasNombre($user)
{
    global $conn;

    if ($conn) {
        $sentencia = "SELECT * FROM task where id_user in (select id_user from user where nickname = '{$user}');";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function getTareasActivas()
{
    global $conn;

    $id = $_SESSION["idUser"];
    $hoy = date("Y-m-d");

    if ($conn) {
        $sentencia = "SELECT * FROM task where id_user='" . $id . "' and 
        '$hoy' >= fecha_inicio and completado != 1";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}


function getTareasActivasGeneral()
{
    global $conn;

    $id = $_SESSION["idUser"];
    $hoy = date("Y-m-d");

    if ($conn) {
        $sentencia = "SELECT * FROM task where id_user='" . $id . "' and completado != 1";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function getTareasCompletas()
{
    global $conn;

    $id = $_SESSION["idUser"];

    if ($conn) {
        $sentencia = "SELECT * FROM task where id_user='" . $id . "' and completado = 1";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function getTareas_IDTarea($id)
{
    global $conn;

    if ($conn) {
        $sentencia = "SELECT * FROM task where id_task='" . $id . "'";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function getTareasTipo($tipo)
{
    global $conn;

    $id = $_SESSION["idUser"];

    if ($conn) {
        $sentencia = "SELECT * FROM task where id_user='" . $id . "' and tipo = '".$tipo."';";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);
        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}


function setTarea($tarea,$descTarea,$typeTask,$startTask,$endTask)
{
    global $conn;

    $id = $_SESSION["idUser"];
    if ($conn) {
        mysqli_begin_transaction($conn);

        mysqli_query($conn, "INSERT INTO task (id_user,nombre,descripcion,fecha_inicio,fecha_fin,tipo) 
        VALUES ('$id','$tarea','$descTarea','$startTask','$endTask','$typeTask');");
        $agregar_tarea = $conn->affected_rows;


        if ($agregar_tarea > 0) {
            // Confirmamos
            mysqli_commit($conn);
            return true;
        } else {
            mysqli_rollback($conn);
            return false;
        }
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}


function setCompleta($id){
    global $conn;

    try {
        if ($conn) {
            $query = "UPDATE `task` SET `completado` = '1' WHERE `task`.`id_task` = $id;";
    

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


function borrarTarea($id){
    global $conn;

    try {
        if ($conn) {
            $query = "DELETE FROM task WHERE task.id_task =".$id.";";
    

            $borrado = mysqli_query($conn, $query);


            mysqli_close($conn);
    
            return $borrado;
        } else {
            die('<strong>No pudo conectarse:</strong>');
        }
    } catch (Exception $e) {
        return false;
    }

}
