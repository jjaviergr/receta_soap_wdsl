<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Panel de control de Coordenadas GPS</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 ">
                <div class="text-center"><h3>Panel de control de Coordenadas GPS</h3></div>



            </div>
        </div>
        <div class="row">        
            <div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4  col-lg-4 col-lg-offset-4 "> 
                <div class="text-center"><hr></div>
            </div>   
        </div>
        <div class="row">       
            <div class="col-xs-12 col-sm-7 col-sm-offset-5 col-md-7 col-md-offset-5  col-lg-4 col-lg-offset-4">


                <form  action='menu_coordenada.php' method='post'>
                    <div>
                        <select  name='opcion' class="form-control" size="5" >
                            <option value='1'>Insertar Coordenada</option>
                            <option value='2'>Mostrar Coordenadas entre un intervalo de fechas</option>
                            <option value='3'>Mostrar todas las Coordenadas de la BD</option>                            
                            <option value='4'>Borrar intervalo de coordenadas seleccionando por tiempo</option>
                            <option value='5'>Borrar todas las coordenadas</option>
                        </select>
                    </div>
                    <br>
                    <input class="btn btn-primary" type='submit' value='Ejecutar' name='eleccion'/> 
                    <input class="btn btn-success" type='submit' value='Salir' name='salir'/> 
                </form>

            </div>
        </div>

        <?php
        //require_once('BD_Proxy.php');
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
                        case "4":Aplication::borrar_f_coordenadas(); //Borrar intervalo de coordenadas seleccionando por tiempo
                            break;

                        case "5":Aplication::borrar_todas($cliente);
                            break;
                        default: echo "error en switch";
                    }
                }
            }

            //inserta una coodenada
            if (isset($_POST['coordenada'])) {
//            print "hola";
//            print_r($_POST);
//            if (isset($_POST['latitud']) && (isset($_POST['longitud']) && (isset($_POST['fecha'])))) {
                $row = array();
                $row[0] = $_POST['latitud'];
                $row[1] = $_POST['longitud'];
                $row[2] = $_POST['fecha'];

                $c = array($row);
//                echo "HOLA";
//            print_r ($c);
                $cliente->insertar_coordenadas($c);
                //BD_proxy::insertar_coordenadas($c);
            }

            //muestra en un intervalo
            if (isset($_POST['f1m']) && isset($_POST['f2m'])) {
                $f1 = $_POST['f1m'];
                $f2 = $_POST['f2m'];

                $v = $cliente->obtener_coordenadas($f1, $f2);
                //$v=BD_proxy::obtener_coordenadas($f1,$f2);
                //Aplication::imprimir_v_coordenadas($v);
                Aplication::mostrar_intervalo($v);
            }

            //borra en un intervalo
            if (isset($_POST['bf1']) && isset($_POST['bf2'])) {
                $f1 = $_POST['bf1'];
                $f2 = $_POST['bf2'];

                $cliente->borrar_coordenadas($f1, $f2);
                //BD_proxy::borrar_coordenadas($f1, $f2);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            print($cliente->__getLastResponse());
        }

        if (isset($_POST['salir'])) { {
                header("Location: index_con_wdsl.php");
            }
        }

        if (isset($_POST['actualiza'])) 
        {
            if (isset($_POST['uclave'])) {
                if (isset($_POST['ulatitud'])) {
                    if (isset($_POST['ulongitud'])) {
                        if (isset($_POST['ufecha'])) {
                            $cliente->actualiza_coordenada($_POST['uclave'], $_POST['ulatitud'], $_POST['ulongitud'], $_POST['ufecha']);
                        }
                        else print "No has escrito ninguna fecha<br>";
                    }else print "No has escrito la longitud<br>";
                }else print "No has escrito la latitud<br>";
            }else print "Error de la aplicación.<br>";
        }

        if (isset($_POST['elimina'])) {
            $cliente->elimina_coordenada($_POST['uclave']);
        }
        ?>
    </body>
</html>
