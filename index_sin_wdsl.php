<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        require_once ('BD.php');
        require_once('BD_Proxy.php');
        require_once('recetas.php');
        require_once('ingredientes.php');

        $a = new BD_proxy();
        echo $a->obtieneNombreReceta(1).";;;;;";


        $uri = "http://localhost/receta_soap_wdsl";
        $url="$uri/servicio_sin_wdsl.php";

//        
        try {

        $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
        //$cliente = new SoapClient("$uri/BD_Proxy.wsdl");

        echo $cliente->obtieneNombreReceta(1); 
        print "<br>";
        echo $cliente->obtener_preparacion_receta(1);
        print "<br>";
        echo $cliente->obtener_presentacion_receta(1);
        print "<br>";
        //print_r($cliente->obtener_array_ingredientes_receta(1));
        $v=$cliente->obtener_array_ingredientes_receta(1);
        print_r($v);
//        for ($i=0;$i<5;$i++)
//        {
//            print $v[$i]."<br>";
//        }
//        
        }catch (Exception $ex) {
              echo $ex->getMessage();
              print($cliente->__getLastResponse());
        }
        ?>
    </body>
</html>
