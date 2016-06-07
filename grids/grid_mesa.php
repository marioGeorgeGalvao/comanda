<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">

            <!-- Chama dados da tabela de usuario para listar --------------Inicio-->
            <?php
            error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
            $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
            $banco = mysql_selectdb("comanda", $conexao);
            $sql = "SELECT * FROM mesa ";
            $resultado = mysql_query($sql);
            ?>

            <!-- Chama dados da tabela de usuario para listar --------------Fim----->
            <div class="panel-heading">Listando Usuarios</div>

            <table class='table table-striped table-bordered table-hover'>

                <tr id= "titulo_tabela">

                    <td>Id</td>

                    <td>Numero da Mesa</td>

                    <td>Lugares</td>

                    <td>Ação</td>

                </tr>


                <?php
                while ($linha = mysql_fetch_assoc($resultado)) {

                    $idmesa = $linha['idmesa'];
                    $numero_mesa = $linha['numero_mesa'];
                    $lugar_mesa = $linha['lugar_mesa'];
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

        </div>
    </div>
</div>
