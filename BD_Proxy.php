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
    
    /**
     * 
     * @param string $uclave
     * @param string $ulatitud
     * @param string $ulongitud
     * @param string $ufecha
     * @return string
     */
    public function actualiza_coordenada($uclave, $ulatitud, $ulongitud, $ufecha)
    {
        return(BD::actualiza_coordenada($uclave, $ulatitud, $ulongitud, $ufecha));
    }
    
    /**
     * 
     * @param string $uclave
     * @return string
     */
    public function elimina_coordenada($uclave)
    {
        return(BD::elimina_coordenada($uclave));
    }
    
}