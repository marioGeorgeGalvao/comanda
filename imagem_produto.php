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

        <?php include "/js/jquery.dataTables.php"; ?> <!-- Nao pode apagar, isso é responsavel por aparecer os campos do dataTable -->

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $('#example').dataTable({
                    "sPaginationType": "full_numbers"
                });
            });
        </script>
        <!--Script do DataTable Fim -->
        
        <?php include 'module/alerts.php'?>
    </head>
    <?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
    $banco = mysql_selectdb("comanda", $conexao);
    $sql = ("SELECT * FROM imagem");
    $resultado = mysql_query($sql);
    ?>

    <body>

        <div class="container" >
            <!-- Menu inicio -->
            <?php include 'include/Menu_legal.php' ?>
            <!-- Menu fim -->

            <?php
            
            if(isset($_POST['btnSave'])){
            
                if($imagem != NULL) { 
                $nomeFinal = time().'.jpg';
                if (move_uploaded_file($imagem['imagem'], $nomeFinal)) {
                    $tamanhoImg = filesize($nomeFinal); 

                    $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
                    
                    mysql_query("INSERT INTO imagem ('idproduto','descricao','imagem') "
                            . "VALUES ('$idproduto','$descricao','$mysqlImg'") 
                            or die("O sistema não foi capaz de executar a query"); 

		unlink($nomeFinal);
		mysql_query($sql);
                writeMsg('save.sukses');
                
		header("location:imagem_produto.php");
                        }
                } 
                else { 
                        echo"Você não realizou o upload de forma satisfatória."; 
            } 
            
                }
                            ?>

            <!-- Inicio Formulario de cadastro -->       
            <h2>CADASTRO DE IMAGEM AO PRODUTO </h2>

            <div class="row">
                <form method="post" class="form">
                    <div class="col-md-12">

                        <div class="form-group col-md-6">
                                <label for="campo2">Produto: </label>

                                <select name="idproduto">

                                    <option>Selecione a categoria</option>

                                        <?php $query = mysql_query("SELECT * FROM produto"); ?> <!-- Aki puxa todas as categorias existentes-->

                                        <?php while ($prod = mysql_fetch_array($query)) { ?>      <!-- Aki puxa todas as categorias existentes-->

                                        <option value="<?php echo $prod['idproduto'] ?>"><?php echo $prod['descricao'] ?></option>

                                        <?php } ?> 

                                </select>

                            </div>


                        <div class="form-group col-md-8">

                            <label for="campo1">Descrição da imagem ao produto:</label>

                            <input type="text" name="descricao" class="form-control" >

                        </div>
                        
                        <div class="form-group col-md-8">
                                <label for="imagem">Imagem:</label>
                                <input type="file" name="imagem"/>
                                <br/>
                        </div>

                        

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
                    <div class="panel-heading">Listando Imagem relacionada ao Produto</div>
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr id="titulo_tabela">
                                <th>Id</th>
                                <th>Mesa</th>
                                <th>Descrição</th>
                                
                                <th>Ação</th>
                            </tr>
                        </thead>

<?php
while ($linha = mysql_fetch_assoc($resultado)) {

    $idmesa = $linha['idmesa'];
    $lugar_mesa = $linha['numero_mesa'];
    $numero_mesa = $linha['lugar_mesa'];
    
    ?>

                            <tr>

                                <td> <?php echo "<p>  " . $linha ['idmesa'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['numero_mesa'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['lugar_mesa'] . "<br>"; ?> </td>

                                <td> 

                                    <?php printf('<a href="paginas/mesa/deleta_dados_mesa.php?id=%s">Excluir</a>', $linha['idmesa']); ?>

                                    <?php printf('<a href="paginas/mesa/form_editar_mesa.php?id=%s">Alterar</a>', $linha['idmesa']); ?>
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