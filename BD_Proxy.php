<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('BD.php');
//require_once('../productos.php');


class BD_proxy
{
   /**
    * 
    * @param int $codigo
    * @return string
    */
   public function obtieneNombreReceta($codigo)
   {      
       //print_r(BD::obtener_nombre_receta($codigo));
       
       return (BD::obtener_nombre_receta($codigo));
   }
   
   
   
}

//$a=new BD_proxy();
//echo $a->obtieneNombreReceta(1);