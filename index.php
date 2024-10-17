<?php
    session_start();
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
    }      
    else
        header("Location: http://localhost/Proyecto/usuario.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e00854f1d9.js" crossorigin="anonymous"></script>
    
    
</head>
<body onload="MuestraTabla();">     
    
    <button onclick="showMenu();" class="option" id="menuicon"><i id="colori" class="fa-solid fa-bars"></i></button>
    <nav class="sidebar">
        <div class="menu-bar ">
            <div class="menu ">
                <img src="./assets/Travelers.png"></img>
                
             <ul class="menu-links" id="nav">
                <li class="nav-link">
                    <a href="usuario.php">
                        <i class='bx bxs-user-circle icon'></i>
                        <span class="text nav-text" class="option">Usuario</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="Alojamientos.html">
                        <i class='bx bxs-bed icon' ></i>
                        <span class="text nav-text" class="option">Alojamientos</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="Paquetes.html">
                        <i class='bx bx-swim icon' ></i>
                        <span class="text nav-text" class="option" >Paquetes</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bxs-directions icon'></i>
                        <span class="text nav-text" class="option">Actividades</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="explore.html">
                        <i class='bx bx-world icon' ></i>
                        <span class="text nav-text" class="option">Explore</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="blog.html">
                        <i class='bx bxs-photo-album icon' ></i>
                        <span class="text nav-text" class="option">Blog</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="restricciones.html">
                        <i class='bx bxs-lock icon' ></i>
                        <span class="text nav-text" class="option">Restricciones de viaje</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="tips.html">
                        <i class='bx bxs-book-heart icon' ></i>
                        <span class="text nav-text" class="option">Tips</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-trip icon' ></i>
                        <span class="text nav-text" class="option">viajes</span>
                    </a>
                </li>

            </ul>
        </div>

        </div>

    </nav>

    <section class="home">
        
        <!--<div class="cuadrado">-->
            

            <span class="text">Bienvenido<?php echo "  $username ";?></span>
            <span class="text">Tu rol es <?php echo "  $role  ";?></span>
    
            <button id="cerrar" ><a id="ancla" href="./logica/logout.php">Cerrar Sesión</a><i id="ic" class='bx bx-log-out'></i></button>
       <!-- </div> -->
    

       <?php
        if($role == "ADMIN"){
        ?>
        <div id="contorno">
            <!-- Aqui van a ir los botones-->
            <button class="btnT" onclick="MuestraTabla()">Tabla de Usuarios</button>
            <button class="btnT" onclick="MuestraTabla2()">Tabla de Alojamientos</button>
            <button class="btnT" onclick="MuestraTabla3()">Tabla de Paquetes</button>

        </div>
        <!--<button onclick="window.location.href = './productsAdmin.php'">Administrar Productos</button>-->
    
        <?php
            }
        ?>
	
    <div id="resultado"></div>

    <!--<div class="text">Hola</div>-->
        

    </section>
    
     
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="funciones.js"></script>

    <script src="script.js"></script>
</body>
</html>