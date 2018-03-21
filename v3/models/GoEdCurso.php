<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GoEdCursoModel
//
// Cursos disponibilizados pela plataforma, ser�o usados como sugest�es para as institui��es.
//
// Gerado em: 2018-03-16 07:24:24
// --------------------------------------------------------------------------------
class GoEdCursoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdGoEdCurso = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdGoEdCurso;                                                // char(32), PK, obrigat�rio - Identifica��o do Curso GOEDUCA
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome do Curso
    protected $Sigla;                                                      // varchar(32), obrigat�rio - Sigla do Curso
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdGoEdCurso") { return $this->IdGoEdCurso; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Sigla") { return $this->Sigla; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdGoEdCurso") {
            $this->IdGoEdCurso = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdCurso;
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
                        goedcurso
                    set 
                        idgoedcurso = " . ( isset($this->IdGoEdCurso) ? $this->o_db->quote($IdGoEdCurso) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        sigla = " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idgoedcurso" . ( isset($this->IdGoEdCurso) ? " = " . $this->o_db->quote($this->IdGoEdCurso) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        goedcurso (
                            idgoedcurso,
                            nome,
                            sigla,
                            status
                        )
                        values (
                            " . ( isset($this->IdGoEdCurso) ? $this->o_db->quote($IdGoEdCurso) : "null" ) . ",
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
        if (isset($this->IdGoEdCurso)) {
            $sql = "delete from 
                        goedcurso
                     where 
                        idgoedcurso" . ( isset($this->IdGoEdCurso) ? " = " . $this->o_db->quote($this->IdGoEdCurso) : " is null" ) . ""; 
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
        string $IdGoEdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idgoedcurso as IdGoEdCurso,
                    nome as Nome,
                    sigla as Sigla,
                    status as Status
                from
                    goedcurso
                where 1 = 1";

        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso = " . $this->o_db->quote("%" . $IdGoEdCurso. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote("%" . $Sigla. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_goedcurso = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdCursoModel();

                $obj_out->IdGoEdCurso = $obj_in->IdGoEdCurso;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_goedcurso, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_goedcurso;
    }

    // --------------------------------------------------------------------------------
    // listByIdGoEdCurso
    // Lista os registros com base em IdGoEdCurso
    // --------------------------------------------------------------------------------
    public function listByIdGoEdCurso(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdGoEdCurso = null)
    {
        return $this->listBy($pagenumber, $pagesize, $IdGoEdCurso, null, null, null);
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
        return $this->listBy($pagenumber, $pagesize, null, $Nome, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdGoEdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null)
    {
        $sql = "select
                    idgoedcurso as IdGoEdCurso,
                    nome as Nome,
                    sigla as Sigla,
                    status as Status
                from
                    goedcurso
                where 1 = 1";

        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso = " . $this->o_db->quote($IdGoEdCurso) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote($Sigla) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdCursoModel();

                $obj_out->IdGoEdCurso = $obj_in->IdGoEdCurso;
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
    public function loadById( string $IdGoEdCurso )
    {
        $obj = $this->objectByFields($IdGoEdCurso, null, null, null);
        if ($obj) {
            $this->IdGoEdCurso = $obj->IdGoEdCurso;
            $this->Nome = $obj->Nome;
            $this->Sigla = $obj->Sigla;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdGoEdCurso
    // Verifica se um registro existe com IdGoEdCurso
    // --------------------------------------------------------------------------------
    public function existsIdGoEdCurso()
    {
        $obj = $this->objectByFields($this->IdGoEdCurso, null, null, null);
        return !($obj && ($obj->IdGoEdCurso === $this->IdGoEdCurso));
    }

    // --------------------------------------------------------------------------------
    // existsNome
    // Verifica se um registro existe com Nome
    // --------------------------------------------------------------------------------
    public function existsNome()
    {
        $obj = $this->objectByFields(null, $this->Nome, null, null);
        return !($obj && ($obj->IdGoEdCurso === $this->IdGoEdCurso));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdGoEdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    goedcurso
                where 1 = 1";

        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso like " . $this->o_db->quote("%" . $IdGoEdCurso . "%") . ")"; }
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
    // countByIdGoEdCurso
    // Conta os registros com base em IdGoEdCurso
    // --------------------------------------------------------------------------------
    public function countByIdGoEdCurso(
        string $IdGoEdCurso = null)
    {
        return $this->countBy($IdGoEdCurso, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // countByNome
    // Conta os registros com base em Nome
    // --------------------------------------------------------------------------------
    public function countByNome(
        string $Nome = null)
    {
        return $this->countBy(null, $Nome, null, null);
    }

}

?>
