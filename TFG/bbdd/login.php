<?php

function iniciarSesion($user, $pass)
{
  global $conn;


  if ($conn) {
    $sentencia = "SELECT * FROM user where nickname='{$user}' and passwd='{$pass}'";

    $resultado = mysqli_query($conn, $sentencia);

    mysqli_data_seek($resultado, 0);

    $extraido = mysqli_fetch_array($resultado);

    return $extraido != null;
  } else {
    die('<strong>No pudo conectarse:</strong> ');
  }
}


