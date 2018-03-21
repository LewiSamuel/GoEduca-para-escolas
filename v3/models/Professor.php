<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// ProfessorModel
//
// Professores vinculados � institui��o.
//
// Gerado em: 2018-03-16 07:25:20
// --------------------------------------------------------------------------------
class ProfessorModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();

    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdInstituicao;                                              // char(32), PK, FK, obrigat�rio - Identificador da Institui��o
    protected $IdProfessor;                                                // char(32), PK, FK, obrigat�rio - Identificador do Professor, assoaciado a uma pessoa
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
        if ($name === "IdProfessor") { return $this->IdProfessor; }
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
        if($name === "IdProfessor") {
            $this->IdProfessor = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdProfessor;
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
                        professor
                    set 
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        idprofessor = " . ( isset($this->IdProfessor) ? $this->o_db->quote($IdProfessor) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and
                        idprofessor" . ( isset($this->IdProfessor) ? " = " . $this->o_db->quote($this->IdProfessor) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        professor (
                            idinstituicao,
                            idprofessor,
                            status
                        )
                        values (
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->IdProfessor) ? $this->o_db->quote($IdProfessor) : "null" ) . ",
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
        if (isset($this->IdInstituicao) && isset($this->IdProfessor)) {
            $sql = "delete from 
                        professor
                     where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and 
                        idprofessor" . ( isset($this->IdProfessor) ? " = " . $this->o_db->quote($this->IdProfessor) : " is null" ) . ""; 
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
        string $IdProfessor = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idinstituicao as IdInstituicao,
                    idprofessor as IdProfessor,
                    status as Status
                from
                    professor
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor = " . $this->o_db->quote("%" . $IdProfessor. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_professor = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new ProfessorModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdProfessor = $obj_in->IdProfessor;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_professor, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_professor;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdInstituicao = null,
        string $IdProfessor = null,
        string $Status = null)
    {
        $sql = "select
                    idinstituicao as IdInstituicao,
                    idprofessor as IdProfessor,
                    status as Status
                from
                    professor
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor = " . $this->o_db->quote($IdProfessor) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new ProfessorModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdProfessor = $obj_in->IdProfessor;
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
    public function loadById( string $IdInstituicao, string $IdProfessor )
    {
        $obj = $this->objectByFields($IdInstituicao, $IdProfessor, null);
        if ($obj) {
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->IdProfessor = $obj->IdProfessor;
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
        string $IdInstituicao = null,
        string $IdProfessor = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    professor
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor like " . $this->o_db->quote("%" . $IdProfessor . "%") . ")"; }
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
