<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styleU.css">
    <script src="https://kit.fontawesome.com/c41395e978.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


</head>
<body onload="onLoad();">
    <div id="color"></div>
    <div id="imageContainer">
         <img id="iconImage" src="./assets/iconoL.png" alt="">
    </div>
   
        <form action="./logica/login.php" method="POST">
            
            <div  class="inputSection">

                <label for="user">Usuario</label>
                <div class="icon"><i class="fa-solid fa-user"></i></div>
                <input  name="user" type="text"  id="userInput">
                
            </div>
          
            <div id="passSection" class="inputSection">
                <label for="pass">Password</label>
               <div class="icon"><i class="fa-solid fa-lock"></i></div>
                <input name="pass" type="text"  id="passInput">
            </div>

           
            <button class="btn">Acceder</button>

            <?php
                 if(isset($_GET['error']))
                    echo "<span>" . $_GET['error'] . "</span>";
            ?>

            <h4>Aún no tienes una cuenta</h4>
            <i id="hand" class='bx bxs-hand-down'></i>
            <button class="btn"><a id="txtD" href="./registrarse.php">Registrate Aqui</a></button>  
           
        </form>
        

    
    

    <script src="usuario.js"></script>
    
</body>
</html>