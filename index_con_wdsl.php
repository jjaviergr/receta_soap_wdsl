<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestor de Coordenadas GPS</title>
    </head>
    <body>
        <div>
            <h3>Gestor de Coordenadas GPS</h3>
            <fieldset>
                <legend>Escoge una opción</legend>
                <form  action='index_con_wdsl.php' method='post'>
                    <div>
                        <select multiple name="opcion">
                            <option value="1">Insertar Coordenada</option>
                            <option value="2">Mostrar Coordenadas entre un intervalo de fechas</option>
                            <option value="3">Mostrar todas las Coordenadas de la BD</option>                            
                            <option value="4">Borrar intervalo de coordenadas seleccionando por tiempo</option>
                            <option value="5">Borrar todas las coordenadas</option>
                        </select>
                    </div>
                    <input type="submit" value="Ejecutar" name='eleccion'/> 

                </form>
            </fieldset>
        </div>
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
        require_once('BD_Proxy.php');
//        require_once ('gps.php');
        require_once ('Aplication.php');

        //$cliente = null;
        $uri = "http://localhost/receta_soap_wdsl";

//        $cliente = new BD_Proxy();
        try {
            $cliente = new SoapClient("$uri/BD_Proxy.wsdl");
//            print_r($cliente->__getTypes());
//            print "<br><br>";
//            print "Funciones :<br>";
//            print_r($cliente->__getFunctions());

            if (isset($_POST['eleccion'])) {
                if (!isset($_POST['opcion'])) {
                    echo "No has marcado ninguna opcion";
                } else {
                    $e = $_POST['opcion'];
//                echo $e;
                    switch ($e) {
                        case "1":Aplication::insertar_f_coordenada($cliente);
                            break;
                        case "2":Aplication::mostrar_f_coordenadas($cliente); //Mostrar Coordenadas entre un intervalo de fechas
                            break;
                        case "3": Aplication::mostrar_todas($cliente);
                            break;
                        case "4":Aplication::borrar_f_coordenadas($cliente); //Borrar intervalo de coordenadas seleccionando por tiempo
                            break;

                        case "5":Aplication::borrar_f_todas($cliente);
                            break;
                        default: echo "error en switch";
                    }
                }
            }

            //inserta una coodenada
            if (isset($_POST['coordenada'])) {
//            print "hoal";
//            print_r($_POST);
//            if (isset($_POST['latitud']) && (isset($_POST['longitud']) && (isset($_POST['fecha'])))) {
                $row = array();
                $row[0] = $_POST['latitud'];
                $row[1] = $_POST['longitud'];
                $row[2] = $_POST['fecha'];
                
                $c = array($row);
//                echo "HOLA";
//            print_r ($c);
               // $cliente->insertar_coordenadas($c);
               BD_proxy::insertar_coordenadas($c);
            }

            //muestra en un intervalo
            if (isset($_POST['f1m']) && isset($_POST['f2m'])) {
                $f1 = $_POST['f1m'];
                $f2 = $_POST['f2m'];
             
                $v=$cliente->obtener_coordenadas($f1, $f2);
                //$v=BD_proxy::obtener_coordenadas($f1,$f2);
                //Aplication::imprimir_v_coordenadas($v);
                Aplication::mostrar_intervalo($v);
            }

            //borra en un intervalo
            if (isset($_POST['bf1']) && isset($_POST['bf2'])) {
                $f1 = $_POST['bf1'];
                $f2 = $_POST['bf2'];
                $cliente->borrar_coordenadas($f1, $f2);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            print($cliente->__getLastResponse());
        }
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
    

        
