<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// TurnoModel
//
// Turnos de aulas dispon�veis nas institui��es.
//
// Gerado em: 2018-03-16 07:25:36
// --------------------------------------------------------------------------------
class TurnoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdTurno = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdInstituicao;                                              // char(32), PK, FK, obrigat�rio - Identificador da Institui��o
    protected $IdTurno;                                                    // char(32), PK, obrigat�rio - Identificador do Turno
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome do Turno
    protected $Sigla;                                                      // varchar(32), obrigat�rio - Sigla do Turno
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
        if ($name === "IdTurno") { return $this->IdTurno; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Sigla") { return $this->Sigla; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdInstituicao") {
            $this->IdInstituicao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdInstituicao;
        }
        if($name === "IdTurno") {
            $this->IdTurno = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdTurno;
        }
        if($name === "Nome") {
            $this->Nome = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Nome;
        }
        if($name === "Sigla") {
            $this->Sigla = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->Sigla;
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
                        turno
                    set 
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        idturno = " . ( isset($this->IdTurno) ? $this->o_db->quote($IdTurno) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        sigla = " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and
                        idturno" . ( isset($this->IdTurno) ? " = " . $this->o_db->quote($this->IdTurno) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        turno (
                            idinstituicao,
                            idturno,
                            nome,
                            sigla,
                            status
                        )
                        values (
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->IdTurno) ? $this->o_db->quote($IdTurno) : "null" ) . ",
                            " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                            " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
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
        if (isset($this->IdInstituicao) && isset($this->IdTurno)) {
            $sql = "delete from 
                        turno
                     where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and 
                        idturno" . ( isset($this->IdTurno) ? " = " . $this->o_db->quote($this->IdTurno) : " is null" ) . ""; 
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
        string $IdInstituicao = null,
        string $IdTurno = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idinstituicao as IdInstituicao,
                    idturno as IdTurno,
                    nome as Nome,
                    sigla as Sigla,
                    status as Status
                from
                    turno
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($IdTurno)) { $sql = $sql . " and (idturno = " . $this->o_db->quote("%" . $IdTurno. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote("%" . $Sigla. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_turno = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new TurnoModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdTurno = $obj_in->IdTurno;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_turno, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_turno;
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
        return $this->listBy($pagenumber, $pagesize, $IdInstituicao, null, $Nome, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdInstituicao = null,
        string $IdTurno = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null)
    {
        $sql = "select
                    idinstituicao as IdInstituicao,
                    idturno as IdTurno,
                    nome as Nome,
                    sigla as Sigla,
                    status as Status
                from
                    turno
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($IdTurno)) { $sql = $sql . " and (idturno = " . $this->o_db->quote($IdTurno) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote($Sigla) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new TurnoModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdTurno = $obj_in->IdTurno;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
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
    public function loadById( string $IdInstituicao, string $IdTurno )
    {
        $obj = $this->objectByFields($IdInstituicao, $IdTurno, null, null, null);
        if ($obj) {
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->IdTurno = $obj->IdTurno;
            $this->Nome = $obj->Nome;
            $this->Sigla = $obj->Sigla;
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
        $obj = $this->objectByFields($this->IdInstituicao, null, $this->Nome, null, null);
        return !($obj && ($obj->IdInstituicao === $this->IdInstituicao) && ($obj->IdTurno === $this->IdTurno));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdInstituicao = null,
        string $IdTurno = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    turno
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($IdTurno)) { $sql = $sql . " and (idturno like " . $this->o_db->quote("%" . $IdTurno . "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome like " . $this->o_db->quote("%" . $Nome . "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla like " . $this->o_db->quote("%" . $Sigla . "%") . ")"; }
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
        return $this->countBy($IdInstituicao, null, $Nome, null, null);
    }

}

?>
