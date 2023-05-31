<?php

function registrarUsuario($name,$subname,$mail,$user,$passwd){
    global $conn;

    mysqli_begin_transaction($conn);
  

    $id_usuario = mysqli_insert_id($conn);


    mysqli_query($conn, "INSERT INTO user (nickname,name,subname,passwd,mail) VALUES ('$user','$name','$subname','$passwd','$mail');");
    $agregar_user = $conn->affected_rows;


    if ($agregar_user > 0) {
      // Confirmamos
      mysqli_commit($conn);
      mysqli_close($conn);
      return true;
    } else {
      mysqli_rollback($conn);
      mysqli_close($conn);
      return false;
    }

}