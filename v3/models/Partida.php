<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// PartidaModel
//
// Registra os dados de cada partida para os usu�rios da plataforma.
//
// Gerado em: 2018-03-16 07:25:13
// --------------------------------------------------------------------------------
class PartidaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdPartida = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdPartida;                                                  // char(32), PK, obrigat�rio - Identifica��o da Partida
    protected $IdJogo;                                                     // char(32), FK, obrigat�rio - Identifica��o do Jogo
    protected $IdContaPessoa;                                              // char(32), FK, obrigat�rio - Identificador da Conta da Pessoa
    protected $DataHoraPartida = date("d-m-Y H:i:s");                      // timestamp, obrigat�rio - Data e hora que ocorreu a partida
    protected $Duracaosegundos;                                            // bigint(20), opcional - Dura��o em minutos da partida
    protected $Pontos;                                                     // bigint(20), opcional - Quantidade de pontos da partida
    protected $Qtdquestoes;                                                // bigint(20), opcional - Quantidade de quest�es
    protected $Qtdacertos;                                                 // bigint(20), opcional - Quantidade de acertos
    protected $DadosPartida;                                               // json, opcional - Dados gerais da partida em formato JSON

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdPartida") { return $this->IdPartida; }
        if ($name === "IdJogo") { return $this->IdJogo; }
        if ($name === "IdContaPessoa") { return $this->IdContaPessoa; }
        if ($name === "DataHoraPartida") { return ($this->DataHoraPartida ? $this->DataHoraPartida->format("d-m-Y H:i:s") : null); }
        if ($name === "Duracaosegundos") { return $this->Duracaosegundos; }
        if ($name === "Pontos") { return $this->Pontos; }
        if ($name === "Qtdquestoes") { return $this->Qtdquestoes; }
        if ($name === "Qtdacertos") { return $this->Qtdacertos; }
        if ($name === "DadosPartida") { return $this->DadosPartida; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdPartida") {
            $this->IdPartida = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdPartida;
        }
        if($name === "IdJogo") {
            $this->IdJogo = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdJogo;
        }
        if($name === "IdContaPessoa") {
            $this->IdContaPessoa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdContaPessoa;
        }
        if($name === "DataHoraPartida") {
            $mydatetime = DateTime::createFromFormat("d-m-Y H:i:s", $value);
            $this->DataHoraPartida = ($mydatetime ? $mydatetime : null);
            $this->_iSaved_ = false;
            return $this->DataHoraPartida.format("d-m-Y H:i:s");
        }
        if($name === "Duracaosegundos") {
            $this->Duracaosegundos = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->Duracaosegundos;
        }
        if($name === "Pontos") {
            $this->Pontos = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->Pontos;
        }
        if($name === "Qtdquestoes") {
            $this->Qtdquestoes = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->Qtdquestoes;
        }
        if($name === "Qtdacertos") {
            $this->Qtdacertos = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->Qtdacertos;
        }
        if($name === "DadosPartida") {
            $this->DadosPartida = $value;
            $this->_iSaved_ = false;
            return $this->DadosPartida;
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
                        partida
                    set 
                        idpartida = " . ( isset($this->IdPartida) ? $this->o_db->quote($IdPartida) : "null" ) . ",
                        idjogo = " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                        idcontapessoa = " . ( isset($this->IdContaPessoa) ? $this->o_db->quote($IdContaPessoa) : "null" ) . ",
                        datahorapartida = " . ( isset($this->DataHoraPartida) ? $this->DataHoraPartida->format("Y-m-d H:i:s") : "null" ) . ",
                        duracaosegundos = " . ( isset($this->Duracaosegundos) ? $this->o_db->quote($this->Duracaosegundos) : "null" ) . ",
                        pontos = " . ( isset($this->Pontos) ? $this->o_db->quote($this->Pontos) : "null" ) . ",
                        qtdquestoes = " . ( isset($this->Qtdquestoes) ? $this->o_db->quote($this->Qtdquestoes) : "null" ) . ",
                        qtdacertos = " . ( isset($this->Qtdacertos) ? $this->o_db->quote($this->Qtdacertos) : "null" ) . ",
                        dadospartida = " . ( isset($this->DadosPartida) ? $this->o_db->quote($DadosPartida) : "null" ) . "
                    where 
                        idpartida" . ( isset($this->IdPartida) ? " = " . $this->o_db->quote($this->IdPartida) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        partida (
                            idpartida,
                            idjogo,
                            idcontapessoa,
                            datahorapartida,
                            duracaosegundos,
                            pontos,
                            qtdquestoes,
                            qtdacertos,
                            dadospartida
                        )
                        values (
                            " . ( isset($this->IdPartida) ? $this->o_db->quote($IdPartida) : "null" ) . ",
                            " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                            " . ( isset($this->IdContaPessoa) ? $this->o_db->quote($IdContaPessoa) : "null" ) . ",
                            " . ( isset($this->DataHoraPartida) ? $this->DataHoraPartida->format("Y-m-d H:i:s") : "null" ) . ",
                            " . ( isset($this->Duracaosegundos) ? $this->o_db->quote($this->Duracaosegundos) : "null" ) . ",
                            " . ( isset($this->Pontos) ? $this->o_db->quote($this->Pontos) : "null" ) . ",
                            " . ( isset($this->Qtdquestoes) ? $this->o_db->quote($this->Qtdquestoes) : "null" ) . ",
                            " . ( isset($this->Qtdacertos) ? $this->o_db->quote($this->Qtdacertos) : "null" ) . ",
                            " . ( isset($this->DadosPartida) ? $this->o_db->quote($DadosPartida) : "null" ) . "
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
        if (isset($this->IdPartida)) {
            $sql = "delete from 
                        partida
                     where 
                        idpartida" . ( isset($this->IdPartida) ? " = " . $this->o_db->quote($this->IdPartida) : " is null" ) . ""; 
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
        string $IdPartida = null,
        string $IdJogo = null,
        string $IdContaPessoa = null,
        string $DataHoraPartida = null,
        int $Duracaosegundos = null,
        int $Pontos = null,
        int $Qtdquestoes = null,
        int $Qtdacertos = null,
        string $DadosPartida = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idpartida as IdPartida,
                    idjogo as IdJogo,
                    idcontapessoa as IdContaPessoa,
                    datahorapartida as DataHoraPartida,
                    duracaosegundos as Duracaosegundos,
                    pontos as Pontos,
                    qtdquestoes as Qtdquestoes,
                    qtdacertos as Qtdacertos,
                    dadospartida as DadosPartida
                from
                    partida
                where 1 = 1";

        if (isset($IdPartida)) { $sql = $sql . " and (idpartida = " . $this->o_db->quote("%" . $IdPartida. "%") . ")"; }
        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote("%" . $IdJogo. "%") . ")"; }
        if (isset($IdContaPessoa)) { $sql = $sql . " and (idcontapessoa = " . $this->o_db->quote("%" . $IdContaPessoa. "%") . ")"; }
        if (isset($DataHoraPartida)) { $sql = $sql . " and (datahorapartida = " . "'" . (DateTime::createFromFormat("Y-m-d H:i:s", $DataHoraPartida) ? DateTime::createFromFormat("Y-m-d H:i:s", $DataHoraPartida)->format("Y-m-d H:i:s") : "") . "'" . ")"; }
        if (isset($Duracaosegundos)) { $sql = $sql . " and (duracaosegundos = " . Duracaosegundos . ")"; }
        if (isset($Pontos)) { $sql = $sql . " and (pontos = " . Pontos . ")"; }
        if (isset($Qtdquestoes)) { $sql = $sql . " and (qtdquestoes = " . Qtdquestoes . ")"; }
        if (isset($Qtdacertos)) { $sql = $sql . " and (qtdacertos = " . Qtdacertos . ")"; }
        if (isset($DadosPartida)) { $sql = $sql . " and (dadospartida = " . $this->o_db->quote("%" . $DadosPartida. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_partida = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new PartidaModel();

                $obj_out->IdPartida = $obj_in->IdPartida;
                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->IdContaPessoa = $obj_in->IdContaPessoa;
                $obj_out->DataHoraPartida = $obj_in->DataHoraPartida;
                $obj_out->Duracaosegundos = $obj_in->Duracaosegundos;
                $obj_out->Pontos = $obj_in->Pontos;
                $obj_out->Qtdquestoes = $obj_in->Qtdquestoes;
                $obj_out->Qtdacertos = $obj_in->Qtdacertos;
                $obj_out->DadosPartida = $obj_in->DadosPartida;

                $obj_out->_isSaved_ = true;

                array_push($array_partida, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_partida;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdPartida = null,
        string $IdJogo = null,
        string $IdContaPessoa = null,
        string $DataHoraPartida = null,
        int $Duracaosegundos = null,
        int $Pontos = null,
        int $Qtdquestoes = null,
        int $Qtdacertos = null,
        string $DadosPartida = null)
    {
        $sql = "select
                    idpartida as IdPartida,
                    idjogo as IdJogo,
                    idcontapessoa as IdContaPessoa,
                    datahorapartida as DataHoraPartida,
                    duracaosegundos as Duracaosegundos,
                    pontos as Pontos,
                    qtdquestoes as Qtdquestoes,
                    qtdacertos as Qtdacertos,
                    dadospartida as DadosPartida
                from
                    partida
                where 1 = 1";

        if (isset($IdPartida)) { $sql = $sql . " and (idpartida = " . $this->o_db->quote($IdPartida) . ")"; }
        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote($IdJogo) . ")"; }
        if (isset($IdContaPessoa)) { $sql = $sql . " and (idcontapessoa = " . $this->o_db->quote($IdContaPessoa) . ")"; }
        if (isset($DataHoraPartida)) { $sql = $sql . " and (datahorapartida = " . "'" . (DateTime::createFromFormat("Y-m-d H:i:s", $DataHoraPartida) ? DateTime::createFromFormat("Y-m-d H:i:s", $DataHoraPartida)->format("Y-m-d H:i:s") : "") . "'" . ")"; }
        if (isset($Duracaosegundos)) { $sql = $sql . " and (duracaosegundos = " . Duracaosegundos . ")"; }
        if (isset($Pontos)) { $sql = $sql . " and (pontos = " . Pontos . ")"; }
        if (isset($Qtdquestoes)) { $sql = $sql . " and (qtdquestoes = " . Qtdquestoes . ")"; }
        if (isset($Qtdacertos)) { $sql = $sql . " and (qtdacertos = " . Qtdacertos . ")"; }
        if (isset($DadosPartida)) { $sql = $sql . " and (dadospartida = " . $this->o_db->quote($DadosPartida) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new PartidaModel();

                $obj_out->IdPartida = $obj_in->IdPartida;
                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->IdContaPessoa = $obj_in->IdContaPessoa;
                $obj_out->DataHoraPartida = $obj_in->DataHoraPartida;
                $obj_out->Duracaosegundos = $obj_in->Duracaosegundos;
                $obj_out->Pontos = $obj_in->Pontos;
                $obj_out->Qtdquestoes = $obj_in->Qtdquestoes;
                $obj_out->Qtdacertos = $obj_in->Qtdacertos;
                $obj_out->DadosPartida = $obj_in->DadosPartida;

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
    public function loadById( string $IdPartida )
    {
        $obj = $this->objectByFields($IdPartida, null, null, null, null, null, null, null, null);
        if ($obj) {
            $this->IdPartida = $obj->IdPartida;
            $this->IdJogo = $obj->IdJogo;
            $this->IdContaPessoa = $obj->IdContaPessoa;
            $this->DataHoraPartida = $obj->DataHoraPartida;
            $this->Duracaosegundos = $obj->Duracaosegundos;
            $this->Pontos = $obj->Pontos;
            $this->Qtdquestoes = $obj->Qtdquestoes;
            $this->Qtdacertos = $obj->Qtdacertos;
            $this->DadosPartida = $obj->DadosPartida;

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
        string $IdPartida = null,
        string $IdJogo = null,
        string $IdContaPessoa = null,
        string $DataHoraPartida = null,
        int $Duracaosegundos = null,
        int $Pontos = null,
        int $Qtdquestoes = null,
        int $Qtdacertos = null,
        string $DadosPartida = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    partida
                where 1 = 1";

        if (isset($IdPartida)) { $sql = $sql . " and (idpartida like " . $this->o_db->quote("%" . $IdPartida . "%") . ")"; }
        if (isset($IdJogo)) { $sql = $sql . " and (idjogo like " . $this->o_db->quote("%" . $IdJogo . "%") . ")"; }
        if (isset($IdContaPessoa)) { $sql = $sql . " and (idcontapessoa like " . $this->o_db->quote("%" . $IdContaPessoa . "%") . ")"; }
        if (isset($DataHoraPartida)) { $sql = $sql . " and (datahorapartida = " . "'" . (DateTime::createFromFormat("Y-m-d H:i:s", $DataHoraPartida) ? DateTime::createFromFormat("Y-m-d H:i:s", $DataHoraPartida)->format("Y-m-d H:i:s") : "") . "'" . ")"; }
        if (isset($Duracaosegundos)) { $sql = $sql . " and (duracaosegundos = " . Duracaosegundos . ")"; }
        if (isset($Pontos)) { $sql = $sql . " and (pontos = " . Pontos . ")"; }
        if (isset($Qtdquestoes)) { $sql = $sql . " and (qtdquestoes = " . Qtdquestoes . ")"; }
        if (isset($Qtdacertos)) { $sql = $sql . " and (qtdacertos = " . Qtdacertos . ")"; }
        if (isset($DadosPartida)) { $sql = $sql . " and (dadospartida like " . $this->o_db->quote("%" . $DadosPartida . "%") . ")"; }

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
