<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap Admin Theme v3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jQuery UI -->
        <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="css/styles.css" rel="stylesheet">

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
    </head>

    <?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
    $banco = mysql_selectdb("comanda", $conexao);
    $sql = ("SELECT idreserva, idmesa, responsavel_reserva, cpf_responsavel, descricao, situacao_mesa, DATE_FORMAT(data_reserva, '%d/%m/%Y') as data_reserva FROM reserva where data_reserva <> ''");
    $resultado = mysql_query($sql);
    ?>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="page-content">
                <div class="navbar-nav">
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
                            <li class="current"><a href="reservas.php"><i class="glyphicon glyphicon-list"></i> Reservas</a></li>
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
                                    <li><a href="signup.html">Signup</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-10">

                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title">Lista de Reservas</div>

                        </div>
                        <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr id="titulo_tabela">

                                        <th>Mesa Reservada</th>
                                        <th>Responsavel - CPF</th>
                                        <th>Data Reserva</th>
                                        <th>Descricao</th>
                                        <th>Situação Mesa</th>

                                        <th>Ação</th>
                                </thead>

                                <?php
                                while ($linha = mysql_fetch_assoc($resultado)) {

                                    $idreserva = $linha['idreserva'];
                                    $idmesa = $linha['idmesa'];
                                    $responavel_reserva = $linha['responsavel_reserva'];
                                    $cpf_responsavel = $linha['cpf_responsavel'];
                                    $data_reserva = $linha['data_reserva'];
                                    $descricao = $linha['descricao'];
                                    ?>

                                    <tr>


                                        <td> <?php echo "<p>  N° " . $linha ['idmesa'] . "<br>"; ?> </td>

                                        <td> <?php echo "<p>  " . $linha ['responsavel_reserva'] . " - " . $linha ['cpf_responsavel'] . "<br>"; ?> </td>

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

                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Nova Reserva</button>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-dialog tutors-modal">
                                        <div class="modal-content tutors-modal">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Nova Reserva</h4>
                                            </div>
                                            <div class="modal-body" style="height: 375px; width: 100px; left: 0.5%;">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">     

                                                            <div class="row">

                                                                <form method="post" class="form" action="paginas/reserva/envia_dados_reserva.php">

                                                                    <fieldset>
                                                                        <div class="row">

                                                                            <div class="col-md-12">

                                                                                <div class="form-group col-md-2">

                                                                                    <label for="campo1">Responsavel pela Reserva</label>

                                                                                    <input type="text" name="responsavel_reserva" class="form-control" id="campo1">

                                                                                </div>

                                                                                <div class="form-group col-md-2">

                                                                                    <label for="campo1">CPF responsavel</label>

                                                                                    <input type="text" name="cpf_responsavel" class="form-control" id="campo1">

                                                                                </div>

                                                                                <div class="form-group col-md-2">

                                                                                    <label for="campo1">Data reserva:</label>

                                                                                    <input type="text" name="data_reserva" class="form-control" >

                                                                                </div>

                                                                                </fieldset>
                                                                                <fieldset>
                                                                                    <div class="form-group col-md-4">

                                                                                        <label for="campo1">Descrição da reserva :</label>

                                                                                        <textarea name="descricao" rows="10" cols="60"></textarea>

                                                                                    </div>

                                                                                    <div class="form-group col-md-3">
                                                                                        <label for="campo2">Mesa </label>

                                                                                        <select name="idmesa">

                                                                                            <option>Selecione a mesa</option>

                                                                                            <?php $query = mysql_query("SELECT * FROM mesa"); ?> <!-- Aki puxa todas as categorias existentes-->

                                                                                            <?php while ($prod = mysql_fetch_array($query)) { ?>      <!-- Aki puxa todas as categorias existentes-->

                                                                                                <option value="<?php echo $prod['idmesa'] ?>"><?php echo $prod['numero_mesa'] ?></option>

                                                                                            <?php } ?>

                                                                                        </select>

                                                                                    </div>
                                                                                </fieldset>
                                                                                <div class="col-md-8">

                                                                                    <button id="btnUpdate" name="btnSave" class="btn btn-primary">Salvar</button>

                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                </form>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>

    <footer>
        <div class="container">

            <div class="copy text-center">
                Copyright 2014 <a href='#'>Website</a>
            </div>

        </div>
    </footer>

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
</body>
</html>