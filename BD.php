<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author pc
 */
require_once 'gps.php';

class BD {

    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=gps";
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

    public static function obtener_coordenada($fecha) {
        $sql = "SELECT  glatitud,glongitud FROM coordenadas";
        $sql .= " WHERE fecha='" . $fecha . "'";
        $resultado = self::ejecutaConsulta($sql);
        $nombre = null;

        $cad = "";
        if (isset($resultado)) {
            $row = $resultado->fetch();
            //print_r($row);
            $cad = $row['glatitud'] + "," + $row['glongitud'];
        }
        //print_r($nombre);
        return $cad;
    }

    public static function obtener_coordenadas($f1, $f2) {
        $sql = "SELECT  glatitud,glongitud FROM coordenadas";
        $sql .= " WHERE fecha between $f1 and $f2";
        $resultado = self::ejecutaConsulta($sql);

        /*
          if($resultado) {
          // Añadimos un elemento por cada producto obtenido
          $row = $resultado->fetch();
          while ($row != null) {
          $productos[] = new Producto($row);
          $row = $resultado->fetch();
          }
          } */
        if (isset($resultado)) {
            $row = $resultado->fetch();
            //print_r($row);
            while ($row != null) {
                $coordenada[] = new Gps($row['glatitud'], $row['glongitud'], $row['fecha']);
                $row = $resultado->fetch();
            }
            //$cad = $row['glatitud'] + "," + $row['glongitud'];
        }
        //print_r($nombre);
        return $coordenada;
    }

    public static function obtener_todas_las_coordenadas() {
        $sql = "SELECT  * FROM coordenadas";
        $resultado = self::ejecutaConsulta($sql);
        $coordenada = "";
        if (isset($resultado)) {
            $row = $resultado->fetch();
            //print_r($row);
            while ($row != null) {
                $coordenada[] = new Gps($row);
                $row = $resultado->fetch();
            }
            //$cad = $row['glatitud'] + "," + $row['glongitud'];
        }
        //print_r($nombre);
        return $coordenada;
    }

    public static function insertar_coordenadas($c) {
        print "INSERTANDO ".count($c);
        for ($i = 0; $i < count($c); $i++) 
        {            
            $coor=$c[$i];
            print $coor->getGLatitud().",".$coor->getGLongitud().",".$coor->getFecha()."<br>";
            $sql = "INSERT INTO Coordenadas (GLatitud, GLongitud, Date) ";
            $sql=$sql."VALUES (".$coor->getGLatitud().",".$coor->getGLongitud().",".$coor->getFecha().")";
            
//            $sql="INSERT INTO Coordenadas (GLatitud, GLongitud, Date) VALUES ('1','2','3')";
            self::ejecutaConsulta($sql);
            
        }
        print "$sql"."<br>";
    }

}
