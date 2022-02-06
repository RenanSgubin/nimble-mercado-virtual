<?php
		session_start();
  
  unset($_SESSION["autenticado"]);
		
		session_destroy();

		sleep(1);

			header("location:../php/homep");
?>