

    <html>

        <head>


        <?php  
            session_start();
            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:index.html');
            }

            $logado = $_SESSION['login'];
        ?>

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
            <link rel="shortcut icon" href="images/ico/favicon.ico">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
            <script type="text/javascript" src="js/jquery.js"></script>

        </head>

        <body style="background-color:#D3E7EB; font-size:20pt; color:#31708F">
            <div style="margin:10% auto; text-align:center;">
                <div class="form-group">
                    <a href="exibir.php" style="color:black">Empreendedores</a>                
                </div>
                <br><br>
                <div class="form-group">
                    <a href="exibir_poupador.php" style="color:black">Poupadores</a>                
                </div>           
            </div>
        </body>

    </html>


