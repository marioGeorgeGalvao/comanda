<!DOCTYPE html>
<html lang="en">
  <head>
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
   
  </head>

  <?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
    $banco = mysql_selectdb("comanda", $conexao);
    $sql = ("SELECT * FROM usuarios");
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
            <li><a href="#">Sistema de Comanda Eletrônica e Reserva</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <!-- Fim Fixed navbar -->
	
    <div id="header">
		<div class="container">
			<div class="row">
                       
				<div class="col-lg-6">
					<h1>Restaurante e Petiscaria Praia e Mar</h1>
					
                                        
                                                                                <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Acesso ao Aplicativo</button>

                                    <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Acesso Restrito</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form class="form-signin" method="POST" action="include/validar_login.php">

                                                    <label for="inputEmail" class="sr-only">Login</label>
                                                    <input type="text" id="text" value="" class="form-control" name="login" placeholder="Login" required autofocus>
                                                    <label for="inputPassword" class="sr-only">Senha</label>
                                                    <input type="password" id="inputPassword" value="" name="senha" class="form-control" placeholder="Senha" required>

                                                                    <label for="campo2">Nivel Acesso </label>
                                                                        <select name="id_nivel">
                                                                            <option>Nivel Acesso</option>
                                                                                <?php $query = mysql_query("SELECT * FROM nivel_acesso"); ?> <!-- Aki puxa todas as categorias existentes-->
                                                                                <?php while ($prod = mysql_fetch_array($query)) { ?>      <!-- Aki puxa todas as categorias existentes-->
                                                                            <option value="<?php echo $prod['id_nivel'] ?>"><?php echo $prod['nivel'] ?></option>
                                                                                <?php } ?> 
                                                                        </select>

                                                            <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
                                            </form>
                                            </div> <!-- /container -->
                                          </div>
                                      </div>
                                    </div>
                                    
                                    
				</div>
				<div class="col-lg-4 col-lg-offset-2">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					  </ol>					
					  <!-- slides -->
					  <div class="carousel-inner">
						<div class="item active">
						  <img src="assets/img/slide1.png" alt="">
						</div>
						<div class="item">
						  <img src="assets/img/slide2.png" alt="">
						</div>
						<div class="item">
						  <img src="assets/img/slide3.png" alt="">
						</div>
					  </div>
					</div>		
				</div>
				
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

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
