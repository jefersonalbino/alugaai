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

    <style>/* O z-index do div#mask deve ser menor que do div#boxes e do div.window */
        #mask {
            position:absolute;
            z-index:9000;  
            background-color:#000; 
            display:none;
        }

        #boxes .window {
            position:absolute;
            width:440px;
            height:200px;
            display:none;
            z-index:9999;
            padding:20px;
            background-color: white;
        }

        /* Personalize a janela modal aqui. Você pode adicionar uma imagem de fundo. */
        #boxes #dialog {
            width:60%;
            height:70%;
        }
        /* posiciona o link para fechar a janela */
        .close {
            display:block; 
            text-align:right;
        }  
    </style>


    <script type="text/javascript">

        $(document).ready(function() {

            //seleciona os elementos a com atributo name="modal"
            $('a[name=modal]').click(function(e) {
            //cancela o comportamento padrão do link
                e.preventDefault();

                //armazena o atributo href do link
                var id = $(this).attr('href');

                //armazena a largura e a altura da tela
                var maskHeight = $(document).height();
                var maskWidth = $(window).width();

                //Define largura e altura do div#mask iguais ás dimensões da tela
                $('#mask').css({'width':maskWidth,'height':maskHeight});

                //efeito de transição
                $('#mask').fadeIn(1000);
                $('#mask').fadeTo("slow",0.8);

                //armazena a largura e a altura da janela
                var winH = $(window).height();
                var winW = $(window).width();
                //centraliza na tela a janela popup
                $(id).css('top',  winH/2-$(id).height()/2);
                $(id).css('left', winW/2-$(id).width()/2);
                //efeito de transição
                $(id).fadeIn(2000);
            });

            //se o botãoo fechar for clicado
            $('.window .close').click(function (e) {
                //cancela o comportamento padrão do link
                e.preventDefault();
                $('#mask, .window').hide();
            });

            //se div#mask for clicado
            $('#mask').click(function () {
                $(this).hide();
                $('.window').hide();
            });
        });
    </script>

</head>

<body style="background-color:#D3E7EB;">

<div id="mask"></div>
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

$result=mysql_query("SELECT * FROM pessoa WHERE tipo='p'") or die("Impossível executar a query"); 

echo " <div class='container'>
            	<div class='row'>";

while($row=mysql_fetch_object($result)) { 
	echo " <div class='col-sm-3 text-left padding wow'>    			
    			<strong>Código </strong> $row->id <br>
				<strong>Nome:</strong> $row->nome <br>
				<strong>Email:</strong> $row->email <br>
				<strong>Fone: </strong> $row->fone <br>
				<strong>Cidade/Estado: </strong> $row->cidade / $row->estado <br>
                <strong>Data/Hora: </strong> $row->data<br>
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



<div id="boxes">
    <!-- #personalize sua janela modal aqui -->
    <div id="dialog" class="window">
        <div id="titulo_modal">
        </div>
        <!-- Botão para fechar a janela tem class="close" -->
        <a href="#" class="close">Fechar [X]</a><br><br>

        <div id="conteudoservicos">
        </div>
    </div>
    <!-- Não remova o div#mask, pois ele é necessário para preencher toda a janela -->  
</div>

</body>

</html>