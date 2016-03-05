<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestor de Coordenadas GPS</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>



        <div class="row">
            <div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 ">
                <div class="text-center"><h3>Identificate</h3></div>



            </div>
            <div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4  col-lg-4 col-lg-offset-4 "> 
                <hr>
            </div>   
        </div>
        <div class="row">       
            <div class="col-xs-12 col-sm-7 col-sm-offset-5 col-md-7 col-md-offset-5  col-lg-7 col-lg-offset-5">
                <form role="form" action='index_con_wdsl.php' method='post'>
                    <div class="row">
                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 col-lg-push-0">
                            <label for="login">Login</label>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-lg-3 col-lg-push-0">
                            <input type="text" name="login" class="form-control" id="login" placeholder="Introduce tu Login"/>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                            <label for="pass" >Pasword</label>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-lg-3 ">
                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Introduce tu Password"/>
                        </div>                           
                    </div>
                    <br>


                    <div class="row" >

                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <input class="btn btn-primary" type="submit" value="Enviar" title="Enviar " />
                            <input class="btn btn-warning" type="reset" value="Borrar" title="Resetear" />
                        </div> 	
                    </div>

                </form>



            </div>
        </div>



        <?php
        //require_once 'BD_Proxy.php';
        //print_r($_POST);

        if ((isset($_POST['login'])) && (isset($_POST['pass']))) {

            $uri = "http://localhost/receta_soap_wdsl";
            $cliente = new SoapClient("$uri/BD_Proxy.wsdl");
            $autentica =$cliente->autentica($_POST['login'], $_POST['pass']);
            //print $autentica;
            //$autentica = BD_proxy::autentica($_POST['login'], $_POST['pass']);

            if ($autentica === '1') {

                echo "autenticado";
                header("Location: menu_coordenada.php");


                //print $cad;
            } else
                print "Fallo al autenticar";
        }
        ?>
       
    

    </body>
</html>



    

        
