<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// PesquisaJogoModel
// Classe para pesquisa de jogos.
//
// Gerado em: 2018-03-09 07:03:24
// --------------------------------------------------------------------------------
class PesquisaJogoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe e criada
    function __construct() {
        parent::__construct();
    }

    // --------------------------------------------------------------------------------
    // listByNome
    // Pesquisa um jogo pelo nome, disciplina, tema ou topico
    // --------------------------------------------------------------------------------
    public function listByNome(int $pagenumber = 1, int $pagesize   = 25, string $Texto = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }
		
        $sql = "
				select
					jogo.idjogo as IdJogo,
					jogo.titulo as Titulo,
					goeddisciplina.nome as Disciplina,
					goedtema.nome as Tema,
					goedtopico.nome as Topico,
					group_concat(distinct jogoplataforma.nome order by jogoplataforma.nome desc separator '|') as Plataformas
				from
					jogo
					join jogo_goedtema
						on jogo_goedtema.idjogo = jogo.idjogo
					join goeddisciplina
						 on goeddisciplina.idgoeddisciplina = jogo_goedtema.idgoeddisciplina
					join goedtema
						 on goedtema.idgoeddisciplina = jogo_goedtema.idgoeddisciplina
						and goedtema.idgoedtema = jogo_goedtema.idgoedtema
					join goedtopico
						 on goedtopico.idgoeddisciplina = jogo_goedtema.idgoeddisciplina
						and goedtopico.idgoedtema = jogo_goedtema.idgoedtema
						and goedtopico.idgoedtopico = jogo_goedtema.idgoedtopico
					left join jogo_jogoplataforma
						on jogo_jogoplataforma.idjogo = jogo.idjogo    
					left join jogoplataforma
						on jogoplataforma.idjogoplataforma = jogoplataforma.idjogoplataforma
				where
					jogo.titulo like " . $this->o_db->quote("%" . $Texto . "%") . "
					or
					goeddisciplina.nome like " . $this->o_db->quote("%" . $Texto . "%") . "
					or
					goedtema.nome like " . $this->o_db->quote("%" . $Texto . "%") . "
					or
					goedtopico.nome like " . $this->o_db->quote("%" . $Texto . "%") . "
				group by
					1, 2, 3, 4, 5
				order by
					jogo.titulo,
					goeddisciplina.nome,
					goedtema.nome,
					goedtopico.nome
		";

        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue ";


        $array_result = array();

        // lê os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                array_push($array_result, $obj_in);
            }
        }

        // retorna a lista de objetos como array
        return $array_result;
    }
	
    // --------------------------------------------------------------------------------
    // countByNome
    // Conta os jogos com a descricao do texto
    // --------------------------------------------------------------------------------
    public function countByNome(string $Texto = null)
    {
        $sql = "
				select
					count(*) as Quantity
				from
					jogo
					join jogo_goedtema
						on jogo_goedtema.idjogo = jogo.idjogo
					join goeddisciplina
						 on goeddisciplina.idgoeddisciplina = jogo_goedtema.idgoeddisciplina
					join goedtema
						 on goedtema.idgoeddisciplina = jogo_goedtema.idgoeddisciplina
						and goedtema.idgoedtema = jogo_goedtema.idgoedtema
					join goedtopico
						 on goedtopico.idgoeddisciplina = jogo_goedtema.idgoeddisciplina
						and goedtopico.idgoedtema = jogo_goedtema.idgoedtema
						and goedtopico.idgoedtopico = jogo_goedtema.idgoedtopico
				where
					jogo.titulo like " . $this->o_db->quote("%" . $Texto . "%") . "
					or
					goeddisciplina.nome like " . $this->o_db->quote("%" . $Texto . "%") . "
					or
					goedtema.nome like " . $this->o_db->quote("%" . $Texto . "%") . "
					or
					goedtopico.nome like " . $this->o_db->quote("%" . $Texto . "%") . "
		";

        // lê os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            if ($obj_in = $resultset->fetchObject()) {
                return $obj_in->Quantity;
            }
        }

        return 0;
    }
	
}

?>
