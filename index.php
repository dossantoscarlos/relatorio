<?php 
	include ('Connections/Config.php');
	__autoload('BD');
	$pdo=BD::getConn();
	ob_start();
	session_start();
?>
<!Doctype html>
<html lang="pt-br">
	<head>
	<title>
	<?=(empty(filter_input(INPUT_GET, 'p'))) ? "Formulario:Cadastro de Cliente" : filter_input(INPUT_GET, 'p');?>
	</title>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/vendors/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/vendors/bootstrap/dashboard.css" rel="stylesheet">
    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/css/vendors/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="assets/js/vendors/jQuery/jquery.min.js"></script>	
	
	</head>

	<body>
<!-- <script src="js.js"></script> -->

		<div class="container-fluid">        
		    <nav class="navbar navbar-inverse navbar-fixed-top">
		        <div class="container-fluid">
		          <div class="navbar-header">
		          <a class="navbar-brand" href="#">Template gerador de pdf</a>
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
		              data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		              <span class="sr-only">Toggle Navigate</span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		            </button>
		            </div>
		          <div id="navbar" class="navbar-collapse collapse">
		            <ul class="nav navbar-nav navbar-right">
		              <li><a href="index.php">Home</a></li>
		              <li><a href="?p=consulta">Consultar Cliente</a></li>
									<li><a href="?p=formulario">Cadastro de Cliente</a></li>
		            </ul>
		          </div>
		        </div>
		    </nav>
		 <?php 
		 		if(empty(filter_input(INPUT_GET, 'p'))){

		 	?>   
		    <section class="container">
				<header class="panel-heading col-md-12">
					<h2>Template gerador de pdf</h2>
					<em>Composto por um formulario de cadastro de usuario e um gerador de pdf</em>	
				</header>
				<article class="panel-body col-md-12">
		    		<div class="text-justify col-md-6">
		    			<p>
		    				<b>Como funciona o template?<br/></b>
		    				<em>O template funciona da sequinte forma voces faz um cadastro de cliente, e apos isso podera gerar um pdf valido. exibindo todos os clientes em seu banco ou um tipo especificado por voce</em>
		    			</p>
		    			<p>
		    				<b>Para que serve esse template?<br/></b>
		    				<em>Para ensinar de maneira simples e  facil a usar a customizacao de pdf com a classe fpdf, podendo emitir documentos em pdf com designer incriveis</em>
		    			</p>	
		    			<p>
		    				<b>Existe algum padrao de projeto no codigo php do template?<br/></b>
		    				<em>Nao , nao possui o codigo php esta no modelo estruturado ou seja 100% misturado ao html, porem todo os codigos referente ao gerador de pdf estao separado em classes</em>
		    			</p>
		    			<p>
		    				<b>Existe comentario no codigo das classes referentes ao fpdf?<br/></b>
		    				<em>Por hora ainda nao existe, futuramente quanto o template estiver completo tera.</em>
		    			</p>
		    			<p>
		    				<b>O designer do template esta responsivo?</b>
		    				<em>O designer do site esta no padrao bootstrap porem nao foi customizado para moveis ainda.</em>
		    			</p>
		    		</div>
		    		<div class="panel-body col-md-6">

		    			<div style="margin:0 auto!important; display:block;">
		    				<img class="img-responsive" src="assets/pictures/php.jpg" width="100px" height="50px" />
		    			</div>
		    		</div>
		    	</article>

		    </section>
		 <?php
			} 
			else
			{
				$pag = filter_input(INPUT_GET, 'p');
				require $pag.".php";
		 	}
		 ?>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/css/vendors/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/css/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/css/vendors/bootstrap/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/css/vendors/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>

		<?php
			ob_end_flush();
		?>
	</body>
</html>
