<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// JogoGoEdTemaModel
//
// Define quais temas e/ou t�picos de uma disciplina o jogo aborda.
//
// Gerado em: 2018-03-16 07:25:08
// --------------------------------------------------------------------------------
class JogoGoEdTemaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();

    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdJogo;                                                     // char(32), PK, FK, obrigat�rio - Identifica��o do Jogo
    protected $IdGoEdDisciplina;                                           // char(32), PK, FK, obrigat�rio - Identifica��o da Disciplina GOEDUCA
    protected $IdGoEdTema;                                                 // char(32), PK, FK, obrigat�rio - Identifica��o do Tema dentro uma Disciplina GOEDUCA
    protected $IdGoEdTopico;                                               // char(32), PK, FK, obrigat�rio - Identifica��o do T�pico de um Tema dentro uma Disciplina GOEDUCA

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdJogo") { return $this->IdJogo; }
        if ($name === "IdGoEdDisciplina") { return $this->IdGoEdDisciplina; }
        if ($name === "IdGoEdTema") { return $this->IdGoEdTema; }
        if ($name === "IdGoEdTopico") { return $this->IdGoEdTopico; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdJogo") {
            $this->IdJogo = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdJogo;
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
                        jogo_goedtema
                    set 
                        idjogo = " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                        idgoeddisciplina = " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                        idgoedtema = " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                        idgoedtopico = " . ( isset($this->IdGoEdTopico) ? $this->o_db->quote($IdGoEdTopico) : "null" ) . "
                    where 
                        idjogo" . ( isset($this->IdJogo) ? " = " . $this->o_db->quote($this->IdJogo) : " is null" ) . "
                        and
                        idgoeddisciplina" . ( isset($this->IdGoEdDisciplina) ? " = " . $this->o_db->quote($this->IdGoEdDisciplina) : " is null" ) . "
                        and
                        idgoedtema" . ( isset($this->IdGoEdTema) ? " = " . $this->o_db->quote($this->IdGoEdTema) : " is null" ) . "
                        and
                        idgoedtopico" . ( isset($this->IdGoEdTopico) ? " = " . $this->o_db->quote($this->IdGoEdTopico) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        jogo_goedtema (
                            idjogo,
                            idgoeddisciplina,
                            idgoedtema,
                            idgoedtopico
                        )
                        values (
                            " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                            " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                            " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                            " . ( isset($this->IdGoEdTopico) ? $this->o_db->quote($IdGoEdTopico) : "null" ) . "
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
        if (isset($this->IdJogo) && isset($this->IdGoEdDisciplina) && isset($this->IdGoEdTema) && isset($this->IdGoEdTopico)) {
            $sql = "delete from 
                        jogo_goedtema
                     where 
                        idjogo" . ( isset($this->IdJogo) ? " = " . $this->o_db->quote($this->IdJogo) : " is null" ) . "
                        and 
                        idgoeddisciplina" . ( isset($this->IdGoEdDisciplina) ? " = " . $this->o_db->quote($this->IdGoEdDisciplina) : " is null" ) . "
                        and 
                        idgoedtema" . ( isset($this->IdGoEdTema) ? " = " . $this->o_db->quote($this->IdGoEdTema) : " is null" ) . "
                        and 
                        idgoedtopico" . ( isset($this->IdGoEdTopico) ? " = " . $this->o_db->quote($this->IdGoEdTopico) : " is null" ) . ""; 
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
        string $IdJogo = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idjogo as IdJogo,
                    idgoeddisciplina as IdGoEdDisciplina,
                    idgoedtema as IdGoEdTema,
                    idgoedtopico as IdGoEdTopico
                from
                    jogo_goedtema
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote("%" . $IdJogo. "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote("%" . $IdGoEdDisciplina. "%") . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote("%" . $IdGoEdTema. "%") . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico = " . $this->o_db->quote("%" . $IdGoEdTopico. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_jogo_goedtema = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new JogoGoEdTemaModel();

                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->IdGoEdTopico = $obj_in->IdGoEdTopico;

                $obj_out->_isSaved_ = true;

                array_push($array_jogo_goedtema, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_jogo_goedtema;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdJogo = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null)
    {
        $sql = "select
                    idjogo as IdJogo,
                    idgoeddisciplina as IdGoEdDisciplina,
                    idgoedtema as IdGoEdTema,
                    idgoedtopico as IdGoEdTopico
                from
                    jogo_goedtema
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote($IdJogo) . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote($IdGoEdDisciplina) . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote($IdGoEdTema) . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico = " . $this->o_db->quote($IdGoEdTopico) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new JogoGoEdTemaModel();

                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->IdGoEdTopico = $obj_in->IdGoEdTopico;

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
    public function loadById( string $IdJogo, string $IdGoEdDisciplina, string $IdGoEdTema, string $IdGoEdTopico )
    {
        $obj = $this->objectByFields($IdJogo, $IdGoEdDisciplina, $IdGoEdTema, $IdGoEdTopico);
        if ($obj) {
            $this->IdJogo = $obj->IdJogo;
            $this->IdGoEdDisciplina = $obj->IdGoEdDisciplina;
            $this->IdGoEdTema = $obj->IdGoEdTema;
            $this->IdGoEdTopico = $obj->IdGoEdTopico;

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
        string $IdJogo = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    jogo_goedtema
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo like " . $this->o_db->quote("%" . $IdJogo . "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina like " . $this->o_db->quote("%" . $IdGoEdDisciplina . "%") . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema like " . $this->o_db->quote("%" . $IdGoEdTema . "%") . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico like " . $this->o_db->quote("%" . $IdGoEdTopico . "%") . ")"; }

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
