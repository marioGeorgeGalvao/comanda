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
        if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true) and ( !isset($_SESSION['id_nivel']) == true)) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            unset($_SESSION['id_nivel']);
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

        <title>SCE - Sistema de Comanda Eletrônica</title>

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
            
            <?php include 'include/Menu_legal.php'?>

           <?php 

		if($_GET['btn'] == "nova"){

			include "vender.php";

		}elseif($_GET['btn'] == "cadastroProdutos"){

			include "cadastroProdutos.php";

		}elseif($_GET['btn'] == "alterapreco"){

			include "alterapreco.php";

		}elseif($_GET['btn'] == "relatorio"){

			include "relatorio.php";

		}

		elseif($_GET['btn'] == "config"){

			include "config.php";

		}

		elseif($_GET['btn'] == "mesa"){

			include "tela_mesa.php";

		}

		elseif($_GET['btn'] == "entrega"){

			include "entrega.php";

		}

		elseif($_GET['btn'] == "vendermesa"){

			include "comanda.php";

		}

		elseif($_GET['btn'] == "categoria"){

			include "categoria.php";

		}

		elseif($_GET['btn'] == "cadastromesa"){

			include "cadastromesa.php";}

			

			elseif($_GET['btn'] == "vendapedido"){

			include "vendapedido.php";

		}

		elseif($_GET['btn'] == "cadastroclientes"){

			include "cadastrarcliente.php";

		}

		elseif($_GET['btn'] == "cadGarcon"){

			include "cadGarcon.php";

		}

		elseif($_GET['btn'] == "relatoriogarcon"){

			include "relatoriogarcon.php";

		}

		elseif($_GET['btn'] == "garcon"){

			include "vendagarcon.php";

		}

	?>
	
	<!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
            

    </body>
</html>

                

