<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>BeefMazon</title>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="js/jquery.raty.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/propioCssTienda.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
        <!--max-width: 300px;}--->
    </head>
    <body>
        
  
        <?php
        error_reporting(0);
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

     <?PHP
//////////////VARIABLES PARA LAS CONSUTAS///////////
$where="";
$ropa=$_POST['desplegableRopa'];		
$sexo=$_POST['desplegableSexo'];
$precio=$_POST['desplegablePrecio'];
$marca=$_POST['desplegableMarca'];
require './VariablesSession.php';



///////CONSULTA GORDA DEL INICIO QUE SELECCIONA TODO (NECESITA OPTIMIZAR)////////////
    $consultaSQL = "SELECT * FROM productos";
    
    $consultaProductos = mysqli_query($creaConexion,$consultaSQL);
    $arrayProductos = mysqli_fetch_all($consultaProductos);
    //print_r(count($consultaProductos));

    
function muestraConsultaFiltrada($where, $creaConexion ){
    $consultaSQL = "SELECT * FROM productos $where";
//    print_r("ESTO ES EL WHERE ".$where. "<BR>");
//    print_r("ESTO ES LA CONSULTA $consultaSQL <BR>");
    $consultaProductos = mysqli_query($creaConexion, $consultaSQL);
    $arrayProductos = mysqli_fetch_all($consultaProductos);
   // print_r($arrayProductos);
    if(mysqli_num_rows($consultaProductos)==0){
        echo '<h1 class="text-center">No tenemos productos con estas características</h1>';
    }else{
        realizaConsultaGeneral($arrayProductos);
    }
}
//CODIGO PARA MOSTRAR LOS PRODUCTOS POR PANTALLA
function realizaConsultaGeneral($arrayProductos){

    for ($i = 0; $i < count($arrayProductos); $i++) { 
        $codigo = $arrayProductos[$i][0];
        $nombre = $arrayProductos[$i][1];
        $precio = $arrayProductos[$i][2];
        //  $stock = $arrayProductos[$i][3];
        $marca = $arrayProductos[$i][4];
        $sexo = $arrayProductos[$i][5];
        $precioFiltro = $arrayProductos[$i][6];
        $codigoFoto = $arrayProductos[$i][7];//bien hecho hasta aqui
       
     print( ' 
        <div class="col-sm-4 ">
            <article class="col-item">
            <div class="pull-left " ><a href="producto.php?codigo='.$codigo.'"><img class="img-responsive" src="imagenes/'.$codigoFoto.'"/></a></div><br>
            <div class="text-center">'.$nombre.''.$precio.' €,<br> '.$marca.',<br> '.$sexo.',<br> precio:'.$precioFiltro.'<br></div>
            </article>
        </div>
');
   }
   
}
?> 

<!---------------HTML------------->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"><a href="pagina2.php"><h1 class="text-center">BeefMazon</h1></a></div>
            <div class="col-md-3">
                <a href="usuario.php"><input type="button" class="btn btn-primary" value="Tu menú,<?PHP echo $nombreUsuario?>" name="menuUsuario" /></a>
                <a href="cerrarSesion.php"><input type="button" class="btn btn-danger" value="Salir" name="botonCerrarSesion" /></a>

            </div>
        </div>
        <!--FILTRADOR-->
        
        <div class="row" >
            <form name="formularioFiltro" method="POST">
                <div class="col-md-12" >
                <div clas class="col-md-2"></div>
                <div class="col-md-2 text-center" id="contenedorListaDesplegableRopa" style="background-color: red; margin: 0;  " >
                    <h3>Ropa</h3>
                    <select name="desplegableRopa">
                    <option value=""></option>
                    <option value="camiseta">Camisetas</option>
                    <option value="pantalones">Pantalones</option>
                    <option value="calcetines">calcetines</option>
                    <option value="zapatos">Zapatos</option>
                </select>
                    
                </div>
                
                <div class="col-md-2 text-center" id="contenedorListaDesplegableSexo" style="background-color: green; margin: 0; " >
                    <h3>Sexo</h3>
                    <select name="desplegableSexo">
                        <option value=""></option>
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                        <option value="unisex">Unisex</option>
                    </select>
                </div>
                
                <div class="col-md-2 text-center" id="contenedorListaPrecio" style="background-color: yellow ; margin: 0;">
                    <h3>Precio</h3>
                    <select name="desplegablePrecio">
                        <option value=""></option>
                        <option value="caro">Caro</option>
                        <option value="medio">Medio</option>
                        <option value="barato">Barato</option>
                    </select>
                </div>
                
                <div class="col-md-2 text-center" id="contenedorListaMarca" style="background-color: blue; margin: 0;">
                    <h3>Marca</h3>
                    <select name="desplegableMarca">
                        <option value=""></option>
                        <option value="adidas">Adidas</option>
                        <option value="nike">Nike</option>
                        <option value="newBalance">New Balance</option>
                      
                    </select>
                </div>
                <div clas class="col-md-2"></div>
            </div><!-- Fin del filtrado-->
            <input style="margin-left: 48%;" type="submit" value="Buscar" name="botonFiltro" />
        </form><br/><br/><br/> 
            <!--PRODUCTOS-->
            <div class="row">
                <div clas class="col-md-2" style="background-color: pink"></div>
                <div class="col-md-8" id="contenedorProductos">
                    <?php
                    //////////////CONSULTA CON FILTROS//////////////
                    if (isset($_POST['botonFiltro'])){
                        $where="where nombre LIKE'%$ropa%' and sexo LIKE '%$sexo%' and precioFiltro LIKE'%$precio%'
                         and marca LIKE'%$marca%'";
               // print_r($where);
                    muestraConsultaFiltrada($where, $creaConexion );
                        
                    }else{
                        //llamada para mostrar la consulta general
                        realizaConsultaGeneral($arrayProductos );
                    }
                    
                    
                    ?> 
                </div>
                <div clas class="col-md-2" style="background-color: pink; "></div>
            </div>
        </div>

    </body>
</html>
