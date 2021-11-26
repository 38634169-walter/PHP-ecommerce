<?php include("layout/header.php"); ?>
<section>
    <?php 
        include("abrir_conexion.php");
        echo"
            <br>
            <br>
            <h2>Resultados para ".$_POST['palabra']." ...</h2>
        ";
        $sql="SELECT * FROM producto WHERE nombreProd LIKE '%".$_POST['palabra']."%' ";
        $consulta=mysqli_query($conexion,$sql);
        echo"<div class='ropa-container'>  ";
        while($datos=mysqli_fetch_array($consulta)){
            echo"
                <li><a href=\"descripcion-producto.php?idProd=".$datos['codigoProd']."\">
                    <img src='".$datos['imgenProd']."'>
                    <h1>".$datos['nombreProd']."</h1>
                    <p>Solo por $".$datos['precioProd']."</p>
                </a></li>    
            ";
        }
        echo"
            </div>
        ";

        include("cerrar_conexion.php");
    ?>

</section>
<?php include("layout/footer.php"); ?>