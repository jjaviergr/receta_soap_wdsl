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
     * @param string $f1
     * @param string $f2
     * @return string[][]
     */
    public function obtener_coordenadas($f1, $f2)
    {
        return(BD::obtener_coordenadas($f1, $f2));
    }
    
    /**
     * 
     * @return string[][]
     */
    public function obtener_todas_las_coordenadas()
    {
        return (BD::obtener_todas_las_coordenadas());
    }     
    
    /**
     * 
     * @param string[][] $c
     * 
     */
    public function insertar_coordenadas($c)
    {        
        return(BD::insertar_coordenadas($c));
    }
    
    
   /**
    * 
    * @return string
    */
    public function borrar_todas()
    {
       return(BD::borrar_todas_las_coordenadas()); 
    }
    
    /**
     * 
     * @param string $f1
     * @param string $f2
     * @return string
     */
    public function borrar_coordenadas($f1,$f2)
    {
        return(BD::borrar_coordenadas($f1,$f2));
    }
    
    /**
     * 
     * @param string $login
     * @param string $pass
     * @return string
     */
    public function autentica($login,$pass)
    {
        return(BD::autentica($login, $pass));
    }
    
//    public function  getFechaHoy()
//    {
//        return (Gps::getFechaHoy());
//    }
    
    
//    public function creaFecha($f)
//    {
//        return (Gps::creaFecha($f));
//    }
    
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