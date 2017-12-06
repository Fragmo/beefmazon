<?php        
///////////////////PHP///////////    
//session_start();
         define("host", "localhost");
         define("usuario", "root");
         define("contrasena", "");
         define("bbdd", "beefmazon");       
?>

<?php
        $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
        if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
        }
?>
<?php

$codigo = $_GET['codigo'];
$consultaSQL = "SELECT * FROM productos where id=$codigo";
$consultaEjecutada = $creaConexion->query($consultaSQL);
$ArrayProductoAqui = mysqli_fetch_all($consultaEjecutada);


$nombre = $ArrayProductoAqui[0][1];
$precio = $ArrayProductoAqui[0][2];
$stock = $ArrayProductoAqui[0][3];
$marca = $ArrayProductoAqui[0][4];
$sexo = $ArrayProductoAqui[0][5];
$precioFiltro = $ArrayProductoAqui[0][6];//bien hecho hasta aqui
$codigoFoto = $ArrayProductoAqui[0][7];

?>

<html>
    <head>
        <title><?php echo $nombre.' '. $ArrayProductoAqui[0][4];?></title>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="js/jquery.raty.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <style>
        </style>
        <script src="js/verbos.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class=" cold-md-4 img-responsive">
                    <img class="img-responsive" src="imagenes/<?Php echo $codigoFoto?>"/>
                </div>
                <div class="col-md-4 pull-right">
                    Nombre: <?php echo $nombre ?> <br>
                    Marca: <?php echo $marca ?> <br>
                    Sexo: <?php echo $sexo ?><br>
                    Precio: <?php echo $precio ?> <br>
   <!--PONGO UN FORMULARIO PARA HACER QUE SE EJECUTE EL CODIGO DEL ISSET-->
<form method="Post"><input type="submit" value="Comprar" name="botonComprar" /></form>
                </div>
                
            </div>
            <div class="col-md-2"></div>
            
        </div> 
        <?php 
        if(isset($_POST['botonComprar'])){
            $consultaCompra= "INSERT INTO cesta values  (idCliente, idProducto) VALUES (1,$codigo)";
            $creaConexion->query($consultaCompra);
            echo "compra realizada con exito";
        } ?>
    </body>
</html>