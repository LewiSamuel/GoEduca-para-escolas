<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GoEdDisciplinaModel
//
// Disciplinas disponibilizadas pela plataforma,, ser�o usados como sugest�es para as institui��es.
//
// Gerado em: 2018-03-16 07:24:29
// --------------------------------------------------------------------------------
class GoEdDisciplinaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdGoEdDisciplina = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdGoEdDisciplina;                                           // char(32), PK, obrigat�rio - Identifica��o da Disciplina GOEDUCA
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome da Disciplina
    protected $Sigla;                                                      // varchar(16), obrigat�rio - Sigla da Disciplina
    protected $Observacao;                                                 // text, opcional - Observa��es sobre a pessoa
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdGoEdDisciplina") { return $this->IdGoEdDisciplina; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Sigla") { return $this->Sigla; }
        if ($name === "Observacao") { return $this->Observacao; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdGoEdDisciplina") {
            $this->IdGoEdDisciplina = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdDisciplina;
        }
        if($name === "Nome") {
            $this->Nome = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Nome;
        }
        if($name === "Sigla") {
            $this->Sigla = substr($value, 0, 16);
            $this->_iSaved_ = false;
            return $this->Sigla;
        }
        if($name === "Observacao") {
            $this->Observacao = $value;
            $this->_iSaved_ = false;
            return $this->Observacao;
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
                        goeddisciplina
                    set 
                        idgoeddisciplina = " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        sigla = " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                        observacao = " . ( isset($this->Observacao) ? $this->o_db->quote($Observacao) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idgoeddisciplina" . ( isset($this->IdGoEdDisciplina) ? " = " . $this->o_db->quote($this->IdGoEdDisciplina) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        goeddisciplina (
                            idgoeddisciplina,
                            nome,
                            sigla,
                            observacao,
                            status
                        )
                        values (
                            " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                            " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                            " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                            " . ( isset($this->Observacao) ? $this->o_db->quote($Observacao) : "null" ) . ",
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
        if (isset($this->IdGoEdDisciplina)) {
            $sql = "delete from 
                        goeddisciplina
                     where 
                        idgoeddisciplina" . ( isset($this->IdGoEdDisciplina) ? " = " . $this->o_db->quote($this->IdGoEdDisciplina) : " is null" ) . ""; 
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
        string $IdGoEdDisciplina = null,
        string $Nome = null,
        string $Sigla = null,
        string $Observacao = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idgoeddisciplina as IdGoEdDisciplina,
                    nome as Nome,
                    sigla as Sigla,
                    observacao as Observacao,
                    status as Status
                from
                    goeddisciplina
                where 1 = 1";

        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote("%" . $IdGoEdDisciplina. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote("%" . $Sigla. "%") . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao = " . $this->o_db->quote("%" . $Observacao. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_goeddisciplina = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdDisciplinaModel();

                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Observacao = $obj_in->Observacao;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_goeddisciplina, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_goeddisciplina;
    }

    // --------------------------------------------------------------------------------
    // listBySigla
    // Lista os registros com base em Sigla
    // --------------------------------------------------------------------------------
    public function listBySigla(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $Sigla = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, null, $Sigla, null, null);
    }

    // --------------------------------------------------------------------------------
    // listByNome
    // Lista os registros com base em Nome
    // --------------------------------------------------------------------------------
    public function listByNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $Nome, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdGoEdDisciplina = null,
        string $Nome = null,
        string $Sigla = null,
        string $Observacao = null,
        string $Status = null)
    {
        $sql = "select
                    idgoeddisciplina as IdGoEdDisciplina,
                    nome as Nome,
                    sigla as Sigla,
                    observacao as Observacao,
                    status as Status
                from
                    goeddisciplina
                where 1 = 1";

        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote($IdGoEdDisciplina) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote($Sigla) . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao = " . $this->o_db->quote($Observacao) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdDisciplinaModel();

                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Observacao = $obj_in->Observacao;
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
    public function loadById( string $IdGoEdDisciplina )
    {
        $obj = $this->objectByFields($IdGoEdDisciplina, null, null, null, null);
        if ($obj) {
            $this->IdGoEdDisciplina = $obj->IdGoEdDisciplina;
            $this->Nome = $obj->Nome;
            $this->Sigla = $obj->Sigla;
            $this->Observacao = $obj->Observacao;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsSigla
    // Verifica se um registro existe com Sigla
    // --------------------------------------------------------------------------------
    public function existsSigla()
    {
        $obj = $this->objectByFields(null, null, $this->Sigla, null, null);
        return !($obj && ($obj->IdGoEdDisciplina === $this->IdGoEdDisciplina));
    }

    // --------------------------------------------------------------------------------
    // existsNome
    // Verifica se um registro existe com Nome
    // --------------------------------------------------------------------------------
    public function existsNome()
    {
        $obj = $this->objectByFields(null, $this->Nome, null, null, null);
        return !($obj && ($obj->IdGoEdDisciplina === $this->IdGoEdDisciplina));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdGoEdDisciplina = null,
        string $Nome = null,
        string $Sigla = null,
        string $Observacao = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    goeddisciplina
                where 1 = 1";

        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina like " . $this->o_db->quote("%" . $IdGoEdDisciplina . "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome like " . $this->o_db->quote("%" . $Nome . "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla like " . $this->o_db->quote("%" . $Sigla . "%") . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao like " . $this->o_db->quote("%" . $Observacao . "%") . ")"; }
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
    // --------------------------------------------------------------------------------
    // countBySigla
    // Conta os registros com base em Sigla
    // --------------------------------------------------------------------------------
    public function countBySigla(
        string $Sigla = null)
    {
        return $this->countBy(null, null, $Sigla, null, null);
    }

    // --------------------------------------------------------------------------------
    // countByNome
    // Conta os registros com base em Nome
    // --------------------------------------------------------------------------------
    public function countByNome(
        string $Nome = null)
    {
        return $this->countBy(null, $Nome, null, null, null);
    }

}

?>
