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



$sql = mysql_query("SELECT * FROM usuarios WHERE nome LIKE '%$busca%' OR email LIKE '%$busca%'");
// query para selecionar todos os campos da tabela usuários se $busca contiver na coluna nome ou na coluna email
// % antes e depois de $busca serve para indicar que $busca por ser apenas parte da palavra ou frase
// $busca é a variável que foi enviada pelo nosso formulário da página anterior
$count = mysql_num_rows($sql);
// conta quantos registros encontrados com a nossa especificação
if ($count == 0) {
    echo "Nenhum resultado!";
} else {
    // senão
    if ($count == 1) {
        echo "1 resultado encontrado!";
    }
// se houver um resultado diz que existe um resultado
    if ($count > 1) {
        echo "$count resultados encontrados!";
    }
// se houver mais de um resultado diz quantos resultados existem
    while ($dados = mysql_fetch_array($sql)) {
        // enquanto houverem resultados...
        echo "$dados[nome] $dados[email]";
        // exibir a coluna nome e a coluna email
    }
}
?>
