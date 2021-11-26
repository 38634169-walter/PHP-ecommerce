<?php 
    include("abrir_conexion.php");
    $sql="UPDATE pedidos SET fechaPedido = now() , tipoPago = '".$_SESSION['tipo-pago']."' , direccionEntrega = '".$_SESSION['direccion']."' , telefonoEntrega = '".$_SESSION['telefono']."', estado = 2 WHERE estado = 1 AND codigoUsu = '".$_SESSION['codigoUsu']."' ";
    $cambios=mysqli_query($conexion,$sql);
    include("cerrar_conexion.php");
?>