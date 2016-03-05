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

                $v = $cliente->obtener_coordenadas($f1, $f2);
                //$v=BD_proxy::obtener_coordenadas($f1,$f2);
                //Aplication::imprimir_v_coordenadas($v);
                Aplication::mostrar_intervalo($v);
            }

            //borra en un intervalo
            if (isset($_POST['bf1']) && isset($_POST['bf2'])) {
                $f1 = $_POST['bf1'];
                $f2 = $_POST['bf2'];
                //$cliente->borrar_coordenadas($f1, $f2);
                BD_proxy::borrar_coordenadas($f1, $f2);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            print($cliente->__getLastResponse());
        }
        ?>
