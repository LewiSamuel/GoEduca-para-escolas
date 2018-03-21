<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GoEdTemaModel
//
// Segmenta��o de temas de uma disciplina, ser� usado para cadastramento dos jogos.
//
// Gerado em: 2018-03-16 07:24:46
// --------------------------------------------------------------------------------
class GoEdTemaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdGoEdTema = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdGoEdTema;                                                 // char(32), PK, obrigat�rio - Identifica��o do Tema dentro uma Disciplina GOEDUCA
    protected $IdGoEdDisciplina;                                           // char(32), PK, FK, obrigat�rio - Identifica��o da Disciplina GOEDUCA
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome da Disciplina
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdGoEdTema") { return $this->IdGoEdTema; }
        if ($name === "IdGoEdDisciplina") { return $this->IdGoEdDisciplina; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdGoEdTema") {
            $this->IdGoEdTema = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdTema;
        }
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
                        goedtema
                    set 
                        idgoedtema = " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                        idgoeddisciplina = " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idgoedtema" . ( isset($this->IdGoEdTema) ? " = " . $this->o_db->quote($this->IdGoEdTema) : " is null" ) . "
                        and
                        idgoeddisciplina" . ( isset($this->IdGoEdDisciplina) ? " = " . $this->o_db->quote($this->IdGoEdDisciplina) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        goedtema (
                            idgoedtema,
                            idgoeddisciplina,
                            nome,
                            status
                        )
                        values (
                            " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                            " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                            " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
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
        if (isset($this->IdGoEdTema) && isset($this->IdGoEdDisciplina)) {
            $sql = "delete from 
                        goedtema
                     where 
                        idgoedtema" . ( isset($this->IdGoEdTema) ? " = " . $this->o_db->quote($this->IdGoEdTema) : " is null" ) . "
                        and 
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
        string $IdGoEdTema = null,
        string $IdGoEdDisciplina = null,
        string $Nome = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idgoedtema as IdGoEdTema,
                    idgoeddisciplina as IdGoEdDisciplina,
                    nome as Nome,
                    status as Status
                from
                    goedtema
                where 1 = 1";

        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote("%" . $IdGoEdTema. "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote("%" . $IdGoEdDisciplina. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_goedtema = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdTemaModel();

                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_goedtema, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_goedtema;
    }

    // --------------------------------------------------------------------------------
    // listByIdGoEdDisciplinaNome
    // Lista os registros com base em IdGoEdDisciplina, Nome
    // --------------------------------------------------------------------------------
    public function listByIdGoEdDisciplinaNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdGoEdDisciplina = null,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdGoEdDisciplina, $Nome, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdGoEdTema = null,
        string $IdGoEdDisciplina = null,
        string $Nome = null,
        string $Status = null)
    {
        $sql = "select
                    idgoedtema as IdGoEdTema,
                    idgoeddisciplina as IdGoEdDisciplina,
                    nome as Nome,
                    status as Status
                from
                    goedtema
                where 1 = 1";

        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote($IdGoEdTema) . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote($IdGoEdDisciplina) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdTemaModel();

                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->Nome = $obj_in->Nome;
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
    public function loadById( string $IdGoEdTema, string $IdGoEdDisciplina )
    {
        $obj = $this->objectByFields($IdGoEdTema, $IdGoEdDisciplina, null, null);
        if ($obj) {
            $this->IdGoEdTema = $obj->IdGoEdTema;
            $this->IdGoEdDisciplina = $obj->IdGoEdDisciplina;
            $this->Nome = $obj->Nome;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdGoEdDisciplinaNome
    // Verifica se um registro existe com IdGoEdDisciplina, Nome
    // --------------------------------------------------------------------------------
    public function existsIdGoEdDisciplinaNome()
    {
        $obj = $this->objectByFields(null, $this->IdGoEdDisciplina, $this->Nome, null);
        return !($obj && ($obj->IdGoEdTema === $this->IdGoEdTema) && ($obj->IdGoEdDisciplina === $this->IdGoEdDisciplina));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdGoEdTema = null,
        string $IdGoEdDisciplina = null,
        string $Nome = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    goedtema
                where 1 = 1";

        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema like " . $this->o_db->quote("%" . $IdGoEdTema . "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina like " . $this->o_db->quote("%" . $IdGoEdDisciplina . "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome like " . $this->o_db->quote("%" . $Nome . "%") . ")"; }
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
    // countByIdGoEdDisciplinaNome
    // Conta os registros com base em IdGoEdDisciplina, Nome
    // --------------------------------------------------------------------------------
    public function countByIdGoEdDisciplinaNome(
        string $IdGoEdDisciplina = null,
        string $Nome = null)
    {
        return $this->countBy(null, $IdGoEdDisciplina, $Nome, null);
    }

}

?>
