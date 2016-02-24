<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>

    <?php
    require_once ('gps.php');

    $uri = "http://localhost/receta_soap_wdsl";


    //print lanzador();
    try {
        $cliente = new SoapClient("$uri/BD_Proxy.wsdl");
    } catch (Exception $ex) {
        echo $ex->getMessage();
        print($cliente->__getLastResponse());
    }



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
    <script>
        function lanzador()
        {
            var cad=" print(<p>AAAAAAAA</p>);"
        
            document.write("<?php print(<p>AAAAAAAA</p>) ?>");
        }
    </script>
    <body>
        <h3>Bienvenido a Administra coordenadas</h3>
        <select multiple onchange='lanzador();">
            <option id="1">Insertar Coordenada</option>
            <option id="2">Mostrar Coordenadas entre un intervalo de fechas</option>
            <option id="3" selected>Mostrar todas las Coordenadas de la BD</option>
            <option id="4">Mostrar intervalos de fecha grabados en la BD</option>
            <option id="5">Borrar intervalo de coordenadas seleccionando por tiempo</option>
            <option id="6">Borrar todas las coordenadas</option>
        </select>

    </body>
</html>
