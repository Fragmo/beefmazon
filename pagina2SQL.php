<?php
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
//CONSULTA LA CUAL SELECIONAR TODOS LOS PRODUCTOS Y GUARDARLOS EN UN ARRAY
    $consultaSQL = "SELECT * FROM productos";
    
    $consultaProductos = mysqli_query($creaConexion,$consultaSQL);
    $arrayProductos = mysqli_fetch_all($consultaProductos);
    //print_r(count($consultaProductos));

//CODIGO PARA MOSTRAR LOS PRODUCTOS POR PANTALLA
    
    for ($i = 0; $i < count($arrayProductos); $i++) { 
//        $codigo = $productos[$i][0];
        $nombre = $arrayProductos[$i][1];
        $precio = $arrayProductos[$i][2];
        $stock = $arrayProductos[$i][3];
        $marca = $arrayProductos[$i][4];
        $sexo = $arrayProductos[$i][5];
        $precioFiltro = $arrayProductos[$i][6];//bien hecho hasta aqui
        $codigoFoto = $arrayProductos[$i][7];
       
        // PUEDE QUE TENGA QUE PASAR ESTA VARIBALE O TODO EL PRINT A LA PAGINA 2
        // PARA PODER METERLO DENTRO DE UN DIV Y QUE SE AJUSTE
        //<input type="hidden" value="$codigo"> poner justo debajo de article
        PRINT <<<codigoGeneracionDivs
        <div class="col-md-4">
            <div class="pull-left"><img src="$codigoFoto"/></div>
            <div class="pull-left">$nombre</div><br>
            <div>$precio €,<br> $marca,<br> $sexo,<br> precio:$precioFiltro<br></div>
            <input type="button" value="Comprar" name="botonComprar" />
        </div>
codigoGeneracionDivs;
        
        
        
        
        
                    }

?>
