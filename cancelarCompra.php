<?php
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
//////////////// ESTA CONSULTA QUITA LOS REGISTROS DE LA CESTA DE LA COMPRA//////////////////
                $consultaSQL ="DELETE FROM cesta WHERE idProducto = ".$_GET['idProductoo']." and idCliente = ".$_SESSION['id']." LIMIT 1";
                
                $consultaDelete = $creaConexion->query($consultaSQL);
            if($creaConexion->errno){
            //    print_r("ESTA ES LA CONSULTA: ".$consultaCompra);
                die("<p>no ha sido posible comprar el articulo . $creaConexion->error <BR>");
                
            }else{
               // $consultaActualizaStock = ""
            }
      echo "<script>location.href='usuario.php?cancelaCompra=true'</script>";
?>