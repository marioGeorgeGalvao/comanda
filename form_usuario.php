<!DOCTYPE html>
<html>

    <head>

        <?php
        include "/module/header.php";
        include "/module/alerts.php";
        include "/include/conecta_banco.php";
        ?>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>
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
        <!-- Core CSS - Include with every page -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Page-Level Plugin CSS - Dashboard -->
        <link href="/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
        <link href="/css/plugins/timeline/timeline.css" rel="stylesheet">

        <!-- SB Admin CSS - Include with every page -->
        <link href="/css/sb-admin.css" rel="stylesheet">

    </head>

    <body>


        <div class="container" >
           <!-- Menu inicio -->
                <?php include 'include/Menu_legal.php'?>
            <!-- Menu fim -->

            <?php
            $nome = $_POST['login'];
            $email = $_POST['senha'];
            $login = $_POST['email'];
            $senha = $_POST['nome'];
            $nivel = $_POST['nivel'];

            if (isset($_POST['btnUpdate'])) {
                $sql = "INSERT INTO usuarios
                (nome,
                 email,
                 login,
                 senha,
                 nivel) 
                	VALUES 
                ('$nome',
                 '$email',
                 '$login',
                 '$senha',
                 '$nivel')";

                mysql_query($sql);
                writeMsg('save.sukses');
            } else {

                echo 'Ha campos em branco...';

                echo "<script>loginfailed()</script>";
            }
            ?>

            <!-- Inicio Formulario de cadastro -->       
            <h2>CADASTRO DE USUÁRIOS </h2>

            <div class="row">

                <form method="POST" class="form">

                    <div class="form-group col-md-4">

                        <label for="campo1">Nome do Usuário</label>

                        <input name="nome" type="text" class="form-control" >

                        <label for="campo1">E-mail usuário</label>

                        <input name="email" type="text" class="form-control" >


                        <label for="campo1">Login</label>

                        <input name="login" type="text" class="form-control" >

                        <label for="campo2">Senha</label>

                        <input name="senha" type="password" class="form-control" >

                        <label for="campo2">Nivel de acesso: </label></br>

                        <select name="nivel">

                            <?php echo " <option value='0'>--Selecione nivel de acesso </option>"; ?>

                            <option value="administrador">Administrador</option>

                            <option value="caixa">Caixa</option>


                            <option value="garcom">garcom</option>

                        </select> <p>


                        <div class="form-group">

                            <label class="col-md-4 control-label posicao" for="btnSave"></label>

                            <div class="col-md-8">

                                <button id="btnUpdate" name="btnUpdate" class="btn btn-success">Salvar</button>

                                <button id="btnLimpar" name="btnLimpar" class="btn btn-danger">Limpar</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

            <!-- Fim Formulario de cadastro -->


            <!-- Grid Usuario -----------------FIM--------------------------------->
            <?php include "/grids/grid_usuario.php"; ?>   
            <!-- Grid Usuario -----------------FIM--------------------------------->

            <!-- Core Scripts - Include with every page -->
            <script src="/js/jquery-1.10.2.js"></script>
            <script src="/js/bootstrap.min.js"></script>
            <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>

            <!-- Page-Level Plugin Scripts - Dashboard -->
            <script src="/js/plugins/morris/raphael-2.1.0.min.js"></script>
            <script src="/js/plugins/morris/morris.js"></script>

            <!-- SB Admin Scripts - Include with every page -->
            <script src="/js/sb-admin.js"></script>

            <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
            <script src="/js/demo/dashboard-demo.js"></script>


            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

    </body>

</html>

<?php
mysql_free_result($resultado);
mysql_close($conexao);
?>
