<style type="text/css">
	.afasta-bottom{
		margin-bottom: 12px;
	}

	th{
		color:#000;
	}

	.input-seacher-text{
		width:500px!important;
		margin-left: 34px;

	}

	td.alert{
			background-color: #f23;
			color:#FFF;
		}
	tr>td{
		background-color: green;
		color: #fff;
	}

</style>

<section class="container-fluid">
	<div class="col-md-12 afasta-bottom">
		<form method='get' action="<?=filter_input(INPUT_SERVER,'PHP_SELF')?>"
		>
			<label class="form-inline control-label">Pesquisar cliente
			<input type="text" class="form-control input-seacher-text" name="seacher"/></label>
			<input type="hidden" name='p' value="consulta"/>
			<button class="btn btn-success glyphicon" type="submit"><span class="glyphicon-search"><span></button>
		</form>
	</div>
	<div>
	<p>
		<table  class="col-md-12 table table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Telefone</th>
					<th>CPF</th>
					<th>email</th>
					<th>rua</th>
					<th>numero da casa</th>
					<th>Complemento</th>
				</tr>
			</thead>
			<tbody>
			<?php
			//capturando os valores pelo get

			if(empty(filter_input(INPUT_GET, 'seacher'))){

				$tbody = "<tr>
							<td colspan=7 class='alert' style='text-align:center'><b>Faca uma Pesquisa</b></td>
						 </tr>";
				echo html_entity_decode($tbody);
			}else{

				if(empty(filter_input_array(INPUT_GET, 'p','seacher')))
				{
					$seacher = filter_input(INPUT_GET, 'seacher');

					if (filter_var('seacher',FILTER_SANITIZE_STRING))
					{
						$nome=$seacher;
					}

				 	$sql = "select * from clientes where nomeCliente Like :nome ";
					$result = $pdo->prepare($sql);
					$result->bindValue(':nome',"%{$nome}%");
					$result->execute() or die (var_dump(BD::getConn()->errorCode()));
					$elemento =$result->fetchAll();
					if(isset($elemento) && count($elemento)===0){
						echo html_entity_decode("<tr><td colspan=7 class='alert btn-warning' style='color:#FFF;text-align:center'>
							 Consulta não retornou nenhum item</td></tr>");

					}else{

					echo html_entity_decode("<tr>");
					foreach($elemento as $rows){

						echo html_entity_decode("<td>".$rows['nomeCliente']."</td>");
						echo html_entity_decode("<td>".$rows['celularCliente']."</td>");
						echo html_entity_decode("<td>".$rows['cpf']."</td>");
						echo html_entity_decode("<td>".$rows['email']."</td>");
						echo html_entity_decode("<td>".$rows['rua']."</td>");
						echo html_entity_decode("<td>".$rows['numeroCasa']."</td>");
						echo html_entity_decode("<td>".$rows['complemento']."</td>");
						echo html_entity_decode("</tr>");
				 	}
				}
				}else{
					echo html_entity_decode("<tr><td colspan=7 class='alert btn-warning' style='color:#FFF;text-align:center'>
					 Consulta não retornou nenhum item</td></tr>");
				 }
				}

			?>
		 	</tbody>
		</table>
		<?php
			if(isset($elemento) && count($elemento) > 0 ){

				echo html_entity_decode("<a href='PDF.php?seacher=$nome' role='subimit' class='btn btn-warning btn-md' download='lista de clientes'>Gerar PDF</a>");
			}
		?>
		</p>
	</div>
</section>
