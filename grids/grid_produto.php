<!-- Grid Usuario -----------------INICIO------------------------------>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">

            <!-- Chama dados da tabela de usuario para listar --------------Inicio-->
            <?php
            error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
            $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
            $banco = mysql_selectdb("comanda", $conexao);
            $sql = "SELECT * FROM produto ";
            $resultado = mysql_query($sql);
            ?>

            <!-- Chama dados da tabela de usuario para listar --------------Fim----->

            <div class="panel-heading">Listando Usuarios</div>

            <table class='table table-striped table-bordered table-hover'>

                <tr id= "titulo_tabela">

                    <td>Id</td>

                    <td>Categoria</td>

                    <td>Produto</td>

                    <td>Descrição</td>

                    <td>Preço</td>

                    <td>Quantidade</td>

                    <td>Unidade</td>

                    <td>Data Entrada</td>

                    <td>Data Validade</td>

                    <td>Ação</td>

                </tr>


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

                        <td> <?php echo "<p>  " . $linha ['idcategoria'] . "<br>"; ?> </td>

                        <td> <?php echo "<p>  " . $linha ['idproduto'] . "<br>"; ?> </td>

                        <td> <?php echo "<p>  " . $linha ['produto'] . "<br>"; ?> </td>

                        <td> <?php echo "<p>  " . $linha ['descricao'] . "<br>"; ?> </td>

                        <td> <?php echo "<p>  " . $linha ['preco'] . "<br>"; ?> </td>

                        <td> <?php echo "<p>  " . $linha ['quantidade'] . "<br>"; ?> </td>

                        <td> <?php echo "<p>  " . $linha ['unidade'] . "<br>"; ?> </td>

                        <td> <?php echo "<p>  " . $linha ['data_entrada'] . "<br>"; ?> </td>

                        <td> <?php echo "<p>  " . $linha ['data_validade'] . "<br>"; ?> </td>

                        <td> 

                            <?php printf('<a href="paginas/produto/deleta_dados_produto.php?id=%s">Excluir</a>', $linha['idproduto']); ?>

                            <?php printf('<a href="paginas/produto/form_editar_produto.php?id=%s">Alterar</a>', $linha['idproduto']); ?>
                        </td>

                    </tr>

                <?php } ?>
            </table>

        </div>
    </div>
</div>


<!-- Grid Usuario -----------------FIM--------------------------------->