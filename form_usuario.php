<!DOCTYPE html>
<html>
    <head>
        //<?php
//        /* esse bloco de código em php verifica se existe a sessão, 
//         * pois o usuário pode simplesmente não fazer o login e digitar 
//         * na barra de endereço do seu navegador o caminho para a 
//         * página principal do site (sistema), burlando assim a obrigação de 
//         * fazer um login, com isso se ele não estiver feito o login não será 
//         * criado a session, então ao verificar que a session não existe a 
//         * página redireciona o mesmo para a index.php. */
//        session_start();
//        if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
//            unset($_SESSION['login']);
//            unset($_SESSION['senha']);
//            header('location:index.php');
//        }
//
//        $logado = $_SESSION['login'];
//        ?>
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

        <?php include "/js/jquery.dataTables.php"; ?> <!-- Nao pode apagar, isso é responsavel por aparecer os campos do dataTable -->

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $('#example').dataTable({
                    "sPaginationType": "full_numbers"
                });
            });
        </script>
        <!--Script do DataTable Fim -->
        
         <?php include '/module/alerts.php'?>
    </head>
    <?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
    $banco = mysql_selectdb("comanda", $conexao);
    $sql = ("SELECT * FROM usuarios");
    $resultado = mysql_query($sql);
    ?>

    
    <body>

        <div class="container" >
            <!-- Menu inicio -->
            <?php include 'include/Menu_legal.php' ?>
            <!-- Menu fim -->

            
            <!-- Inicio Formulario de cadastro -->       
            <h2>CADASTRO DE USUÁRIOS </h2>

            <div class="row">

                <form method="POST" class="form" action="paginas/usuario/envia_dados_usuario.php">

                    <div class="form-group col-md-4">

                        <label for="campo1">Nome do Usuário</label>

                        <input name="nome" type="text" class="form-control" >

                        <label for="campo1">E-mail usuário</label>

                        <input name="email" type="text" class="form-control" >


                        <label for="campo1">Login</label>

                        <input name="login" type="text" class="form-control" >

                        <label for="campo2">Senha</label>

                        <input name="senha" type="password" class="form-control" >

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="campo2">Nivel Acesso </label>

                                <select name="id_nivel">

                                    <option>Selecione a categoria</option>

                                        <?php $query = mysql_query("SELECT * FROM nivel_acesso"); ?> <!-- Aki puxa todas as categorias existentes-->

                                        <?php while ($prod = mysql_fetch_array($query)) { ?>      <!-- Aki puxa todas as categorias existentes-->

                                        <option value="<?php echo $prod['id_nivel'] ?>"><?php echo $prod['nivel'] ?></option>

<?php } ?> 

                                </select>

                            </div>

                        </div>


                        <div class="form-group">

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
                    <div class="panel-heading">Listando Usuarios</div>
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr id="titulo_tabela">
                                <th>Id</th>
                                <th>Login</th>
                                <th>Senha</th>
                                <th>E-mail</th>
                                <th>Nome Usuario</th>
                                <th>Nivel de Acesso</th>
                                <th>Ação</th>
                            </tr>
                        </thead>

                        <?php
                        while ($linha = mysql_fetch_assoc($resultado)) {

                            $id = $linha['id'];
                            $login = $linha['login'];
                            $senha = $linha['senha'];
                            $email_usuario = $linha['email'];
                            $nome_usuario = $linha['nome'];
                            $id_nivel = $linha['id_nivel'];
                            ?>

                            <tr>
                                <td> <?php echo "<p>  " . $linha ['id'] . "<br>"; ?> </td>
                                <td> <?php echo "<p>  " . $linha ['login'] . "<br>"; ?> </td>
                                <td> <?php echo "<p>  " . $linha ['senha'] . "<br>"; ?> </td>
                                <td> <?php echo "<p>  " . $linha ['email'] . "<br>"; ?> </td>
                                <td> <?php echo "<p>  " . $linha ['nome'] . "<br>"; ?> </td>
                                <td> <?php echo "<p>  " . $linha ['id_nivel'] . "<br>"; ?></td> 
                                <td> 
                                    <?php printf('<a href="paginas/usuario/deleta_dados_usuarios.php?id=%s">Excluir</a>', $linha['id']); ?>
                                    <?php printf('<a href="paginas/usuario/form_editar_usuario.php?id=%s">Alterar</a>', $linha['id']); ?>
                                </td>

                            </tr>

                        <?php } ?>

                    </table>
                    <!---- FIM DA TABELA ---->

                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="bootstrap/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>