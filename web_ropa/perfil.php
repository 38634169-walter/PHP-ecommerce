
<?php 
    include("layout/header.php"); 
    if(isset($_SESSION['logged'])){
?>
    <section>
        <div id="perfil-nombre-container">
            <h2>Perfil: <strong><?php echo $_SESSION["nombre"] ?> </strong></h2>
            <a href="cerrar_sesion.php">(cerrar sesion)</a>
            <form action="perfil.php" method="POST">
                <select name="est">
                    <option value="">-</option>
                    <option value="9">Todos</option>
                    <option value="1">En mi carrito</option>
                    <option value="2">Por pagar</option>
                    <option value="3">En camino</option>
                    <option value="4">Entregado</option>
                </select>
                <button name="btn-opcion">Ver</button>
            </form>
        </div>
        <div>
            <h2> Estado de mis productos comprados: </h2>
        </div>
        <?php
            if(!isset($_POST['btn-opcion'])){
                include("abrir_conexion.php");
                $sql="SELECT * FROM pedidos INNER JOIN producto ON pedidos.codigoProd = producto.codigoProd WHERE pedidos.codigoUsu = '".$_SESSION['codigoUsu']."' ";
                $consulta=mysqli_query($conexion,$sql);
                while($datos=mysqli_fetch_array($consulta)){
                    switch($datos['estado']){
                        case 1: 
                            $estado='Por procesar';
                            break;
                        case 2: 
                            $estado='Por pagar';
                            break;
                        case 3: 
                            $estado='En camino';
                            break;
                        case 4: 
                            $estado='Entregado';
                            break;
                    }
                    if($datos['estado'] != 1){
                        echo "
                            <div class='carrito-productoss-container'>
                                <img src='".$datos['imgenProd']."'>
                                <ul>
                                    <p><strong>Producto: </strong>".$datos['nombreProd']."</p>
                                    <p><strong>Detalles: </strong>".$datos['detallesProd']."</p>
                                    <p><strong>Precio: </strong>$".$datos['precioProd']."</p>
                                    <p><strong>Cantidad: </strong>".$datos['cantidad']."</p>
                                    <p><strong>Estado: </strong>".$estado."</p>
                                </ul>
                            </div>
                        ";
                    }
                }
                include("cerrar_conexion.php");    
            }
            if(isset($_POST['btn-opcion'])){
                $est=$_POST['est'];
                include("abrir_conexion.php");
                $sql="SELECT * FROM pedidos INNER JOIN producto ON pedidos.codigoProd = producto.codigoProd WHERE pedidos.codigoUsu = '".$_SESSION['codigoUsu']."' ";
                $consulta=mysqli_query($conexion,$sql);
                while($datos=mysqli_fetch_array($consulta)){
                    switch($datos['estado']){
                        case 1: 
                            $estado='Por procesar';
                            break;
                        case 2: 
                            $estado='Por pagar';
                            break;
                        case 3: 
                            $estado='En camino';
                            break;
                        case 4: 
                            $estado='Entregado';
                            break;
                    }
                    if($datos['estado'] == $est && $est !=9){
                        echo "
                            <div class='carrito-productoss-container'>
                                <img src='".$datos['imgenProd']."'>
                                <ul>
                                    <p><strong>Producto: </strong>".$datos['nombreProd']."</p>
                                    <p><strong>Detalles: </strong>".$datos['detallesProd']."</p>
                                    <p><strong>Precio: </strong>$".$datos['precioProd']."</p>
                                    <p><strong>Cantidad: </strong>".$datos['cantidad']."</p>
                                    <p><strong>Estado: </strong>".$estado."</p>
                                    ".(($datos['estado'] == 1)?"<a id='quitar' href=\"quitar_producto_carrito.php?ID_pedido=".$datos['ID_pedido']."\" >Quitar del carrito</a>":" ")."
                                </ul>
                            </div>
                        ";
                    }
                    if($_POST['est'] == 9 ){
                        echo "
                            <div class='carrito-productoss-container'>
                                <img src='".$datos['imgenProd']."'>
                                <ul>
                                    <p><strong>Producto: </strong>".$datos['nombreProd']."</p>
                                    <p><strong>Detalles: </strong>".$datos['detallesProd']."</p>
                                    <p><strong>Precio: </strong>$".$datos['precioProd']."</p>
                                    <p><strong>Cantidad: </strong>".$datos['cantidad']."</p>
                                    <p><strong>Estado: </strong>".$estado."</p>
                                    ".(($datos['estado'] == 1)?"<a id='quitar' href=\"quitar_producto_carrito.php?ID_pedido=".$datos['ID_pedido']."\" >Quitar del carrito</a>":" ")."
                                </ul>
                            </div>
                        ";
                    }
                }
                include("cerrar_conexion.php");    
            }
        ?>
    
    </section>
<?php include("layout/footer.php"); ?>
<?php 
    }
    else{
        echo "<script> window.location='login.php'; </script>";
    }
?>