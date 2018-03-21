<?php
       
       // Incluindo arquivo de configuração
	require_once (substr($_SERVER["DOCUMENT_ROOT"], -1) === "/" ? substr($_SERVER["DOCUMENT_ROOT"], 0, strlen($_SERVER["DOCUMENT_ROOT"]) - 1) : $_SERVER["DOCUMENT_ROOT"])."/escolas/config.php";

       $JogoId = $_POST["JogoId"];
        $IdInstituicao = $_POST['IdInstituicao'];
        

    	$o_ranking = new RankingModel;
        $o_ranking->IdInstituicao = $IdInstituicao;
        $o_ranking->IdJogo = $JogoId;

        $result = $o_ranking->RankingInstituicao();


        for($j=0; $j < count($result); $j++){ 

            $DataPonto = $result[$j]->DataPartida;
            $NomeJogador = $result[$j]->Nome;
            $PontosJogador = $result[$j]->Pontos;

            $k = $j+1;

            include $APP_PATH_ROOT."/components/RankingAluno1.phtml";
        }

?>