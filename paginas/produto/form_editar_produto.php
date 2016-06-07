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
            <!-- inicio Menu -->
                <?php include '../../include/Menu_legal.php';?>
            <!-- Fim Menu -->
            

            <?php
            if (isset($_POST['btnUpdate'])) {
                mysql_query("UPDATE produto SET idcategoria = '" . $_POST['idcategoria'] . "', produto = '" . $_POST['produto'] . "', descricao = '" . $_POST['descricao'] . "', preco = '" . $_POST['preco'] . "', quantidade = '" . $_POST['quantidade']. "', unidade = '". $_POST['unidade']. "', data_entrada = '". $_POST['data_entrada']."', data_validade = '". $_POST['data_validade']."' WHERE idproduto = '" . $_GET['id'] . "'");
                writeMsg('update.sukses');

                //Re-Load Data from DB
                $sql = mysql_query("SELECT * FROM produto WHERE idproduto = '" . $_GET['id'] . "'");
                $data = mysql_fetch_array($sql);
            }
            ?>

            <?php
            //resgate do id
            $id = $_GET["id"];

            // echo $id; teste
            // exit();
            $sql = "select * from produto where idproduto = " . $id;

            $resultado = mysql_query($sql); //executou o sql
            //nao  a necessidade do while, pois so temos um registro

            $linha = mysql_fetch_array($resultado); //resultado pela posição
            ?>

            <!-- Inicio Formulario de cadastro -->       
            <h2>CADASTRO DE PRODUTOS </h2>

           <div class="row">
                <form method="post" class="form">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="campo2">Categoria </label>

                                <select name="idcategoria">

                                    <option>Selecione a categoria</option>

                                    <?php $query = mysql_query("SELECT * FROM categoria"); ?> <!-- Aki puxa todas as categorias existentes-->

                                    <?php while ($prod = mysql_fetch_array($query)) { ?>      <!-- Aki puxa todas as categorias existentes-->

                                        <option value="<?php echo $prod['idcategoria'] ?>"><?php echo $prod['descricao'] ?></option>

                                    <?php } ?> 

                                </select>

                            </div>

                        </div>

                        <div class="form-group col-md-3">

                            <label for="campo1">Produto</label>
                            <input type="text" name="produto" class="form-control" id="campo1" value="<?php echo $linha['produto'] ?>">

                        </div>


                        <div class="form-group col-md-8">

                            <label for="campo1">Descrição do Produto</label>
                            <input type="text" name="descricao" class="form-control" value="<?php echo $linha['descricao'] ?>">

                        </div>

                        <div class="form-group col-md-2">

                            <label for="campo1">Preço R$</label>
                            <input type="text" name="preco" class="form-control" id="campo1" value="<?php echo $linha['preco'] ?>">

                        </div>

                        <div class="form-group col-md-2">

                            <label for="campo1">Quantidade:</label>
                            <input type="text" name="quantidade" class="form-control" value="<?php echo $linha['quantidade'] ?>" >

                        </div>

                        <div class="form-group col-md-3">

                            <label for="campo1">Unidade: </label>

                            <select name="unidade">

                                <option value='0'>--Selecione a unidade de medida. </option>
                                <option value="litros">Litros</option>
                                <option value="quilos">Quilos</option>
                                <option value="caixas">Caixas</option>

                            </select> <p>

                        </div>


                        <div class="form-group col-md-2">

                            <label for="data">Data de Validade:</label>
                            <input type="text" name="data_validade" id="data_nascimento" class="form-control" value="<?php echo $linha['data_entrada'] ?>" >

                        </div>

                        <div class="form-group col-md-2">

                            <label for="campo1">Data Entrada:</label>
                            <input type="text" name="data_entrada" class="form-control" id="campo1" value="<?php echo $linha['data_validade'] ?>">

                        </div>

                         <div class="form-group">

                            

                            <div class="col-md-8">

                                <button id="btnUpdate" name="btnUpdate" class="btn btn-success">Salvar</button>

                                <button id="btnLimpar" name="btnLimpar" class="btn btn-danger">Limpar</button>

                            </div>

                        </div>
                    </div>

                </form>

            </div>

            <!-- Fim Formulario de cadastro -->

            <!-- Inicio Grid -->
                <?php include '../../grids/grid_produto.php'?>
            <!-- Fim Grid -->
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
