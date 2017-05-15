
<?php

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



session_start();


$login = $_POST['login'];
$senha = $_POST['senha'];

mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 

@mysql_select_db($db) or die("Impossível conectar ao banco"); 

$result=mysql_query("SELECT * FROM usuario where login = 'alugaai'") or die("Impossível executar a query"); 

$row=mysql_fetch_object($result);

if($senha == $row->senha && $login == 'alugaai'){

    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    echo "<script> window.location.replace('logado.php') </script>";
    

}else{

    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
     echo "<script> window.location.replace('index.html') </script>";
}

?>