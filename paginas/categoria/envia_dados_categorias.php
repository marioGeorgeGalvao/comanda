<?php
include ("../../include/conecta_banco.php");
?>
<html>
    <head>
        <title>Autenticando Usuario</title>
        <script type="text/javascript">
            function loginsuccessfully(){
                setTimeout("window.location='../../form_categoria.php'",1800);
            }
            function loginfailed(){
                setTimeout("window.location='../../form_categoria.php'",1800);
            }
        </script>
    </head>
    
    <body>

        <?php
        $categoria          = $_POST['categoria'];
        $descricao          = $_POST['descricao'];
        

           if($categoria or $descricao){
            $sql = "INSERT INTO categoria
                (categoria,
                 descricao) 
                	VALUES 
                ('$categoria',
                 '$descricao')";

            mysql_query($sql);

            echo 'Dados inseridos';
            echo "<script>loginsuccessfully()</script>";
        } else {
            echo 'Ha campos em branco...';
             echo "<script>loginfailed()</script>";
          }
        ?>
    </body>
</html>
