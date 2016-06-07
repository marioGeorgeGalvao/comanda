<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">

            <!-- Chama dados da tabela de usuario para listar --------------Inicio-->
            <?php
            error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
            $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
            $banco = mysql_selectdb("comanda", $conexao);
            $sql = "SELECT * FROM categoria ";
            $resultado = mysql_query($sql);
            ?>

            <!-- Chama dados da tabela de usuario para listar --------------Fim----->

            <div class="panel-heading">Listando Usuarios</div>

            <table class='table table-striped table-bordered table-hover'>
                <tr id= "titulo_tabela">
                    <td>Id</td>
                    <td>Categoria</td>
                    <td>Descrição</td>
                    <td>Ação</td>

                </tr>


                <?php
                while ($linha = mysql_fetch_assoc($resultado)) {

                    $idcategoria = $linha['idcategoria'];
                    $categoria = $linha['categoria'];
                    $descricao = $linha['descricao'];
                    ?>

                    <tr>
                        <td> <?php echo "<p>  " . $linha ['idcategoria'] . "<br>"; ?> </td>
                        <td> <?php echo "<p>  " . $linha ['categoria'] . "<br>"; ?> </td>
                        <td> <?php echo "<p>  " . $linha ['descricao'] . "<br>"; ?> </td>
                        <td> 
                            <?php printf('<a href="paginas/categoria/deleta_dados_categorias.php?id=%s">Excluir</a>', $linha['idcategoria']); ?>
                            <?php printf('<a href="paginas/categoria/form_editar_categoria.php?id=%s">Alterar</a>', $linha['idcategoria']); ?>
                        </td>

                    </tr>

                <?php } ?>

            </table>
        </div>
    </div>
</div>
