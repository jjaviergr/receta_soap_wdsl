<?php

require_once('BD_Proxy.php');

$uri="http://rastreriza.esy.es";

$server = new SoapServer(null, array('uri'=>''));
//$server=new SoapServer($uri+"/BD_Proxy.wsdl");



$server->setClass('BD_Proxy');
$server->handle();


?>
