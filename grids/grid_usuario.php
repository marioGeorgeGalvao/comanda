<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">

            <!-- Chama dados da tabela de usuario para listar --------------Inicio-->
            <?php
            error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
            $conexao = mysql_connect("localhost", "root", "") or die(mysql_erro());
            $banco = mysql_selectdb("comanda", $conexao);
            $sql = ("SELECT * FROM usuarios WHERE nome LIKE '%$busca%' OR email LIKE '%$busca%'");
            $resultado = mysql_query($sql);
            ?>
            <!-- Chama dados da tabela de usuario para listar --------------Fim----->

            <div class="panel-heading">Listando Usuarios</div>

            <form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar" >
                <input type="text" name="palavra" />
                <input type="submit"  value="Buscar" />
            </form>
            <?php
// Recuperamos a ação enviada pelo formulário
            $a = $_GET['a'];

// Verificamos se a ação é de busca
            if ($a == "buscar") {

                // Pegamos a palavra
                $palavra = trim($_POST['palavra']);

                // Verificamos no banco de dados produtos equivalente a palavra digitada
                $sql = mysql_query("SELECT * FROM usuarios WHERE nome LIKE '%" . $palavra . "%' ORDER BY nome");

                // Descobrimos o total de registros encontrados
                $numRegistros = mysql_num_rows($sql);

                // Se houver pelo menos um registro, exibe-o
                if ($numRegistros != 0) {
                    // Exibe os produtos e seus respectivos preços
                    while ($produto = mysql_fetch_array($sql)) {
                        echo "Id do Produto: $produto[id]<br />";
                        echo "Nome do Produto: $produto[nome]<br />";
                        echo "Preço do Produto: $produto[email]<br />";
                        echo "Categoria do Produto: $produto[login]<br />";
                        echo "Categoria do Produto: $produto[senha]<br />";
                        echo "Categoria do Produto: $produto[nivel]<br />";
                        echo "<hr>";
                    }

                    // Se não houver registros
                } else {
                    echo "Nenhum produto foi encontrado com a palavra " . $palavra . "";
                }
            }
            ?>          
            <table class='table table-striped table-bordered table-hover'>

                <tr id= "titulo_tabela">

                    <td>Id</td>
                    <td>Login</td>
                    <td>Senha</td>
                    <td>E-mail</td>
                    <td>Nome Usuario</td>
                    <td>Nivel de Acesso</td>
                    <td>Ação</td>
                </tr>

                <?php
                while ($linha = mysql_fetch_assoc($resultado)) {

                    $id = $linha['id'];
                    $login = $linha['login'];
                    $senha = $linha['senha'];
                    $email_usuario = $linha['email'];
                    $nome_usuario = $linha['nome'];
                    $tipo_usuario = $linha['nivel'];
                    ?>

                    <tr>
                        <td> <?php echo "<p>  " . $linha ['id'] . "<br>"; ?> </td>
                        <td> <?php echo "<p>  " . $linha ['login'] . "<br>"; ?> </td>
                        <td> <?php echo "<p>  " . $linha ['senha'] . "<br>"; ?> </td>
                        <td> <?php echo "<p>  " . $linha ['email'] . "<br>"; ?> </td>
                        <td> <?php echo "<p>  " . $linha ['nome'] . "<br>"; ?> </td>
                        <td> <?php echo "<p>  " . $linha ['nivel'] . "<br>"; ?></td> 
                        <td> 
                            <?php printf('<a href="paginas/usuario/deleta_dados_usuarios.php?id=%s">Excluir</a>', $linha['id']); ?>
                            <?php printf('<a href="paginas/usuario/form_editar_usuario.php?id=%s">Alterar</a>', $linha['id']); ?>
                        </td>

                    </tr>

                <?php } ?>

            </table>

        </div>
    </div>
</div>

