<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="row">
            <div class="col-lg-12 col-lg-offset-2">
                <form role="form" action='encaminador.php' method='post'>
                    <label>Latitud</label><input type="text" name='latitud'>
                    <label>Longitud</label><input type="text" name='longitud'>
                    <?php
                    $hoy = getdate();
                    $cad = $hoy['year'] . "-" . $hoy['mon'] . "-" . $hoy['mday'] . " " . $hoy['hours'] . ":" . $hoy['minutes'] . ":" . $hoy['seconds'];
                    print '<input type=\'text\' value=\'' . $cad . '\' name=\'fecha\' >';
                    ?>
                    <div class="row">
                    <input class='btn btn-warning' type='submit' value='Guardar' name='coordenada'>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>
