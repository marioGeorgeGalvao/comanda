<?php
        error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$servidor = 'localhost';
	$banco	  = 'comanda';
	$usuario  = 'root';
	$senha	  = '';
	$link	  = mysql_connect($servidor, $usuario, $senha) or die(mysql_error());
                         mysql_select_db($banco) or die(mysql_error());

	if(!$link)
{
		echo "Erro ao conectar ao banco de dados!"; Exit();
}

//	$SQL 	  = "SELECT * from usuario";
//	$RS  	  = mysql_query($SQL);
//
//	while ($RF = mysql_fetch_array($RS))
//
//{
//	echo '<pre>';
//	print_r ($RF);
//	echo '</pre>';
//}

?>
