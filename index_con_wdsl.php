<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        require_once ('BD.php');
       // require_once('BD_Proxy.php');
       // require_once('recetas.php');
       // require_once('ingredientes.php');

 //       $a = new BD_proxy();
 //       echo $a->obtieneNombreReceta(1).";;;;;";


        $uri = "http://localhost/receta_soap_wdsl";


//         $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
        try {

        
        $cliente = new SoapClient("$uri/BD_Proxy.wsdl");
        print "<br><br><br><br>";print "<br><br><br><br>";print "<br><br><br><br>";print "<br><br><br><br>";
        print_r($cliente->__getTypes());
        print "<br><br><br><br>";print "<br><br><br><br>";print "<br><br><br><br>";
        print_r($cliente->__getFunctions());
        //print_r($cliente->__getFunctions());

//        $cliente->__soapCall('obtieneNombreReceta', array('codigo' => 1));

//       $receta= $cliente->obtieneNombreReceta(1); 
//       echo ("receta es : " + $receta); // funciona correctamente.
//     $cliente->__soapCall("obtieneNombreReceta",array(1));
        echo $cliente->obtieneNombreReceta(1); 
        print "<br><br><br><br>";
        echo $cliente->obtener_preparacion_receta(1);
        print"<br><br><br><br>";
        echo $cliente->obtener_presentacion_receta(1);
        print "<br><br><br><br>";
        
        print_r($cliente->obtener_array_ingredientes_receta(1));
        print "<br><br><br><br>";
        
        }catch (Exception $ex) {
              echo $ex->getMessage();
              print($cliente->__getLastResponse());
        }
        
        try
        {
           // print_r($cliente->obtener_ingredientes());
           // print "<br><br><br><br>";
            print_r($cliente->obtener_recetas());
             print "<br><br><br><br>";
        }
        catch (Exception $ex) 
        {
              echo $ex->getMessage();
              print($cliente->__getLastResponse());
        }
        ?>
    </body>
</html>
