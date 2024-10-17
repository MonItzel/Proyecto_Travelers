
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styleU.css">
    <script src="https://kit.fontawesome.com/c41395e978.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <h2 style="text-align: center"; > Registrarse</h2>

    <div id="color"></div>
    <div id="imageContainer">
         <img id="iconImage" src="./assets/iconoL.png" alt="">
    </div>
    <form action="./logica/insertarUsuario.php" method="POST" enctype="multipart/form-data">

            
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

        <button class="btn" type="submit">Registrarse</button>
        <?php
            if(isset($_GET['error']))
                echo "<span>" . $_GET['error'] . "</span>";
        ?>
    </form>


</body>
</html>