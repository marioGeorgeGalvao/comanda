<?php include'../../include/conecta_banco.php' ?>
<html>
    <head>
        <title>Autenticando Usuario</title>
        <script type="text/javascript">
            function loginsuccessfully(){
                setTimeout("window.location='../../form_mesa.php'",2500);
            }
            function loginfailed(){
                setTimeout("window.location='../../form_mesa.php'",2500);
            }
        </script>
    </head>
    
    <body>

        <!-- Ação de apagar dados de usuarios --------------------------Inicio-->
        <?php
        $id = $_GET['id'];

        $sql = sprintf("DELETE FROM mesa where idmesa = %s", $id);

        $resultado = mysql_query($sql);

        if ($resultado == 1) {
            echo "Mesa excluída com sucesso.";
            echo "<script>loginsuccessfully()</script>";
        } else {
            echo "Problemas ao excluir Mesa.";
            echo "<script>loginfailed()</script>";
        }
        ?>
        <!-- Ação de apagar dados de usuarios --------------------------Fim-->
    </body>
</html>