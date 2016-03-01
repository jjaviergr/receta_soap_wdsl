<?php
//require_once 'BD_Proxy.php';
class Aplication {

    public static function insertar_coordenada($cliente) 
        {
        $cad = "<form action='index_con_wdsl.php' method='post'>
                    <label>Latitud</label><input type=\"text\" name='latitud'>
                    <label>Longitud</label><input type=\"text\" name='longitud'>
                    <label>Fecha Actual</label>";
        print $cad;
         $hoy = getdate();
        //print_r($hoy);
        $cad=$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']." ".$hoy['hours'].":".$hoy['minutes'];
//        print '<input type=\'text\' value=\'' . $cliente->getFechaHoy() . '\' name=\'fecha\' >';
         print '<input type=\'text\' value=\'' . $cad . '\' name=\'fecha\' >';
        print '<input type=\'submit\' value=\'Guardar\' name=\'coordenada\'>';
        print '</form>';


        //<label>Fecha</label><input type=\"datetime-local\" name='fecha' >
        //<label>Fecha</label><input type=\"datetime-local\" name=\'fecha\' value='. GPS::getFechaHoy() .'\'>
        //print $cad;
        // print '<label>Fecha Actual</label>';
        // print '<input type=\'text\' value=\''.GPS::getFechaHoy().'\' >';
    }

    public static function mostrar_todas($cliente) 
    {
        
        $todas = $cliente->obtener_todas_las_coordenadas();
//        $todas=  BD_proxy::obtener_todas_las_coordenadas();
        $cad = "<label><b>Todas las Coordenadas</b></label><br>";
        for($i=0;$i<count($todas);$i++)
        {
            for($j=0;$j<count($todas[$i]);$j=$j+3)
            {
                $tupla=$todas[$i];
                $cad = $cad . "Latitud :" . $tupla[$j] . " ";
                $cad = $cad . "Longitud:" . $tupla[$j+1] . " ";
                $cad = $cad . "Fecha :" . $tupla[$j+2] . " <br>";
            }
        }
        echo $cad;
    }

    public static function borrar_coordenadas() {
        $cad = "<form id='imp_coordenadas_intervalo' action='index_con_wdsl.php' method='post'>
                    <label>Fecha Inicial</label><input type='datetime-local' name='bf1'>
                    <label>Fecha Final </label><input type='datetime-local' name='bf2'>
                    <textarea></textarea>
                </form>";
        print $cad;
    }

    public static function mostrar_coordenadas() {
        $cad = "<form id='imp_coordenadas_intervalo' action='index_con_wdsl.php' method='post'>
                    <label>Fecha Inicial</label><input type='datetime-local' name='f1'>
                    <label>Fecha Final </label><input type='datetime-local' name='f2'>
                    
                    <input type='submit' value='Consultar'/>
                </form>";
        print $cad;
    }

    public static function borrar_todas($cliente) {
        //$cliente = new BD_Proxy();
        $cliente->borrar_todas();
        //BD_proxy::borrar_todas();
    }

}
