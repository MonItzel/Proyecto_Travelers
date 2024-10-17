<?php

echo "BOTON 1  USUARIOS REGISTRADOS EN LA BD";
?>
<?php
require './logica/conexion.php';
  
  session_start();
  if(isset($_SESSION['role']) && $_SESSION['role'] == "ADMIN"){
    $role = $_SESSION['role'];
}      
else{
    header("Location: http://localhost/Proyecto/index.php");
    return;
}
  
  $q = "SELECT * FROM usuarios";
  $query = mysqli_query($conexion, $q);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./stylesmuestraT.css">
    <link rel="stylesheet" href="./styleU.css">
    <script src="https://kit.fontawesome.com/e00854f1d9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

        <h1  style="text-align: center";>Administrar Usuarios</h1>
        <button id="btnT"><a href="#iraAgregar"> Agregar<i class="fa-solid fa-user-plus"></a></i></button>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Contraseña</th>
                <th>Rol</th>
                
                <!--Botones-->
                <th>Editar</th>
                <th>Eliminar</th>
    
            </tr>

            <?php
        //recorre cada uno de los renglones
            while($row = mysqli_fetch_array($query)){
        ?>
                
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['password']?></td>
                    <td><?php echo $row['role']?></td> 
                                
                    <td><button id="btnE" onclick="window.location.href='./editUsuario.php?id= <?php echo $row['id'] ?>'"><i class="fa-solid fa-user-pen"></i></button></td>
                    <td><button id="btnD" onclick="window.location.href='./logica/deleteUsuario.php?id= <?php echo $row['id'] ?>'" ><i class="fa-solid fa-trash-can"></i></button></td>
                </tr>
        <?php

            }
        ?>
    </table>

    <br><br><br>
    <h2 style="text-align: center"; ><a name="iraAgregar"> Registrar Usuario</h2>

    
    <div id="imageContainer">
         <img id="iconImage" src="./assets/iconoL.png" alt="">
    </div>
    <form action="./logica/insertaUp.php" method="POST" enctype="multipart/form-data">

            
         <div  class="inputSection">
            <label for="id">Identificador</label>
            <div class="icon"><i class="fa-solid fa-key"></i></i></div>
            <input type="number" name="id">      
        </div>

        <div id="userSection" class="inputSection">

            <label for="username">Usuario</label>
            <div class="icon"><i class="fa-solid fa-user"></i></div>
            <input  name="username" type="text"  id="userInput">
                
        </div>
          
        <div id="passSection" class="inputSection">
            <label for="password">Password</label>
            <div class="icon"><i class="fa-solid fa-lock"></i></div>
            <input name="password" type="text"  id="passInput">
        </div>
            
        <div  class="inputSection">
            <label for="role">Role</label>
            <div class="icon"><i class="fa-solid fa-person-circle-question"></i></div>
            <input type="text" name="role">
        </div>

        <br><button class="btn" type="submit">Agregar</button>
           
        <?php
            if(isset($_GET['error']))
                echo "<span>" . $_GET['error'] . "</span>";
        ?>
    </form>
    <br><br><br><br><br><br><br><br><br>
</body>
</html>