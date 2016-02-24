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
                            <option value="4">Mostrar intervalos de fecha grabados en la BD</option>
                            <option value="5">Borrar intervalo de coordenadas seleccionando por tiempo</option>
                            <option value="6">Borrar todas las coordenadas</option>
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
                <form id="imp_coordenadas_intervalo" action='index_con_wdsl.php' method='post'>
                    <label>Fecha Inicial</label><input type="datetime-local">
                    <label>Fecha Final </label><input type="datetime-local">
                    <textarea></textarea>
                </form>
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
        require_once ('gps.php');


        $uri = "http://localhost/receta_soap_wdsl";

        $cliente = new BD_Proxy();

        if (isset($_POST['eleccion'])) {
            if (!isset($_POST['opcion'])) {
                echo "No has marcado ninguna opcion";
            } else {
                $e = $_POST['opcion'];
//                echo $e;
                switch ($e) {
                    case "1":insertar_coordenada();
                        break;
                    case "2":break;
                    case "3": mostrar_todas();
                        break;
                    case "4":break;
                    case "5":break;
                    case "6":borrar_todas();
                        break;
                    default: echo "error en switch";
                }
            }
        }

        if (isset($_POST['coordenada'])) {
//            print "hoal";
//            print_r($_POST);
//            if (isset($_POST['latitud']) && (isset($_POST['longitud']) && (isset($_POST['fecha'])))) {
            $row = array();
            $row['GLatitud'] = $_POST['latitud'];
            $row['GLongitud'] = $_POST['longitud'];
            $row['Date'] = $_POST['fecha'];
            $coordenada = new Gps($row);
            $c = array($coordenada);
//            print_r ($c);
            $cliente->insertar_coordenadas($c);
        }

        function borrar_todas() {
            $cliente = new BD_Proxy();
            $cliente->borrar_coordenadas();
        }

        function insertar_coordenada() {
            $cad = "<form action='index_con_wdsl.php' method='post'>
                    <label>Latitud</label><input type=\"text\" name='latitud'>
                    <label>Longitud</label><input type=\"text\" name='longitud'>
                    <label>Fecha Actual</label>";
            print $cad;
            print '<input type=\'text\' value=\''.GPS::getFechaHoy().'\' name=\'fecha\' >';
            print  '<input type=\'submit\' value=\'Guardar\' name=\'coordenada\'>';
            print  '</form>';
            
            
            //<label>Fecha</label><input type=\"datetime-local\" name='fecha' >
            //<label>Fecha</label><input type=\"datetime-local\" name=\'fecha\' value='. GPS::getFechaHoy() .'\'>
            //print $cad;
           // print '<label>Fecha Actual</label>';
           // print '<input type=\'text\' value=\''.GPS::getFechaHoy().'\' >';
        }

        function mostrar_todas() {
            $todas = $cliente->obtener_todas_las_coordenadas();
            $cad = "<label><b>Todas las Coordenadas</b></label><br>";

            foreach ($todas as $una) {
                $cad = $cad . "Latitud :" . $una->getGLatitud() . " ";
                $cad = $cad . "Longitud:" . $una->GetGLongitud() . " ";
                $cad = $cad . "Fecha :" . $una->getFecha() . " <br>";
            }
            echo $cad;
        }

        function inicializa_servicio() {
            //print lanzador();
            try {
                $cliente = new SoapClient("$uri/BD_Proxy.wsdl");
            } catch (Exception $ex) {
                echo $ex->getMessage();
                print($cliente->__getLastResponse());
            }
            return $cliente;
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
    

        
