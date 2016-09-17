<!DOCTYPE html>
<html lang="en">
  <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>SCE - Sistema de Comanda Eletrônica</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">

    <!-- siimple style -->
    <link href="assets/css/style.css" rel="stylesheet">
    
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
   
  </head>
  
  <?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
    $banco = mysql_selectdb("comanda", $conexao);
    $sql = ("SELECT * FROM categoria");
    $resultado = mysql_query($sql);
    ?>
  
  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SCE</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"></a></li>
            <li><a href="">Sistema de Comanda Eletrônica e Reserva</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <!-- Fim Fixed navbar -->
	<div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
                    <li class="current"><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
        </div>
        </div>
    <div id="header">
		<div class="control-label">
                <div class="container">

                <div class="panel panel-success">

                    <!---- INICIO DA TABELA ---->
                    <div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Bootstrap dataTables</div>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="example">
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

        <!-- jQuery -->
        <script src="bootstrap/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
		</div>
	</div>

      </div>
    <div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
					<p class="copyright">Copyright &copy; 2014 - Designed by <a href="ttp://bootstraptaste.com">Bootstrap Themes</a></p>
			</div>
            <!-- 
                All links in the footer should remain intact. 
                Licenseing information is available at: http://bootstraptaste.com/license/
                You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Siimple
            -->
		</div>		
	</div>	
    </div>
    <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
