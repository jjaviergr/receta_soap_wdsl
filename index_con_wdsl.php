<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestor de Coordenadas GPS</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>



        <div class="row">
            <div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 ">
                <div class="text-center"><h3>Identificate</h3></div>



            </div>
            <div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4  col-lg-4 col-lg-offset-4 "> 
                <hr>
            </div>   
        </div>
        <div class="row">       
            <div class="col-xs-12 col-sm-7 col-sm-offset-5 col-md-7 col-md-offset-5  col-lg-7 col-lg-offset-5">
                <form role="form" action='index_con_wdsl.php' method='post'>
                    <div class="row">
                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 col-lg-push-0">
                            <label for="login">Login</label>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-lg-3 col-lg-push-0">
                            <input type="text" name="login" class="form-control" id="login" placeholder="Introduce tu Login"/>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                            <label for="pass" >Pasword</label>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-lg-3 ">
                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Introduce tu Password"/>
                        </div>                           
                    </div>
                    <br>


                    <div class="row" >

                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <input class="btn btn-primary" type="submit" value="Enviar" title="Enviar " />
                            <input class="btn btn-warning" type="reset" value="Borrar" title="Resetear" />
                        </div> 	
                    </div>

                </form>



            </div>
        </div>



        <?php
        //require_once 'BD_Proxy.php';
        //print_r($_POST);

        if ((isset($_POST['login'])) && (isset($_POST['pass']))) {

            $uri = "http://localhost/receta_soap_wdsl";
            $cliente = new SoapClient("$uri/BD_Proxy.wsdl");
            $autentica =$cliente->autentica($_POST['login'], $_POST['pass']);
print $autentica;
            //$autentica = BD_proxy::autentica($_POST['login'], $_POST['pass']);

            if ($autentica === '1') {
//           $cad = "<h3>Gestor de Coordenadas GPS</h3>
//            <fieldset>
//                <legend>Escoge una opción</legend>
//                <form  action='index_con_wdsl.php' method='post'>
//                    <div>
//                        <select multiple name='opcion'>
//                            <option value='1'>Insertar Coordenada</option>
//                            <option value='2'>Mostrar Coordenadas entre un intervalo de fechas</option>
//                            <option value='3'>Mostrar todas las Coordenadas de la BD</option>                            
//                            <option value='4'>Borrar intervalo de coordenadas seleccionando por tiempo</option>
//                            <option value='5'>Borrar todas las coordenadas</option>
//                        </select>
//                    </div>
//                    <input type='submit' value='Ejecutar' name='eleccion'/> 
//
//                </form>
//            </fieldset>
//        </div>";
                echo "autenticado";
                header("Location: menu_coordenada.php");
//                $cad = "<div class='row'>
//            <div class='col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 '>
//                <div class='text-center'><h3>Panel de control de Coordenadas GPS</h3></div>
//
//
//
//            </div>
//        </div>
//        <div class='row'>        
//            <div class='col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4  col-lg-4 col-lg-offset-4 '> 
//                <div class='text-center'><hr></div>
//            </div>   
//        </div>
//        <div class='row'>       
//            <div class='col-xs-12 col-sm-7 col-sm-offset-5 col-md-7 col-md-offset-5  col-lg-4 col-lg-offset-4'>
//
//
//                <form  action='index_con_wdsl.php' method='post'>
//                    <div>
//                        <select  name='opcion' class='form-control' size='5' >
//                            <option value='1'>Insertar Coordenada</option>
//                            <option value='2'>Mostrar Coordenadas entre un intervalo de fechas</option>
//                            <option value='3'>Mostrar todas las Coordenadas de la BD</option>                            
//                            <option value='4'>Borrar intervalo de coordenadas seleccionando por tiempo</option>
//                            <option value='5'>Borrar todas las coordenadas</option>
//                        </select>
//                    </div>
//                    <br>
//                    <input class='btn btn-primary' type='submit' value='Ejecutar' name='eleccion'/> 
//                    <input class='btn btn-success' type='submit' value='Salir' name='salir'/> 
//                </form>
//
//            </div>
//        </div>";
                //print $cad;
            } else
                print "Fallo al autenticar";
        }
        ?>
        <!--
        <div>
            <fieldset  >
                <form id="i_coordenada" action='index_con_wdsl.php' method='post'>
                    <label>Latitud</label><input type="text">
                    <label>Longitud</label><input type="text">
                    <label>Fecha</label><input type="datetime-local">
                    <input type="submit" value="Guardar">
                </form>
            </fieldset>
        </div>
        <div>
            <fieldset  hidden>
                
            </fieldset>
        </div>
        <div>

        </div>
        <div>
            <fieldset hidden>
                <form id="borrar_coordenadas_intervalo" action='index_con_wdsl.php' method='post'>
                    <label>Fecha Inicial</label><input type="datetime-local">
                    <label>Fecha Final </label><input type="datetime-local">
                    <label>Borrar</label><input type="submit"/>
                </form>
            </fieldset>
        </div>
        <div>
            <fieldset  hidden>
                <form  id="imp_coordenadas_intervalo" action='index_con_wdsl.php' method='post'>
                    <input type="submit" value="Eliminar Todas las coordenadas"/>
                </form>
            </fieldset>
        </div>
        -->
        <!---->
        <?php
        
        ?>

    </body>
</html>

<!--
//        print "\n Tipos :";
//        print_r($cliente->__getTypes());
//        print "<br><br>";
//        print "\n Funciones :";
//        print_r($cliente->__getFunctions());
//        print "<br><br>";
//        $cliente->__soapCall('obtieneNombreReceta', array('codigo' => 1));
//       $receta= $cliente->obtieneNombreReceta(1); 
//       echo ("receta es : " + $receta); // funciona correctamente.
//     $cliente->__soapCall("obtieneNombreReceta",array(1));
//        print "Nombre de receta :";
//        echo $cliente->obtieneNombreReceta(1); 
//        print "<br><br>";
//        print "Preparacion de receta :";
//        echo $cliente->obtener_preparacion_receta(1);
//        print"<br><br>";
//        print "Presentacion de receta :";
//        echo $cliente->obtener_presentacion_receta(1);
//        print "<br><br>";
//        print "Lista ingredientes de esta receta :";
//        print_r($cliente->obtener_array_ingredientes_receta(1));
//        print "<br><br>";
//        
//        
//        try
//        {
//           // print_r($cliente->obtener_ingredientes());
//           // print "<br><br><br><br>";
//            print "Todas las recetas de la BD:";
//            print_r($cliente->obtener_recetas());
//            print "<br><br>";
//            $v=$cliente->obtener_recetas();
//            print "<br><br>";
//            print "Numero de recetas :".count($v)."<br>";
//           // $v1=$v[0]->getIngredientes();
//            print "Array de ingredientes de la receta 0 :<br>";
//            print_r($v[0]->ingredientes);
//            print "<br><br>";
//            print "Ingredientes de la receta 0:<br>";
//            foreach($v[0]->ingredientes as $ingrediente)
//            {
//                echo $ingrediente->nombre."<br>";
//            }
//            //print_r($v1->getNombre());
//            
//        }
//        catch (Exception $ex) 
//        {
//              echo $ex->getMessage();
//              print($cliente->__getLastResponse());
//        }
        ?>
    

        
