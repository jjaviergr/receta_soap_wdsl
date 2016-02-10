<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BD
 *
 * @author pc
 */
require_once 'recetas.php';
require_once 'ingredientes.php';

class BD {

    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=recetas";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        //$usuario = "root";
        //$contrasena = "";

        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes))
            $resultado = $dwes->query($sql);
        return $resultado;
    }

    public static function obtener_nombre_receta($cod_rec) {
        $sql = "SELECT  nombre FROM recetas";
        $sql .= " WHERE cod_rec='" . $cod_rec . "'";
        $resultado = self::ejecutaConsulta($sql);
        $nombre = null;

        if (isset($resultado)) {
            $row = $resultado->fetch();
            //print_r($row);
            $nombre = $row['nombre'];
        }
        //print_r($nombre);
        return $nombre;
    }

    public static function obtener_tipo_receta($cod_rec) {
        $sql = "SELECT  tipo FROM recetas";
        $sql .= " WHERE cod_rec='" . $cod_rec . "'";
        $resultado = self::ejecutaConsulta($sql);
        $nombre = null;

        if (isset($resultado)) {
            $row = $resultado->fetch();
            //$nombre = new Recetas($row);
            $nombre = $row['tipo'];
        }
        return $nombre;
    }

    public static function obtener_preparacion_receta($cod_rec) {
        $sql = "SELECT  * FROM recetas";
        $sql .= " WHERE cod_rec='" . $cod_rec . "'";
        $resultado = self::ejecutaConsulta($sql);
        $nombre = null;

        if (isset($resultado)) {
            $row = $resultado->fetch();
            //$nombre = new Recetas($row);
            $nombre = $row['preparacion'];
        }
        return $nombre;
    }

    public static function obtener_presentacion_receta($cod_rec) {
        $sql = "SELECT  * FROM recetas";
        $sql .= " WHERE cod_rec='" . $cod_rec . "'";
        $resultado = self::ejecutaConsulta($sql);
        $nombre = null;

        if (isset($resultado)) {
            $row = $resultado->fetch();
            //$nombre = new Recetas($row);
            $nombre = $row['presentacion'];
        }
        return $nombre;
    }

    public static function obtener_ingredientes_receta($cod_rec) {
        $sql = "SELECT  * FROM ingredientes";
        $sql .= " WHERE cod_rec='" . $cod_rec . "'";
        $resultado = self::ejecutaConsulta($sql);
        $nombre = array();
//        ini_set('memory_limit', '-1');
        $row=$resultado->fetch();
        while ($row != null) { 
            $nombre[] = new Ingredientes($row);
                $row = $resultado->fetch();
                
            }        
        return $nombre;
    }

    
   public static function obtener_ingredientes()
   {
        $sql = "SELECT  * FROM ingredientes";
        $resultado = self::ejecutaConsulta($sql);
        $nombre = array();
        $row=$resultado->fetch();
        while ($row != null) { 
            $nombre[] = new Ingredientes($row);
                $row = $resultado->fetch();
                
            }        
        return $nombre;
   }
   /**
    * 
    * @return \Recetas
    */
   public static function obtener_recetas()
   {
        $v=self::obtener_ingredientes();
        $sql = "SELECT  * FROM recetas";
        $resultado = self::ejecutaConsulta($sql);
        $nombre = array();
        $row=$resultado->fetch();
        while ($row != null) 
        { 
            $aux=new Recetas($row);
            $aux->setIngredientes($v);
            $nombre[] = $aux;
            
                $row = $resultado->fetch();
                
         }        
        return $nombre;
   }
}
