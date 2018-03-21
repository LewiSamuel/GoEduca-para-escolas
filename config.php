<?php

	$APP_PATH_VERSION = "/escolas/v3";
	// TIRAR A BARRA CASO TENHA
	$APP_PATH_ROOT = (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"]).$APP_PATH_VERSION;

	//Suport Emails
	$suportEmail_Dev = "dev@goeduca.com";
	$suportEmail_Op = "nayara.goeduca@gmail.com";
	$suportEmail_Test = "allan@goeduca.com";
	$suportEmail_TI = "lewi@goeduca.com";
	$suportEmail_DB = "antonio@goeduca.com";


	//incluir todos models
	require_once $APP_PATH_ROOT."/modelsext/PesquisaJogo.php";
	require_once $APP_PATH_ROOT."/modelsext/Login.php";
	require_once $APP_PATH_ROOT."/modelsext/Ranking.php";

	require_once $APP_PATH_ROOT."/models/Pessoa.php";
	require_once $APP_PATH_ROOT."/models/Instituicao.php";
