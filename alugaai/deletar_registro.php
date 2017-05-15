 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php


session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.html');
}

$logado = $_SESSION['login'];
$host = "localhost:3306"; 
$username = "alugaaic_alugaai"; 
$password = "#alugaai"; 
$db = "alugaaic_bdalugaai";

/*
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$db = "alugaai"; 
*/


mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 

@mysql_select_db($db) or die("Impossível conectar ao banco"); 

$id = $_GET['id']; // Recebendo o valor enviado pelo link

mysql_query("DELETE FROM pessoa WHERE id=$id"); // A instrução delete irá apagar todos os dados da id recebida

echo"<script language='javascript' type='text/javascript' charset='utf-8'>alert('Registro excluído com sucesso');window.location.href='logado.php'</script>";

?>