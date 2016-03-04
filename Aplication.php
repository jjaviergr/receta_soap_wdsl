<?php

require_once 'BD_Proxy.php';

class Aplication {

    public static function insertar_f_coordenada($cliente) {
        $cad = "<form action='index_con_wdsl.php' method='post'>
                    <label>Latitud</label><input type=\"text\" name='latitud'>
                    <label>Longitud</label><input type=\"text\" name='longitud'>";
        //<label>Fecha Actual</label>";
        print $cad;
        $hoy = getdate();
        //print_r($hoy);
        $cad = $hoy['year'] ."-".$hoy['mon'] ."-".$hoy['mday']." " . $hoy['hours'] . ":" . $hoy['minutes']. ":" . $hoy['seconds'] ;
//        print '<input type=\'text\' value=\'' . $cliente->getFechaHoy() . '\' name=\'fecha\' >';
         print '<input type=\'text\' value=\'' . $cad . '\' name=\'fecha\' >';
        //print '<label> ' . $cad . '</label>';
        print '<input type=\'submit\' value=\'Guardar\' name=\'coordenada\'>';
        print '</form>';


        //<label>Fecha</label><input type=\"datetime-local\" name='fecha' >
        //<label>Fecha</label><input type=\"datetime-local\" name=\'fecha\' value='. GPS::getFechaHoy() .'\'>
        //print $cad;
        // print '<label>Fecha Actual</label>';
        // print '<input type=\'text\' value=\''.GPS::getFechaHoy().'\' >';
    }

    public static function imprimir_v_coordenadas($todas)
    {
        $cad="";
        if (isset($todas[0])) {
            for ($i = 0; $i < count($todas); $i++) {
                for ($j = 0; $j < count($todas[$i]); $j = $j + 3) {
                    $tupla = $todas[$i];
                    if (count($tupla) > 0) {
                        $cad = $cad . "Latitud :" . $tupla[$j] . " ";
                        $cad = $cad . "Longitud:" . $tupla[$j + 1] . " ";
                        $cad = $cad . "Fecha :" . $tupla[$j + 2] . " <br>";
                    }
                }
            }
        }
        else
            
            $cad=$cad. "<br>Sin coordenadas";
        echo $cad;
    }
    
    public static function mostrar_intervalo($int)
    {
        print "<label><b>Coordenadas</b></label><br>";
        self::imprimir_v_coordenadas($int);
    }
    
    public static function mostrar_todas() {

        //  $todas = $cliente->obtener_todas_las_coordenadas();

        $todas = BD_proxy::obtener_todas_las_coordenadas();
        $cad = "<label><b>Todas las Coordenadas</b></label><br>";
        //print(count($todas));
        self::imprimir_v_coordenadas($todas);
    }

    public static function borrar_f_coordenadas() {
        $cad = "<form id='imp_coordenadas_intervalo' action='index_con_wdsl.php' method='post'>
                    <label>Fecha Inicial</label><input type='datetime-local' name='bf1'>
                    <label>Fecha Final </label><input type='datetime-local' name='bf2'>
                    <textarea></textarea>
                </form>";
        print $cad;
    }

    public static function mostrar_f_coordenadas() {
        $hoy = getdate();
        //print_r($hoy);
        $cad = $hoy['year'] ."-".$hoy['mon'] ."-".$hoy['mday']." ". $hoy['hours'] . ":" . $hoy['minutes']. ":" . $hoy['seconds'] ;
        //print $cad;
        $cad2 = "<form id='imp_coordenadas_intervalo' action='index_con_wdsl.php' method='post'>";
                    $cad2=$cad2."<label>Fecha Inicial</label><input type='text' name='f1m' value='". $cad ."' >";
                    $cad2=$cad2."<label>Fecha Final </label><input type='text' name='f2m' value='" . $cad ."' >";
                    
                    $cad2=$cad2."<input type='submit' value='Consultar'/>";
                $cad2=$cad2."</form>";
        print $cad2;
    }

    public static function borrar_todas($cliente) {
        //$cliente = new BD_Proxy();
        $cliente->borrar_todas();
        //BD_proxy::borrar_todas();
    }

}
