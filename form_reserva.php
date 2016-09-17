<!DOCTYPE html>
<html>
    <head>
        <?php
        /* esse bloco de código em php verifica se existe a sessão, 
         * pois o usuário pode simplesmente não fazer o login e digitar 
         * na barra de endereço do seu navegador o caminho para a 
         * página principal do site (sistema), burlando assim a obrigação de 
         * fazer um login, com isso se ele não estiver feito o login não será 
         * criado a session, então ao verificar que a session não existe a 
         * página redireciona o mesmo para a index.php. */
        session_start();
        if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }

        $logado = $_SESSION['login'];
        ?>
        <!-- Fim da sessao -->

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
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet" />

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="grids/css/demo_table.css" rel="stylesheet" type="text/css" />
        <link type="text/css" rel="stylesheet" href="css/estilo_tooltip.css" />

        <!--Script do DataTable Inicio -->
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.php"></script>
        <script type="text/javascript" language="javascript" src="js/jquery_mascara.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.maskedinput.js"></script>

        <?php include "/js/jquery.dataTables.php"; ?> <!-- Nao pode apagar, isso é responsavel por aparecer os campos do dataTable -->

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $('#example').dataTable({
                    "sPaginationType": "full_numbers"
                });
            });
        </script>
       <script type="text/javascript">
            $(document).ready(function(){
            $("input.data").mask("99/99/9999");
            $("input.cpf").mask("999.999.999-99");
            $("input.cep").mask("99.999-999");
        });
        </script>
        <!--Script do DataTable Fim -->
        
        <?php include 'module/alerts.php'?>
    </head>
    <?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
    $banco = mysql_selectdb("comanda", $conexao);
    $sql = ("SELECT * FROM reserva");
    $resultado = mysql_query($sql);
    ?>

    <body>

        <div class="container" >
            <!-- Menu inicio -->
            <?php include 'include/Menu_legal.php' ?>
            <!-- Menu fim -->

            <!-- Inicio Formulario de cadastro -->       
            <h2>CADASTRO RESERVA </h2>




            <fieldset>
            <div class="row">
                <form method="post" class="form" action="paginas/reserva/envia_dados_reserva.php">
                <div class="form-group col-md-3">
                    <label for="campo2">Mesa </label>

                    <select name="idmesa">

                        <option>Selecione a mesa</option>

                        <?php $query = mysql_query("SELECT * FROM mesa"); ?> <!-- Aki puxa todas as categorias existentes-->

                        <?php while ($prod = mysql_fetch_array($query)) { ?>      <!-- Aki puxa todas as categorias existentes-->

                            <option value="<?php echo $prod['idmesa'] ?>"><?php echo $prod['numero_mesa'] ?></option>

                        <?php } ?>

                    </select>

                </div>

            </div>
            </fieldset>

            <fieldset>
            <div class="row">

                    <div class="col-md-12">

                        <div class="form-group col-md-4">

                            <label for="campo1">Responsavel pela Reserva</label>

                            <input type="text" name="responsavel_reserva" class="form-control" id="campo1">

                        </div>

                        <div class="form-group col-md-2">

                            <label for="campo1">CPF responsavel</label>

                            <input type="text" name="cpf_responsavel" class="form-control" id="campo1">

                        </div>

                        <div class="form-group col-md-2">

                            <label for="campo1">Data reserva:</label>

                            <input type="text" name="data_reserva" class="form-control" >

                        </div>

</fieldset>
            <fieldset>
                        <div class="form-group col-md-4">

                            <label for="campo1">Descrição da reserva :</label>

                            <textarea name="descricao" rows="10" cols="60"></textarea>

                        </div>
            </fieldset>
                            <div class="col-md-8">

                                <button id="btnUpdate" name="btnSave" class="btn btn-primary">Salvar</button>

                                <button id="btnLimpar" name="btnLimpar" class="btn btn-default">Limpar</button>

                            </div>

                        </div>
                    </div>

                </form>

            </div>

            <!-- Fim Formulario de cadastro -->

            <div class="container">

                <div class="panel panel-success">

                    <!---- INICIO DA TABELA ---->
                    <div class="panel-heading">Listando Mesas</div>
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr id="titulo_tabela">
                                <th>Id</th>
                                <th>Mesa Reservada</th>
                                <th>Responsavel Reserva</th>
                                <th>Data Reserva</th>
                                <th>Descricao</th>
                                <th>Situação Mesa</th>
                                
                                <th>Ação</th>
                            </tr>
                        </thead>

<?php
while ($linha = mysql_fetch_assoc($resultado)) {

    $idreserva = $linha['idreserva'];
    $idmesa = $linha['idmesa'];
    $responavel_reserva = $linha['responsavel_reserva'];
    $data_reserva = $linha['data_reserva'];
    $descricao = $linha['descricao'];
    
    ?>

                            <tr>
                                <td> <?php echo "<p>  " . $linha ['idreserva'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  N° " . $linha ['idmesa'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['responsavel_reserva'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['data_reserva'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['descricao'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['situacao_mesa'] . "<br>"; ?> </td>

                                <td> 

                                    <?php printf('<a href="paginas/reserva/deleta_dados_reserva.php?id=%s">Excluir</a>', $linha['idreserva']); ?>

                                    <?php printf('<a href="paginas/reserva/form_editar_reserva.php?id=%s">Alterar</a>', $linha['idreserva']); ?>
                                </td>

                            </tr>

<?php } ?>
                    </table>
                    <!---- FIM DA TABELA ---->

                </div>
            </div>
        </div>

    </body>
</html>