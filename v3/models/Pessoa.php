<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// PessoaModel
//
// Pessoas (alunos) que ir�o utilizar a plataforma como meio de aprendizado.
//
// Gerado em: 2018-03-16 07:25:15
// --------------------------------------------------------------------------------
class PessoaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdPessoa = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdPessoa;                                                   // char(32), PK, obrigat�rio - Identificador da Pessoa
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome da Pessoa
    protected $DataNasc;                                                   // date, opcional - Data de Nascimento da Pessoa
    protected $Sexo = 'M';                                                 // char(1), obrigat�rio - Sexo da Pessoa
    protected $Endereco;                                                   // varchar(256), opcional - Endere�o
    protected $Complemento;                                                // varchar(256), opcional - Complemento do Endere�o
    protected $Bairro;                                                     // varchar(256), opcional - Bairro
    protected $Cidade;                                                     // varchar(256), opcional - Cidade
    protected $UF;                                                         // char(2), opcional - UF
    protected $Pais = 'Brasil';                                            // varchar(256), opcional - Pa�s
    protected $Telefone;                                                   // varchar(256), opcional - N�mero do telefone
    protected $Email;                                                      // varchar(256), opcional - Endere�o e-mail
    protected $Apelido;                                                    // varchar(64), opcional - Como a pessoa deseja ser conhecida
    protected $PNE = false;                                                // tinyint(1), obrigat�rio - Portadora de Necessidades Especiais
    protected $Observacao;                                                 // text, opcional - Observa��es sobre a pessoa
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdPessoa") { return $this->IdPessoa; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "DataNasc") { return ($this->DataNasc ? $this->DataNasc->format("d-m-Y") : null); }
        if ($name === "Sexo") { return $this->Sexo; }
        if ($name === "Endereco") { return $this->Endereco; }
        if ($name === "Complemento") { return $this->Complemento; }
        if ($name === "Bairro") { return $this->Bairro; }
        if ($name === "Cidade") { return $this->Cidade; }
        if ($name === "UF") { return $this->UF; }
        if ($name === "Pais") { return $this->Pais; }
        if ($name === "Telefone") { return $this->Telefone; }
        if ($name === "Email") { return $this->Email; }
        if ($name === "Apelido") { return $this->Apelido; }
        if ($name === "PNE") { return $this->PNE; }
        if ($name === "Observacao") { return $this->Observacao; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
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
        if($name === "DataNasc") {
            $mydate = DateTime::createFromFormat("d-m-Y", $value);
            $this->DataNasc = ($mydate ? $mydate : null);
            $this->_iSaved_ = false;
            return $this->DataNasc.format("d-m-Y");
        }
        if($name === "Sexo") {
            $this->Sexo = substr($value, 0, 1);
            $this->_iSaved_ = false;
            return $this->Sexo;
        }
        if($name === "Endereco") {
            $this->Endereco = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Endereco;
        }
        if($name === "Complemento") {
            $this->Complemento = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Complemento;
        }
        if($name === "Bairro") {
            $this->Bairro = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Bairro;
        }
        if($name === "Cidade") {
            $this->Cidade = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Cidade;
        }
        if($name === "UF") {
            $this->UF = substr($value, 0, 2);
            $this->_iSaved_ = false;
            return $this->UF;
        }
        if($name === "Pais") {
            $this->Pais = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Pais;
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
        if($name === "Apelido") {
            $this->Apelido = substr($value, 0, 64);
            $this->_iSaved_ = false;
            return $this->Apelido;
        }
        if($name === "PNE") {
            $this->PNE = (is_numeric($value) ? (bool) $value : null);
            $this->_iSaved_ = false;
            return $this->PNE;
        }
        if($name === "Observacao") {
            $this->Observacao = $value;
            $this->_iSaved_ = false;
            return $this->Observacao;
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
                        pessoa
                    set 
                        idpessoa = " . ( isset($this->IdPessoa) ? $this->o_db->quote($IdPessoa) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        datanasc = " . ( isset($this->DataNasc) ? $this->DataNasc->format("Y-m-d") : "null" ) . ",
                        sexo = " . ( isset($this->Sexo) ? $this->o_db->quote($Sexo) : "null" ) . ",
                        endereco = " . ( isset($this->Endereco) ? $this->o_db->quote($Endereco) : "null" ) . ",
                        complemento = " . ( isset($this->Complemento) ? $this->o_db->quote($Complemento) : "null" ) . ",
                        bairro = " . ( isset($this->Bairro) ? $this->o_db->quote($Bairro) : "null" ) . ",
                        cidade = " . ( isset($this->Cidade) ? $this->o_db->quote($Cidade) : "null" ) . ",
                        uf = " . ( isset($this->UF) ? $this->o_db->quote($UF) : "null" ) . ",
                        pais = " . ( isset($this->Pais) ? $this->o_db->quote($Pais) : "null" ) . ",
                        telefone = " . ( isset($this->Telefone) ? $this->o_db->quote($Telefone) : "null" ) . ",
                        email = " . ( isset($this->Email) ? $this->o_db->quote($Email) : "null" ) . ",
                        apelido = " . ( isset($this->Apelido) ? $this->o_db->quote($Apelido) : "null" ) . ",
                        pne = " . ( isset($this->PNE) ? $this->o_db->quote($this->PNE) : "null" ) . ",
                        observacao = " . ( isset($this->Observacao) ? $this->o_db->quote($Observacao) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idpessoa" . ( isset($this->IdPessoa) ? " = " . $this->o_db->quote($this->IdPessoa) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        pessoa (
                            idpessoa,
                            nome,
                            datanasc,
                            sexo,
                            endereco,
                            complemento,
                            bairro,
                            cidade,
                            uf,
                            pais,
                            telefone,
                            email,
                            apelido,
                            pne,
                            observacao,
                            status
                        )
                        values (
                            " . ( isset($this->IdPessoa) ? $this->o_db->quote($IdPessoa) : "null" ) . ",
                            " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                            " . ( isset($this->DataNasc) ? $this->DataNasc->format("Y-m-d") : "null" ) . ",
                            " . ( isset($this->Sexo) ? $this->o_db->quote($Sexo) : "null" ) . ",
                            " . ( isset($this->Endereco) ? $this->o_db->quote($Endereco) : "null" ) . ",
                            " . ( isset($this->Complemento) ? $this->o_db->quote($Complemento) : "null" ) . ",
                            " . ( isset($this->Bairro) ? $this->o_db->quote($Bairro) : "null" ) . ",
                            " . ( isset($this->Cidade) ? $this->o_db->quote($Cidade) : "null" ) . ",
                            " . ( isset($this->UF) ? $this->o_db->quote($UF) : "null" ) . ",
                            " . ( isset($this->Pais) ? $this->o_db->quote($Pais) : "null" ) . ",
                            " . ( isset($this->Telefone) ? $this->o_db->quote($Telefone) : "null" ) . ",
                            " . ( isset($this->Email) ? $this->o_db->quote($Email) : "null" ) . ",
                            " . ( isset($this->Apelido) ? $this->o_db->quote($Apelido) : "null" ) . ",
                            " . ( isset($this->PNE) ? $this->o_db->quote($this->PNE) : "null" ) . ",
                            " . ( isset($this->Observacao) ? $this->o_db->quote($Observacao) : "null" ) . ",
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
        if (isset($this->IdPessoa)) {
            $sql = "delete from 
                        pessoa
                     where 
                        idpessoa" . ( isset($this->IdPessoa) ? " = " . $this->o_db->quote($this->IdPessoa) : " is null" ) . ""; 
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
        string $IdPessoa = null,
        string $Nome = null,
        string $DataNasc = null,
        string $Sexo = null,
        string $Endereco = null,
        string $Complemento = null,
        string $Bairro = null,
        string $Cidade = null,
        string $UF = null,
        string $Pais = null,
        string $Telefone = null,
        string $Email = null,
        string $Apelido = null,
        bool $PNE = null,
        string $Observacao = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idpessoa as IdPessoa,
                    nome as Nome,
                    datanasc as DataNasc,
                    sexo as Sexo,
                    endereco as Endereco,
                    complemento as Complemento,
                    bairro as Bairro,
                    cidade as Cidade,
                    uf as UF,
                    pais as Pais,
                    telefone as Telefone,
                    email as Email,
                    apelido as Apelido,
                    pne as PNE,
                    observacao as Observacao,
                    status as Status
                from
                    pessoa
                where 1 = 1";

        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa = " . $this->o_db->quote("%" . $IdPessoa. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($DataNasc)) { $sql = $sql . " and (datanasc = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataNasc) ? DateTime::createFromFormat("d-m-Y", $DataNasc)->format("Y-m-d") : "") . "'" . ")"; }
        if (isset($Sexo)) { $sql = $sql . " and (sexo = " . $this->o_db->quote("%" . $Sexo. "%") . ")"; }
        if (isset($Endereco)) { $sql = $sql . " and (endereco = " . $this->o_db->quote("%" . $Endereco. "%") . ")"; }
        if (isset($Complemento)) { $sql = $sql . " and (complemento = " . $this->o_db->quote("%" . $Complemento. "%") . ")"; }
        if (isset($Bairro)) { $sql = $sql . " and (bairro = " . $this->o_db->quote("%" . $Bairro. "%") . ")"; }
        if (isset($Cidade)) { $sql = $sql . " and (cidade = " . $this->o_db->quote("%" . $Cidade. "%") . ")"; }
        if (isset($UF)) { $sql = $sql . " and (uf = " . $this->o_db->quote("%" . $UF. "%") . ")"; }
        if (isset($Pais)) { $sql = $sql . " and (pais = " . $this->o_db->quote("%" . $Pais. "%") . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone = " . $this->o_db->quote("%" . $Telefone. "%") . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email = " . $this->o_db->quote("%" . $Email. "%") . ")"; }
        if (isset($Apelido)) { $sql = $sql . " and (apelido = " . $this->o_db->quote("%" . $Apelido. "%") . ")"; }
        if (isset($PNE)) { $sql = $sql . " and (pne = " . PNE . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao = " . $this->o_db->quote("%" . $Observacao. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_pessoa = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new PessoaModel();

                $obj_out->IdPessoa = $obj_in->IdPessoa;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->DataNasc = $obj_in->DataNasc;
                $obj_out->Sexo = $obj_in->Sexo;
                $obj_out->Endereco = $obj_in->Endereco;
                $obj_out->Complemento = $obj_in->Complemento;
                $obj_out->Bairro = $obj_in->Bairro;
                $obj_out->Cidade = $obj_in->Cidade;
                $obj_out->UF = $obj_in->UF;
                $obj_out->Pais = $obj_in->Pais;
                $obj_out->Telefone = $obj_in->Telefone;
                $obj_out->Email = $obj_in->Email;
                $obj_out->Apelido = $obj_in->Apelido;
                $obj_out->PNE = $obj_in->PNE;
                $obj_out->Observacao = $obj_in->Observacao;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_pessoa, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_pessoa;
    }

    // --------------------------------------------------------------------------------
    // listByNomeDataNasc
    // Lista os registros com base em Nome, DataNasc
    // --------------------------------------------------------------------------------
    public function listByNomeDataNasc(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $Nome = null,
        string $DataNasc = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $Nome, $DataNasc, null, null, null, null, null, null, null, null, null, null, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // listByApelido
    // Lista os registros com base em Apelido
    // --------------------------------------------------------------------------------
    public function listByApelido(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $Apelido = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, null, null, null, null, null, null, null, null, null, null, null, $Apelido, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdPessoa = null,
        string $Nome = null,
        string $DataNasc = null,
        string $Sexo = null,
        string $Endereco = null,
        string $Complemento = null,
        string $Bairro = null,
        string $Cidade = null,
        string $UF = null,
        string $Pais = null,
        string $Telefone = null,
        string $Email = null,
        string $Apelido = null,
        bool $PNE = null,
        string $Observacao = null,
        string $Status = null)
    {
        $sql = "select
                    idpessoa as IdPessoa,
                    nome as Nome,
                    datanasc as DataNasc,
                    sexo as Sexo,
                    endereco as Endereco,
                    complemento as Complemento,
                    bairro as Bairro,
                    cidade as Cidade,
                    uf as UF,
                    pais as Pais,
                    telefone as Telefone,
                    email as Email,
                    apelido as Apelido,
                    pne as PNE,
                    observacao as Observacao,
                    status as Status
                from
                    pessoa
                where 1 = 1";

        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa = " . $this->o_db->quote($IdPessoa) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($DataNasc)) { $sql = $sql . " and (datanasc = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataNasc) ? DateTime::createFromFormat("d-m-Y", $DataNasc)->format("Y-m-d") : "") . "'" . ")"; }
        if (isset($Sexo)) { $sql = $sql . " and (sexo = " . $this->o_db->quote($Sexo) . ")"; }
        if (isset($Endereco)) { $sql = $sql . " and (endereco = " . $this->o_db->quote($Endereco) . ")"; }
        if (isset($Complemento)) { $sql = $sql . " and (complemento = " . $this->o_db->quote($Complemento) . ")"; }
        if (isset($Bairro)) { $sql = $sql . " and (bairro = " . $this->o_db->quote($Bairro) . ")"; }
        if (isset($Cidade)) { $sql = $sql . " and (cidade = " . $this->o_db->quote($Cidade) . ")"; }
        if (isset($UF)) { $sql = $sql . " and (uf = " . $this->o_db->quote($UF) . ")"; }
        if (isset($Pais)) { $sql = $sql . " and (pais = " . $this->o_db->quote($Pais) . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone = " . $this->o_db->quote($Telefone) . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email = " . $this->o_db->quote($Email) . ")"; }
        if (isset($Apelido)) { $sql = $sql . " and (apelido = " . $this->o_db->quote($Apelido) . ")"; }
        if (isset($PNE)) { $sql = $sql . " and (pne = " . PNE . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao = " . $this->o_db->quote($Observacao) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new PessoaModel();

                $obj_out->IdPessoa = $obj_in->IdPessoa;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->DataNasc = $obj_in->DataNasc;
                $obj_out->Sexo = $obj_in->Sexo;
                $obj_out->Endereco = $obj_in->Endereco;
                $obj_out->Complemento = $obj_in->Complemento;
                $obj_out->Bairro = $obj_in->Bairro;
                $obj_out->Cidade = $obj_in->Cidade;
                $obj_out->UF = $obj_in->UF;
                $obj_out->Pais = $obj_in->Pais;
                $obj_out->Telefone = $obj_in->Telefone;
                $obj_out->Email = $obj_in->Email;
                $obj_out->Apelido = $obj_in->Apelido;
                $obj_out->PNE = $obj_in->PNE;
                $obj_out->Observacao = $obj_in->Observacao;
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
    public function loadById( string $IdPessoa )
    {
        $obj = $this->objectByFields($IdPessoa, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
        if ($obj) {
            $this->IdPessoa = $obj->IdPessoa;
            $this->Nome = $obj->Nome;
            $this->DataNasc = $obj->DataNasc;
            $this->Sexo = $obj->Sexo;
            $this->Endereco = $obj->Endereco;
            $this->Complemento = $obj->Complemento;
            $this->Bairro = $obj->Bairro;
            $this->Cidade = $obj->Cidade;
            $this->UF = $obj->UF;
            $this->Pais = $obj->Pais;
            $this->Telefone = $obj->Telefone;
            $this->Email = $obj->Email;
            $this->Apelido = $obj->Apelido;
            $this->PNE = $obj->PNE;
            $this->Observacao = $obj->Observacao;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsNomeDataNasc
    // Verifica se um registro existe com Nome, DataNasc
    // --------------------------------------------------------------------------------
    public function existsNomeDataNasc()
    {
        $obj = $this->objectByFields(null, $this->Nome, $this->DataNasc, null, null, null, null, null, null, null, null, null, null, null, null, null);
        return !($obj && ($obj->IdPessoa === $this->IdPessoa));
    }

    // --------------------------------------------------------------------------------
    // existsApelido
    // Verifica se um registro existe com Apelido
    // --------------------------------------------------------------------------------
    public function existsApelido()
    {
        $obj = $this->objectByFields(null, null, null, null, null, null, null, null, null, null, null, null, $this->Apelido, null, null, null);
        return !($obj && ($obj->IdPessoa === $this->IdPessoa));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdPessoa = null,
        string $Nome = null,
        string $DataNasc = null,
        string $Sexo = null,
        string $Endereco = null,
        string $Complemento = null,
        string $Bairro = null,
        string $Cidade = null,
        string $UF = null,
        string $Pais = null,
        string $Telefone = null,
        string $Email = null,
        string $Apelido = null,
        bool $PNE = null,
        string $Observacao = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    pessoa
                where 1 = 1";

        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa like " . $this->o_db->quote("%" . $IdPessoa . "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome like " . $this->o_db->quote("%" . $Nome . "%") . ")"; }
        if (isset($DataNasc)) { $sql = $sql . " and (datanasc = " . "'" . (DateTime::createFromFormat("d-m-Y", $DataNasc) ? DateTime::createFromFormat("d-m-Y", $DataNasc)->format("Y-m-d") : "") . "'" . ")"; }
        if (isset($Sexo)) { $sql = $sql . " and (sexo like " . $this->o_db->quote("%" . $Sexo . "%") . ")"; }
        if (isset($Endereco)) { $sql = $sql . " and (endereco like " . $this->o_db->quote("%" . $Endereco . "%") . ")"; }
        if (isset($Complemento)) { $sql = $sql . " and (complemento like " . $this->o_db->quote("%" . $Complemento . "%") . ")"; }
        if (isset($Bairro)) { $sql = $sql . " and (bairro like " . $this->o_db->quote("%" . $Bairro . "%") . ")"; }
        if (isset($Cidade)) { $sql = $sql . " and (cidade like " . $this->o_db->quote("%" . $Cidade . "%") . ")"; }
        if (isset($UF)) { $sql = $sql . " and (uf like " . $this->o_db->quote("%" . $UF . "%") . ")"; }
        if (isset($Pais)) { $sql = $sql . " and (pais like " . $this->o_db->quote("%" . $Pais . "%") . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone like " . $this->o_db->quote("%" . $Telefone . "%") . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email like " . $this->o_db->quote("%" . $Email . "%") . ")"; }
        if (isset($Apelido)) { $sql = $sql . " and (apelido like " . $this->o_db->quote("%" . $Apelido . "%") . ")"; }
        if (isset($PNE)) { $sql = $sql . " and (pne = " . PNE . ")"; }
        if (isset($Observacao)) { $sql = $sql . " and (observacao like " . $this->o_db->quote("%" . $Observacao . "%") . ")"; }
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
    // countByNomeDataNasc
    // Conta os registros com base em Nome, DataNasc
    // --------------------------------------------------------------------------------
    public function countByNomeDataNasc(
        string $Nome = null,
        string $DataNasc = null)
    {
        return $this->countBy(null, $Nome, $DataNasc, null, null, null, null, null, null, null, null, null, null, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // countByApelido
    // Conta os registros com base em Apelido
    // --------------------------------------------------------------------------------
    public function countByApelido(
        string $Apelido = null)
    {
        return $this->countBy(null, null, null, null, null, null, null, null, null, null, null, null, $Apelido, null, null, null);
    }

}

?>
