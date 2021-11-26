<?php include("layout/header.php"); ?>
    <?php 
        if(isset($_SESSION["logged"])){
    ?>
    <section>
            <h2> Ya te encuentras loggeado <a href="cerrar_sesion.php">(Cerrar sesion)</a></h2>
    </section>    
    <?php 
        }
        else{
    ?>
    <style>
        /* Chrome, Safari, Edge, Opera */
        .inputN::-webkit-outer-spin-button,
        .inputN::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        .inputN[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <section>
        <br>
        <h2>Bienvenido! tomara unos poco segundos</h2>
        <form action="registrarse.php" method="POST" id="form-registrarse">
            <div>
                <h2 style="color:white;font-size:20px">Datos Personales</h2>
                <div>
                    <ul>
                        <li><label for="">*Nombre</label><input type="text" name="nombre" require></li>
                        <li><label for="">*Apellido</label><input type="text" name="apellido" require></li>
                        <li><label for="">*DNI</label><input class="inputN" type="number" name="DNI" require></li>
                    </ul>
                    <ul>
                        <li><label for="">Telefono</label><input class="inputN" type="number" name="telefono"></li>
                        <li><label for="">*Email</label><input type="email" name="email" require></li>
                    </ul>
                </div>
            </div>
            <div>
                <h2 style="color:white;font-size:20px">Datos de usuario</h2>
                <div>
                    <li><label for="">*Usuario</label><input type="text" name="usuario" require></li>
                    <li><label for="">*Contraseña</label><input type="password" name="clave1" require></li>
                    <li><label for="">*Repetir contraseña</label><input type="password" name="clave2" require></li>
                </div>
            </div>
            <br>
            <button name="btn-registro">Registrarme</button>
        </form>
        <?php
            if(isset($_POST['btn-registro']) and !$_POST['nombre'] || !$_POST['apellido'] || !$_POST['DNI'] || !$_POST['email'] || !$_POST['usuario'] || !$_POST['clave1'] || !$_POST['clave2']){
                echo "
                    <div class='cartel-aviso' style='display:flex;justify-content:center;align-items:center;position:relative;z-index:100;'>
                        <div style='width:90%;background:red;border-radius:15px;padding:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;position:fixed;top:3cm;z-index:9999999;'>
                            <p style='text-align:center;color:white;'> Debes ingresar todos los campos requeridos </p>
                            <button class='btn-cartel-aviso' style='cursor:pointer;text-decoration=none;padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</button>
                        </div>    
                    </div>    
                ";  
            }
            if(isset($_POST['btn-registro']) and $_POST['nombre'] and $_POST['apellido'] and $_POST['DNI'] and $_POST['email'] and $_POST['usuario'] and $_POST['clave1'] and $_POST['clave2']){
                if($_POST['clave1']==$_POST['clave2']){
                    $validacion1=true;
                    $validacion2=true;

                    include("abrir_conexion.php");

                    $validacionEmail=mysqli_query($conexion,"SELECT emailUsu from usuarios");
                    $validacionUsuario=mysqli_query($conexion,"SELECT usuario from usuarios");
                    while($datos=mysqli_fetch_array($validacionEmail)){
                        if($datos["emailUsu"]==$_POST["email"]){
                            $validacion1=false;
                        }
                    }
                    while($datos2=mysqli_fetch_array($validacionUsuario)){
                        if($datos2["usuario"]==$_POST["usuario"]){
                            $validacion2=false;
                        }
                    }
                    if($validacion1==false && $validacion2==false){
                        echo"
                            <div style='display:flex;justify-content:center;align-items:center;'>
                                <div class='cartel-aviso' style='width:90%;display:flex;flex-direction:column;justify-content:center;align-items:center;background:red;border-radius:15px;padding:10px;position:fixed;top:3cm;z-index:9999999;'>
                                    <p style='text-align:center;color:white;'> *El mail ingresado ya tiene una cuenta abierta</p>
                                    <p style='text-align:center;color:white;'> *El usuario ingresado ya se encuentra en uso</p>
                                    <button class='btn-cartel-aviso' style='cursor:pointer;text-decoration=none;padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</button>
                                </div>
                            </div>
                            ";
                    }
                    else{
                        if($validacion1==false){
                            echo"
                            <div style='display:flex;justify-content:center;align-items:center;'>
                                <div class='cartel-aviso' style='width:90%;display:flex;flex-direction:column;justify-content:center;align-items:center;background:red;border-radius:15px;padding:10px;position:fixed;top:3cm;z-index:9999999;'>
                                    <p style='text-align:center;color:white;'> *El mail ingresado ya tiene una cuenta abierta</p>
                                    <button class='btn-cartel-aviso' style='cursor:pointer;text-decoration=none;padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</button>
                                </div>
                            </div>
                            ";
                        }
                        if($validacion2==false){
                            echo"
                            <div style='display:flex;justify-content:center;align-items:center;'>
                                <div class='cartel-aviso' style='width:90%;display:flex;flex-direction:column;justify-content:center;align-items:center;background:red;border-radius:15px;padding:10px;position:fixed;top:3cm;z-index:9999999;'>
                                    <p style='text-align:center;color:white;'> *El usuario ingresado ya se encuentra en uso</p>
                                    <button class='btn-cartel-aviso' style='cursor:pointer;text-decoration=none;padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</button>
                                </div>
                            </div>
                            ";
                        }
                    }
                    if($validacion1==true && $validacion2==true){
                        $ingresado=mysqli_query($conexion,"INSERT INTO usuarios (nombreUsu,apellidoUsu,DNI,telefono,emailUsu,usuario,claveUsu,estadoUsu) values('".$_POST["nombre"]."', '".$_POST["apellido"]."','".$_POST["DNI"]."','".$_POST["telefono"]."','".$_POST["email"]."','".$_POST["usuario"]."','".$_POST["clave1"]."', true  )");
                        if($ingresado){
                            echo "
                            <div style='display:flex;justify-content:center;align-items:center;'>
                                <div style='width:90%;background:green;border-radius:15px;padding:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;position:fixed;top:3cm;z-index:9999999;'>
                                    <p style='text-align:center;color:white;'> Se realizo el registro con exito, ahora puede loggearse</p>
                                    <a style='background:lightgreen; padding:10px;color:black;font-weight:bold; border-radius:15px;' href='login.php'>Ir a login</a>
                                </div>    
                            </div>    
                            ";       
                        }
                    }
                    include("cerrar_conexion.php");
                }
                else{
                    echo"
                        <div style='display:flex;justify-content:center;align-items:center;'>
                            <div class='cartel-aviso' style='width:90%;display:flex;flex-direction:column;justify-content:center;align-items:center;background:red;border-radius:15px;padding:10px;position:fixed;top:3cm;z-index:9999999;'>
                                <p style='text-align:center;color:white;'> *Las claves ingresadas deben ser identicas</p>
                                <button class='btn-cartel-aviso' style='text-decoration=none;padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</button>
                            </div>
                        </div>
                    ";
                }
            }
        ?>
    </section>
    <?php 
        }
    ?>
<?php include("layout/footer.php"); ?>