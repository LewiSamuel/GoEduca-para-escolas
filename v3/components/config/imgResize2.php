<?php
	// Incluindo arquivo de configuração
	require_once (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"])."/escolas/config.php";


	#recebendo a url da imagem
	$filename = $_GET['img'];
	// $filename = str_replace("@", "=", $filename);


	if (!file_exists($filename)) {
		$filename = $APP_PATH_ROOT."/src/img/bkg-navleft-goeduca.png";
	}


	#pegando as dimensoes reais da imagem, largura e altura
	list($width, $height) = getimagesize($filename);
	// $extensao = pathinfo($filename, PATHINFO_EXTENSION);
	// $extensao = strtolower($extensao);
	$dados = getimagesize($filename);
	$extensao_p = explode("/", $dados["mime"]);
	$extensao = $extensao_p[1];
	$extensao = ".".$extensao;

	if(isset($_GET['w'])){

		$new_width = $_GET['w'];
		$new_height = ($height*$new_width)/$width;

	}elseif(isset($_GET['h'])){

		$new_height = $_GET['h'];
		$new_width = ($width*$new_height)/$height;	
	}
	


	


	#gerando a a miniatura da imagem
	$image_p = imagecreatetruecolor($new_width, $new_height);
	
	// # Pega onde está a imagem e carrega	 
	if($extensao == ".jpg" || $extensao == ".jpeg"){ //
		$image = imagecreatefromjpeg($filename);	

	} if($extensao == ".gif"){ 
		$image = imagecreatefromgif($filename);

	} if($extensao == ".png" || $extensao == ".PNG"){ 
		$image = imagecreatefrompng($filename);	   
	}

	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);


	if($extensao == ".jpg" || $extensao == ".jpeg"){ 
	
	 	header("Content-type: image/jpeg");
	 	imagejpeg($image_p, null, 100);
	 	

	} if($extensao == ".gif"){ 

		header("Content-type: image/gif");
		imagegif($image_p);
		

	} if($extensao == ".png"  || $extensao == ".PNG"){ 

		header("Content-type: image/png");   
		imagepng($image_p);	
		
	}


	imagedestroy($image_p);
?>