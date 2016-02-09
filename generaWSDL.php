<?php

require_once("BD_Proxy.php");
// Ruta a WSDLDocument
require_once("WSDLDocument.php");

$uri = "http://localhost/soap";
$url = "$uri/servicio_con_wdsl.php";
$wsdl = new WSDLDocument("BD_Proxy",$url,$uri); 
echo $wsdl->saveXml();
?>
