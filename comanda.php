<style type="text/css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    .txt-heading{padding: 5px 10px;font-size:1.1em;font-weight:bold;color:#999;}
    .btnRemoveAction{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}
    #btnEmpty{background-color:#D60202;border:0;padding:1px 10px;color:#FFF; font-size:0.8em;font-weight:normal;float:right;text-decoration:none;}
    .btnAddAction{background-color:#79b946;border:0;padding:3px 10px;color:#FFF;margin-left:1px;}
    #shopping-cart {border-top: #79b946 2px solid;margin-bottom:30px;}
    #shopping-cart .txt-heading{background-color: #D3F5B8;}
    #shopping-cart table{width:100%;background-color:#F0F0F0;}
    #shopping-cart table td{background-color:#FFFFFF;}
    .cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}
    #product-grid {border-top: #F08426 2px solid;margin-bottom:30px;}
    #product-grid .txt-heading{background-color: #FFD0A6;}
    .product-item {	float:left;	background:#F0F0F0;	margin:13px;	padding:5px;}
    .product-item div{text-align:center;	margin:10px;}
    .product-price {color:#F08426;}
    .product-image {height:100px;background-color:#FFF;}

</style>

<?php

$data 	= date('Y-m-d H:i:s');

session_start();

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
}

//adiciona produto

if(isset($_GET['acao'])){

    //ADICIONAR CARRINHO
    if($_GET['acao'] == 'add'){
        $id = intval($_GET['id']);
        if(!empty($_SESSION['carrinho'][$id])){
            $_SESSION['carrinho'][$id] = 1;
        }else{
            $_SESSION['carrinho'][$id] += 1;
        }
    }

    //REMOVER CARRINHO
    if($_GET['acao'] == 'del'){
        $id = intval($_GET['id']);
        if(isset($_SESSION['carrinho'][$id])){
            unset($_SESSION['carrinho'][$id]);
        }
    }

    //ALTERAR QUANTIDADE
    if($_GET['acao'] == 'up'){
        if(is_array($_POST['prod'])){
            foreach($_POST['prod'] as $id => $qtd){
                $id  = intval($id);
                $qtd = intval($qtd);
                if(!empty($qtd) || $qtd <> 0){
                    $_SESSION['carrinho'][$id] = $qtd;
                }else{
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }

}

?>


<HTML>
<head>


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
<BODY>


<!-- Page Content -->
<div class="container">
    <div class="row">

        <div class="col-md-6">

            <div class="row">
                <div class="col-lg-5">
                    <h1>Comanda </h1>
                </div>
            </div>

            <?php
            require("/include/conecta_banco.php");

            $sql = "SELECT * FROM produto ORDER BY idproduto ASC";
            $qr = mysql_query($sql) or die(mysql_error());

            $idmesa = $_GET['mesa_idmesa'];
            $idproduto = $_GET['idproduto'];
            $nameproduto = $_GET['produto'];
            $preco = $_GET['preco'];


            while($linha = mysql_fetch_assoc($qr)){

                echo '<div class="product-item">';
                echo '<div class="product-image"><img src="img/sucos.png"/></div>';
                echo '<div><strong>'.$linha['produto'].'</strong></div>';
                echo '<div class="product-price">' . 'R$ ' . number_format($linha['preco'], 2, ',', '.') . '</div>';
                echo '<a href="comanda.php?acao=add&id='.$linha['idproduto'].'">Acrescentar Pedido</a>';
                echo '<br /><hr />';
                echo '</div>';
            }

            $nome  = $ln['produto'];
            $preco = number_format($ln['preco'], 2, ',', '.');
            $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');

            $total += $ln['preco'] * $qtd;

            ?>


        </div>
    </div>

    <div class="row" style>
        <div class="col-md-6 portfolio-item">

            <div class="col-lg-5">
                <h4>Listagem dos Produtos</h4>
            </div>


            <table>
                <caption>Carrinho de Compras</caption>
                <thead>
                <tr>
                    <th width="244">Produto</th>
                    <th width="79">Quantidade</th>
                    <th width="89">Preço</th>
                    <th width="100">SubTotal</th>
                    <th width="64">Remover</th>
                </tr>
                </thead>
                <form method="post">
                    <tfoot>
                    <tr>
                        <td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
                    <tr>
                    </tfoot>

                    <tbody>
                    <?php


                    if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                    }else{
                        require("/include/conecta_banco.php");
                        $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                            $sql   = "SELECT *  FROM produto WHERE idproduto= '$id'";
                            $qr    = mysql_query($sql) or die(mysql_error());
                            $ln    = mysql_fetch_assoc($qr);

                            $idproduto = $ln['idproduto'];
                            $nome  = $ln['produto'];
                            $preco = number_format($ln['preco'], 2, ',', '.');
                            $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');

                            $total += $ln['preco'] * $qtd;

                            echo '<tr>
                                 <td>'.$nome.'</td>
                                 <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                 <td>R$ '.$preco.'</td>
                                 <td>R$ '.$sub.'</td>
                                 <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                              </tr>';
                        }
                        $total = number_format($total, 2, ',', '.');
                        echo '<tr>
                                    <td colspan="4">Total</td>
                                    <td>R$ '.$total.'</td>
                              </tr>';


// Insire os novos dados no banco de dados.
                        if(!mysql_query('INSERT INTO comanda (produto_idproduto, valor, mesa_idmesa, data_comanda) VALUES ("'.$idproduto.'", "'.$preco.'", "'.$id_mesa.'", "'.$data.'")')){
                            echo 'O produto não pode ser adicionado ao carrinho de compras';
                            echo '<br><a href="index.php">Voltar</a>';

                        }

                    }

                    ?>

                    </tbody>
                </form>
            </table>

        </div>
    </div>	<!-- Fim row -->
</div>
<!-- Fim container -->




</BODY>
</HTML>