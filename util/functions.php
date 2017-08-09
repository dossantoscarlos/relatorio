<?php		
		function tira_injector($pre){
                $trim = trim($pre);
                $strip = strip_tags($trim);
                $addsla = addslashes($strip);
                return $addsla;
            }
?>