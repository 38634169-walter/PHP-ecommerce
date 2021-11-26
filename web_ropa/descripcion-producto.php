<?php include("layout/header.php"); ?>
    <section>
        <br>
        <br>
        <?php
             if($_GET['idProd']){
                 include("abrir_conexion.php");
                 $producto=$_GET['idProd'];
                 $consulta=mysqli_query($conexion,"SELECT * FROM producto WHERE codigoProd = '".$_GET['idProd']."' ");
                 while($datos=mysqli_fetch_array($consulta)){
                     echo"
                        <div class='producto-desc-container'>
                            <img src='".$datos['imgenProd']."'>
                            <div>
                                <h2> ".$datos["nombreProd"]." </h2>
                                <p> ".$datos["detallesProd"]." </p>
                                <p> $".$datos["precioProd"]."  </p>
                                <form action='' method='POST'>
                                    <input style='width:1cm;' type='number' min='1' value='1' name='cantidad'>
                                    <br>
                                    <button name='btn-agregar'><i class='fas fa-plus'></i>Agregar a carrito</button>
                                </form>
                            </div>
                        </div>
                     ";
                 }
                 include("cerrar_conexion.php");
             }
        ?>
        <?php 
            if(isset($_POST['btn-agregar'])){
                // No mostrar los errores de PHP
                error_reporting(0);
                if($_SESSION['logged'] == true){
                    include("abrir_conexion.php");
                    $respuesta=mysqli_query($conexion,"INSERT INTO pedidos (codigoUsu,codigoProd,cantidad,fechaPedido,estado) values ('".$_SESSION['codigoUsu']."' , '".$_GET['idProd']."', '".$_POST['cantidad']."' ,now(),1)" );
                    if($respuesta){
                        echo "
                            <div class='cartel-aviso' style='display:flex;justify-content:center;align-items:center;position:relative;z-index:100;'>
                                <div style='width:90%;background:green;border-radius:15px;padding:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;position:fixed;top:3cm;z-index:9999999;'>
                                    <p style='text-align:center;color:white;'> Agregado con exito </p>
                                    <button class='btn-cartel-aviso' style='padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</button>
                                </div>    
                            </div>    
                        "; 
                    }
                    else{
                        echo "
                            <div class='cartel-aviso' style='display:flex;justify-content:center;align-items:center;position:relative;z-index:999;'>
                                <div style='width:90%;background:red;border-radius:15px;padding:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;position:fixed;top:3cm;z-index:9999999;'>
                                    <p style='text-align:center;color:white;'> ERROR- No se pudo agregar </p>
                                    <button class='btn-cartel-aviso' style='padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</button>
                                </div>    
                            </div>    
                        ";
                    }
                    include("cerrar_conexion.php");
                }
                else{
                    echo "
                        <div class='cartel-aviso' style='display:flex;justify-content:center;align-items:center;position:relative;z-index:999;'>
                            <div style='width:90%;background:rgb(143, 135, 29);border-radius:15px;padding:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;position:fixed;top:3cm;z-index:9999999;'>
                                <p style='text-align:center;color:white;'>Por seguridad debemos registrarte, podemos registrarte facil y rapido</p>
                                <a href='login.php' class='btn-cartel-aviso' style='padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</a>
                            </div>    
                        </div>    
                    ";
                }
            }
        ?>
    </section>
<?php include("layout/footer.php"); ?>