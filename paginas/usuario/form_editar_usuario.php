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
            <!-- Menu inicio -->
                <?php include '../../include/Menu_legal.php'?>
            <!-- Menu fim -->
            <?php
            if (isset($_POST['btnUpdate'])) {
                mysql_query("UPDATE usuarios SET nome = '" . $_POST['nome'] . "', email = '" . $_POST['email'] . "', login = '" . $_POST['login'] . "', senha = '" . $_POST['senha'] . "', nivel = '" . $_POST['nivel'] . "' WHERE id = '" . $_GET['id'] . "'");
                writeMsg('update.sukses');

                //Re-Load Data from DB
                $sql = mysql_query("SELECT * FROM usuarios WHERE id = '" . $_GET['id'] . "'");
                $data = mysql_fetch_array($sql);
            }
            ?>

            <?php
            //resgate do id
            $id = $_GET["id"];

            // echo $id; teste
            // exit();
            $sql = "select * from usuarios where id = " . $id;

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
                            <label control-label for="nome">Nome</label>  
                            <input id="nome" name="nome" class="form-control"  type="text" value="<?php echo $data['nome']; ?>">

                            <label control-label for="email">E-mail</label>  

                            <input id="email" name="email" class="form-control" type="text" value="<?php echo $data['email']; ?>">
                            <label class="col-md-4 control-label" for="login">Login</label>  

                            <input id="login" name="login" placeholder="Insira seu Login" class="form-control input-md" required="" type="text" value="<?php echo $data['login']; ?>">
                            <label class="col-md-4 control-label" for="senha">Senha</label>

                            <input id="senha" name="senha" placeholder="Insira sua Senha" class="form-control input-md" required="" type="password" value="<?php echo $data['senha']; ?>">

                            <!-- Select Basic -->
                            <label class="col-md-4 control-label" for="nivel">Nivel de Acesso</label>

                            <select id="nivel" name="nivel" class="form-control">
                                <option value="0">Selecione</option>
                                <option value="1">Administrador</option>
                                <option value="2">Caixa</option>
                                <option value="3">Garçom</option>
                            </select>

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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success">

                            <!-- Chama dados da tabela de usuario para listar --------------Inicio-->
                            <?php
                            error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
                            $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
                            $banco = mysql_selectdb("comanda", $conexao);
                            $sql = "SELECT * FROM usuarios ";
                            $resultado = mysql_query($sql);
                            ?>

                            <!-- Chama dados da tabela de usuario para listar --------------Fim----->

                            <div class="panel-heading">Listando Usuarios</div>

                            <table class='table table-striped table-bordered table-hover'>
                                <tr id= "titulo_tabela">
                                    <td>Id</td>
                                    <td>Login</td>
                                    <td>Senha</td>
                                    <td>E-mail</td>
                                    <td>Nome Usuario</td>
                                    <td>Nivel de Acesso</td>
                                    <td>Ação</td>

                                </tr>

                                <?php
                                while ($linha = mysql_fetch_assoc($resultado)) {

                                    $id = $linha['id'];
                                    $nome = $linha['nome'];
                                    $email = $linha['email'];
                                    $login = $linha['login'];
                                    $senha = $linha['senha'];
                                    $nivel = $linha['nivel'];
                                    ?>

                                    <tr>
                                        <td> <?php echo "<p>  " . $linha ['id'] . "<br>"; ?> </td>
                                        <td> <?php echo "<p>  " . $linha ['nome'] . "<br>"; ?> </td>
                                        <td> <?php echo "<p>  " . $linha ['email'] . "<br>"; ?> </td>
                                        <td> <?php echo "<p>  " . $linha ['login'] . "<br>"; ?> </td>
                                        <td> <?php echo "<p>  " . $linha ['senha'] . "<br>"; ?> </td>
                                        <td> <?php echo "<p>  " . $linha ['nivel'] . "<br>"; ?></td> 
                                        <td> 
                                            <?php printf('<a href="deleta_dados_usuarios.php?id=%s">Excluir</a>', $linha['id']); ?>
                                            <?php printf('<a href="form_editar_usuario.php?id=%s">Alterar</a>', $linha['id']); ?>
                                        </td>

                                    </tr>

                                <?php } ?>
                            </table>
                        </div>
                    </div>
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
