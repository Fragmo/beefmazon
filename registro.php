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
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>

    </head>
    <body style="background-image: url(imagenes/fondoDePantallaBeefmazonFinal.jpg); background-size: cover; background-repeat: no-repeat;">
        <div id="divFormulario">
            
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 "  >
                    <h1 class="text-center" style="color: blueviolet">BeefMazon</h1>
                    <form style="background-color: #999999;" name="formularioLogin" action="registroToGuapo.php" method="POST">
                    <h1 style="margin-top: 10%; margin-bottom: 10%" class="text-center">Formulario de registro</h1>
                    <table border="0" cellspacing="1"  style="margin: 0 auto;" >
                    <tbody>
                        <tr>
                            <td>Email</td>
                            <td> <input type="email" name="emailRegistro" required="yeah" placeholder="alguien@example.com" width="15%"/></td>
                        </tr>
                        
                        <tr>
                            <td>Usuario</td>
                            <td> <input type="text" name="nombreUsuarioRegistro" required="yeah" placeholder="ej:pepito" width="15%" /> </td>
                        </tr>         
                        
                        <tr>
                            <td>Contrasenña</td>
                            <td> <input type="password" name="contrasenaRegistro" required="yeah" placeholder="****" width="15%"/></td>
                        </tr>
                        
                        <tr>
                            <td>Repite la contrasenña</td>
                            <td> <input type="password" name="confirmaContrasenaRegistro" required="yeah" placeholder="****"  width="15%"/></td>
                        </tr>
                        
                        
                        <tr>
                            <td></td>
                            <td> <input type="submit" class="btn btn-success" value="enviar" name="botonEnviar" /> <input type="reset" class="btn btn-danger" value="borrar" name="botonBorrar" /> <a href="index.php"><input type="button" class="btn btn-info" value="Ya tienes Cuenta?" name="yaTienesCuenta" /></a></td>  
                        </tr>

                    </tbody>
                    </table>
                
                </form>
                </div>
                <div class="col-md-4"></div>

       
        <?php
        // put your code here
        ?>
    </body>
</html>


