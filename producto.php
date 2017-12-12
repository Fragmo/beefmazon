<?php        
///////////////////PHP///////////    
session_start();
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

// VARIABLES PRODUCTO
$codigoProducto =$ArrayProductoAqui[0][0];
$nombre = $ArrayProductoAqui[0][1];
$precio = $ArrayProductoAqui[0][2];
$stock = $ArrayProductoAqui[0][3];
$marca = $ArrayProductoAqui[0][4];
$sexo = $ArrayProductoAqui[0][5];
$precioFiltro = $ArrayProductoAqui[0][6];//bien hecho hasta aqui
$codigoFoto = $ArrayProductoAqui[0][7];

// VARIABLES USUARIO

$id = ($_SESSION['id']);
$email = $_SESSION['email'];
$nombreUsuario =  $_SESSION['nombreUsuario'] ;
$contrasena = $_SESSION['contraseña'];
?>

<html>
    <head>
        <title><?php echo $nombre.' '. $ArrayProductoAqui[0][4];?></title>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/propioCssTienda.css" rel="stylesheet" type="text/css"/>
        <link href="js/jquery.raty.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"><a href="pagina2.php"><h1 class="text-center">BeefMazon</h1></a></div>
            <div class="col-md-3">
                <a href="usuario.php"><button class="btn btn-primary"  name="menuUsuario"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Tu cesta,<?PHP echo $nombreUsuario?></button> </a>
                <a href="cerrarSesion.php"><button type="button" class="btn btn-danger"  name="botonCerrarSesion"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</button></a>

        </div> 
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class=" cold-md-4 img-responsive">
                    <img class="img-responsive " style="margin-left: 15%;"src="imagenes/<?Php echo $codigoFoto?>"/>
                    <div class="row">
                        <div class="col-md-4 pull-left" style="margin-left: 20%">
                            Nombre: <?php echo $nombre ?> <br>
                            Marca: <?php echo $marca ?> <br>
                            Sexo: <?php echo $sexo ?><br>
                            Precio: <?php echo $precio.' €' ?> <br>

   <?php 
   ////////// SI SE PULSA EL BOTON COMPRAR
           if(isset($_POST['botonComprar'])){
            
     ////////////ESTA CONSULTA ACTUALIZA LA CESTA DEL CLIENTE///////////////////// 
            $consultaCompra= "INSERT INTO cesta  (idCliente, idProducto) VALUES ($id,$codigo)";
            $consultaInsert = $creaConexion->query($consultaCompra);
            if($creaConexion->errno){
                //print_r("ESTA ES LA CONSULTA: ".$consultaCompra);
                die("<p>no ha sido posible insertar datos en la tabla . $creaConexion->error <BR>");     
            }else{
 
          /////////CONSULTA QUE ACTUALIZA EL STOCK AL COMPRAR UN PRODUCTO/////////
                $consultaActualizaStock = "UPDATE productos set productos.stock = productos.stock - 1 where id = $codigoProducto";
//              UPDATE productos set productos.stock = productos.stock - (select count(cesta.idProducto) from cesta where cesta.idProducto = ".$_GET['idProductoo'].") where id = ".$_GET['idProductoo']."     
                $ejecutaActualizaStock = $creaConexion->query($consultaActualizaStock);
                 if($creaConexion->errno){die();}
                echo ' <script language="javascript">alert("Este articulo se ha añadido a la cesta ");</script> ';
                cargaProducto($codigo, $creaConexion);
                
                 }
        }else{
   
                cargaProducto($codigo, $creaConexion);
        }
 
   ?>
   
               
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
            <div class="col-md-4">

            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Productos Relacionados</h2>
                    <?php 
    //CARGA LOS PRODUCTOS RELACIONADOS (MISMO NOMBRE CUANDO TENGAN EL MISMO NOMBRE (CAMISETA, PANTALON ETC) Y MARCA)
                $consultaProductosRelacionados = "SELECT * FROM productos WHERE nombre = '$nombre' or marca='$marca'";
                $ejecutarProductosRelacionados = $creaConexion->query($consultaProductosRelacionados);
                $arrayProductosRelacionados = mysqli_fetch_all($ejecutarProductosRelacionados);
                for($l = 0; $l<count($arrayProductosRelacionados); $l++){
                    $idRelacionado = $arrayProductosRelacionados[$l][0];
                   // $nombreRelacionado = $arrayProductosRelacionados[$l][1];
                   // $precioRelacionado  = $arrayProductosRelacionados[$l][2];
                   // $stockRelacionado  = $arrayProductosRelacionados[$l][3];
                   // $marcaRelacionado  = $arrayProductosRelacionados[$l][4];
                   // $sexoRelacionado  = $arrayProductosRelacionados[$l][5];
                   // $precioFiltroRelacionado  = $arrayProductosRelacionados[$l][6];//bien hecho hasta aqui
                    $codigoFotoRelacionado = $arrayProductosRelacionados[$l][7];
                   print <<<hola
                    <div class="col-md-3 img-responsive" pull-left style="margin-left : 15px;">
                        <a href="producto.php?codigo=$idRelacionado"><img style="height: 300px; width : 300px;"class=img-responsive src="imagenes/$codigoFotoRelacionado"/></a>
                    </div>
hola;
                }
                
                ?>
                </div>
                 
            </div>
        </div> 
        <?php 
        // CARGA EL PRODUCTO EN LA PAGINA CON TODAS LAS CARACTERISTICAS
        function cargaProducto($codigo, $creaConexion){
            $consultaStock = " SELECT COUNT(*) FROM `productos` WHERE id = $codigo and stock >0";
            $ejecutaStock = mysqli_query($creaConexion, $consultaStock);
            $arrayStock = mysqli_fetch_all($ejecutaStock);
            //   print_r($arrayStock);
            if($arrayStock[0][0] >0){
//             PONGO UN FORMULARIO PARA HACER QUE SE EJECUTE EL CODIGO DEL ISSET
                print ' <form method="Post"><input type="submit" class="btn btn-success" value="Comprar" name="botonComprar" /></form>'  ;
            }else{
                print ' <button class=" btn disabled" name="botonStock">No hay stock <i class="fa fa-lock" aria-hidden="true"></i> </button>'  ;
            }
        }               
                     
 ?>
    </body>
</html>