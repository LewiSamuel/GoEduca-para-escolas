<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// JogoModel
//
// Jogos dispon�veis na platatorma.
//
// Gerado em: 2018-03-16 07:24:56
// --------------------------------------------------------------------------------
class JogoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdJogo = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdJogo;                                                     // char(32), PK, obrigat�rio - Identifica��o do Jogo
    protected $IdJogoProdutor;                                             // char(32), FK, obrigat�rio - Identifica��o do Produtor de Jogos
    protected $Titulo;                                                     // varchar(256), obrigat�rio - T�tulo do Jogo
    protected $Descricao;                                                  // text, opcional - Descri��o do Jogo
    protected $Versao;                                                     // varchar(128), opcional - Vers�o do Jogo
    protected $FaixaEtariaInicial;                                         // smallint(6), opcional - Faixa Et�ria Inicial sugerida para o jogo
    protected $FaixaEtariaFinal;                                           // smallint(6), opcional - Faixa Et�ria Final sugerida para o jogo
    protected $ModoOperacao = 'ONLINE';                                    // varchar(8), obrigat�rio - Modo de opera��o do jogo (online e/ou offline)
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdJogo") { return $this->IdJogo; }
        if ($name === "IdJogoProdutor") { return $this->IdJogoProdutor; }
        if ($name === "Titulo") { return $this->Titulo; }
        if ($name === "Descricao") { return $this->Descricao; }
        if ($name === "Versao") { return $this->Versao; }
        if ($name === "FaixaEtariaInicial") { return $this->FaixaEtariaInicial; }
        if ($name === "FaixaEtariaFinal") { return $this->FaixaEtariaFinal; }
        if ($name === "ModoOperacao") { return $this->ModoOperacao; }
        if ($name === "Status") { return $this->Status; }
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
        if($name === "IdJogoProdutor") {
            $this->IdJogoProdutor = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdJogoProdutor;
        }
        if($name === "Titulo") {
            $this->Titulo = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Titulo;
        }
        if($name === "Descricao") {
            $this->Descricao = $value;
            $this->_iSaved_ = false;
            return $this->Descricao;
        }
        if($name === "Versao") {
            $this->Versao = substr($value, 0, 128);
            $this->_iSaved_ = false;
            return $this->Versao;
        }
        if($name === "FaixaEtariaInicial") {
            $this->FaixaEtariaInicial = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->FaixaEtariaInicial;
        }
        if($name === "FaixaEtariaFinal") {
            $this->FaixaEtariaFinal = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->FaixaEtariaFinal;
        }
        if($name === "ModoOperacao") {
            $this->ModoOperacao = substr($value, 0, 8);
            $this->_iSaved_ = false;
            return $this->ModoOperacao;
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
                        jogo
                    set 
                        idjogo = " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                        idjogoprodutor = " . ( isset($this->IdJogoProdutor) ? $this->o_db->quote($IdJogoProdutor) : "null" ) . ",
                        titulo = " . ( isset($this->Titulo) ? $this->o_db->quote($Titulo) : "null" ) . ",
                        descricao = " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                        versao = " . ( isset($this->Versao) ? $this->o_db->quote($Versao) : "null" ) . ",
                        faixaetariainicial = " . ( isset($this->FaixaEtariaInicial) ? $this->o_db->quote($this->FaixaEtariaInicial) : "null" ) . ",
                        faixaetariafinal = " . ( isset($this->FaixaEtariaFinal) ? $this->o_db->quote($this->FaixaEtariaFinal) : "null" ) . ",
                        modooperacao = " . ( isset($this->ModoOperacao) ? $this->o_db->quote($ModoOperacao) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idjogo" . ( isset($this->IdJogo) ? " = " . $this->o_db->quote($this->IdJogo) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        jogo (
                            idjogo,
                            idjogoprodutor,
                            titulo,
                            descricao,
                            versao,
                            faixaetariainicial,
                            faixaetariafinal,
                            modooperacao,
                            status
                        )
                        values (
                            " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                            " . ( isset($this->IdJogoProdutor) ? $this->o_db->quote($IdJogoProdutor) : "null" ) . ",
                            " . ( isset($this->Titulo) ? $this->o_db->quote($Titulo) : "null" ) . ",
                            " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                            " . ( isset($this->Versao) ? $this->o_db->quote($Versao) : "null" ) . ",
                            " . ( isset($this->FaixaEtariaInicial) ? $this->o_db->quote($this->FaixaEtariaInicial) : "null" ) . ",
                            " . ( isset($this->FaixaEtariaFinal) ? $this->o_db->quote($this->FaixaEtariaFinal) : "null" ) . ",
                            " . ( isset($this->ModoOperacao) ? $this->o_db->quote($ModoOperacao) : "null" ) . ",
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
        if (isset($this->IdJogo)) {
            $sql = "delete from 
                        jogo
                     where 
                        idjogo" . ( isset($this->IdJogo) ? " = " . $this->o_db->quote($this->IdJogo) : " is null" ) . ""; 
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
        string $IdJogoProdutor = null,
        string $Titulo = null,
        string $Descricao = null,
        string $Versao = null,
        int $FaixaEtariaInicial = null,
        int $FaixaEtariaFinal = null,
        string $ModoOperacao = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idjogo as IdJogo,
                    idjogoprodutor as IdJogoProdutor,
                    titulo as Titulo,
                    descricao as Descricao,
                    versao as Versao,
                    faixaetariainicial as FaixaEtariaInicial,
                    faixaetariafinal as FaixaEtariaFinal,
                    modooperacao as ModoOperacao,
                    status as Status
                from
                    jogo
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote("%" . $IdJogo. "%") . ")"; }
        if (isset($IdJogoProdutor)) { $sql = $sql . " and (idjogoprodutor = " . $this->o_db->quote("%" . $IdJogoProdutor. "%") . ")"; }
        if (isset($Titulo)) { $sql = $sql . " and (titulo = " . $this->o_db->quote("%" . $Titulo. "%") . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote("%" . $Descricao. "%") . ")"; }
        if (isset($Versao)) { $sql = $sql . " and (versao = " . $this->o_db->quote("%" . $Versao. "%") . ")"; }
        if (isset($FaixaEtariaInicial)) { $sql = $sql . " and (faixaetariainicial = " . FaixaEtariaInicial . ")"; }
        if (isset($FaixaEtariaFinal)) { $sql = $sql . " and (faixaetariafinal = " . FaixaEtariaFinal . ")"; }
        if (isset($ModoOperacao)) { $sql = $sql . " and (modooperacao = " . $this->o_db->quote("%" . $ModoOperacao. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_jogo = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new JogoModel();

                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->IdJogoProdutor = $obj_in->IdJogoProdutor;
                $obj_out->Titulo = $obj_in->Titulo;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->Versao = $obj_in->Versao;
                $obj_out->FaixaEtariaInicial = $obj_in->FaixaEtariaInicial;
                $obj_out->FaixaEtariaFinal = $obj_in->FaixaEtariaFinal;
                $obj_out->ModoOperacao = $obj_in->ModoOperacao;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_jogo, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_jogo;
    }

    // --------------------------------------------------------------------------------
    // listByIdJogoProdutorTitulo
    // Lista os registros com base em IdJogoProdutor, Titulo
    // --------------------------------------------------------------------------------
    public function listByIdJogoProdutorTitulo(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdJogoProdutor = null,
        string $Titulo = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdJogoProdutor, $Titulo, null, null, null, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdJogo = null,
        string $IdJogoProdutor = null,
        string $Titulo = null,
        string $Descricao = null,
        string $Versao = null,
        int $FaixaEtariaInicial = null,
        int $FaixaEtariaFinal = null,
        string $ModoOperacao = null,
        string $Status = null)
    {
        $sql = "select
                    idjogo as IdJogo,
                    idjogoprodutor as IdJogoProdutor,
                    titulo as Titulo,
                    descricao as Descricao,
                    versao as Versao,
                    faixaetariainicial as FaixaEtariaInicial,
                    faixaetariafinal as FaixaEtariaFinal,
                    modooperacao as ModoOperacao,
                    status as Status
                from
                    jogo
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote($IdJogo) . ")"; }
        if (isset($IdJogoProdutor)) { $sql = $sql . " and (idjogoprodutor = " . $this->o_db->quote($IdJogoProdutor) . ")"; }
        if (isset($Titulo)) { $sql = $sql . " and (titulo = " . $this->o_db->quote($Titulo) . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote($Descricao) . ")"; }
        if (isset($Versao)) { $sql = $sql . " and (versao = " . $this->o_db->quote($Versao) . ")"; }
        if (isset($FaixaEtariaInicial)) { $sql = $sql . " and (faixaetariainicial = " . FaixaEtariaInicial . ")"; }
        if (isset($FaixaEtariaFinal)) { $sql = $sql . " and (faixaetariafinal = " . FaixaEtariaFinal . ")"; }
        if (isset($ModoOperacao)) { $sql = $sql . " and (modooperacao = " . $this->o_db->quote($ModoOperacao) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new JogoModel();

                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->IdJogoProdutor = $obj_in->IdJogoProdutor;
                $obj_out->Titulo = $obj_in->Titulo;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->Versao = $obj_in->Versao;
                $obj_out->FaixaEtariaInicial = $obj_in->FaixaEtariaInicial;
                $obj_out->FaixaEtariaFinal = $obj_in->FaixaEtariaFinal;
                $obj_out->ModoOperacao = $obj_in->ModoOperacao;
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
    public function loadById( string $IdJogo )
    {
        $obj = $this->objectByFields($IdJogo, null, null, null, null, null, null, null, null);
        if ($obj) {
            $this->IdJogo = $obj->IdJogo;
            $this->IdJogoProdutor = $obj->IdJogoProdutor;
            $this->Titulo = $obj->Titulo;
            $this->Descricao = $obj->Descricao;
            $this->Versao = $obj->Versao;
            $this->FaixaEtariaInicial = $obj->FaixaEtariaInicial;
            $this->FaixaEtariaFinal = $obj->FaixaEtariaFinal;
            $this->ModoOperacao = $obj->ModoOperacao;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdJogoProdutorTitulo
    // Verifica se um registro existe com IdJogoProdutor, Titulo
    // --------------------------------------------------------------------------------
    public function existsIdJogoProdutorTitulo()
    {
        $obj = $this->objectByFields(null, $this->IdJogoProdutor, $this->Titulo, null, null, null, null, null, null);
        return !($obj && ($obj->IdJogo === $this->IdJogo));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdJogo = null,
        string $IdJogoProdutor = null,
        string $Titulo = null,
        string $Descricao = null,
        string $Versao = null,
        int $FaixaEtariaInicial = null,
        int $FaixaEtariaFinal = null,
        string $ModoOperacao = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    jogo
                where 1 = 1";

        if (isset($IdJogo)) { $sql = $sql . " and (idjogo like " . $this->o_db->quote("%" . $IdJogo . "%") . ")"; }
        if (isset($IdJogoProdutor)) { $sql = $sql . " and (idjogoprodutor like " . $this->o_db->quote("%" . $IdJogoProdutor . "%") . ")"; }
        if (isset($Titulo)) { $sql = $sql . " and (titulo like " . $this->o_db->quote("%" . $Titulo . "%") . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao like " . $this->o_db->quote("%" . $Descricao . "%") . ")"; }
        if (isset($Versao)) { $sql = $sql . " and (versao like " . $this->o_db->quote("%" . $Versao . "%") . ")"; }
        if (isset($FaixaEtariaInicial)) { $sql = $sql . " and (faixaetariainicial = " . FaixaEtariaInicial . ")"; }
        if (isset($FaixaEtariaFinal)) { $sql = $sql . " and (faixaetariafinal = " . FaixaEtariaFinal . ")"; }
        if (isset($ModoOperacao)) { $sql = $sql . " and (modooperacao like " . $this->o_db->quote("%" . $ModoOperacao . "%") . ")"; }
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
    // countByIdJogoProdutorTitulo
    // Conta os registros com base em IdJogoProdutor, Titulo
    // --------------------------------------------------------------------------------
    public function countByIdJogoProdutorTitulo(
        string $IdJogoProdutor = null,
        string $Titulo = null)
    {
        return $this->countBy(null, $IdJogoProdutor, $Titulo, null, null, null, null, null, null);
    }

}

?>
