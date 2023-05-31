<?php

try {
  $conn = mysqli_connect('localhost', 'joakin', '1234', 'flowplan');
} catch (Exception $e) {
  header("Location: ./error/5xx.php");
  die();
}


// Probar conexión
if (mysqli_connect_errno()) {
  header("Location: ./error/5xx.php");
  die();
} else {
  define("CONEXION_VALIDA", true);
}
