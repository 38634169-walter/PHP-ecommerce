<?php 
    session_start();
    $datos=$_SESSION['datos'];
    include("abrir_conexion.php");
    if(isset($_GET['ID_pedido']) ){
        $rs=mysqli_query($conexion,"DELETE FROM pedidos WHERE ID_pedido = '".$_GET['ID_pedido']."' " );
        if(!$rs){
            die("Query Failed.");
        }
    }
    include("cerrar_conexion.php");
    header("Location:mi_carrito.php");
    die();
?>