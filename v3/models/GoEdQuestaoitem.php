<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GoEdQuestaoItemModel
//
// Itens que formam as quest�es dispon�veis na plataforma.
//
// Gerado em: 2018-03-16 07:24:44
// --------------------------------------------------------------------------------
class GoEdQuestaoItemModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();

    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdGoEdQuestaoItem;                                          // char(32), obrigat�rio - Identifica��o do Item da Quest�o GOEDUCA
    protected $IdGoEdQuestao;                                              // char(32), PK, FK, obrigat�rio - Identifica��o da Quest�o GOEDUCA
    protected $Item;                                                       // varchar(32), obrigat�rio - Identifica��o do item (A, B, C, D e E)
    protected $Resposta;                                                   // tinyint(1), obrigat�rio - Indica se o item � Certo ou Errado, cada quest�o s� tem um item certo TRUE
    protected $Descricao;                                                  // text, opcional - Descri��o do item
    protected $Explicacao;                                                 // text, opcional - Explica��o do item, porque ele � certo ou errado
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdGoEdQuestaoItem") { return $this->IdGoEdQuestaoItem; }
        if ($name === "IdGoEdQuestao") { return $this->IdGoEdQuestao; }
        if ($name === "Item") { return $this->Item; }
        if ($name === "Resposta") { return $this->Resposta; }
        if ($name === "Descricao") { return $this->Descricao; }
        if ($name === "Explicacao") { return $this->Explicacao; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdGoEdQuestaoItem") {
            $this->IdGoEdQuestaoItem = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdQuestaoItem;
        }
        if($name === "IdGoEdQuestao") {
            $this->IdGoEdQuestao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdQuestao;
        }
        if($name === "Item") {
            $this->Item = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->Item;
        }
        if($name === "Resposta") {
            $this->Resposta = (is_numeric($value) ? (bool) $value : null);
            $this->_iSaved_ = false;
            return $this->Resposta;
        }
        if($name === "Descricao") {
            $this->Descricao = $value;
            $this->_iSaved_ = false;
            return $this->Descricao;
        }
        if($name === "Explicacao") {
            $this->Explicacao = $value;
            $this->_iSaved_ = false;
            return $this->Explicacao;
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
                        goedquestaoitem
                    set 
                        idgoedquestaoitem = " . ( isset($this->IdGoEdQuestaoItem) ? $this->o_db->quote($IdGoEdQuestaoItem) : "null" ) . ",
                        idgoedquestao = " . ( isset($this->IdGoEdQuestao) ? $this->o_db->quote($IdGoEdQuestao) : "null" ) . ",
                        item = " . ( isset($this->Item) ? $this->o_db->quote($Item) : "null" ) . ",
                        resposta = " . ( isset($this->Resposta) ? $this->o_db->quote($this->Resposta) : "null" ) . ",
                        descricao = " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                        explicacao = " . ( isset($this->Explicacao) ? $this->o_db->quote($Explicacao) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idgoedquestao" . ( isset($this->IdGoEdQuestao) ? " = " . $this->o_db->quote($this->IdGoEdQuestao) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        goedquestaoitem (
                            idgoedquestaoitem,
                            idgoedquestao,
                            item,
                            resposta,
                            descricao,
                            explicacao,
                            status
                        )
                        values (
                            " . ( isset($this->IdGoEdQuestaoItem) ? $this->o_db->quote($IdGoEdQuestaoItem) : "null" ) . ",
                            " . ( isset($this->IdGoEdQuestao) ? $this->o_db->quote($IdGoEdQuestao) : "null" ) . ",
                            " . ( isset($this->Item) ? $this->o_db->quote($Item) : "null" ) . ",
                            " . ( isset($this->Resposta) ? $this->o_db->quote($this->Resposta) : "null" ) . ",
                            " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                            " . ( isset($this->Explicacao) ? $this->o_db->quote($Explicacao) : "null" ) . ",
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
        if (isset($this->IdGoEdQuestao)) {
            $sql = "delete from 
                        goedquestaoitem
                     where 
                        idgoedquestao" . ( isset($this->IdGoEdQuestao) ? " = " . $this->o_db->quote($this->IdGoEdQuestao) : " is null" ) . ""; 
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
        string $IdGoEdQuestaoItem = null,
        string $IdGoEdQuestao = null,
        string $Item = null,
        bool $Resposta = null,
        string $Descricao = null,
        string $Explicacao = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idgoedquestaoitem as IdGoEdQuestaoItem,
                    idgoedquestao as IdGoEdQuestao,
                    item as Item,
                    resposta as Resposta,
                    descricao as Descricao,
                    explicacao as Explicacao,
                    status as Status
                from
                    goedquestaoitem
                where 1 = 1";

        if (isset($IdGoEdQuestaoItem)) { $sql = $sql . " and (idgoedquestaoitem = " . $this->o_db->quote("%" . $IdGoEdQuestaoItem. "%") . ")"; }
        if (isset($IdGoEdQuestao)) { $sql = $sql . " and (idgoedquestao = " . $this->o_db->quote("%" . $IdGoEdQuestao. "%") . ")"; }
        if (isset($Item)) { $sql = $sql . " and (item = " . $this->o_db->quote("%" . $Item. "%") . ")"; }
        if (isset($Resposta)) { $sql = $sql . " and (resposta = " . Resposta . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote("%" . $Descricao. "%") . ")"; }
        if (isset($Explicacao)) { $sql = $sql . " and (explicacao = " . $this->o_db->quote("%" . $Explicacao. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_goedquestaoitem = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdQuestaoItemModel();

                $obj_out->IdGoEdQuestaoItem = $obj_in->IdGoEdQuestaoItem;
                $obj_out->IdGoEdQuestao = $obj_in->IdGoEdQuestao;
                $obj_out->Item = $obj_in->Item;
                $obj_out->Resposta = $obj_in->Resposta;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->Explicacao = $obj_in->Explicacao;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_goedquestaoitem, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_goedquestaoitem;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdGoEdQuestaoItem = null,
        string $IdGoEdQuestao = null,
        string $Item = null,
        bool $Resposta = null,
        string $Descricao = null,
        string $Explicacao = null,
        string $Status = null)
    {
        $sql = "select
                    idgoedquestaoitem as IdGoEdQuestaoItem,
                    idgoedquestao as IdGoEdQuestao,
                    item as Item,
                    resposta as Resposta,
                    descricao as Descricao,
                    explicacao as Explicacao,
                    status as Status
                from
                    goedquestaoitem
                where 1 = 1";

        if (isset($IdGoEdQuestaoItem)) { $sql = $sql . " and (idgoedquestaoitem = " . $this->o_db->quote($IdGoEdQuestaoItem) . ")"; }
        if (isset($IdGoEdQuestao)) { $sql = $sql . " and (idgoedquestao = " . $this->o_db->quote($IdGoEdQuestao) . ")"; }
        if (isset($Item)) { $sql = $sql . " and (item = " . $this->o_db->quote($Item) . ")"; }
        if (isset($Resposta)) { $sql = $sql . " and (resposta = " . Resposta . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote($Descricao) . ")"; }
        if (isset($Explicacao)) { $sql = $sql . " and (explicacao = " . $this->o_db->quote($Explicacao) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdQuestaoItemModel();

                $obj_out->IdGoEdQuestaoItem = $obj_in->IdGoEdQuestaoItem;
                $obj_out->IdGoEdQuestao = $obj_in->IdGoEdQuestao;
                $obj_out->Item = $obj_in->Item;
                $obj_out->Resposta = $obj_in->Resposta;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->Explicacao = $obj_in->Explicacao;
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
    public function loadById( string $IdGoEdQuestao )
    {
        $obj = $this->objectByFields(null, $IdGoEdQuestao, null, null, null, null, null);
        if ($obj) {
            $this->IdGoEdQuestaoItem = $obj->IdGoEdQuestaoItem;
            $this->IdGoEdQuestao = $obj->IdGoEdQuestao;
            $this->Item = $obj->Item;
            $this->Resposta = $obj->Resposta;
            $this->Descricao = $obj->Descricao;
            $this->Explicacao = $obj->Explicacao;
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
        string $IdGoEdQuestaoItem = null,
        string $IdGoEdQuestao = null,
        string $Item = null,
        bool $Resposta = null,
        string $Descricao = null,
        string $Explicacao = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    goedquestaoitem
                where 1 = 1";

        if (isset($IdGoEdQuestaoItem)) { $sql = $sql . " and (idgoedquestaoitem like " . $this->o_db->quote("%" . $IdGoEdQuestaoItem . "%") . ")"; }
        if (isset($IdGoEdQuestao)) { $sql = $sql . " and (idgoedquestao like " . $this->o_db->quote("%" . $IdGoEdQuestao . "%") . ")"; }
        if (isset($Item)) { $sql = $sql . " and (item like " . $this->o_db->quote("%" . $Item . "%") . ")"; }
        if (isset($Resposta)) { $sql = $sql . " and (resposta = " . Resposta . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao like " . $this->o_db->quote("%" . $Descricao . "%") . ")"; }
        if (isset($Explicacao)) { $sql = $sql . " and (explicacao like " . $this->o_db->quote("%" . $Explicacao . "%") . ")"; }
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
