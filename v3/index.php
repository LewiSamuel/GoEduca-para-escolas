<?php
	
	// Incluindo arquivo de configuração
	require_once (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"])."/escolas/config.php";

	// $localCss 	= "dashboard";
	$meta_title = "GoEduca para escolas - Login";
	$meta_description = "Aprenda jogando!";

	//$localJS = "login";
	$hideNav = true;
	$hideFooter = true;

	include $APP_PATH_ROOT."/components/header.php";

	if(!Logado()){
		include $APP_PATH_ROOT."/view/body-login.php";
		

	}else{

		include $APP_PATH_ROOT."/components/nav.php";

		if($_SESSION["nivelacesso"] == 1)
		include $APP_PATH_ROOT."/view/body-inicial.php";

		else if($_SESSION["nivelacesso"] == 2)
		include $APP_PATH_ROOT."/view/body-professor.php";

		else if($_SESSION["nivelacesso"] == 3)
		include $APP_PATH_ROOT."/view/body-escola.php";
	}

	include $APP_PATH_ROOT."/components/config/end.php";


?>