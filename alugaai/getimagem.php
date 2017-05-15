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

	$PicNum = $_GET["PicNum"];

	mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 
	@mysql_select_db($db) or die("Impossível conectar ao banco."); 
	$result=mysql_query("SELECT * FROM pessoa WHERE id=$PicNum") or die("Impossível executar a query "); 
	$row=mysql_fetch_object($result); 
	Header( "Content-type: image/jpg"); 
	echo $row->produto_foto; 
?>