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