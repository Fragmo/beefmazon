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

        </style>
        <script src="js/verbos.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"><h1 class="text-center">BeefMazon</h1></div>
            <div class="col-md-3"></div>
        </div>
        <!--FILTRADOR-->
        <div class="row" >
            <div class="col-md-12">
                <div clas class="col-md-2"></div>
                <div class="col-md-2 text-center" id="contenedorListaDesplegableRopa" style="background-color: red; margin: 0;  " >
                    <h3>Ropa</h3>
                    <select name="desplegableRopa">
                    <option><a href="pagina2SQL.">Todo</a></option>
                    <option>Camisetas</option>
                    <option>Pantalones</option>
                    <option>Zapatos</option>
                </select>
                    
                </div>
                
                <div class="col-md-2 text-center" id="contenedorListaDesplegableSexo" style="background-color: green; margin: 0; " >
                    <h3>Sexo</h3>
                    <select name="desplegableSexo">
                        <option>Todo</option>
                        <option>Hombre</option>
                        <option>Mujer</option>
                    </select>
                </div>
                
                <div class="col-md-2 text-center" id="contenedorListaDesplegableSexo" style="background-color: yellow ; margin: 0;">
                    <h3>Precio</h3>
                    <select name="desplegablePrecio">
                        <option>Todo</option>
                        <option>Caro</option>
                        <option>Medio</option>
                        <option>Barato</option>
                    </select>
                </div>
                
                <div class="col-md-2 text-center" id="contenedorListaDesplegableSexo" style="background-color: blue; margin: 0;">
                    <h3>Marca</h3>
                    <select name="desplegableMarca">
                        <option>Todo</option>
                        <option>Adidas</option>
                        <option>Nike</option>
                        <option>New Balance</option>
                    </select>
                </div>
                <div clas class="col-md-2"></div>
            </div><!-- Fin del filtrado-->
            
            <!--PRODUCTOS-->
            <div class="row">
                <div clas class="col-md-2" style="background-color: pink"></div>
                <div class="col-md-8" id="contenedorProductos"></div>
                <div clas class="col-md-2" style="background-color: pink; "></div>
            </div>
        </div>
       
        
        <?php
         //   require 'pagina2SQL.php';
        ?>
        
        
       
    <script>
       // cargaProductos();
        
        function cargaProductos(){
            $('#contenedorProductos').append('<div class="row" id="rowProductos"></div');
            for(var i = 0; i<8; i++){
               $('#rowProductos').append('<div class="col-md-4" style=" background-color: red;">hossssssssssssssla</div>'); 
            }
            
        }
    </script>
    </body>
</html>
