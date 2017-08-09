<?php
	function __autoload($classe){
	$pagina = sprintf('../Class/%s.class.php', $classe);
	
	if(file_exists($pagina)){
		require_once($pagina);
	}else {
		$pagina = sprintf('Class/%s.class.php', $classe);
		if(file_exists($pagina)){
				require_once($pagina);
		}		
	}
}
?>