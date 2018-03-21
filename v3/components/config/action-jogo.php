<?php

	// Incluindo arquivo de configuração
	require_once (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"])."/escolas/config.php";

	require_once $APP_PATH_ROOT."/components/config/action-global.php";

	function imprimirJogo(int $pagenumber = 1, int $pagesize   = 25, string $Texto = null){

		global $APP_PATH_ROOT;
		global $APP_PATH_VERSION;

		$o_pesquisaJogo = new PesquisaJogoModel();
		$ret = $o_pesquisaJogo->listByNome($pagenumber, $pagesize, $Texto);


		for ($i = 0; $i <= (count($ret)-1); $i++){

			$JogoId = $ret[$i]->IdJogo;
			$JogoTitulo = $ret[$i]->Titulo;
			$JogoDisciplina = $ret[$i]->Disciplina;
			$JogoTema = $ret[$i]->Tema;
			$JogoTopico = $ret[$i]->Topico;
			$JogoPlataformas = $ret[$i]->Plataformas;

			include $APP_PATH_ROOT."/components/jogo.phtml";
		}

	}

?>