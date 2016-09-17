<?php include'/include/conecta_banco.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
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
</head>

<body>

<div class="container" >



    <?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
    $banco = mysql_selectdb("comanda", $conexao);
    $sql = ("SELECT * FROM comanda");
    $resultado = mysql_query($sql);
    ?>

    <div>
        <br>
        <h1>COZINHA</h1>

        <h3>PEDIDOS DO SALÃO</h3>
        <br>

        <div class="container">

            <div class="panel panel-success">

                <!---- INICIO DA TABELA ---->
                <div class="panel-heading">LISTA DE PEDIDOS REALIZADOS</div>
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr id="titulo_tabela">
                        <th></th>
                        <th>Produto</th>
                        <th>Mesa</th>
                        <th>Tipo Atendimento</th>
                        <th>Data Hora</th>

                        <th>Ação</th>
                    </tr>
                    </thead>

                    <?php
                    while ($linha = mysql_fetch_assoc($resultado)) {

                        $idcomanda = $linha['idcomanda'];
                        $produto = $linha['produto_idproduto'];
                        $mesa = $linha['mesa_idmesa'];
                        $atendimento = $linha['atendimento_idatendimento'];
                        $data_comanda = $linha['data_comanda'];

                        ?>

                        <tr>

                            <td> <?php echo "<p>  " . $linha ['idcomanda'] . "<br>"; ?> </td>

                            <td> <?php echo "<p>  " . $linha ['produto_idproduto'] . "<br>"; ?> </td>

                            <td> <?php echo "<p>  " . $linha ['mesa_idmesa'] . "<br>"; ?> </td>

                            <td> <?php echo "<p>  " . $linha ['atendimento_idatendimento'] . "<br>"; ?> </td>

                            <td> <?php echo "<p>  " . $linha ['data_comanda'] . "<br>"; ?> </td>

                            <td>

                                <?php printf('<a href="#">PRONTOS |</a>', $linha['idmesa']); ?>

                                <?php printf('<a href="#">RECEBIDOS</a>', $linha['idmesa']); ?>
                            </td>

                        </tr>

                    <?php } ?>
                </table>
                <!---- FIM DA TABELA ---->



</body>
</html>

                

