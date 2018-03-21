<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// ResponsavelModel
//
// Respons�veis legais das pessoas (alunos) cadastrados na plataforma.
//
// Gerado em: 2018-03-16 07:25:22
// --------------------------------------------------------------------------------
class ResponsavelModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdResponsavel = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdResponsavel;                                              // char(32), PK, obrigat�rio - Identificador do Respons�vel
    protected $IdPessoa;                                                   // char(32), FK, obrigat�rio - Identificador da Pessoa
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome do Respons�vel
    protected $Telefone;                                                   // varchar(256), opcional - Telefone
    protected $Email;                                                      // varchar(256), opcional - Endere�o e-mail
    protected $grauparentesco;                                             // varchar(64), opcional - Grau de parentesco com a Pessoa
    protected $Observacao;                                                 // text, opcional - Observa��es sobre o respons�vel

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdResponsavel") { return $this->IdResponsavel; }
        if ($name === "IdPessoa") { return $this->IdPessoa; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Telefone") { return $this->Telefone; }
        if ($name === "Email") { return $this->Email; }
        if ($name === "grauparentesco") { return $this->grauparentesco; }
        if ($name === "Observacao") { return $this->Observacao; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdResponsavel") {
            $this->IdResponsavel = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdResponsavel;
        }
        if($name === "IdPessoa") {
            $this->IdPessoa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdPessoa;
        }
        if($name === "Nome") {
            $this->Nome = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Nome;
        }
        if($name === "Telefone") {
            $this->Telefone = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Telefone;
        }
        if($name === "Email") {
            $this->Email = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Email;
        }
        if($name === "grauparentesco") {
            $this->grauparentesco = substr($value, 0, 64);
            $this->_iSaved_ = false;
            return $this->grauparentesco;
        }
        if($name === "Observacao") {
            $this->Observacao = $value;
            $this->_iSaved_ = false;
            return $this->Observacao;
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
                        responsavel
                    set 
                        idresponsavel = " . ( isset($this->IdResponsavel) ? $this->o_db->quote($IdResponsavel) : "null" ) . ",
                        idpessoa = " . ( isset($this->IdPessoa) ? $this->o_db->quote($IdPessoa) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        telefone = " . ( isset($this->Telefone) ? $this->o_db->quote($Telefone) : "null" ) . ",
                        email = " . ( isset($this->Email) ? $this->o_db->quote($Email) : "null" ) . ",
                        grauparentesco = " . ( isset($this->grauparentesco) ? $this->o_db->quote($grauparentesco) : "null" ) . ",
                        observacao = " . ( isset($this->Observacao) ? $this->o_db->quote($Observacao) : "null" ) . "
                    where 
                        idresponsavel" . ( isset($this->IdResponsavel) ? " = " . $this->o_db->quote($this->IdResponsavel) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        responsavel (
                            idresponsavel,
                            idpessoa,
                            nome,
                            telefone,
                            email,
                            grauparentesco,
                            observacao
                        )
                        values (
                            " . ( isset($this->IdResponsavel) ? $this->o_db->quote($IdResponsavel) : "null" ) . ",
                            " . ( isset($this->IdPessoa) ? $this->o_db->quote($IdPessoa) : "null" ) . ",
                            " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                            " . ( isset($this->Telefone) ? $this->o_db->quote($Telefone) : "null" ) . ",
                            " . ( isset($this->Email) ? $this->o_db->quote($Email) : "null" ) . ",
                            " . ( isset($this->grauparentesco) ? $this->o_db->quote($grauparentesco) : "null" ) . ",
                            " . ( isset($this->Observacao) ? $this->o_db->quote($Observacao) : "null" ) . "
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
        if (isset($this->IdResponsavel)) {
            $sql = "delete from 
                        responsavel
                     where 
                        idresponsavel" . ( isset($this->IdResponsavel) ? " = " . $this->o_db->quote($this->IdResponsavel) : " is null" ) . ""; 
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
        string $IdResponsavel = null,
        string $IdPessoa = null,
        string $Nome = null,
        string $Telefone = null,
        string $Email = null,
        string $grauparentesco = null,
        string $Observacao = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idresponsavel as IdResponsavel,
                    idpessoa as IdPessoa,
                    nome as Nome,
                    telefone as Telefone,
                    email as Email,
                    grauparentesco as grauparentesco,
                    observacao as Observacao
                from
                    responsavel
                where 1 = 1";

        if (isset($IdResponsavel)) { $sql = $sql . " and (idresponsavel = " . $this->o_db->quote("%" . $IdResponsavel. "%") . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa = " . $this->o_db->quote("%" . $IdPessoa. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone = " . $this->o_db->quote("%" . $Telefone. "%") . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email = " . $this->o_db->quote("%" . $Email. "%") . ")"; }
        if (isset($grauparentesco)) { $sql = $sql . " and (grauparentesco = " . $this->o_db->quote("%" . $grauparentesco. "%") . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao = " . $this->o_db->quote("%" . $Observacao. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_responsavel = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new ResponsavelModel();

                $obj_out->IdResponsavel = $obj_in->IdResponsavel;
                $obj_out->IdPessoa = $obj_in->IdPessoa;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Telefone = $obj_in->Telefone;
                $obj_out->Email = $obj_in->Email;
                $obj_out->grauparentesco = $obj_in->grauparentesco;
                $obj_out->Observacao = $obj_in->Observacao;

                $obj_out->_isSaved_ = true;

                array_push($array_responsavel, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_responsavel;
    }

    // --------------------------------------------------------------------------------
    // listByIdPessoaNome
    // Lista os registros com base em IdPessoa, Nome
    // --------------------------------------------------------------------------------
    public function listByIdPessoaNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdPessoa = null,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdPessoa, $Nome, null, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdResponsavel = null,
        string $IdPessoa = null,
        string $Nome = null,
        string $Telefone = null,
        string $Email = null,
        string $grauparentesco = null,
        string $Observacao = null)
    {
        $sql = "select
                    idresponsavel as IdResponsavel,
                    idpessoa as IdPessoa,
                    nome as Nome,
                    telefone as Telefone,
                    email as Email,
                    grauparentesco as grauparentesco,
                    observacao as Observacao
                from
                    responsavel
                where 1 = 1";

        if (isset($IdResponsavel)) { $sql = $sql . " and (idresponsavel = " . $this->o_db->quote($IdResponsavel) . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa = " . $this->o_db->quote($IdPessoa) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone = " . $this->o_db->quote($Telefone) . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email = " . $this->o_db->quote($Email) . ")"; }
        if (isset($grauparentesco)) { $sql = $sql . " and (grauparentesco = " . $this->o_db->quote($grauparentesco) . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao = " . $this->o_db->quote($Observacao) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new ResponsavelModel();

                $obj_out->IdResponsavel = $obj_in->IdResponsavel;
                $obj_out->IdPessoa = $obj_in->IdPessoa;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Telefone = $obj_in->Telefone;
                $obj_out->Email = $obj_in->Email;
                $obj_out->grauparentesco = $obj_in->grauparentesco;
                $obj_out->Observacao = $obj_in->Observacao;

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
    public function loadById( string $IdResponsavel )
    {
        $obj = $this->objectByFields($IdResponsavel, null, null, null, null, null, null);
        if ($obj) {
            $this->IdResponsavel = $obj->IdResponsavel;
            $this->IdPessoa = $obj->IdPessoa;
            $this->Nome = $obj->Nome;
            $this->Telefone = $obj->Telefone;
            $this->Email = $obj->Email;
            $this->grauparentesco = $obj->grauparentesco;
            $this->Observacao = $obj->Observacao;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdPessoaNome
    // Verifica se um registro existe com IdPessoa, Nome
    // --------------------------------------------------------------------------------
    public function existsIdPessoaNome()
    {
        $obj = $this->objectByFields(null, $this->IdPessoa, $this->Nome, null, null, null, null);
        return !($obj && ($obj->IdResponsavel === $this->IdResponsavel));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdResponsavel = null,
        string $IdPessoa = null,
        string $Nome = null,
        string $Telefone = null,
        string $Email = null,
        string $grauparentesco = null,
        string $Observacao = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    responsavel
                where 1 = 1";

        if (isset($IdResponsavel)) { $sql = $sql . " and (idresponsavel like " . $this->o_db->quote("%" . $IdResponsavel . "%") . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa like " . $this->o_db->quote("%" . $IdPessoa . "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome like " . $this->o_db->quote("%" . $Nome . "%") . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone like " . $this->o_db->quote("%" . $Telefone . "%") . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email like " . $this->o_db->quote("%" . $Email . "%") . ")"; }
        if (isset($grauparentesco)) { $sql = $sql . " and (grauparentesco like " . $this->o_db->quote("%" . $grauparentesco . "%") . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao like " . $this->o_db->quote("%" . $Observacao . "%") . ")"; }

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
    // countByIdPessoaNome
    // Conta os registros com base em IdPessoa, Nome
    // --------------------------------------------------------------------------------
    public function countByIdPessoaNome(
        string $IdPessoa = null,
        string $Nome = null)
    {
        return $this->countBy(null, $IdPessoa, $Nome, null, null, null, null);
    }

}

?>
