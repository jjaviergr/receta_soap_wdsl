<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        require_once ('BD.php');
//        require_once('BD_Proxy.php');
//        require_once('recetas.php');
//        require_once('ingredientes.php');

//        $a = new BD_proxy();
//        echo $a->obtieneNombreReceta(1).";;;;;";


        $uri = "http://localhost/receta_soap_wdsl";
        $url = "$uri/servicio_sin_wdsl.php";

////        
        try {
//
        $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

        print "Nombre de receta :";
        echo $cliente->obtieneNombreReceta(1);
        print "<br><br>";
        print "Preparacion de receta :";
        echo $cliente->obtener_preparacion_receta(1);
        print"<br><br>";
        print "Presentacion de receta :";
        echo $cliente->obtener_presentacion_receta(1);
        print "<br><br>";
        print "Lista ingredientes de esta receta :";
        print_r($cliente->obtener_array_ingredientes_receta(1));
        print "<br><br>";

        } catch (Exception $ex) {
        echo $ex->getMessage();
        print($cliente->__getLastResponse());
        }

        try
        {
        // print_r($cliente->obtener_ingredientes());
        // print "<br><br><br><br>";
        print "Todas las recetas de la BD:";
        print_r($cliente->obtener_recetas());
        print "<br><br>";
        $v = $cliente->obtener_recetas();
        print "<br><br>";
        print "Numero de recetas :".count($v)."<br>";
        // $v1=$v[0]->getIngredientes();
        print "Array de ingredientes de la receta 0 :<br>";
        print_r($v[0]->ingredientes);
        print "<br><br>";
        print "Ingredientes de la receta 0:<br>";
        foreach($v[0]->ingredientes as $ingrediente)
        {
        echo $ingrediente->nombre."<br>";
        }
        //print_r($v1->getNombre());

        } catch (Exception $ex)
        {
        echo $ex->getMessage();
        print($cliente->__getLastResponse());
        }
        ?>
        
    </body>
</html>
