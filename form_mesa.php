<?php include'/include/conecta_banco.php' ?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <meta name="description" content="">

        <meta name="author" content="">

        <link rel="icon" href="favicon.ico">


        <title>Nome do Restaurante</title>

        <!-- Bootstrap core CSS -->
        <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">

        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script language="Javascript">

            function confirmacao(id = $s) {
                var resposta = confirm("Deseja remover esse registro?");

                if (resposta == true) {
                    window.location.href = "paginas/mesa/deleta_dados_mesa.php?id=%s";
                }
            }

        </script>

    </head>

    <body>

        <div class="container" >

            <!-- Menu inicio -->
            <?php include 'include/Menu_legal.php' ?>
            <!-- Menu fim -->

            <!-- Inicio Formulario de cadastro -->       
            <h2>CADASTRO DE MESAS </h2>
            <!-- Fim Formulario de cadastro -->

            <!-- Inicio Formulario de cadastro -->       


            <div class="row">

                <form method="post" action="paginas/mesa/envia_dados_mesa.php" class="form">

                    <div class="form-group col-md-4">

                        <label for="campo1">Numero da mesa</label>

                        <input name="numero_mesa" type="text" class="form-control" >

                        <label for="campo1">Quantidade de lugares</label>

                        <input name="lugar_mesa" type="text" class="form-control" >

                        <div class="row">

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <a href="form_mesa.php" class="btn btn-default">Cancelar</a>
                            </div>

                        </div>

                    </div>

                </form>


            </div>

            <!-- Fim Formulario de cadastro -->


            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

            <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

            <script src="js/jquery.min.js"></script>

            <script src="js/bootstrap.min.js"></script>


            <!-- Grid Usuario -----------------INICIO------------------------------>
            <?php include '/grids/grid_mesa.php' ?>
            <!-- Grid Usuario -----------------FIM--------------------------------->
        </div>

    </body>
</html>

<?php
mysql_free_result($resultado);
mysql_close($conexao);
?>


