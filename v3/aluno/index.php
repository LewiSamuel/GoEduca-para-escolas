<?php
	$meta_title = "Aluno";
	$meta_description = "Junte-se ao GoEduca!";

	$localCss 	= "dashboard";


	$hideNav = true;
	$hideFooter = true;


	global $SITEPATH;
	$SITEPATH= $_SERVER['DOCUMENT_ROOT'];
	$SITEPATH = $SITEPATH.(substr($SITEPATH, -1) === "/" ? "" : "/");


	include $APP_PATH_ROOT."/components/header.php";

	include $APP_PATH_ROOT."/components/nav.php";
	include $APP_PATH_ROOT."/view/content-school-aluno.php";

	include $APP_PATH_ROOT."/components/config/end.php";
?>