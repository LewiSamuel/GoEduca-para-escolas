<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GoEdTopicoModel
//
// Segmenta��o de t�picos dentro dos temas de uma disciplina, ser� usado para cadastramento dos jogos.
//
// Gerado em: 2018-03-16 07:24:49
// --------------------------------------------------------------------------------
class GoEdTopicoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdGoEdTopico = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdGoEdTopico;                                               // char(32), PK, obrigat�rio - Identifica��o do T�pico de um Tema dentro uma Disciplina GOEDUCA
    protected $IdGoEdDisciplina;                                           // char(32), PK, FK, obrigat�rio - Identifica��o da Disciplina GOEDUCA
    protected $IdGoEdTema;                                                 // char(32), PK, FK, obrigat�rio - Identifica��o do Tema dentro uma Disciplina GOEDUCA
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome do T�pico
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdGoEdTopico") { return $this->IdGoEdTopico; }
        if ($name === "IdGoEdDisciplina") { return $this->IdGoEdDisciplina; }
        if ($name === "IdGoEdTema") { return $this->IdGoEdTema; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdGoEdTopico") {
            $this->IdGoEdTopico = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdTopico;
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
                        goedtopico
                    set 
                        idgoedtopico = " . ( isset($this->IdGoEdTopico) ? $this->o_db->quote($IdGoEdTopico) : "null" ) . ",
                        idgoeddisciplina = " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                        idgoedtema = " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idgoedtopico" . ( isset($this->IdGoEdTopico) ? " = " . $this->o_db->quote($this->IdGoEdTopico) : " is null" ) . "
                        and
                        idgoeddisciplina" . ( isset($this->IdGoEdDisciplina) ? " = " . $this->o_db->quote($this->IdGoEdDisciplina) : " is null" ) . "
                        and
                        idgoedtema" . ( isset($this->IdGoEdTema) ? " = " . $this->o_db->quote($this->IdGoEdTema) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        goedtopico (
                            idgoedtopico,
                            idgoeddisciplina,
                            idgoedtema,
                            nome,
                            status
                        )
                        values (
                            " . ( isset($this->IdGoEdTopico) ? $this->o_db->quote($IdGoEdTopico) : "null" ) . ",
                            " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                            " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
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
        if (isset($this->IdGoEdTopico) && isset($this->IdGoEdDisciplina) && isset($this->IdGoEdTema)) {
            $sql = "delete from 
                        goedtopico
                     where 
                        idgoedtopico" . ( isset($this->IdGoEdTopico) ? " = " . $this->o_db->quote($this->IdGoEdTopico) : " is null" ) . "
                        and 
                        idgoeddisciplina" . ( isset($this->IdGoEdDisciplina) ? " = " . $this->o_db->quote($this->IdGoEdDisciplina) : " is null" ) . "
                        and 
                        idgoedtema" . ( isset($this->IdGoEdTema) ? " = " . $this->o_db->quote($this->IdGoEdTema) : " is null" ) . ""; 
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
        string $IdGoEdTopico = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $Nome = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idgoedtopico as IdGoEdTopico,
                    idgoeddisciplina as IdGoEdDisciplina,
                    idgoedtema as IdGoEdTema,
                    nome as Nome,
                    status as Status
                from
                    goedtopico
                where 1 = 1";

        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico = " . $this->o_db->quote("%" . $IdGoEdTopico. "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote("%" . $IdGoEdDisciplina. "%") . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote("%" . $IdGoEdTema. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_goedtopico = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdTopicoModel();

                $obj_out->IdGoEdTopico = $obj_in->IdGoEdTopico;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_goedtopico, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_goedtopico;
    }

    // --------------------------------------------------------------------------------
    // listByIdGoEdDisciplinaIdGoEdTemaNome
    // Lista os registros com base em IdGoEdDisciplina, IdGoEdTema, Nome
    // --------------------------------------------------------------------------------
    public function listByIdGoEdDisciplinaIdGoEdTemaNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdGoEdDisciplina, $IdGoEdTema, $Nome, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdGoEdTopico = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $Nome = null,
        string $Status = null)
    {
        $sql = "select
                    idgoedtopico as IdGoEdTopico,
                    idgoeddisciplina as IdGoEdDisciplina,
                    idgoedtema as IdGoEdTema,
                    nome as Nome,
                    status as Status
                from
                    goedtopico
                where 1 = 1";

        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico = " . $this->o_db->quote($IdGoEdTopico) . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote($IdGoEdDisciplina) . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote($IdGoEdTema) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdTopicoModel();

                $obj_out->IdGoEdTopico = $obj_in->IdGoEdTopico;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
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
    public function loadById( string $IdGoEdTopico, string $IdGoEdDisciplina, string $IdGoEdTema )
    {
        $obj = $this->objectByFields($IdGoEdTopico, $IdGoEdDisciplina, $IdGoEdTema, null, null);
        if ($obj) {
            $this->IdGoEdTopico = $obj->IdGoEdTopico;
            $this->IdGoEdDisciplina = $obj->IdGoEdDisciplina;
            $this->IdGoEdTema = $obj->IdGoEdTema;
            $this->Nome = $obj->Nome;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdGoEdDisciplinaIdGoEdTemaNome
    // Verifica se um registro existe com IdGoEdDisciplina, IdGoEdTema, Nome
    // --------------------------------------------------------------------------------
    public function existsIdGoEdDisciplinaIdGoEdTemaNome()
    {
        $obj = $this->objectByFields(null, $this->IdGoEdDisciplina, $this->IdGoEdTema, $this->Nome, null);
        return !($obj && ($obj->IdGoEdTopico === $this->IdGoEdTopico) && ($obj->IdGoEdDisciplina === $this->IdGoEdDisciplina) && ($obj->IdGoEdTema === $this->IdGoEdTema));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdGoEdTopico = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $Nome = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    goedtopico
                where 1 = 1";

        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico like " . $this->o_db->quote("%" . $IdGoEdTopico . "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina like " . $this->o_db->quote("%" . $IdGoEdDisciplina . "%") . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema like " . $this->o_db->quote("%" . $IdGoEdTema . "%") . ")"; }
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
    // countByIdGoEdDisciplinaIdGoEdTemaNome
    // Conta os registros com base em IdGoEdDisciplina, IdGoEdTema, Nome
    // --------------------------------------------------------------------------------
    public function countByIdGoEdDisciplinaIdGoEdTemaNome(
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $Nome = null)
    {
        return $this->countBy(null, $IdGoEdDisciplina, $IdGoEdTema, $Nome, null);
    }

}

?>
