<?php 
    include("layout/header.php");
?>
    <section>
        <h2 id="titulo-login">Bienvenido!</h2>
        <h2>Si no tenes cuenta podes registrarte debajo</h2>
        <form class="form-container-login" action="login.php" method="POST">
            <li><label>Usuario: </label><input type="text" name="usuario" placeholder="Usuario" require></li>
            <li><label>Contraseña: </label><input type="password" name="clave" placeholder="Constraseña" require></li>
            <br>
            <button id="btn-login" name="btnForm"> Ingresar</button>
        </form>
        <br>       
        <div>
            <p style="text-align: center;">No tengo cuenta <a href="registrarse.php">Registrarme</a></p>
        </div>
    </section>
    <?php
        if( isset($_POST['btnForm']) ){
            include("abrir_conexion.php");
            $rs=mysqli_query( $conexion , "SELECT * FROM usuarios WHERE usuario ='".$_POST['usuario']."' AND  claveUsu = '".$_POST['clave']."' ");
            $rs2=mysqli_query( $conexion , "SELECT * FROM usuarios WHERE emailUsu ='".$_POST['usuario']."' AND  claveUsu = '".$_POST['clave']."' ");
            $b=0;
            while($datos=mysqli_fetch_array($rs)){
                $b=1;
                $_SESSION['logged']=true;
                $_SESSION['nombre']=$datos['nombreUsu'];
                $_SESSION['codigoUsu']=$datos['codigoUsu'];
                echo "<script> window.location='index.php'; </script>";
                exit();
            }
            if(isset($_POST['btnForm']) and  !$_POST['clave'] || !$_POST['usuario']){
                echo "
                    <div class='cartel-aviso' style='display:flex;justify-content:center;align-items:center;position:relative;z-index:100;'>
                        <div style='width:90%;background:red;border-radius:15px;padding:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;position:fixed;top:3cm;z-index:9999999;'>
                            <p style='text-align:center;color:white;'> Debes ingresar todos los campos </p>
                            <a href='' class='btn-cartel-aviso' style='text-decoration=none;padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</a>
                        </div>    
                    </div>    
                ";  
            }
            if($b==0 and isset($_POST['btnForm']) and $_POST['clave'] and $_POST['usuario']){
                echo "
                        <div class='cartel-aviso' style='display:flex;justify-content:center;align-items:center;position:relative;z-index:100;'>
                            <div style='width:90%;background:red;border-radius:15px;padding:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;position:fixed;top:3cm;z-index:9999999;'>
                                <p style='text-align:center;color:white;'> Usuario o contraseña invalidos </p>
                                <a href='' class='btn-cartel-aviso' style='text-decoration=none;padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</a>
                            </div>    
                        </div>    
                    ";  
            }
            include("cerrar_conexion.php");
        }
    ?>    
<?php include("layout/footer.php");?>