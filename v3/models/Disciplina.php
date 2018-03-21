<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// DisciplinaModel
//
// Disciplinas disponibilizadas na institui��o.
//
// Gerado em: 2018-03-16 07:24:12
// --------------------------------------------------------------------------------
class DisciplinaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdDisciplina = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdDisciplina;                                               // char(32), PK, obrigat�rio - Identificador da disciplina
    protected $IdInstituicao;                                              // char(32), PK, FK, obrigat�rio - Identificador da Institui��o
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome da disciplina
    protected $Sigla;                                                      // varchar(16), obrigat�rio - Sigla da disciplina
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
        if ($name === "IdDisciplina") { return $this->IdDisciplina; }
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
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
        if($name === "IdDisciplina") {
            $this->IdDisciplina = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdDisciplina;
        }
        if($name === "IdInstituicao") {
            $this->IdInstituicao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdInstituicao;
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
                        disciplina
                    set 
                        iddisciplina = " . ( isset($this->IdDisciplina) ? $this->o_db->quote($IdDisciplina) : "null" ) . ",
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        sigla = " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                        observacao = " . ( isset($this->Observacao) ? $this->o_db->quote($Observacao) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        iddisciplina" . ( isset($this->IdDisciplina) ? " = " . $this->o_db->quote($this->IdDisciplina) : " is null" ) . "
                        and
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        disciplina (
                            iddisciplina,
                            idinstituicao,
                            nome,
                            sigla,
                            observacao,
                            status
                        )
                        values (
                            " . ( isset($this->IdDisciplina) ? $this->o_db->quote($IdDisciplina) : "null" ) . ",
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
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
        if (isset($this->IdDisciplina) && isset($this->IdInstituicao)) {
            $sql = "delete from 
                        disciplina
                     where 
                        iddisciplina" . ( isset($this->IdDisciplina) ? " = " . $this->o_db->quote($this->IdDisciplina) : " is null" ) . "
                        and 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . ""; 
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
        string $IdDisciplina = null,
        string $IdInstituicao = null,
        string $Nome = null,
        string $Sigla = null,
        string $Observacao = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    iddisciplina as IdDisciplina,
                    idinstituicao as IdInstituicao,
                    nome as Nome,
                    sigla as Sigla,
                    observacao as Observacao,
                    status as Status
                from
                    disciplina
                where 1 = 1";

        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina = " . $this->o_db->quote("%" . $IdDisciplina. "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote("%" . $Sigla. "%") . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao = " . $this->o_db->quote("%" . $Observacao. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_disciplina = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new DisciplinaModel();

                $obj_out->IdDisciplina = $obj_in->IdDisciplina;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Observacao = $obj_in->Observacao;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_disciplina, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_disciplina;
    }

    // --------------------------------------------------------------------------------
    // listByIdInstituicaoNome
    // Lista os registros com base em IdInstituicao, Nome
    // --------------------------------------------------------------------------------
    public function listByIdInstituicaoNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdInstituicao = null,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdInstituicao, $Nome, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // listByIdInstituicaoSigla
    // Lista os registros com base em IdInstituicao, Sigla
    // --------------------------------------------------------------------------------
    public function listByIdInstituicaoSigla(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdInstituicao = null,
        string $Sigla = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdInstituicao, null, $Sigla, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdDisciplina = null,
        string $IdInstituicao = null,
        string $Nome = null,
        string $Sigla = null,
        string $Observacao = null,
        string $Status = null)
    {
        $sql = "select
                    iddisciplina as IdDisciplina,
                    idinstituicao as IdInstituicao,
                    nome as Nome,
                    sigla as Sigla,
                    observacao as Observacao,
                    status as Status
                from
                    disciplina
                where 1 = 1";

        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina = " . $this->o_db->quote($IdDisciplina) . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote($Sigla) . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao = " . $this->o_db->quote($Observacao) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new DisciplinaModel();

                $obj_out->IdDisciplina = $obj_in->IdDisciplina;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
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
    public function loadById( string $IdDisciplina, string $IdInstituicao )
    {
        $obj = $this->objectByFields($IdDisciplina, $IdInstituicao, null, null, null, null);
        if ($obj) {
            $this->IdDisciplina = $obj->IdDisciplina;
            $this->IdInstituicao = $obj->IdInstituicao;
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
    // existsIdInstituicaoNome
    // Verifica se um registro existe com IdInstituicao, Nome
    // --------------------------------------------------------------------------------
    public function existsIdInstituicaoNome()
    {
        $obj = $this->objectByFields(null, $this->IdInstituicao, $this->Nome, null, null, null);
        return !($obj && ($obj->IdDisciplina === $this->IdDisciplina) && ($obj->IdInstituicao === $this->IdInstituicao));
    }

    // --------------------------------------------------------------------------------
    // existsIdInstituicaoSigla
    // Verifica se um registro existe com IdInstituicao, Sigla
    // --------------------------------------------------------------------------------
    public function existsIdInstituicaoSigla()
    {
        $obj = $this->objectByFields(null, $this->IdInstituicao, null, $this->Sigla, null, null);
        return !($obj && ($obj->IdDisciplina === $this->IdDisciplina) && ($obj->IdInstituicao === $this->IdInstituicao));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdDisciplina = null,
        string $IdInstituicao = null,
        string $Nome = null,
        string $Sigla = null,
        string $Observacao = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    disciplina
                where 1 = 1";

        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina like " . $this->o_db->quote("%" . $IdDisciplina . "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
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
    // countByIdInstituicaoNome
    // Conta os registros com base em IdInstituicao, Nome
    // --------------------------------------------------------------------------------
    public function countByIdInstituicaoNome(
        string $IdInstituicao = null,
        string $Nome = null)
    {
        return $this->countBy(null, $IdInstituicao, $Nome, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // countByIdInstituicaoSigla
    // Conta os registros com base em IdInstituicao, Sigla
    // --------------------------------------------------------------------------------
    public function countByIdInstituicaoSigla(
        string $IdInstituicao = null,
        string $Sigla = null)
    {
        return $this->countBy(null, $IdInstituicao, null, $Sigla, null, null);
    }

}

?>
