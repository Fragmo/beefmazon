<?php        
///////////////////PHP///////////    
session_start();
require './VariablesSession.php';
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
?>

<html>
    <head>
        <title><?php echo 'Menu de '.$nombreUsuario.'';?></title>
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
            <div class="col-md-12">
                <p><h2 class="text-center"> Tu cesta</h2></p>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php
                    
                    //esta consulta es para ver el numero de productos que ha comprado el usuario
                     $consultaHistorialDeCompra = "SELECT count(idCliente) from cesta where idCliente = $nombreUsuario";
                     $consultaCestaEjecutada = $creaConexion->query($consultaHistorialDeCompra);
                     $arrayConsultaHistorialDeCompra = mysqli_fetch_all($consultaCestaEjecutada);
                     print_r("ESTE ES EL RESULTADO DE LA CONSULTA".$arrayConsultaHistorialDeCompra."<BR>");
                     echo 'Numero de productos que has comprado'.$arrayConsultaHistorialDeCompra;
                     
                    ?>
                </div>
                <div class="col-md-4"></div>
                
            </div>
        </div> 
        <?php 
        if(isset($_POST['botonComprar'])){
            $consultaCompra= "INSERT INTO cesta  (idCliente, idProducto) VALUES ($id,$codigo)";
            $consultaInsert = $creaConexion->query($consultaCompra);
            if($creaConexion->errno){
                print_r("ESTA ES LA CONSULTA: ".$consultaCompra);
                die("<p>no ha sido posible insertar datos en la tabla . $creaConexion->error <BR>");
                
            }else{
                echo ' <script language="javascript">alert("Se ha realizado correctamente la compra ");</script> ';
            }
        } ?>
    </body>
</html>