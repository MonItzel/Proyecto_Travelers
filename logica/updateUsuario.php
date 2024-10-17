<?php
    require 'conexion.php';

    //Si no le llega una variable o la otra direcciona la pagina
    if(!isset($_POST["id"]) || !isset($_POST["username"] )|| !isset($_POST["password"]) ||  !isset($_POST["role"])){
      header("Location:http://localhost/EjerciciosPhp/muestraTabla.php?error=Datos Incompletos");
  }

  $id = $_POST["id"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $role = $_POST["role"];

//UPDATE productos SET price = '35' WHERE id= 5;


  //Crea el codigo para insertar el producto
  $q = "UPDATE usuarios SET username='". $username."', password = '". $password."', role= '". $role ."' WHERE id=".$id;
  //echo $q;

  
  try{
    $query = mysqli_query($conexion, $q);
    header("Location:http://localhost/Proyecto/index.php");
  }catch(Exception $e){
    header("Location:http://localhost/Proyecto/muestraTabla.php?error=" . $e->getMessage());

  }

  
  ?>