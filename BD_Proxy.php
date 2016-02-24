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
     * @param string $fecha
     * @return string
     */
    public function obtener_coordenada($fecha)
    {
        return(BD::obtener_coordenada($fecha));
    }
    
    /**
     * 
     * @param string $f1
     * @param string $f2
     * @return string
     */
    public function obtener_coordenadas($f1, $f2)
    {
        return(BD::obtener_coordenadas($f1, $f2));
    }
    
    /**
     * 
     * @return string[]
     */
    public function obtener_todas_las_coordenadas()
    {
        return (BD::obtener_todas_las_coordenadas());
    }     
    
    /**
     * 
     * @param Gps[] $c
     * 
     */
    public function insertar_coordenadas($c)
    {
        BD::insertar_coordenadas($c);
    }
    
}

//$vector=  array();
//$a=new BD_proxy();
//$coordenada=new Gps();
//$coordenada->setGLatitud(1);
//$coordenada->setGLongitud(1);
//$coordenada->setFecha(date("Y/m/d"));
//$vector[0]=$coordenada;
////print_r $coordenada;
//BD::insertar_coordenadas($vector);
//print_r($a->obtener_todas_las_coordenadas());
//echo $a->obtieneNombreReceta(1);