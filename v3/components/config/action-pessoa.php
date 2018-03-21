<?php
	// Incluindo arquivo de configuração
	require_once (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"])."/escolas/config.php";

	require_once $APP_PATH_ROOT."/components/config/action-global.php";

	if (session_status() == PHP_SESSION_NONE){
	    session_start();
	}

	//
	// 	PEGA INFORMACOES DO USUARIO E FAZ LOGIN
	//

	function FazerLoginSchool(){

		global $APP_PATH_VERSION;

		$o_login = new LoginModel();
		$o_login->CodigoAcesso = $_POST['acesso'];
		$o_login->Senha = $_POST['senha'];

		if($o_login->login()){

			$o_pessoa = new PessoaModel();
			$o_pessoa->loadById($o_login->Id);

			if(isset($o_login->IdInstituicao)){
				//
				// 	 GOEDUCA ADM NAO POSSUI INSTITUIÇÃO
				//
				$o_instituicao = new InstituicaoModel();
				$o_instituicao->loadById($o_login->IdInstituicao);
			}

			$_SESSION['pessoaID'] = $o_pessoa->IdPessoa;
			$_SESSION['nome'] = $o_pessoa->Nome;
			$_SESSION['email'] = $o_pessoa->Email;
			$_SESSION['nivelacesso'] = $o_login->TipoLogin;
			$_SESSION['codigoacesso'] = $o_login->CodigoAcesso;
			$_SESSION['IdInstituicao'] = $o_login->IdInstituicao;
	
			header("location: $APP_PATH_VERSION");
			
		}else{

			header("location: $APP_PATH_VERSION/?AcessoNegado");
		}
	}
	
	isset($_POST['func']) ? $func=$_POST['func'] : $func = "";

	if($func == "FazerLoginSchool"){
		// chamadas para pessoa
		FazerLoginSchool();
	}

?>