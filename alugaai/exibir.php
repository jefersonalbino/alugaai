
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

header("Content-Type: image/jpeg");
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

$result=mysql_query("SELECT * FROM pessoa WHERE tipo='e'") or die("Impossível executar a query"); 

echo " <div class='container'>
            	<div class='row'>";

while($row=mysql_fetch_object($result)) { 
	echo " <div class='col-sm-3 text-left padding wow'>
    			<img src='getimagem.php?PicNum=$row->id' width='200' height='200' alt='Problema ao carregar imagem' style='border:1px solid'  \">
    			<br>
    			<strong>Código </strong> $row->id <br>
				<strong>Nome:</strong> $row->nome <br>
				<strong>Email:</strong> $row->email <br>
				<strong>Fone: </strong> $row->fone <br>
				<strong>Cidade/Estado: </strong> $row->cidade / $row->estado <br>
				  <strong>Produto: </strong> $row->produto_nome <br>
                <strong>Descrição: </strong> $row->produto_descr <br>
                <strong>Preço: </strong> $row->preco <br>
				<div class='form-group' style='width: 60%;'>
                    <a href='detalhes.php?id=$row->id' class='btn btn-submit' value='Acessar'>Status</a>
                </div>
                <div class='form-group' style='width: 60%;'>
                    <a href='deletar_registro.php?id=$row->id' class='btn btn-submit' value='Acessar'>Excluir</a>
                </div>
			</div>
    			
		"; 
} 

echo "</div></div>";


echo "<div class='form-group' style='width: 10%;'>
                    <a href='logado.php' class='btn' style='color:black' value='Acessar'>Voltar</a>
    </div>";

?>

</body>

</html>