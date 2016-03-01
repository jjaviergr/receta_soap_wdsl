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
//require_once 'gps.php';

class BD {

    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=gps";
//        $usuario = 'dwes';
//        $contrasena = 'abc123.';
        $usuario = "root";
        $contrasena = "";

        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes)) {
            $resultado = $dwes->query($sql);
        }
        return $resultado;
    }

    public static function obtener_coordenada($fecha) {
        $sql = "SELECT  GLatitud,GLongitud FROM coordenadas";
        $sql .= " WHERE Date='" . $fecha . "'";
        $resultado = self::ejecutaConsulta($sql);


        $cad = "";
        if (isset($resultado)) {
            $row = $resultado->fetch();
            //print_r($row);
            $cad = $row['GLatitud'] + "," + $row['GLongitud'];
        }
        //print_r($nombre);
        return $cad;
    }

    public static function obtener_coordenadas($f1, $f2) {
        $sql = "SELECT  GLatitud,GLongitud,Date FROM coordenadas WHERE Date between $f1 and $f2";
        $resultado = self::ejecutaConsulta($sql);
        echo $f1 . "|" . $f2 . $resultado;
        print_r($resultado);
        if (isset($resultado)) {
//            print_r($resultado);
            $row = $resultado->fetch();
            //print_r($row);
            while ($row != null) {
                $coordenada[] = array($row['GLatitud'], $row['GLongitud'], $row['Date']);
                $row = $resultado->fetch();
            }
            //$cad = $row['glatitud'] + "," + $row['glongitud'];
        }
        print_r($coordenada);
        return $coordenada;
    }

    public static function obtener_todas_las_coordenadas() {
        $sql = "SELECT  * FROM coordenadas";
        $resultado = self::ejecutaConsulta($sql);
        $coordenada = "";
        if (isset($resultado)) {
            $row = $resultado->fetch();
//            print_r($row);
            while ($row != null) {
//                $coordenada[] = new Gps($row);
                $coordenada[] = array($row['GLatitud'], $row['GLongitud'], $row['Date']);
                $row = $resultado->fetch();
            }
        }
//        echo "HOLA";
//        print_r($coordenada);
        return $coordenada;
    }

    /**
     * 
     * @param string $la
     * @param string $lo
     * @param string $da
     */
    public static function insertar($la,$lo,$da)            
    {
        $sql = "INSERT INTO coordenadas (GLatitud, GLongitud, Date) ";
        $sql = $sql . "VALUES ('$la','$lo','$da')";
        self::ejecutaConsulta($sql);
    }
    
    /**
     * 
     * @param string[] $c
     */
    public static function insertar_coordenada($c) {
        $coor=$c;
        $sql = "INSERT INTO coordenadas (GLatitud, GLongitud, Date) ";
        $sql = $sql . "VALUES ('$coor[0]','$coor[1]','$coor[2]')";
        self::ejecutaConsulta($sql);
    }

    /**
     * 
     * @param string[][] $c
     */
    public static function insertar_coordenadas($c) {

        for ($i = 0; $i < count($c); $i++) {
            $coor = $c[$i];
            $sql = "INSERT INTO coordenadas (GLatitud, GLongitud, Date) ";
            $sql = $sql . "VALUES ('$coor[0]','$coor[1]','$coor[2]')";
            self::ejecutaConsulta($sql);
        }
    }

    public static function borrar_todas_las_coordenadas() {
        $sql = "DELETE FROM coordenadas";
        self::ejecutaConsulta($sql);
    }

    public static function borrar_coordenadas($f1, $f2) {
        $sql = "DELETE FROM coordenadas where Date between $f1 and $f2";
        self::ejecutaConsulta($sql);
    }

    public static function getFechaHoy() {
        $hoy = getdate();
        //print_r($hoy);
        $cad = $hoy['mday'] . '/' . $hoy['mon'] . '/' . $hoy['year'] . " " . $hoy['hours'] . ":" . $hoy['minutes'];
        return $cad;
    }

    public static function creaFecha($f) {
        $formato = '!d-m-Y H:i';
        $fecha = DateTime::createFromFormat($formato, $f);
        return $fecha;
    }

}
