<?php

require_once('BD_Proxy.php');

$uri="http://localhost/receta_soap_wdsl/BD_Proxy.wsdl";

//$server = new SoapServer(null, array('uri'=>''));
$server=new SoapServer($uri);



$server->setClass('BD_Proxy');
$server->handle();


?>
