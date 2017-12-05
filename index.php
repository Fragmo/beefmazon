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
        <script src="js/verbos.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="divFormulario">
            
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 " style="background-color: #ff0; margin-top: 10%">
                    <h1 class="text-center">BeefMazon</h1>
                    <form name="formularioLogin" action="loginToGuapo.php" method="POST">
                    <table border="0" cellspacing="1"  style="margin: 0 auto;" >
                    <tbody>
                        <tr>
                            <td>Usuario</td>
                            <td> <input type="text" name="nombreUsuario" required="yeah" value="wacamole" placeholder="ej:pepito" width="15%" /> </td>
                        </tr>         
                        
                        <tr>
                            <td>Contrasenña</td>
                            <td> <input type="password" name="contrasena" required="yeah" value="waca" width="15%"/></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td> <input type="submit" class="btn btn-success" value="enviar" name="botonEnviar" /> <input type="reset" class="btn btn-danger" value="borrar" name="botonBorrar" /></td>  
                        </tr>

                    </tbody>
                    </table>
                
                </form>
                </div>
                <div class="col-md-3"></div>

       
        <?php
        // put your code here
        ?>
    </body>
</html>
