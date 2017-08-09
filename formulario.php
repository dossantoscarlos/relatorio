<script language='javascript'>
$(document).ready(function(){
	var init = function(){
		$('label').each(function(){
			$(this).addClass('form-inline control-label');
		});

		$('input').each(function(){
			$(this).addClass('form-control');
		});
		
		$('button').after('<p>');
		$('button').before('</p>');
		$('button').html('Salvar registro');
		$('button').addClass('btn btn-primary btn-lg');
	};
	
	init();
})();
</script>
<section class='container'>
<?php 
	if(isset($mensagem)){
		html_entity_decode('<div>'.$mensagem.'</div>'); 
	}
?>
<fieldset class="col-md-12">
	<legend>Cadastro de Clientes</legend>
	<form method='post' action="<?=filter_input(INPUT_SERVER,'PHP_SELF')?>?p=formulario">
		<label>Nome:</label> 
		<input type='text' name='nome' required/>
		<label >CPF:</label> 
		<input type='text' name='cpf' required/>
		<label >Celular:</label>
		<input type='celular' name='celular' required/>
		<label >Email:</label>
		<input type="email" name="email" required/>
		<label >Rua:</label>
		<input type="text" name="rua" required/>
		<label >Numero:</label>
		<input type="number" name="numerocasa" required/>
		<label >Complemento</label>
		<input type='text' name="complemento" />
		<input type='hidden' name='tpken' value="formulario"/>
		<Button type='submit'></Button>	
	</form>

</fieldset>
<?php

	$array_post = array(
		'nome'       =>FILTER_SANITIZE_STRING,
		'cpf'        =>FILTER_SANITIZE_STRING,
		'celular'    =>FILTER_VALIDATE_INT,
		'email'      =>FILTER_SANITIZE_EMAIL,
		'rua'        =>FILTER_SANITIZE_STRING,
		'numerocasa' =>FILTER_VALIDATE_INT,
		'token'      =>FILTER_SANITIZE_STRING
	);
	

	if(!empty(filter_input_array(INPUT_POST,$array_post))){

		$nome = strip_tags(filter_input(INPUT_POST , 'nome'));
		
		$cpf = strip_tags(filter_input(INPUT_POST , 'cpf'));

		$celular = strip_tags(filter_input(INPUT_POST , 'celular'));

		$email = strip_tags(filter_input(INPUT_POST , 'email'));

		$rua = strip_tags(filter_input(INPUT_POST , 'rua'));

		$numerocasa = strip_tags(filter_input(INPUT_POST , 'numerocasa'));

		$complemento = strip_tags(filter_input(INPUT_POST,'complemento'));

		$array = array($nome,$cpf,$celular,$email,$rua,$numerocasa,$complemento);

		$sql = "insert into clientes (nomeCliente,cpf,celularCliente,email,rua,numeroCasa,complemento)";
		$sql .= "values(?,?,?,?,?,?,?)";
		$result = $pdo->prepare($sql);
		$result->execute($array) or die(print_r("<pre>".($pdo->errorCode())."</pre>"));
	}
 ?>

</section>