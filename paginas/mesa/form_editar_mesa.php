<!DOCTYPE html>
<html>

    <head>

        <?php
        include "../../module/alerts.php";
        include "../../include/conecta_banco.php";
        ?>

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
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../../css/signin.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <body>
        <div class="container" >
            <!-- Inicio Menu -->       
            <?php include '../../include/Menu_legal.php' ?>
            <!-- Fim Menu -->


            <?php
            if (isset($_POST['btnUpdate'])) {
                mysql_query("UPDATE mesa SET numero_mesa = '" . $_POST['numero_mesa'] . "', lugar_mesa = '" . $_POST['lugar_mesa'] . "' WHERE idmesa = '" . $_GET['id'] . "'");
                writeMsg('update.sukses');

                //Re-Load Data from DB
                $sql = mysql_query("SELECT * FROM mesa WHERE idmesa = '" . $_GET['id'] . "'");
                $data = mysql_fetch_array($sql);
            }
            ?>

            <?php
            //resgate do id
            $id = $_GET["id"];

            // echo $id; teste
            // exit();
            $sql = "select * from mesa where idmesa = " . $id;

            $resultado = mysql_query($sql); //executou o sql
            //nao  a necessidade do while, pois so temos um registro

            $data = mysql_fetch_array($resultado); //resultado pela posição
            ?>

            <div class="container">
                <h1 class="page-header">Cadastro de Usuários</h1>
                <div class="row">

                    <form id="form_input" method="POST" class="form-group">
                        <!-- Text input-->
                        <div class="form-group col-md-4">
                            <label control-label for="numero_mesa">Mesa</label>  
                            <input id="nome" name="numero_mesa" class="form-control"  type="text" value="<?php echo $data['numero_mesa']; ?>">

                            <label control-label for="lugar_mesa">Quantidade de Lugar</label>  

                            <input id="email" name="lugar_mesa" class="form-control" type="text" value="<?php echo $data['lugar_mesa']; ?>">

                            <div class="form-group">
                                <label class="col-md-4 control-label posicao" for="btnUpdate"></label>
                                <div class="col-md-8">
                                    <button id="btnUpdate" name="btnUpdate" class="btn btn-success">Salvar</button>
                                    <button id="btnLimpar" name="btnLimpar" class="btn btn-danger">Limpar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- Inicio Grid-->
                <?php include '../../grids/grid_mesa.php' ?>
                <!-- Fim Grid-->


            </div>

        </div>
    </div>

</div>

<!-- Fim Formulario de cadastro -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Core Scripts - Include with every page -->
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Dashboard -->
<script src="../../js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="../../js/plugins/morris/morris.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="../../js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
<script src="../../js/demo/dashboard-demo.js"></script>

</body>

</html>
