<?php 
    include("layout/header.php");
    if(isset($_SESSION['logged'])){      
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
            <div>
                <br>
                <br>
                <h2>Tus productos agregados al carrito: </h2>
            </div>
            <br>
            <?php 
                include("abrir_conexion.php");
                $sql="SELECT * FROM pedidos INNER JOIN producto ON pedidos.codigoProd = producto.codigoProd WHERE pedidos.codigoUsu = '".$_SESSION['codigoUsu'] ."' AND estado = 1";
                $consulta=mysqli_query($conexion,$sql);
                $b=0;
                $total=0;
                while($datos=mysqli_fetch_array($consulta)){
                    if($b==0 && $datos==true){
                        $b=1;
                    }
                    switch($datos['estado']){
                        case 1: 
                            $estado='Por procesar';
                            break;
                        case 2: 
                            $estado='Por pagar';
                            break;
                        case 3: 
                            $estado='Por entregar';
                            break;
                        case 4: 
                            $estado='En camino';
                            break;
                        case 5: 
                            $estado='Recibido';
                            break;
                    }
                    if($datos['estado']==1){
                        echo "
                            <div class='carrito-productoss-container'>
                                <img src='".$datos['imgenProd']."'>
                                <ul>
                                    <p><strong>Producto: </strong>".$datos['nombreProd']."</p>
                                    <p><strong>Detalles: </strong>".$datos['detallesProd']."</p>
                                    <p><strong>Precio: </strong>$".$datos['precioProd']."</p>
                                    <p><strong>Cantidad: </strong>".$datos['cantidad']."</p>
                                    <p><strong>Estado: </strong>".$estado."</p>
                                    <a id='quitar' href=\"quitar_producto_carrito.php?ID_pedido=".$datos['ID_pedido']."\" >Quitar del carrito</a>
                                </ul>
                            </div>
                        ";
                        $total+=$datos['precioProd']*$datos['cantidad'];
                    }
                }
                if($b==0){
                    echo"
                        <div style='display:flex;justify-content:center;align-items:center;'>
                            <p style='text-align:center;'>No hay productos agregados hasta el momento</p>
                        </div>
                    ";
                }
                else{
                    echo"
                        <div class='btn-comprar-container'>
                            <form action='mi_carrito.php' method='POST'>
                                <li><label for=''>Direccion</label><input type='text' name='direccion'></li>
                                <li><label for=''>Telefono</label><input class='inputN' type='number' name='telefono'></li>
                                <h2 style='font-size:25px;'>Metodo de pago: </h2>
                                <li><input type='radio' value='1' name='tipo-pago'><label for=''>Debito</label></li>
                                <li><input type='radio' value='2' name='tipo-pago'><label for=''>Credito</label></li>
                                <h2 style='font-size:20px;'>Total: $".$total."</h2>
                                <button name='btn-comprar'><i class='fas fa-shopping-cart'>  Comprar ahora</i></button>
                            </form>
                        </div>
                    ";
                }
                include("cerrar_conexion.php");
                if( isset($_POST['btn-comprar'])){
                    if( ($_POST['direccion'])!= "" && $_POST['telefono']!=NULL && isset($_POST['tipo-pago']) ){
                        $_SESSION['tipo-pago']=$_POST['tipo-pago'];
                        $_SESSION['direccion']=$_POST['direccion'];
                        $_SESSION['telefono']=$_POST['telefono'];
                        if($_POST['tipo-pago']==1){
                            include("estado_por_pagar.php");
                            echo "
                            <div style='display:flex;justify-content:center;align-items:center;z-index:8;'>
                                <div style='width:90%;background:green;border-radius:15px;border:2px solid white;padding:10px;display:flex;flex-direction:column;justify-content:center;align-items:center;position:fixed;top:0cm;z-index:9999999;'>
                                    <h2>Usted eligío tipo de pago debito:</h2>
                                    <p style='text-align:center;color:white;'><strong>Numero de cuenta a la que debe abonar CBU:</strong></p>
                                    <p>12345678910 1232 123456</p>
                                    <p style='text-align:center;color:white;'> <strong>A nombre de: </strong></p>
                                    <p>Nombre falso 1234</p>
                                    <p style='text-align:center;color:white;'> <strong>Monto a abonar: </strong></p>
                                    <p>$".$total."</p>  
                                    <a id='btn-pagado-debito' href='perfil.php'>Ver estado de mi compra</a>
                                </div>    
                            </div>    
                            "; 
                        }
                        else{

                        }
                    }
                    else{
                        echo"
                        <div class='cartel-aviso' style='display:flex;justify-content:center;align-items:center;z-index:8;'>
                            <div style='width:90%;display:flex;flex-direction:column;justify-content:center;align-items:center;background:red;border-radius:15px;padding:10px;position:fixed;top:3cm;z-index:9999999;'>
                                <p style='text-align:center;color:white;'>*Falto ingresar datos de envio</p>
                                <button class='btn-cartel-aviso' style='padding:0px 5px;text-align:center;color:black;background:white;border-radius:10px;'>Ok</button>
                            </div>
                        </div>
                        ";
                    }

                }
            ?>
    </section>
    <?php 
        } 
        else{
    ?>
    <section>
            <div>
                <br>
                <br>
                <h2 style="color:white">No estas registrado todavia! </h2>
                <h2>Te damos la bienvenida, registrarse toma unos pocos segundos</h2>
                <br>
                <br>
                <br>
                <h3 style="text-align:center; font-size:25px;">Podes hacerlo clickeando <a href="registrarse.php">aca</a></h3>
            </div>
    </section>
    <?php } ?>
<?php include("layout/footer.php"); ?>   