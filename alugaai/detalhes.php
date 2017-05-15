<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet"> 
		<link href="css/lightbox.css" rel="stylesheet"> 
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">

		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->       
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">



		<script type="text/javascript" src="js/jquery.js"></script>

	</head>

<body style="background-color:#D3E7EB;">

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



$id = $_GET['id']; // Recebendo o valor enviado pelo link


mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 

@mysql_select_db($db) or die("Impossível conectar ao banco"); 

$result=mysql_query("SELECT * FROM pessoa WHERE id=$id") or die(mysql_error()); 

$row=mysql_fetch_object($result);

echo "<br><br><div class='container'>
       	     	<div class='row'>
       	     		Código: $row->id <br>
       	     		Nome: $row->nome <br>
       	     		Cadastro: $row->data <br>

       	     		Status: ";

if($row->status == 'AA'){
	echo "Aguardando Analista TOA";
}else if($row->status=='AR'){
	echo "Aguardando retorno do empreendedor ou poupador <br>";
	echo "Analista TOA: $row->analista";
}else if($row->status =='P'){
	echo "Publicado. Aguardando fechar aluguel. <br>";
	echo "Analista TOA: $row->analista";
}else{
	echo "Alugado<br>";
	echo "Analista TOA: $row->analista";
}

echo "</div>
	   </div>";

echo "<br><div class='container'>
	     	<div class='row'>
	     	<strong>Novo Status</strong> <br>
	     	<form action='gravar_detalhes.php' method='POST' enctype='multipart/form-data'>
     			<input type='hidden' name='id' id='id' value='$row->id'>
		     	<select id='status' name='status'  style='width:30%; float:left; margin-right:10px;'>
	                <option value='AA'>Aguardando Analista TOA</option>
	                <option value='AR'>Aguardando retorno do empreendedor ou poupador</option>
	                <option value='P'>Publicado. Aguardando fechar aluguel</option>
	                <option value='A'>Alugado</option>
	            </select>
	            <br>
	            <div class='form-group'>
		            <strong>Analista TOA</strong><br>
		            <input type='text' name='analista' id='analista' style='width:30%'>
	             </div>
            	<div class='form-group' style='width:20%'>
                    <input type='submit' name='submit' class='btn btn-submit' value='Atualizar'>
                </div>
            </form>
            ";

echo "</div>
	   </div>";

?>


</body>

</html>