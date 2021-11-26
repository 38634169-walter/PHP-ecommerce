<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            include("cdns.php");
        ?>
    </head>
    <body>
        <header>
            <div class="top-container">       
                <ul>
                    <li><h2>summer</h2></li>
                    <li><h1>50%</h1></li>
                    <li><h2>sale</h2></li>
                </ul>
                <?php 
                    session_start();
                    if(isset($_SESSION['logged'])){                    
                        echo"
                            <div id='usu'>
                                <li>
                                    <i class='fas fa-search' id='lupa'> Buscar</i>
                                    <form action='buscar.php' method='POST' id='buscador'>
                                        <input type='text' name='palabra' placeholder='Buscar..'>
                                        <button type='submit' style='background:rgba(0, 128, 0, 0); border:0px;' ><i class='fas fa-search' id='lupa'> Buscar</i></button>
                                    </form>
                                </li>
                                <li><a href='perfil.php'><i class='fas fa-user' id='user'></i>".$_SESSION['nombre']."</a></li>
                                <li><a href='mi_carrito.php'><i class='fas fa-shopping-cart'></i>Carrito</a></li>
                            </div>  
                        ";
                    }
                    else{
                        echo"
                            <div id='usu'>
                                <li>
                                    <i class='fas fa-search' id='lupa'> Buscar</i>
                                    <form action='buscar.php' method='POST' id='buscador'>
                                        <input type='text' name='palabra' placeholder='Buscar..'>
                                        <button type='submit' style='background:rgba(0, 128, 0, 0); border:0px;' ><i class='fas fa-search' id='lupa'></i>Buscar</button>
                                    </form>
                                </li>
                                <li><a href='login.php'><i class='fas fa-user' id='user'></i>Login</a></li>
                                <li><a href='mi_carrito.php'><i class='fas fa-shopping-cart'></i>Carrito</a></li>
                            </div>
                        ";
                    }
                ?>
            </div>
            <div class="menu-responsive">                                   
                <h1>Menu</h1><i class="fas fa-align-justify menu-icon-responsive"></i><i class="fas fa-times x-icono-responsive"></i>
            </div>
            <nav class="nav">
                <div class="nom">                                         
                    <li><h1>Veronica's Sales</h1></li>
                </div>
                <div class="menu">                                               
                    <div>
                        <div>
                            <a href="index.php" style="display:block;">Inicio</a>
                        </div>
                    </div>
                    <div>
                        <div class="dropbtn1">
                            <i class="fas fa-shopping-bag market-icon" style="font-size: 25px;"></i>
                            <a>Tienda</a>
                            <i class="fas fa-chevron-down arrow-down-sub-menu1"></i>
                            <i class="fas fa-chevron-right arrow-side-sub-menu1"></i>
                        </div>
                        <ul class="sub-menu1 sub-menu">        
                            <li>
                                <div class="dropbtn1-1">
                                    <img src="image/iconfinder_shirt_sport_trickot_tshirt_clothes_4843037.svg" width="25px" height="25px"alt="">
                                    <a>Remeras</a>
                                    <i class="fas fa-chevron-down down1"></i>
                                    <i class="fas fa-chevron-right side1"></i>
                                </div>
                                <ul class="sub-menu1-1">
                                    <div><a href="#"> Vacio remeras</a></div>
                                    <div><a href="#"> Vacio remeras</a></div>
                                    <div><a href="#"> Vacio remeras</a></div>
                                    <div><a href="#"> Vacio remeras</a></div>
                                    <div><a href="#"> Vacio remeras</a></div>
                                </ul>
                            </li>
                            <li>
                                <div class="dropbtn1-2">
                                    <img src="image/iconfinder_clothing_accesories_clothes_fabric-18_498970.svg" width="25px" height="25px"alt="">
                                    <a>Jeans</a>
                                    <i class="fas fa-chevron-down down2"></i>
                                    <i class="fas fa-chevron-right side2"></i>
                                </div>
                                <ul class="sub-menu1-2">
                                    <div><a href="#"> Vacio jeans</a></div>
                                    <div><a href="#"> Vacio jeans</a></div>
                                    <div><a href="#"> Vacio jeans</a></div>
                                    <div><a href="#"> Vacio jeans</a></div>
                                    <div><a href="#"> Vacio jeans</a></div>
                                </ul>
                            </li>
                            <li>
                                <div class="dropbtn1-3">
                                    <img src="image/iconfinder_dress_1845787.svg" width="25px" height="25px"alt="">
                                    <a>Vestidos</a>
                                    <i class="fas fa-chevron-down down3"></i>
                                    <i class="fas fa-chevron-right side3"></i>
                                </div>
                                <ul class="sub-menu1-3">
                                    <div><a href="#"> Vacio vestidos</a></div>
                                    <div><a href="#"> Vacio vestidos</a></div>
                                    <div><a href="#"> Vacio vestidos</a></div>
                                    <div><a href="#"> Vacio vestidos</a></div>
                                    <div><a href="#"> Vacio vestidos</a></div>
                                </ul>
                            </li>
                            <li>
                                <div class="dropbtn1-4">
                                    <img src="image/iconfinder_clothing_accesories_clothes_fabric-03_498955.svg" width="25px" height="25px"alt="">
                                    <a>Sweaters</a>
                                    <i class="fas fa-chevron-down down4"></i>
                                    <i class="fas fa-chevron-right side4"></i>
                                </div>
                                <ul class="sub-menu1-4">
                                    <div><a href="#"> Vacio Sweaters</a></div>
                                    <div><a href="#"> Vacio Sweaters</a></div>
                                    <div><a href="#"> Vacio Sweaters</a></div>
                                    <div><a href="#"> Vacio Sweaters</a></div>
                                    <div><a href="#"> Vacio Sweaters</a></div>
                                </ul>
                            </li>
                            <li>
                                <div class="dropbtn1-5">
                                    <img src="image/iconfinder_clothing_accesories_clothes_fabric-26_498962.svg" width="25px" height="25px"alt="">
                                    <a>Calzados</a>
                                    <i class="fas fa-chevron-down down5"></i>
                                    <i class="fas fa-chevron-right side5"></i>
                                </div>
                                <ul class="sub-menu1-5">
                                    <div><a href="#"> Vacio calzados</a></div>
                                    <div><a href="#"> Vacio calzados</a></div>
                                    <div><a href="#"> Vacio calzados</a></div>
                                    <div><a href="#"> Vacio calzados</a></div>
                                    <div><a href="#"> Vacio calzados</a></div>
                                </ul>
                            </li>
                            <li>
                                <div class="dropbtn1-6">
                                    <img src="image/iconfinder_Shoes_2_753928.svg" width="25px" height="25px"alt="">
                                    <a>Zapatos</a>
                                    <i class="fas fa-chevron-down down6"></i>
                                    <i class="fas fa-chevron-right side6"></i>
                                </div>
                                <ul class="sub-menu1-6">
                                    <div><a href="#"> Vacio zapatos</a></div>
                                    <div><a href="#"> Vacio zapatos</a></div>
                                    <div><a href="#"> Vacio zapatos</a></div>
                                    <div><a href="#"> Vacio zapatos</a></div>
                                    <div><a href="#"> Vacio zapatos</a></div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div>
                            <a href="trabaja.php" style="display:block;">Trabaja con nosotros</a>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a href="contacto.php" style="display:block;">Contacto</a>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a href="sucursales.php" style="display:block;">Sucursales</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>