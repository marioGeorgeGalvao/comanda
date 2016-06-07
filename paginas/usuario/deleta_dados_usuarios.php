<?php include'../../include/conecta_banco.php' ?>
<html>
    <head>
        <title>Autenticando Usuario</title>
        <script type="text/javascript">
            function loginsuccessfully(){
                setTimeout("window.location='../../cad_usuario.php'",2500);
            }
            function loginfailed(){
                setTimeout("window.location='../../index.php'",2500);
            }
        </script>
    </head>
    
    <body>

        <!-- Ação de apagar dados de usuarios --------------------------Inicio-->
        <?php
        $id = $_GET['id'];

        $sql = sprintf("DELETE FROM usuarios where id = %s", $id);

        $resultado = mysql_query($sql);

        if ($resultado == 1) {
            echo "Usuario excluído com sucesso.";
            echo "<script>loginsuccessfully()</script>";
        } else {
            echo "Problemas ao excluir usuario.";
            echo "<script>loginfailed()</script>";
        }
        ?>
        <!-- Ação de apagar dados de usuarios --------------------------Fim-->
    </body>
</html>