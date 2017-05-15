<html>
<head>

 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aluga Aí | Não desapegue, alugue !</title>
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






</head>
	<body style="background: #D3E7EB url(images/home/fundo_cidade.svg) 0 100% repeat-x;">

<div id="fb-root"></div>
<script>

	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=232997797077042";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

</script>



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



		$_UP['tamanho'] = 1024 * 1024; // 2Mb
		$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg','bmp');
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

		if(!empty($_FILES['imagem']['name']) ){
			$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
			if (array_search($extensao, $_UP['extensoes']) === false) {
		 		echo"<script language='javascript' type='text/javascript' charset='utf-8'>alert('Opssss. O formato da imagem deve ser .jpg, .bmp, .jpeg, .png ou .gif, não desista, tente novamente =/');window.location.href='index.html';</script>";
		  		exit;
			}
		}


		if(!empty($_FILES['imagem']['name']) ){
			// Faz a verificação do tamanho do arquivo
			if ($_UP['tamanho'] <= $_FILES['imagem']['size']) {
			  echo"<script language='javascript' type='text/javascript' charset='utf-8'>alert('Eitaa. Sua imagem é muita grande, selecione outra com no máximo 1mb =/');window.location.href='index.html';</script>";
			  exit;
			}
		}

		$mysqlImg = null;

		if (isset($_FILES['imagem'])) {
			$imagem = $_FILES['imagem'];	
			$nomeFinal = $_FILES['imagem']['name']; 
			if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) { 
				$tamanhoImg = filesize($nomeFinal); 
				$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
			}
		} else {	
			$mysqlImg = null;
		}


		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$fone = $_POST['fone'];
		$tipo = $_POST['tipo'];

		$estado = $_POST['estados'];
		$cidade = $_POST['cidades'];


		$produto_nome = $_POST['produto_nome'];		

		$produto_preco = $_POST['produto_preco'];		

		$produto_descr = $_POST['produto_descr'];
		//$produto_descr = htmlentities($_POST['produto_descr']);
			
		mysql_connect($host,$username,$password) or die("Impossível Conectar"); 	
		@mysql_select_db($db) or die("Impossível Conectar"); 

		$insert = mysql_query("INSERT INTO pessoa (nome,email,fone,tipo,produto_foto,produto_nome,produto_descr,preco,estado,cidade,data,status,analista) VALUES ('$nome','$email','$fone','$tipo','$mysqlImg','$produto_nome','$produto_descr','$produto_preco','$estado','$cidade',NOW(),'AA','')") or die(mysql_error()); 

		//unlink($nomeFinal); 
		//header("location:exibir.php"); 

		if($insert){
			//<script language='javascript' type='text/javascript' charset='utf-8'>alert('Pronto. Logo nossos analistas entrarão em contato com você. Tenha um ótimo aluguel. =)');window.location.href='index.html';document.getElementById['div_facebook'].style.display = 'block'; </script>
			echo"
				<div class='container' style='margin-top:10%; font-size:18px;'>
        			<div class='row'>
						<div>
							Pronto! Logo nosssos analistas farão contato. Na nossa fan page você terá notícias do seu e de outros aluguéis. Corre lá!
							<br><strong><span style='font-size:14px;'>#curteaí #alugaaí #compartilhaaí #poupaaí<span></strong>
							<br><br>
							<div class='col-md-6 col-sm-16' style='margin-left:-15px'>
								<div class='fb-page' data-href='https://www.facebook.com/alugaai/' data-tabs='timeline' data-width='400' data-height='230' data-small-header='false' data-adapt-container-width='true' data-hide-cover='false' data-show-facepile='true'>
									<div class='fb-xfbml-parse-ignore'>
										<blockquote cite='https://www.facebook.com/alugaai/'>
											<a href='https://www.facebook.com/alugaai/'>Aluga Aí</a>    
										</blockquote>
									</div>
								</div>
							</div>
							<div class='col-md-6 col-sm-16' style='margin-left:-15px'>
								<a href='index.html' class= 'btn btn-success'>Voltar para o Aluga aí</a>
							</div>
						</div>
					</div>
				</div>			
					";
		}else{
		    echo"<script language='javascript' type='text/javascript' charset='utf-8'>alert('Opssss. Encontramos algum problema durante o cadastro, tente novamente =/.');window.location.href='index.html'</script>";
		}


		?>
	</body>
</html>




