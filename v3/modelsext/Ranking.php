<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// RankingModel
// Classe para realização do Ranking.
//
// Gerado em: 2018-03-09 07:03:24
// --------------------------------------------------------------------------------
class RankingModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe e criada
    function __construct() {
        parent::__construct();
		$this->TamanhoRanking = 10;
    }

    private $IdJogo;
	private $IdInstituicao;
	private $IdPessoa;
    private $TamanhoRanking;  

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdJogo") { return $this->IdJogo; }
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
        if ($name === "IdPessoa") { return $this->IdPessoa; }
        if ($name === "TamanhoRanking") { return $this->TamanhoRanking; }
        throw new Exception( $name . ' => Propriedade inválida.');
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdJogo") { $this->IdJogo = $value; return $value; }
        if($name === "IdInstituicao") { $this->IdInstituicao = $value; return $value; }
        if($name === "IdPessoa") { $this->IdPessoa = $value; return $value; }
        if($name === "TamanhoRanking") { $this->TamanhoRanking = $value; return $value; }
        throw new Exception( $name . ' => Propriedade inválida.');
    }

    public function RankingInstituicao()
    {
		// valida o tamanho do ranking
		// if (is_null($this->TamanhoRanking) || !is_numeric($this->TamanhoRanking) || ($this->TamanhoRanking < 0) { $this->TamanhoRanking = 10; }
		$this->TamanhoRanking = ($this->TamanhoRanking > 100) ? 100 : $this->TamanhoRanking;
		
		// valida o id do jogo e da instituicao
        if (is_null($this->IdJogo) || is_null($this->IdInstituicao)) {
            return array();
        }
		
        // Ranking para Pessoa
        $sql = "select
					pessoa.nome as Nome,
					date_format(partida.datahorapartida, '%d-%m-%Y') as DataPartida,
					partida.pontos as Pontos
				from
					partida
					join pessoa
						 on pessoa.idpessoa = partida.idpessoa
				where
					partida.idinstituicao = " . $this->o_db->quote($this->IdInstituicao) . "
					and
					partida.idjogo = " . $this->o_db->quote($this->IdJogo) . "	
				order by
					partida.pontos desc, partida.datahorapartida
				limit " . $this->TamanhoRanking . "";
				 
        $array_result = array();

        // lê os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                array_push($array_result, $obj_in);
            }
        }

        // retorna o ranking como array
        return $array_result;
    }
}

?>
