<?php
	
	// Incluindo arquivo de configuração
	// require_once (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"])."/escolas/config.php";


	function superHeader($headerLocation){
		header("location: $headerLocation");
	}

	if(session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	//funções de conteúdo

	function LimparUrl($str){
	    $str = strtolower(utf8_decode($str)); $i=1;
	    $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
	    $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
	    while($i>0) $str = str_replace('--','-',$str,$i);
	    if (substr($str, -1) == '-') $str = substr($str, 0, -1);
	    return $str;
	}

	function ResizeEncode($str){
		$str = str_replace("=", "@", $str);
		return $str;
	}

	function LimparQuery($q){
		$origem = array("'","\"");
		$destino = "";
		$aqui = $q;
		$q = str_replace($origem, $destino, $aqui);
		$q = strtolower($q);
		return $q;
	}

	//
	// 	VERIFICA SE ESTA LOGADO
	// 	RETORNA TRUE OU FALSE
	//

	function Logado($tipo = ''){
		if(isset($_SESSION['pessoaID'])){
			return true;
		}else{
			return false;
		}
	}


	//
	// 	CASO ESTEJA LOGADO INSERE NAS VARIAVEIS
	//	AS INFORMAÇÕES DO USUARIO
	//

	$logado = Logado();
	if($logado){
		$pessoaID 											= $_SESSION['pessoaID'];
		$pessoaEmail 										= $_SESSION['email'];
		$pessoaNome 										= $_SESSION['nome'];
		$pessoaNivelAcesso									= $_SESSION['nivelacesso'];
		$pessoaCodigoAcesso									= $_SESSION['codigoacesso'];
		$pessoaIdInstituicao								= $_SESSION['IdInstituicao'];
	}



	




?>