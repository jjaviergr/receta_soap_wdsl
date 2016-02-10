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
    * @param integer $codigo
    * @return string
    */
   public function obtieneNombreReceta($codigo)
   {      
       //print_r(BD::obtener_nombre_receta($codigo));
       
       return (BD::obtener_nombre_receta($codigo));
   }
   /**
    * 
    * @param integer $cod_rec
    * @return string
    */
   public function obtener_preparacion_receta($cod_rec)
   {
       return (BD::obtener_preparacion_receta($cod_rec));
   }
   /**
    * 
    * @param integer $cod_rec
    * @return string
    */
   public function obtener_presentacion_receta($cod_rec)
   {
       return (BD::obtener_presentacion_receta($cod_rec));
   }
   
   /**
    * 
    * @param integer $cod_rec
    * @return string[] type
    */
   public function obtener_array_ingredientes_receta($cod_rec)
   {
       //$v=new Ingredientes(null);
       $v=BD::obtener_ingredientes_receta($cod_rec);
       $cad="";
       $a="";
     
       for ($i=0;$i<count($v);$i++)
       {
          $cad=$cad.$v[$i]->getCantidad().";";
          $cad=$cad.$v[$i]->getCod_ing().";";
          $cad=$cad.$v[$i]->getCod_rec().";";
          $cad=$cad.$v[$i]->getNombre().";";
          $cad=$cad.$v[$i]->getUnidad();          
          $a[$i]=$cad;
        }
       
       return ($a);
   }
   
//   public function obtener_ingredientes()
//   {
//       return(BD::obtener_ingredientes());
//   }
   
   /**
    * 
    * @return Recetas[]
    */
   public function obtener_recetas()
   {
       return(BD::obtener_recetas());
   }
   
//   public function obtener_ingredientes_receta($cod_rec)
//   {
//       $v=BD::obtener_ingredientes_receta($cod_rec);
//       for (var $i=0;$i<$v.length();$i++)
//       {
//          $cad=$cad+$v[$i];    
//       }
//       return $cad;
//   }
   
}

//$a=new BD_proxy();
//print_r($a->obtener_array_ingredientes_receta(1));
//echo $a->obtieneNombreReceta(1);