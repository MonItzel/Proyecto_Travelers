<?php
  //echo "Estas saliendo de la sesión";
  session_start();
  //Destruir todas las sesiones
  session_destroy();
  header("Location: http://localhost/Proyecto/usuario.php");

?>