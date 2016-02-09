<?php

require_once('include/DB.php');

$uri="http://localhost/soap/servicio.php";

$server = new SoapServer(null, array('uri'=>''));



$server->setClass('BD_Proxy');
$server->handle();


?>
