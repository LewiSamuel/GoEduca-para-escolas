<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// JogojogoGeneroModel
//
// Estabelece os g�neros aos quais os jogos pertencem.
//
// Gerado em: 2018-03-16 07:25:10
// --------------------------------------------------------------------------------
class JogojogoGeneroModel extends BDConBaseModel
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
    protected $IdJogoGenero;                                               // char(32), PK, FK, obrigat�rio - Identifica��o do G�nero do Jogo

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdJogo") { return $this->IdJogo; }
        if ($name === "IdJogoGenero") { return $this->IdJogoGenero; }
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
        if($name === "IdJogoGenero") {
            $this->IdJogoGenero = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdJogoGenero;
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
                        jogo_jogogenero
                    set 
                        idjogo = " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                        idjogogenero = " . ( isset($this->IdJogoGenero) ? $this->o_db->quote($IdJogoGenero) : "null" ) . "
                    where 
                        idjogo" . ( isset($this->IdJogo) ? " = " . $this->o_db->quote($this->IdJogo) : " is null" ) . "
                        and
                        idjogogenero" . ( isset($this->IdJogoGenero) ? " = " . $this->o_db->quote($this->IdJogoGenero) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        jogo_jogogenero (
                            idjogo,
                            idjogogenero
                        )
                        values (
                            " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                            " . ( isset($this->IdJogoGenero) ? $this->o_db->quote($IdJogoGenero) : "null" ) . "
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
        if (isset($this->IdJogo) && isset($this->IdJogoGenero)) {
            $sql = "delete from 
                        jogo_jogogenero
                     where 
                        idjogo" . ( isset($this->IdJogo) ? " = " . $this->o_db->quote($this->IdJogo) : " is null" ) . "
                        and 
                        idjogogenero" . ( isset($this->IdJogoGenero) ? " = " . $this->o_db->quote($this->IdJogoGenero) : " is null" ) . ""; 
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
        string $IdJogoGenero = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idjogo as IdJogo,
                    idjogogenero as IdJogoGenero
                from
                    jogo_jogogenero
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote("%" . $IdJogo. "%") . ")"; }
        if (isset($IdJogoGenero)) { $sql = $sql . " and (idjogogenero = " . $this->o_db->quote("%" . $IdJogoGenero. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_jogo_jogogenero = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new JogojogoGeneroModel();

                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->IdJogoGenero = $obj_in->IdJogoGenero;

                $obj_out->_isSaved_ = true;

                array_push($array_jogo_jogogenero, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_jogo_jogogenero;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdJogo = null,
        string $IdJogoGenero = null)
    {
        $sql = "select
                    idjogo as IdJogo,
                    idjogogenero as IdJogoGenero
                from
                    jogo_jogogenero
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote($IdJogo) . ")"; }
        if (isset($IdJogoGenero)) { $sql = $sql . " and (idjogogenero = " . $this->o_db->quote($IdJogoGenero) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new JogojogoGeneroModel();

                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->IdJogoGenero = $obj_in->IdJogoGenero;

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
    public function loadById( string $IdJogo, string $IdJogoGenero )
    {
        $obj = $this->objectByFields($IdJogo, $IdJogoGenero);
        if ($obj) {
            $this->IdJogo = $obj->IdJogo;
            $this->IdJogoGenero = $obj->IdJogoGenero;

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
        string $IdJogoGenero = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    jogo_jogogenero
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo like " . $this->o_db->quote("%" . $IdJogo . "%") . ")"; }
        if (isset($IdJogoGenero)) { $sql = $sql . " and (idjogogenero like " . $this->o_db->quote("%" . $IdJogoGenero . "%") . ")"; }

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
