<?php
//Con esto tengo acceso al codigo del archivo
    require 'conexion.php';

      //Si no le llega una variable o la otra direcciona la pagina
      if(!isset($_POST["user"]) || !isset($_POST["pass"])){
        header("Location:http://localhost/Proyecto/usuario.php");
    }

    session_start();
    $user = $_POST["user"];
    $pass = $_POST["pass"];

   // $_SESSION["user"] = $user;

   $q = "SELECT COUNT(*) as traveler, role FROM usuarios WHERE username='".$user."' AND password='".$pass."'";
   
   $query = mysqli_query($conexion, $q);
   $array = mysqli_fetch_array($query);
  
   

if($array['traveler'] > 0){
  //echo "Login exitoso";
  $_SESSION['username'] = $user;
  $_SESSION['role'] = $array['role'];
  header("Location: http://localhost/Proyecto/index.php");
}
else{
  //echo "Login incorrecto";
  header("Location: http://localhost/Proyecto/usuario.php?error=Datos Incorrectos");
  
}

  // echo $q;
?>