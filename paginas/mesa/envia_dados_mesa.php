<?php
include ("../../include/conecta_banco.php");
?>
<html>
    <head>
        <title>Autenticando Usuario</title>
        <script type="text/javascript">
            function loginsuccessfully(){
                setTimeout("window.location='../../form_mesa.php'",1800);
            }
            function loginfailed(){
                setTimeout("window.location='../../form_mesa.php'",1800);
            }
        </script>
    </head>
    
    <body>

        <?php
        $numero_mesa          = $_POST['numero_mesa'];
        $lugar_mesa           = $_POST['lugar_mesa'];
        

           if($numero_mesa or $lugar_mesa){
            $sql = "INSERT INTO mesa
                (numero_mesa,
                 lugar_mesa) 
                	VALUES 
                ('$numero_mesa',
                 '$lugar_mesa')";

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
