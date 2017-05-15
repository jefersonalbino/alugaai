<?php 

header("Content-Type: text/html; charset=utf-8");


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



$status = $_POST['status'];
$analista = $_POST['analista'];
$id = $_POST['id'];

mysql_connect($host,$username,$password) or die("Impossível Conectar"); 	
@mysql_select_db($db) or die("Impossível Conectar"); 

$update = mysql_query("UPDATE pessoa set status='$status',  analista='$analista' WHERE id=$id ") or die(mysql_error()); 

//unlink($nomeFinal); 
//header("location:exibir.php"); 

if($update){
	echo"<script language='javascript' type='text/javascript' charset='utf-8'>alert('Atualizado com sucesso');window.location.href='logado.php'</script>";
}else{
    echo"<script language='javascript' type='text/javascript' charset='utf-8'>alert('Opssss, Problema ao atualizar, tente novamente.');window.location.href='logado.php'</script>";
}


?>
