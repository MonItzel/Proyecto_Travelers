<?php
      require './logica/conexion.php';
     
      $id = $_GET['id'];

      $q = "SELECT * FROM usuarios WHERE id=" . $id;
      $query = mysqli_query($conexion, $q);
      $row = mysqli_fetch_array($query);
      echo $row['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e00854f1d9.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="./styleU.css">
</head>
<body>
    <h2 style="text-align: center";> Modificar Usuario</h2>
    <div id="color"></div>
     <div id="imageContainer">
         <img id="iconImage" src="./assets/iconoL.png" alt="">
    </div>
    <form action="./logica/updateUsuario.php" method="POST">
        <div  class="inputSection">
            <label for="id">Identificador</label>
            <div class="icon"><i class="fa-solid fa-key"></i></i></div>
            <input type="number" readonly  name="id" value="<?php echo $row['id']?>">
        </div>
       
        <div id="userSection" class="inputSection">
            <label for="username">Usuario </label>
            <div class="icon"><i class="fa-solid fa-user"></i></div>
            <input type="text" name="username" value="<?php echo $row['username']?>">
        </div>

        <div id="passSection" class="inputSection">
            <label for="password">Password</label>
            <div class="icon"><i class="fa-solid fa-lock"></i></div>
            <input type="text" name="password" value="<?php echo $row['password']?>">
        </div>

        <div  class="inputSection">
            <label for="role">Rol</label>
            <div class="icon"><i class="fa-solid fa-person-circle-question"></i></div>
            <input type="text" name="role" value="<?php echo $row['role']?>">
        </div>
        
        <button class="btn" type="submit">Actualizar</button>
        <?php
            if(isset($_GET['error']))
                echo "<span>" . $_GET['error'] . "</span>";
        ?>
    </form>



    
</body>
</html>