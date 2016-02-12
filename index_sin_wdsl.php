<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php



        $uri = "http://localhost/receta_soap_wdsl";
        $url="$uri/servicio_sin_wdsl.php";

//        
        try {

        $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
     
        echo "Nombre de la receta 1 :<br>".$cliente->obtieneNombreReceta(1); 
        print "<br><br>";
        echo 'Preparacion de la receta 1 :<br>';
        echo $cliente->obtener_preparacion_receta(1);
        print"<br><br>";
        echo "Presentacion de la receta 1 :<br>";
        echo $cliente->obtener_presentacion_receta(1);
        print "<br><br>";
        echo "Lista de ingredientes de la receta 1 (es un array de string) :<br>";
        print_r($cliente->obtener_array_ingredientes_receta(1));
        print "<br><br>";
        
        }
        catch (Exception $ex) 
        {
              echo $ex->getMessage();
              print($cliente->__getLastResponse());
        }
        
        try
        {
            echo "Todos los ingredientes de la BD en un Array:<br>";
            print_r($cliente->obtener_ingredientes());
            print "<br><br>";
            echo "Todas las recetas en un Array:<br>";
            print_r($cliente->obtener_recetas());
            print "<br><br>";
           
            
        }
        catch (Exception $ex) 
        {
              echo $ex->getMessage();
              print($cliente->__getLastResponse());
        }
        
        ?>
    </body>
</html>
