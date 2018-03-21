<?php

	// Incluindo arquivo de configuração
	require_once (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"])."/escolas/config.php";

	session_start();
	session_destroy();
	$_SESSION = array();
	unset($_SESSION);
	header("location: $APP_PATH_VERSION/?logout=true");

		//
	// Destrói o Cookie de login automatico
	// ADICIONAR AO ARQUIVO DE LOGOUT
	//

	// $_COOKIE = array();
	// unset($_COOKIE['login']);
?>