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
            $idcategoria            = $_POST['idcategoria'];
            $produto                = $_POST['produto'];
            $descricao              = $_POST['descricao'];
            $preco                  = $_POST['preco'];
            $quantidade             = $_POST['quantidade'];
            $unidade                = $_POST['unidade'];
            $data_entrada           = $_POST['data_entrada'];
            $data_validade          = $_POST['data_validade'];
        

           if($produto or $descricao){
            $sql = "INSERT INTO produto
                (idcategoria,
                 produto,
                 descricao,
                 preco,
                 quantidade,
                 unidade,
                 data_entrada,
                 data_validade) 
                	VALUES 
                ('$idcategoria',
                 '$produto',
                 '$descricao',
                 '$preco',
                 '$quantidade',
                 '$unidade',
                 '$data_entrada',
                 '$data_validade)";

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
