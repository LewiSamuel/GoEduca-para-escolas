<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GoEdQuestaoModel
//
// Quest�es utilizadas no decorrer das partidas.
//
// Gerado em: 2018-03-16 07:24:42
// --------------------------------------------------------------------------------
class GoEdQuestaoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdGoEdQuestao = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdGoEdQuestao;                                              // char(32), PK, obrigat�rio - Identifica��o da Quest�o GOEDUCA
    protected $IdGoEdDisciplina;                                           // char(32), FK, obrigat�rio - Identifica��o da Disciplina GOEDUCA
    protected $IdGoEdTema;                                                 // char(32), FK, obrigat�rio - Identifica��o do Tema dentro uma Disciplina GOEDUCA
    protected $IdGoEdTopico;                                               // char(32), FK, opcional - Identifica��o do T�pico de um Tema dentro uma Disciplina GOEDUCA
    protected $Descricao;                                                  // text, opcional - Descri��o da Quest�o
    protected $Detalhamento;                                               // text, opcional - Detalhamento da Quest�o
    protected $TipomIdia = 'Texto';                                        // varchar(64), obrigat�rio - Indica o tipo de m�dia da quest�o
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdGoEdQuestao") { return $this->IdGoEdQuestao; }
        if ($name === "IdGoEdDisciplina") { return $this->IdGoEdDisciplina; }
        if ($name === "IdGoEdTema") { return $this->IdGoEdTema; }
        if ($name === "IdGoEdTopico") { return $this->IdGoEdTopico; }
        if ($name === "Descricao") { return $this->Descricao; }
        if ($name === "Detalhamento") { return $this->Detalhamento; }
        if ($name === "TipomIdia") { return $this->TipomIdia; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdGoEdQuestao") {
            $this->IdGoEdQuestao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdQuestao;
        }
        if($name === "IdGoEdDisciplina") {
            $this->IdGoEdDisciplina = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdDisciplina;
        }
        if($name === "IdGoEdTema") {
            $this->IdGoEdTema = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdTema;
        }
        if($name === "IdGoEdTopico") {
            $this->IdGoEdTopico = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdTopico;
        }
        if($name === "Descricao") {
            $this->Descricao = $value;
            $this->_iSaved_ = false;
            return $this->Descricao;
        }
        if($name === "Detalhamento") {
            $this->Detalhamento = $value;
            $this->_iSaved_ = false;
            return $this->Detalhamento;
        }
        if($name === "TipomIdia") {
            $this->TipomIdia = substr($value, 0, 64);
            $this->_iSaved_ = false;
            return $this->TipomIdia;
        }
        if($name === "Status") {
            $this->Status = substr($value, 0, 8);
            $this->_iSaved_ = false;
            return $this->Status;
        }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // save
    // Salva o objeto
    // --------------------------------------------------------------------------------
    public function save()
    {
        if (!$this->_iSaved_) { return true; }

        $regexists = $this->existsPk();

        if ($regexists) {
            $sql = "update 
                        goedquestao
                    set 
                        idgoedquestao = " . ( isset($this->IdGoEdQuestao) ? $this->o_db->quote($IdGoEdQuestao) : "null" ) . ",
                        idgoeddisciplina = " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                        idgoedtema = " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                        idgoedtopico = " . ( isset($this->IdGoEdTopico) ? $this->o_db->quote($IdGoEdTopico) : "null" ) . ",
                        descricao = " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                        detalhamento = " . ( isset($this->Detalhamento) ? $this->o_db->quote($Detalhamento) : "null" ) . ",
                        tipomidia = " . ( isset($this->TipomIdia) ? $this->o_db->quote($TipomIdia) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idgoedquestao" . ( isset($this->IdGoEdQuestao) ? " = " . $this->o_db->quote($this->IdGoEdQuestao) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        goedquestao (
                            idgoedquestao,
                            idgoeddisciplina,
                            idgoedtema,
                            idgoedtopico,
                            descricao,
                            detalhamento,
                            tipomidia,
                            status
                        )
                        values (
                            " . ( isset($this->IdGoEdQuestao) ? $this->o_db->quote($IdGoEdQuestao) : "null" ) . ",
                            " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                            " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                            " . ( isset($this->IdGoEdTopico) ? $this->o_db->quote($IdGoEdTopico) : "null" ) . ",
                            " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                            " . ( isset($this->Detalhamento) ? $this->o_db->quote($Detalhamento) : "null" ) . ",
                            " . ( isset($this->TipomIdia) ? $this->o_db->quote($TipomIdia) : "null" ) . ",
                            " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                        );";
        }

        if ($this->o_db->exec($sql) > 0) {
            $this->_isSaved_ = true;
            return true;
        }

        return false;
    }

    // --------------------------------------------------------------------------------
    // remove
    // Remove o objeto com base na chave prim�ria
    // --------------------------------------------------------------------------------
    public function remove()
    {
        if (isset($this->IdGoEdQuestao)) {
            $sql = "delete from 
                        goedquestao
                     where 
                        idgoedquestao" . ( isset($this->IdGoEdQuestao) ? " = " . $this->o_db->quote($this->IdGoEdQuestao) : " is null" ) . ""; 
            if ($this->o_db->exec($sql) > 0) {
                $this->_isSaved_ = false;
                return true;
            }
        }
        return false;
    }

    // --------------------------------------------------------------------------------
    // listBy
    // Lista os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function listBy(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdGoEdQuestao = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null,
        string $Descricao = null,
        string $Detalhamento = null,
        string $TipomIdia = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idgoedquestao as IdGoEdQuestao,
                    idgoeddisciplina as IdGoEdDisciplina,
                    idgoedtema as IdGoEdTema,
                    idgoedtopico as IdGoEdTopico,
                    descricao as Descricao,
                    detalhamento as Detalhamento,
                    tipomidia as TipomIdia,
                    status as Status
                from
                    goedquestao
                where 1 = 1";

        if (isset($IdGoEdQuestao)) { $sql = $sql . " and (idgoedquestao = " . $this->o_db->quote("%" . $IdGoEdQuestao. "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote("%" . $IdGoEdDisciplina. "%") . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote("%" . $IdGoEdTema. "%") . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico = " . $this->o_db->quote("%" . $IdGoEdTopico. "%") . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote("%" . $Descricao. "%") . ")"; }
        if (isset($Detalhamento)) { $sql = $sql . " and (detalhamento = " . $this->o_db->quote("%" . $Detalhamento. "%") . ")"; }
        if (isset($TipomIdia)) { $sql = $sql . " and (tipomidia = " . $this->o_db->quote("%" . $TipomIdia. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_goedquestao = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdQuestaoModel();

                $obj_out->IdGoEdQuestao = $obj_in->IdGoEdQuestao;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->IdGoEdTopico = $obj_in->IdGoEdTopico;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->Detalhamento = $obj_in->Detalhamento;
                $obj_out->TipomIdia = $obj_in->TipomIdia;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_goedquestao, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_goedquestao;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdGoEdQuestao = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null,
        string $Descricao = null,
        string $Detalhamento = null,
        string $TipomIdia = null,
        string $Status = null)
    {
        $sql = "select
                    idgoedquestao as IdGoEdQuestao,
                    idgoeddisciplina as IdGoEdDisciplina,
                    idgoedtema as IdGoEdTema,
                    idgoedtopico as IdGoEdTopico,
                    descricao as Descricao,
                    detalhamento as Detalhamento,
                    tipomidia as TipomIdia,
                    status as Status
                from
                    goedquestao
                where 1 = 1";

        if (isset($IdGoEdQuestao)) { $sql = $sql . " and (idgoedquestao = " . $this->o_db->quote($IdGoEdQuestao) . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote($IdGoEdDisciplina) . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote($IdGoEdTema) . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico = " . $this->o_db->quote($IdGoEdTopico) . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote($Descricao) . ")"; }
        if (isset($Detalhamento)) { $sql = $sql . " and (detalhamento = " . $this->o_db->quote($Detalhamento) . ")"; }
        if (isset($TipomIdia)) { $sql = $sql . " and (tipomidia = " . $this->o_db->quote($TipomIdia) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdQuestaoModel();

                $obj_out->IdGoEdQuestao = $obj_in->IdGoEdQuestao;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->IdGoEdTopico = $obj_in->IdGoEdTopico;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->Detalhamento = $obj_in->Detalhamento;
                $obj_out->TipomIdia = $obj_in->TipomIdia;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                return $obj_out;
            }
        }

        // retorna null se n�o for poss�vel recuperar o objeto
        return null;
    }

    // --------------------------------------------------------------------------------
    // loadById
    // Recupera um objeto com base na chave prim�ria
    // --------------------------------------------------------------------------------
    public function loadById( string $IdGoEdQuestao )
    {
        $obj = $this->objectByFields($IdGoEdQuestao, null, null, null, null, null, null, null);
        if ($obj) {
            $this->IdGoEdQuestao = $obj->IdGoEdQuestao;
            $this->IdGoEdDisciplina = $obj->IdGoEdDisciplina;
            $this->IdGoEdTema = $obj->IdGoEdTema;
            $this->IdGoEdTopico = $obj->IdGoEdTopico;
            $this->Descricao = $obj->Descricao;
            $this->Detalhamento = $obj->Detalhamento;
            $this->TipomIdia = $obj->TipomIdia;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdGoEdQuestao = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null,
        string $Descricao = null,
        string $Detalhamento = null,
        string $TipomIdia = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    goedquestao
                where 1 = 1";

        if (isset($IdGoEdQuestao)) { $sql = $sql . " and (idgoedquestao like " . $this->o_db->quote("%" . $IdGoEdQuestao . "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina like " . $this->o_db->quote("%" . $IdGoEdDisciplina . "%") . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema like " . $this->o_db->quote("%" . $IdGoEdTema . "%") . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico like " . $this->o_db->quote("%" . $IdGoEdTopico . "%") . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao like " . $this->o_db->quote("%" . $Descricao . "%") . ")"; }
        if (isset($Detalhamento)) { $sql = $sql . " and (detalhamento like " . $this->o_db->quote("%" . $Detalhamento . "%") . ")"; }
        if (isset($TipomIdia)) { $sql = $sql . " and (tipomidia like " . $this->o_db->quote("%" . $TipomIdia . "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status like " . $this->o_db->quote("%" . $Status . "%") . ")"; }

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            if ($obj_in = $resultset->fetchObject()) {
                return $obj_in->Quantity;
            }
        }

        // retorna a lista de objetos como array
        return 0;
    }
}

?>
