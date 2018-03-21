<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// JogoPlataformaModel
//
// Especif�ca a plataforma na qual os jogos est�o dipon�veis (web, celular, tablet, computador, etc).
//
// Gerado em: 2018-03-16 07:25:03
// --------------------------------------------------------------------------------
class JogoPlataformaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdJogoPlataforma = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdJogoPlataforma;                                           // char(32), PK, obrigat�rio - Identifica��o da Plataforma do Jogo
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome da Plataforma do Jogo
    protected $Sigla;                                                      // varchar(32), obrigat�rio - Sigla da Plataforma do Jogo
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdJogoPlataforma") { return $this->IdJogoPlataforma; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Sigla") { return $this->Sigla; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdJogoPlataforma") {
            $this->IdJogoPlataforma = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdJogoPlataforma;
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
                        jogoplataforma
                    set 
                        idjogoplataforma = " . ( isset($this->IdJogoPlataforma) ? $this->o_db->quote($IdJogoPlataforma) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        sigla = " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idjogoplataforma" . ( isset($this->IdJogoPlataforma) ? " = " . $this->o_db->quote($this->IdJogoPlataforma) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        jogoplataforma (
                            idjogoplataforma,
                            nome,
                            sigla,
                            status
                        )
                        values (
                            " . ( isset($this->IdJogoPlataforma) ? $this->o_db->quote($IdJogoPlataforma) : "null" ) . ",
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
        if (isset($this->IdJogoPlataforma)) {
            $sql = "delete from 
                        jogoplataforma
                     where 
                        idjogoplataforma" . ( isset($this->IdJogoPlataforma) ? " = " . $this->o_db->quote($this->IdJogoPlataforma) : " is null" ) . ""; 
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
        string $IdJogoPlataforma = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idjogoplataforma as IdJogoPlataforma,
                    nome as Nome,
                    sigla as Sigla,
                    status as Status
                from
                    jogoplataforma
                where 1 = 1";

        if (isset($IdJogoPlataforma)) { $sql = $sql . " and (idjogoplataforma = " . $this->o_db->quote("%" . $IdJogoPlataforma. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote("%" . $Sigla. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_jogoplataforma = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new JogoPlataformaModel();

                $obj_out->IdJogoPlataforma = $obj_in->IdJogoPlataforma;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_jogoplataforma, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_jogoplataforma;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdJogoPlataforma = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null)
    {
        $sql = "select
                    idjogoplataforma as IdJogoPlataforma,
                    nome as Nome,
                    sigla as Sigla,
                    status as Status
                from
                    jogoplataforma
                where 1 = 1";

        if (isset($IdJogoPlataforma)) { $sql = $sql . " and (idjogoplataforma = " . $this->o_db->quote($IdJogoPlataforma) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote($Sigla) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new JogoPlataformaModel();

                $obj_out->IdJogoPlataforma = $obj_in->IdJogoPlataforma;
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
    public function loadById( string $IdJogoPlataforma )
    {
        $obj = $this->objectByFields($IdJogoPlataforma, null, null, null);
        if ($obj) {
            $this->IdJogoPlataforma = $obj->IdJogoPlataforma;
            $this->Nome = $obj->Nome;
            $this->Sigla = $obj->Sigla;
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
        string $IdJogoPlataforma = null,
        string $Nome = null,
        string $Sigla = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    jogoplataforma
                where 1 = 1";

        if (isset($IdJogoPlataforma)) { $sql = $sql . " and (idjogoplataforma like " . $this->o_db->quote("%" . $IdJogoPlataforma . "%") . ")"; }
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
}

?>
