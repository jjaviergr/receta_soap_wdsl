<?php

//require_once 'BD_Proxy.php';

class Aplication {

    public static function insertar_f_coordenada($cliente) {
        //print "<iframe src='insertar_f_coordenada.php'> <p>Your browser does not support iframes.</p></iframe>";
       // header("Location: insertar_f_coordenada.php");
        print'<div class="row">';
        print'<div class="row"><div class="col-lg-4 col-lg-offset-4"><hr>'
        . '</div></div>';
        
       
        print "<form action='menu_coordenada.php' method='post'>";
         
        print '<div class="col-lg-4 col-lg-offset-4">';
      
        print "<label>Latitud</label><br><input type=\"text\" name='latitud'>";
        print '</div>';
        print '<div class="col-lg-4 col-lg-offset-4">';
        print "<label>Longitud</label><br><input type=\"text\" name='longitud'>";
        print '</div>';
        //<label>Fecha Actual</label>";
        
        $hoy = getdate();
        //print_r($hoy);
        $cad = $hoy['year'] ."-".$hoy['mon'] ."-".$hoy['mday']." " . $hoy['hours'] . ":" . $hoy['minutes']. ":" . $hoy['seconds'] ;
//        print '<input type=\'text\' value=\'' . $cliente->getFechaHoy() . '\' name=\'fecha\' >';
         print '<div class="col-lg-4 col-lg-offset-4">';
         print '<label>Fecha</label><br><input type=\'text\' value=\'' . $cad . '\' name=\'fecha\' >';
        //print '<label> ' . $cad . '</label>';
         print '</div>';
         
        
        print '<div class="col-lg-4 col-lg-offset-4">';
        print '<input class=\'btn btn-primary\' type=\'submit\' value=\'Guardar\' name=\'coordenada\'>';
        print '</div>';
        print '</form>';
        
        print '</div>';


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
//                for ($j = 0; $j < count($todas[$i]); $j = $j + 3) {
                $tupla = $todas[$i];
                if (count($tupla) > 0) {
                    print "<div class='row'>";
                    print "<div class='col-lg-12 col-lg-offset-0'>";
                    print "<form action='menu_coordenada.php' method='post'>";
                    print "<small>Latitud <input type='text' value='" . $tupla[1] . "' name='ulatitud'/>  ";
                    print "Longitud<input type='text' value='" . $tupla[2] . "' name='ulongitud'/> ";
                    print "Fecha&nbsp&nbsp<input type='text' value='" . $tupla[3] . "' name='ufecha'/> ";
                    print "<input type='hidden' name='uclave' value='" . $tupla[0] . "'/>";
                    print "<input class='btn btn-info btn-xs' type='submit' name='actualiza' value='Actualizar'/>";
                    print "<input class='btn btn-danger btn-xs' type='submit' name='elimina' value='Eliminar'/></small>";
                    print '</form>';
                    print "</div>";
                    print "</div>";
                }
//                }
            }
        } else {
            $cad = $cad . "<br>Sin coordenadas";
        }
        echo $cad;
    }
    
    public static function mostrar_intervalo($int)
    {
        print'<div class="row">';
        print'<div class="row"><div class="col-lg-4 col-lg-offset-4"><hr></div></div>';
        print '<div class="col-lg-4 col-lg-offset-4">';
        print "<label><b>Coordenadas</b></label><br>";
        self::imprimir_v_coordenadas($int);
        print '</div>';
        print '</div>';
    }
    
    public static function mostrar_todas($cliente) {

        //  $todas = $cliente->obtener_todas_las_coordenadas();
        print'<div class="row">';
        print'<div class="row"><div class="col-lg-6 col-lg-offset-4"><hr></div></div>';
        print '<div class="col-lg-6 col-lg-offset-4">';
        //$todas = BD_proxy::obtener_todas_las_coordenadas();
        $todas=$cliente->obtener_todas_las_coordenadas();
        print "<label><b>Todas las Coordenadas</b></label><br>";
        //print(count($todas));
        self::imprimir_v_coordenadas($todas);
        print '</div>';
        print '</div>';
    }

    public static function borrar_f_coordenadas() {
        print'<div class="row">';
        print'<div class="row"><div class="col-lg-4 col-lg-offset-4"><hr></div></div>';
        print '<div class="col-lg-4 col-lg-offset-4">';
        print  "<form id='imp_coordenadas_intervalo' action='menu_coordenada.php' method='post'>";
        print             "<label>Fecha Inicial</label><input type='datetime-local' name='bf1'><br>";
        print             "<label>Fecha Final&nbsp&nbsp </label><input type='datetime-local' name='bf2'><br>";
        print             "<input class='btn btn-primary' type='submit' value='Borrar_Intervalo'/>";
        print         "</form>";
         print '</div>';
        print '</div>';
        
    }

    public static function mostrar_f_coordenadas() {
        
        print'<div class="row">';
        print'<div class="row"><div class="col-lg-4 col-lg-offset-4"><hr></div></div>';
        $hoy = getdate();
        //print_r($hoy);
        $cad = $hoy['year'] ."-".$hoy['mon'] ."-".$hoy['mday']." ". $hoy['hours'] . ":" . $hoy['minutes']. ":" . $hoy['seconds'] ;
        //print $cad;
        print '<div class="col-lg-4 col-lg-offset-4">';
        print "<form id='imp_coordenadas_intervalo' action='menu_coordenada.php' method='post'>";
                    print "<label>Fecha Inicial</label><br><input type='text' name='f1m' value='". $cad ."' ><br>";
                    print "<label>Fecha Final </label><br><input type='text' name='f2m' value='" . $cad ."' >";
                    
                    print "<br><input class='btn btn-primary' type='submit' value='Consultar'/>";
                print "</form>";
        print '</div>';
        print '</div>';
        
        
    }

    public static function borrar_todas($cliente) {
        //$cliente = new BD_Proxy();
        $cliente->borrar_todas();
        //BD_proxy::borrar_todas();
    }

}
