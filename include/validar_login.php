<?php include "conecta_banco.php";?>
<html>
    <head>
        <title>Autenticando Usuario</title>
        <script type="text/javascript">
            
         
        function redirecionarValidado(){
	alert("Login realizado com sucesso");
	setTimeout("window.location='../principal.php'",0);
        }
        function redirecionarNegado(){
	alert("Login ou senha invalida");
	setTimeout("window.location='../index.php'",0);
        }


    
//            function loginsuccessfully(){
//                setTimeout("window.location='../principal.php'",0);
//            }
//            function loginfailed(){
//                setTimeout("window.location='../index.php'",0);
//            }
        </script>
    </head>
    
    <body>
       

<?php
        
     $nome         =$_POST['login'];
     $senha        =$_POST['senha'];
         
     /*Puxa tudo de informaÃ§Ã£o da tabela Usuario*/
     
     $sql = mysql_query("select * from usuarios where login='$nome' and senha='$senha'");
          $row = mysql_num_rows($sql);
            if($row > 0){
                session_start();
                $_SESSION['login']= $_POST['login'];
                $_SESSION['senha']= $_POST['senha'];
//                echo "Voce foi autenticado com sucesso!";
                echo "<script>redirecionarValidado()</script>";
            }else{
//                echo"Erro de login - dados invalidos";
                echo "<script>redirecionarNegado()</script>";
            }

?>

         </body>
</html>