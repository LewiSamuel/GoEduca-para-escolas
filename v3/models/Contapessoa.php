<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// ContaPessoaModel
//
// Conta de acesso disponibilizados pelas institui��o �s pessoas/alunos.
//
// Gerado em: 2018-03-16 07:24:04
// --------------------------------------------------------------------------------
class ContaPessoaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdContaPessoa = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdContaPessoa;                                              // char(32), PK, obrigat�rio - Identificador da Conta da Pessoa
    protected $IdInstituicao;                                              // char(32), FK, opcional - Identificador da Institui��o
    protected $IdPessoa;                                                   // char(32), FK, obrigat�rio - Identificador da Pessoa
    protected $Matricula;                                                  // varchar(16), opcional - Matr�cula junto a Institui��o
    protected $DataCadastro;                                               // date, opcional - Data de cancelamento da conta
    protected $DataCancelamento;                                           // date, opcional - Data de cancelamento da conta
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdContaPessoa") { return $this->IdContaPessoa; }
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
        if ($name === "IdPessoa") { return $this->IdPessoa; }
        if ($name === "Matricula") { return $this->Matricula; }
        if ($name === "DataCadastro") { return ($this->DataCadastro ? $this->DataCadastro->format("d-m-Y") : null); }
        if ($name === "DataCancelamento") { return ($this->DataCancelamento ? $this->DataCancelamento->format("d-m-Y") : null); }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdContaPessoa") {
            $this->IdContaPessoa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdContaPessoa;
        }
        if($name === "IdInstituicao") {
            $this->IdInstituicao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdInstituicao;
        }
        if($name === "IdPessoa") {
            $this->IdPessoa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdPessoa;
        }
        if($name === "Matricula") {
            $this->Matricula = substr($value, 0, 16);
            $this->_iSaved_ = false;
            return $this->Matricula;
        }
        if($name === "DataCadastro") {
            $mydate = DateTime::createFromFormat("d-m-Y", $value);
            $this->DataCadastro = ($mydate ? $mydate : null);
            $this->_iSaved_ = false;
            return $this->DataCadastro.format("d-m-Y");
        }
        if($name === "DataCancelamento") {
            $mydate = DateTime::createFromFormat("d-m-Y", $value);
            $this->DataCancelamento = ($mydate ? $mydate : null);
            $this->_iSaved_ = false;
            return $this->DataCancelamento.format("d-m-Y");
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
                        contapessoa
                    set 
                        idcontapessoa = " . ( isset($this->IdContaPessoa) ? $this->o_db->quote($IdContaPessoa) : "null" ) . ",
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        idpessoa = " . ( isset($this->IdPessoa) ? $this->o_db->quote($IdPessoa) : "null" ) . ",
                        matricula = " . ( isset($this->Matricula) ? $this->o_db->quote($Matricula) : "null" ) . ",
                        datacadastro = " . ( isset($this->DataCadastro) ? $this->DataCadastro->format("Y-m-d") : "null" ) . ",
                        datacancelamento = " . ( isset($this->DataCancelamento) ? $this->DataCancelamento->format("Y-m-d") : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idcontapessoa" . ( isset($this->IdContaPessoa) ? " = " . $this->o_db->quote($this->IdContaPessoa) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        contapessoa (
                            idcontapessoa,
                            idinstituicao,
                            idpessoa,
                            matricula,
                            datacadastro,
                            datacancelamento,
                            status
                        )
                        values (
                            " . ( isset($this->IdContaPessoa) ? $this->o_db->quote($IdContaPessoa) : "null" ) . ",
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->IdPessoa) ? $this->o_db->quote($IdPessoa) : "null" ) . ",
                            " . ( isset($this->Matricula) ? $this->o_db->quote($Matricula) : "null" ) . ",
                            " . ( isset($this->DataCadastro) ? $this->DataCadastro->format("Y-m-d") : "null" ) . ",
                            " . ( isset($this->DataCancelamento) ? $this->DataCancelamento->format("Y-m-d") : "null" ) . ",
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
        if (isset($this->IdContaPessoa)) {
            $sql = "delete from 
                        contapessoa
                     where 
                        idcontapessoa" . ( isset($this->IdContaPessoa) ? " = " . $this->o_db->quote($this->IdContaPessoa) : " is null" ) . ""; 
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
        string $IdContaPessoa = null,
        string $IdInstituicao = null,
        string $IdPessoa = null,
        string $Matricula = null,
        string $DataCadastro = null,
        string $DataCancelamento = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idcontapessoa as IdContaPessoa,
                    idinstituicao as IdInstituicao,
                    idpessoa as IdPessoa,
                    matricula as Matricula,
                    datacadastro as DataCadastro,
                    datacancelamento as DataCancelamento,
                    status as Status
                from
                    contapessoa
                where 1 = 1";

        if (isset($IdContaPessoa)) { $sql = $sql . " and (idcontapessoa = " . $this->o_db->quote("%" . $IdContaPessoa. "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa = " . $this->o_db->quote("%" . $IdPessoa. "%") . ")"; }
        if (isset($Matricula)) { $sql = $sql . " and (matricula = " . $this->o_db->quote("%" . $Matricula. "%") . ")"; }
        if (isset($DataCadastro)) { $sql = $sql . " and (datacadastro = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataCadastro) ? DateTime::createFromFormat("d-m-Y", $DataCadastro)->format("Y-m-d") : "") . "'" . ")"; }
        if (isset($DataCancelamento)) { $sql = $sql . " and (datacancelamento = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataCancelamento) ? DateTime::createFromFormat("d-m-Y", $DataCancelamento)->format("Y-m-d") : "") . "'" . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_contapessoa = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new ContaPessoaModel();

                $obj_out->IdContaPessoa = $obj_in->IdContaPessoa;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdPessoa = $obj_in->IdPessoa;
                $obj_out->Matricula = $obj_in->Matricula;
                $obj_out->DataCadastro = $obj_in->DataCadastro;
                $obj_out->DataCancelamento = $obj_in->DataCancelamento;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_contapessoa, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_contapessoa;
    }

    // --------------------------------------------------------------------------------
    // listByIdInstituicaoIdPessoa
    // Lista os registros com base em IdInstituicao, IdPessoa
    // --------------------------------------------------------------------------------
    public function listByIdInstituicaoIdPessoa(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdInstituicao = null,
        string $IdPessoa = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdInstituicao, $IdPessoa, null, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdContaPessoa = null,
        string $IdInstituicao = null,
        string $IdPessoa = null,
        string $Matricula = null,
        string $DataCadastro = null,
        string $DataCancelamento = null,
        string $Status = null)
    {
        $sql = "select
                    idcontapessoa as IdContaPessoa,
                    idinstituicao as IdInstituicao,
                    idpessoa as IdPessoa,
                    matricula as Matricula,
                    datacadastro as DataCadastro,
                    datacancelamento as DataCancelamento,
                    status as Status
                from
                    contapessoa
                where 1 = 1";

        if (isset($IdContaPessoa)) { $sql = $sql . " and (idcontapessoa = " . $this->o_db->quote($IdContaPessoa) . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa = " . $this->o_db->quote($IdPessoa) . ")"; }
        if (isset($Matricula)) { $sql = $sql . " and (matricula = " . $this->o_db->quote($Matricula) . ")"; }
        if (isset($DataCadastro)) { $sql = $sql . " and (datacadastro = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataCadastro) ? DateTime::createFromFormat("d-m-Y", $DataCadastro)->format("Y-m-d") : "") . "'" . ")"; }
        if (isset($DataCancelamento)) { $sql = $sql . " and (datacancelamento = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataCancelamento) ? DateTime::createFromFormat("d-m-Y", $DataCancelamento)->format("Y-m-d") : "") . "'" . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new ContaPessoaModel();

                $obj_out->IdContaPessoa = $obj_in->IdContaPessoa;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdPessoa = $obj_in->IdPessoa;
                $obj_out->Matricula = $obj_in->Matricula;
                $obj_out->DataCadastro = $obj_in->DataCadastro;
                $obj_out->DataCancelamento = $obj_in->DataCancelamento;
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
    public function loadById( string $IdContaPessoa )
    {
        $obj = $this->objectByFields($IdContaPessoa, null, null, null, null, null, null);
        if ($obj) {
            $this->IdContaPessoa = $obj->IdContaPessoa;
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->IdPessoa = $obj->IdPessoa;
            $this->Matricula = $obj->Matricula;
            $this->DataCadastro = $obj->DataCadastro;
            $this->DataCancelamento = $obj->DataCancelamento;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdInstituicaoIdPessoa
    // Verifica se um registro existe com IdInstituicao, IdPessoa
    // --------------------------------------------------------------------------------
    public function existsIdInstituicaoIdPessoa()
    {
        $obj = $this->objectByFields(null, $this->IdInstituicao, $this->IdPessoa, null, null, null, null);
        return !($obj && ($obj->IdContaPessoa === $this->IdContaPessoa));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdContaPessoa = null,
        string $IdInstituicao = null,
        string $IdPessoa = null,
        string $Matricula = null,
        string $DataCadastro = null,
        string $DataCancelamento = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    contapessoa
                where 1 = 1";

        if (isset($IdContaPessoa)) { $sql = $sql . " and (idcontapessoa like " . $this->o_db->quote("%" . $IdContaPessoa . "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa like " . $this->o_db->quote("%" . $IdPessoa . "%") . ")"; }
        if (isset($Matricula)) { $sql = $sql . " and (matricula like " . $this->o_db->quote("%" . $Matricula . "%") . ")"; }
        if (isset($DataCadastro)) { $sql = $sql . " and (datacadastro = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataCadastro) ? DateTime::createFromFormat("d-m-Y", $DataCadastro)->format("Y-m-d") : "") . "'" . ")"; }
        if (isset($DataCancelamento)) { $sql = $sql . " and (datacancelamento = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataCancelamento) ? DateTime::createFromFormat("d-m-Y", $DataCancelamento)->format("Y-m-d") : "") . "'" . ")"; }
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
    // countByIdInstituicaoIdPessoa
    // Conta os registros com base em IdInstituicao, IdPessoa
    // --------------------------------------------------------------------------------
    public function countByIdInstituicaoIdPessoa(
        string $IdInstituicao = null,
        string $IdPessoa = null)
    {
        return $this->countBy(null, $IdInstituicao, $IdPessoa, null, null, null, null);
    }

}

?>
