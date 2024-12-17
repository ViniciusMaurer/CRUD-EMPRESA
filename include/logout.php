<?php
	// abre sessao
	session_start();
	session_destroy();
	header("Location: ../index.html");
?>