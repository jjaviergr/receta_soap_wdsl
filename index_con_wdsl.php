<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once('BD_Proxy.php');
        require_once('recetas.php');
        require_once('ingredientes.php');

        $a=new BD_proxy();
        echo $a->obtieneNombreReceta(1).";;;;;";

        
       $uri = "http://localhost/receta_soap_wdsl";
    

        // $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
       $cliente = new SoapClient("$uri/BD_Proxy.wsdl",array('codigo' => "1"));
       //print_r($cliente->__getFunctions());
       echo $cliente->obtieneNombreReceta(1); 
//       echo ("receta es : " + $receta); // funciona correctamente.
       
//         echo $cliente;

     
        ?>
    </body>
</html>
