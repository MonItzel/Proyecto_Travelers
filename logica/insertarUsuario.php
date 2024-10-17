<?php
    require 'conexion.php';

    //Si no le llega una variable o la otra direcciona la pagina
    if(!isset($_POST["id"]) || !isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["role"])){
      header("Location:http://localhost/Proyecto/registrarse.php?error=Datos Incompletos");
      return;
  }

  $id = $_POST["id"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $role = $_POST["role"];

  

  //Crea el codigo para insertar el producto
  $q = "INSERT INTO usuarios VALUES ('" .$id ."', '" . $username . "', '" . $password . "', '" . $role . "')";



  //echo $q;

  try{
    //Ejecuta el producto osea lo inserta en la base de datos y ya hace que se muestre en la pagina
    $query = mysqli_query($conexion, $q);
    header("Location:http://localhost/Proyecto/usuario.php");
  }catch(Exception $e){
      /*Forma 1
    header("Location:http://localhost/EjerciciosPhp/productsAdmin.php?error=Error al insertar el producto");*/
    
    //FORMA 2
    header("Location:http://localhost/Proyecto/registrarse.php?error=" . $e->getMessage());
    //con la -> accedo al método de la excepcion
  }
  
  
  
  ?>