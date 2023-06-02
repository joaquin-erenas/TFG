<?php

function buscarAmigo($user)
{
    global $conn;
    if ($conn) {
        $sentencia = "SELECT * FROM user where nickname='{$user}'";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);


        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}


function comprobarAmigo($user){
    global $conn;

    $id = $_SESSION["idUser"];
    if ($conn) {
        $sentencia = "SELECT * FROM friend where id_user = $id and id_amigo in (select id_user from user where nickname='{$user}');";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);


        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}

function getAmigos()
{
    global $conn;

    $id = $_SESSION["idUser"];
    if ($conn) {
        $sentencia = "SELECT * FROM user where id_user in (select id_amigo from friend where id_user='{$id}');";

        $resultado = mysqli_query($conn, $sentencia);

        mysqli_data_seek($resultado, 0);

        $extraido = mysqli_fetch_all($resultado);


        return $extraido;
    } else {
        die('<strong>No pudo conectarse:</strong>');
    }
}


function agregarAmigo($idAmi)
{
    global $conn;
    try {
        $id = $_SESSION["idUser"];
        if ($conn) {
            mysqli_begin_transaction($conn);
            $sentencia = "INSERT INTO `friend` (`id_user`, `id_amigo`) VALUES ('{$id}', '{$idAmi}');";
            $resultado = mysqli_query($conn, $sentencia);
            $sentencia = "INSERT INTO `friend` (`id_user`, `id_amigo`) VALUES ('{$idAmi}', '{$id}');";
            $resultado = mysqli_query($conn, $sentencia);


            if ($conn->affected_rows > 0) {
                mysqli_commit($conn);
                return true;
            } else {
                mysqli_rollback($conn);
                return false;
            }

        } else {
            die('<strong>No pudo conectarse:</strong>');
        }
    }catch(Exception $e){
        return false;
    }
}

function eliminarAmigo($idAmi)
{
    global $conn;
    try {
        $id = $_SESSION["idUser"];
        if ($conn) {
            mysqli_begin_transaction($conn);
            $sentencia = "DELETE FROM friend WHERE `friend`.`id_user` = $id AND `friend`.`id_amigo` = $idAmi";
            $resultado = mysqli_query($conn, $sentencia);
            $sentencia = "DELETE FROM friend WHERE `friend`.`id_user` = $idAmi AND `friend`.`id_amigo` = $id";
            $resultado = mysqli_query($conn, $sentencia);

            if ($conn->affected_rows > 0) {
                mysqli_commit($conn);
                return true;
            } else {
                mysqli_rollback($conn);
                return false;
            }

        } else {
            die('<strong>No pudo conectarse:</strong>');
        }
    }catch(Exception $e){
        return false;
    }
}