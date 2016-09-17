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
        <script type="text/javascript" language="javascript" src="js/jquery1.7.1.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.php"></script>
        <script type="text/javascript" language="javascript" src="js/jquery_mascara.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.maskedinput.js"></script>

        <?php include "/js/jquery.dataTables.php"; ?> <!-- Nao pode apagar, isso é responsavel por aparecer os campos do dataTable -->
        
        <script type="text/javascript">
            function loginsuccessfully(){
                setTimeout("window.location='../form_produto.php'",1800);
            }
            function loginfailed(){
                setTimeout("window.location='../form_produto.php'",1800);
            }
        </script>
        
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $('#example').dataTable({
                    "sPaginationType": "full_numbers"
                });
            });
        </script>
        <!--Script do DataTable Fim -->
        
        <!-- Mascaras JQuery Inicio-->
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="jquery.maskedinput.js"></script>
        
        <script type="text/javascript">
        $(document).ready(function(){
	$("input.data").mask("99/99/9999");
        $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99.999-999");
        });
        </script>
        <!-- Mascaras JQuery Fim-->
        
        <?php include '/module/alerts.php'?>
        
    </head>
    <?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
    $banco = mysql_selectdb("comanda", $conexao);
    $sql = ("SELECT * FROM produto");
    $resultado = mysql_query($sql);
    ?>

    <body>

        <div class="container" >
            <!-- Menu inicio -->
            <?php include 'include/Menu_legal.php' ?>
            <!-- Menu fim -->

            <!-- Inicio Formulario de cadastro -->       
            <h2>CADASTRO DE PRODUTOS </h2>

            <div class="row">
                <form method="post" class="form" action="paginas/produto/envia_dados_produto.php">
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

                            <input type="text" name="produto" class="form-control" id="campo1">

                        </div>


                        <div class="form-group col-md-8">

                            <label for="campo1">Descrição do Produto</label>

                            <input type="text" name="descricao" class="form-control" >

                        </div>

                        <div class="form-group col-md-2">

                            <label for="campo1">Preço R$</label>

                            <input type="text" name="preco" class="form-control" id="campo1">

                        </div>

                        <div class="form-group col-md-2">

                            <label for="campo1">Quantidade:</label>

                            <input type="text" name="quantidade" class="form-control" >

                        </div>

                        <div class="form-group col-md-3">

                            <label for="campo1">Unidade: </label>

                            <select name="unidade">

                                <option value='0'>--Selecione a unidade de medida. </option>

                                <option value="litros">Litros</option>

                                <option value="quilos">Quilos</option>

                                <option value="caixas">Caixas</option>
                                
                                <option value="caixas">Porções</option>

                            </select> <p>

                        </div>


                        <div class="form-group col-md-2">

                            <label for="data">Data de Validade:</label>

                            <input type="text" name="data_validade" id="data" class="data" >

                        </div>

                        <div class="form-group col-md-2">

                            <label for="campo1">Data Entrada:</label>

                            <input type="text" name="data_entrada" class="data" id="data_nascimento">

                        </div>
                        
                        <div class="form-group col-md-4">
                                <label for="imagem">Imagem:</label>
                                <input type="file" name="imagem"/>
                                <br/>
                        </div>

                            <div class="col-md-8">

                                <button id="btnUpdate" name="btnSave" class="btn btn-primary">Salvar</button>

                                <button id="btnLimpar" name="btnLimpar" class="btn btn-default">Limpar</button>

                            </div>

                        
                    </div>

                </form>

            </div>

            <!-- Fim Formulario de cadastro -->

            <div class="container">

                <div class="panel panel-success">

                    <!---- INICIO DA TABELA ---->
                    <div class="panel-heading">Listando Produtos</div>
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr id="titulo_tabela">
                                <th>Id</th>
                                <th>Categoria</th>
                                <th>produto</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Unidade</th>
                                <th>Data entrada</th>
                                <th>Data Validade</th>
                                <th>Ação</th>
                            </tr>
                        </thead>

                            <?php
                            while ($linha = mysql_fetch_assoc($resultado)) {

                                $idcategoria = $linha['idcategoria'];
                                $idproduto = $linha['idproduto'];
                                $produto = $linha['produto'];
                                $descricao = $linha['descricao'];
                                $preco = $linha['preco'];
                                $quantidade = $linha['quantidade'];
                                $unidade = $linha['unidade'];
                                $data_entrada = $linha['data_entrada'];
                                $data_validade = $linha['data_validade'];
                            ?>

                            <tr>

                                <td> <?php echo "<p>  " . $linha ['idproduto'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['idcategoria'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['produto'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['descricao'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['preco'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['quantidade'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['unidade'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['data_entrada'] . "<br>"; ?> </td>

                                <td> <?php echo "<p>  " . $linha ['data_validade'] . "<br>"; ?> </td>

                                <td> 

                                    <?php printf('<a href="paginas/produto/deleta_dados_produto.php?id=%s">Excluir |</a>', $linha['idproduto']); ?>

                                    <?php printf('<a href="paginas/produto/form_editar_produto.php?id=%s">Alterar |</a>', $linha['idproduto']); ?>
                                    
                                    <?php printf('<a href="paginas/produto/form_inseri_img.php?id=%s">Imagem</a>', $linha['idproduto']); ?>
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