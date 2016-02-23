<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('BD.php');
//require_once('../productos.php');
//require_once 'ingredientes.php';

class BD_proxy
{
    /**
     * 
     * @param type $fecha
     * @return double
     */
    public function obtener_coordenada($fecha)
    {
        return(BD::obtener_coordenada($fecha));
    }
    /**
     * 
     * @param type $f1
     * @param type $f2
     * @return Gps[]
     */
    public function obtener_coordenadas($f1, $f2)
    {
        return(BD::obtener_coordenadas($f1, $f2));
    }
    /**
     * 
     * @return Gps[]
     */
    public function obtener_todas_las_coordenadas()
    {
        return (BD::obtener_todas_las_coordenadas());
    }        
    
}

//$a=new BD_proxy();
//print_r($a->obtener_array_ingredientes_receta(1));
//echo $a->obtieneNombreReceta(1);