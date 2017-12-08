<?php
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
                    // enlaza los campos rellenados con las variables de php
                    $nombreUsuario=$_POST['nombreUsuarioRegistro'];
                    $correoElectronico=$_POST['emailRegistro'];
                    $contrasena= $_POST['contrasenaRegistro'];
                    $confirmarContraseña=$_POST['confirmaContrasenaRegistro'];
                    
                    //comprueba si esta repetido el email y el nombre de usuario
                    //email
                    $checkeaEmail=mysqli_query($creaConexion,"SELECT * FROM usuarios WHERE email='$correoElectronico'");
                    $numeroVecesEmail=mysqli_num_rows($checkeaEmail);
                    //nombre de usuario
                    $checkeaNombreUsuario=mysqli_query($creaConexion,"SELECT * FROM usuarios WHERE nombre='$nombreUsuario'");
                    $numeroVecesNombreUsuario=mysqli_num_rows($checkeaNombreUsuario);
                        
                        if( ($contrasena === $confirmarContraseña) && ($contrasena !=="") && ($confirmarContraseña !=="") ){
                            if( ($numeroVecesEmail >0) || ($numeroVecesNombreUsuario >0)){
                                if($numeroVecesEmail >0){ 
                                    echo '<script language="javascript">alert("El email ya ha sido registrado");</script>';
                                }else{
                                    echo '<script language="javascript">alert("El nombre de usuario    '.$nombreUsuario .'   ya esta creado");</script>';
                                }
                            }else{// CASO BUENO
                                $registraUsuario = "INSERT INTO usuarios (email, nombre, contrasena) VALUES ('".$correoElectronico."','".$nombreUsuario."','".$contrasena."')";
                                $creaConexion->query($registraUsuario);
                                
                                
                                if($creaConexion->errno){
                                    die("<p>no ha sido posible insertar datos en la tabla . $creaConexion->error");
                                }else{
                                    echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
                                   echo  "<script>location.href='index.php'</script>";
                                }  
                            }
                            
                        }else{
                            echo '<script language="javascript">alert("las contrasenas son incorrectas o no has rellenado los campos");</script>';
                            echo "<script>location.href='registro.php'</script>";
                        }

		
?>
        
        