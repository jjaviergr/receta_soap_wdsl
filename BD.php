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
        $usuario = 'dwes';
        $contrasena = 'abc123.';
 //       $usuario = "root";
 //       $contrasena = "";

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

//    public static function convierte_fecha($f) {
//        echo $f;
//        $aux = split("-", $f);
//        $aux2 = split(" ", $aux[2]);
//        $fecha = $aux2[0] . "-" . $aux[1] . "-" . $aux[0] . " " . $aux2[1];
//        return($fecha);
//    }

    public static function obtener_coordenadas($f1, $f2) {

        $sql = "SELECT  GLatitud,GLongitud,Date FROM coordenadas WHERE Date between '" . $f1 . "' and '" . $f2 . "'";

        //echo $sql;
        $resultado = self::ejecutaConsulta($sql);
        //echo $f1 . "|" . $f2 . $resultado;
        // print_r($resultado);
        if (isset($resultado)) {
//            print_r($resultado);
            $row = $resultado->fetch();
            //print_r($row);
            while ($row != null) {
                $coordenada[] = array($row['id'],$row['GLatitud'], $row['GLongitud'], $row['Date']);
                $row = $resultado->fetch();
            }
            //$cad = $row['glatitud'] + "," + $row['glongitud'];
        }
        print_r($coordenada);
        if (isset($coordenada)) {

            //print_r($coordenada);
            return $coordenada;
        }
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
                $coordenada[] = array($row['id'],$row['GLatitud'], $row['GLongitud'], $row['Date']);
                //date(DateTime::W3C ,$row['Date'])
                //date('Y-m-d H:i:s',strtotime($date));
                //date('d/m/Y', $row['campo_fecha_ts']);
                $row = $resultado->fetch();
            }
        }
//        echo "HOLA";
//        print_r($coordenada);
        return $coordenada;
    }

    /**
     * 
     * @param string[][] $c
     */
    public static function insertar_coordenadas($c) {

        for ($i = 0; $i < count($c); $i++) {
            $coor = $c[$i];
            $sql = "INSERT INTO coordenadas (GLatitud, GLongitud, Date) ";
//            $sql = $sql . "VALUES ('$coor[0]','$coor[1]',CURRENT_TIMESTAMP)";
            //echo $coor[2].' ';
            $aux = split("-", $coor[2]);
            $aux2 = split(" ", $aux[2]);
            $fecha = $aux2[0] . "-" . $aux[1] . "-" . $aux[0] . " " . $aux2[1];
            //echo date("Y-m-d H:i:s", strtotime($fecha));
            $sql = $sql . "VALUES ('$coor[0]','$coor[1]','" . date('Y-m-d H:i:s', strtotime($fecha)) . "')";
            //echo $sql;
            self::ejecutaConsulta($sql);
        }
    }

    public static function borrar_todas_las_coordenadas() {
        $sql = "DELETE FROM coordenadas";
        self::ejecutaConsulta($sql);
    }

    public static function borrar_coordenadas($f1, $f2) {
        $sql = "DELETE FROM coordenadas where Date between '$f1' and '$f2'";
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

    public static function autentica($login, $pass) {
//        print "param autentia $login |  $pass";

        $encontrado = 0;

        //$sql = "select count(*) as numero from usuarios where login like " . "'Jose'" . " AND pass like md5('" . "123456" . "')";
        //$sql = "select * as numero from usuarios where login like '" . $login . "' AND pass like md5('" . $pass . "')";


        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            //$dsn = "mysql:host=localhost;dbname=gps";
            //$usuario = "root";
            //$contrasena = "";
 $dsn = "mysql:host=localhost;dbname=gps";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        
            $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$dwes) {
                print "<br>Fallo.Revisa conexión con BD";
            }
        } catch (PDOException $e) {
            print "<br>Excepcion con la BD : $e";
        }

        $resultado = $dwes->prepare('select * from usuarios where login like :login AND pass like :passwd');
        $resultado->execute(Array(':login' => $login, ':passwd' => md5($pass)));

        $numero_filas = $resultado->rowCount();
        //echo $numero_filas;
        //print_r($resultado);
        return($numero_filas );
    }
    
    public static function actualiza_coordenada($uclave, $ulatitud, $ulongitud, $ufecha)
    {
        //UPDATE `coordenadas` SET `GLatitud`='1',`GLongitud`='2' WHERE Date LIKE '2016-03-05 22:58:47.0'
        $sql="UPDATE `coordenadas` SET `GLatitud`='$ulatitud',`GLongitud`='$ulongitud',`Date`='$ufecha' WHERE id LIKE '$uclave'";
        self::ejecutaConsulta($sql);
    }
    
    public static function elimina_coordenada($uclave)
    {
         $sql="DELETE FROM `coordenadas` WHERE id='$uclave'";
        self::ejecutaConsulta($sql);
    }

}
