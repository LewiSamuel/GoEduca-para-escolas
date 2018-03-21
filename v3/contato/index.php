<?php

	// Incluindo arquivo de configuração
	require_once (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"])."/escolas/config.php";


	$meta_title = "Contato";
	$meta_description = "Junte-se ao GoEduca!";

	$localCss 	= "dashboard";


	$hideNav = true;
	$hideFooter = true;

	global $SITEPATH;
	$SITEPATH= $_SERVER['DOCUMENT_ROOT'];
	$SITEPATH = $SITEPATH.(substr($SITEPATH, -1) === "/" ? "" : "/");


	include $APP_PATH_ROOT."/components/header.php";

	if(!Logado()){
		header("location: $APP_PATH_VERSION");
	}else{

		include $APP_PATH_ROOT."/components/nav.php";
		include $APP_PATH_ROOT."/view/body-contato.phtml";
	}

	include $APP_PATH_ROOT."/components/config/end.php";
?>