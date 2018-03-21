<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GestorModel
//
// Pessoas vinculadas � �rea administrativa da institui��es e/ou unidades.
//
// Gerado em: 2018-03-16 07:24:22
// --------------------------------------------------------------------------------
class GestorModel extends BDConBaseModel
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
    protected $IdUnidade;                                                  // char(32), PK, FK, obrigat�rio - Identificador da Unidade
    protected $IdGestor;                                                   // char(32), PK, FK, obrigat�rio - Identificador do Gestor, assoaciado a uma pessoa
    protected $Cargo;                                                      // varchar(256), opcional - Cargo
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
        if ($name === "IdUnidade") { return $this->IdUnidade; }
        if ($name === "IdGestor") { return $this->IdGestor; }
        if ($name === "Cargo") { return $this->Cargo; }
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
        if($name === "IdUnidade") {
            $this->IdUnidade = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdUnidade;
        }
        if($name === "IdGestor") {
            $this->IdGestor = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGestor;
        }
        if($name === "Cargo") {
            $this->Cargo = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Cargo;
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
                        gestor
                    set 
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        idunidade = " . ( isset($this->IdUnidade) ? $this->o_db->quote($IdUnidade) : "null" ) . ",
                        idgestor = " . ( isset($this->IdGestor) ? $this->o_db->quote($IdGestor) : "null" ) . ",
                        cargo = " . ( isset($this->Cargo) ? $this->o_db->quote($Cargo) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and
                        idunidade" . ( isset($this->IdUnidade) ? " = " . $this->o_db->quote($this->IdUnidade) : " is null" ) . "
                        and
                        idgestor" . ( isset($this->IdGestor) ? " = " . $this->o_db->quote($this->IdGestor) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        gestor (
                            idinstituicao,
                            idunidade,
                            idgestor,
                            cargo,
                            status
                        )
                        values (
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->IdUnidade) ? $this->o_db->quote($IdUnidade) : "null" ) . ",
                            " . ( isset($this->IdGestor) ? $this->o_db->quote($IdGestor) : "null" ) . ",
                            " . ( isset($this->Cargo) ? $this->o_db->quote($Cargo) : "null" ) . ",
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
        if (isset($this->IdInstituicao) && isset($this->IdUnidade) && isset($this->IdGestor)) {
            $sql = "delete from 
                        gestor
                     where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and 
                        idunidade" . ( isset($this->IdUnidade) ? " = " . $this->o_db->quote($this->IdUnidade) : " is null" ) . "
                        and 
                        idgestor" . ( isset($this->IdGestor) ? " = " . $this->o_db->quote($this->IdGestor) : " is null" ) . ""; 
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
        string $IdUnidade = null,
        string $IdGestor = null,
        string $Cargo = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idinstituicao as IdInstituicao,
                    idunidade as IdUnidade,
                    idgestor as IdGestor,
                    cargo as Cargo,
                    status as Status
                from
                    gestor
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade = " . $this->o_db->quote("%" . $IdUnidade. "%") . ")"; }
        if (isset($IdGestor)) { $sql = $sql . " and (idgestor = " . $this->o_db->quote("%" . $IdGestor. "%") . ")"; }
        if (isset($Cargo)) { $sql = $sql . " and (cargo = " . $this->o_db->quote("%" . $Cargo. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_gestor = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GestorModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdUnidade = $obj_in->IdUnidade;
                $obj_out->IdGestor = $obj_in->IdGestor;
                $obj_out->Cargo = $obj_in->Cargo;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_gestor, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_gestor;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdGestor = null,
        string $Cargo = null,
        string $Status = null)
    {
        $sql = "select
                    idinstituicao as IdInstituicao,
                    idunidade as IdUnidade,
                    idgestor as IdGestor,
                    cargo as Cargo,
                    status as Status
                from
                    gestor
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade = " . $this->o_db->quote($IdUnidade) . ")"; }
        if (isset($IdGestor)) { $sql = $sql . " and (idgestor = " . $this->o_db->quote($IdGestor) . ")"; }
        if (isset($Cargo)) { $sql = $sql . " and (cargo = " . $this->o_db->quote($Cargo) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GestorModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdUnidade = $obj_in->IdUnidade;
                $obj_out->IdGestor = $obj_in->IdGestor;
                $obj_out->Cargo = $obj_in->Cargo;
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
    public function loadById( string $IdInstituicao, string $IdUnidade, string $IdGestor )
    {
        $obj = $this->objectByFields($IdInstituicao, $IdUnidade, $IdGestor, null, null);
        if ($obj) {
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->IdUnidade = $obj->IdUnidade;
            $this->IdGestor = $obj->IdGestor;
            $this->Cargo = $obj->Cargo;
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
        string $IdUnidade = null,
        string $IdGestor = null,
        string $Cargo = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    gestor
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade like " . $this->o_db->quote("%" . $IdUnidade . "%") . ")"; }
        if (isset($IdGestor)) { $sql = $sql . " and (idgestor like " . $this->o_db->quote("%" . $IdGestor . "%") . ")"; }
        if (isset($Cargo)) { $sql = $sql . " and (cargo like " . $this->o_db->quote("%" . $Cargo . "%") . ")"; }
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
