<?php
    
  require 'conexion.php';

  $id = $_GET['id'];
  $q = "DELETE FROM usuarios WHERE id =" . $id;
  
  echo $q;
  ?>
  <?php
  try{
   
    $query = mysqli_query($conexion, $q);
    header("Location:http://localhost/Proyecto/index.php");

  }catch(Exception $e){
      
    header("Location:http://localhost/Proyecto/index.php?error=" . $e->getMessage());
    
  }
   
  ?>
