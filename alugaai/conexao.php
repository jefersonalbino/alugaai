<?php
//$hostname_conexao = "sql9.hostinger.com.br";
/*$hostname_conexao = "uscentral67.myserverhosts.com:3306";
$database_conexao = "alugaaic_bdalugaai";
$username_conexao = "alugaaic_alugaai";
$password_conexao = "#alugaai";*/

$banco = "alugaai";
$usuario = "root";
$senha = "";
$hostname = "localhost:3306";
$conn = mysql_connect($hostname,$usuario,$senha); 
mysql_select_db($banco) or die('Não conectado: '. mysql_error());
if (!$conn) {
	echo "Não foi possível conectar ao banco MySQL."; 
	exit;
}
else {
	echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";
}
mysql_close();
?>