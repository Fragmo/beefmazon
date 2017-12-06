<?php
session_start(); // iniciamos sesion

         define("host", "localhost");
         define("usuario", "root");
         define("contrasena", "");
         define("bbdd", "beefmazon");
         
         $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
         if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
         }
         
         $nombreUsuarioLogin = $_POST["nombreUsuario"];
         $contrasenaLogin = $_POST["contrasena"];
         
 /// ESTE CODIGO ES PARA COMPROBAR SI LOS DATOS APORTADO SON CORRECTOS Y NOS DEJA ENTRAR EN LA BBDD/////
         
         $queryCompruebaNombre = mysqli_query($creaConexion, "SELECT * FROM usuarios WHERE nombre = '$nombreUsuarioLogin'") ;
         // coge la contraseña de verdad para más tarde compararla con la puesta y ver si esta bien
         $querySeleccionaContrasena = mysqli_query($creaConexion,"SELECT contrasena FROM usuarios WHERE contrasena ='$contrasenaLogin'");
         $numeroVecesNombreUsuarioLogin=mysqli_num_rows($queryCompruebaNombre);
         
         if($numeroVecesNombreUsuarioLogin > 0){ //CASO BUENO
             if( $contrasenaLogin = mysqli_fetch_assoc($querySeleccionaContrasena)){
                // ESTO ES PARA TENER LAS VARIABLES DEL USUARIO DISPONIBLES EN CUALQUIER MOMENTOS
                $arrayVariablesUsuario = mysqli_fetch_all($queryCompruebaNombre);
                $_SESSION['id'] = $arrayVariablesUsuario[0][0] ;
                $_SESSION['email'] = $arrayVariablesUsuario[0][1];
                $_SESSION['nombreUsuario'] = $arrayVariablesUsuario[0][2];
                $_SESSION['contraseña'] = $arrayVariablesUsuario[0][3];
                echo "<script>location.href='pagina2.php?usuario=$nombreUsuarioLogin'</script>";
             }else{
                  echo ' <script language="javascript">alert("Contraseña incorrecta");</script> ';
             }
         }else{
             echo ' <script language="javascript">alert("Usuario no registrado");</script> ';
         }
?>


