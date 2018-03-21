<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// InstituicaoModel
//
// Institui��es que contratam o servi�o de aux�lio a educa��o via jogos (Escolas, Empresas, etc).
//
// Gerado em: 2018-03-16 07:24:52
// --------------------------------------------------------------------------------
class InstituicaoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdInstituicao = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdInstituicao;                                              // char(32), PK, obrigat�rio - Identificador da Institui��o
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome da Institui��o
    protected $RazaoSocial;                                                // varchar(256), obrigat�rio - Raz�o Social da Institui��o
    protected $Cnpj;                                                       // varchar(32), obrigat�rio - CNPJ da Institui��o
    protected $InscEstadual;                                               // varchar(32), opcional - Inscri��o Estadual da Institui��o
    protected $Endereco;                                                   // varchar(256), opcional - Endere�o
    protected $Complemento;                                                // varchar(256), opcional - Complemento do Endere�o
    protected $Bairro;                                                     // varchar(256), opcional - Bairro
    protected $Cidade;                                                     // varchar(256), opcional - Cidade
    protected $UF;                                                         // char(2), opcional - UF
    protected $Pais = 'Brasil';                                            // varchar(256), opcional - Pa�s
    protected $Telefone;                                                   // varchar(256), opcional - N�mero do telefone
    protected $Email;                                                      // varchar(256), opcional - Endere�o e-mail
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
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "RazaoSocial") { return $this->RazaoSocial; }
        if ($name === "Cnpj") { return $this->Cnpj; }
        if ($name === "InscEstadual") { return $this->InscEstadual; }
        if ($name === "Endereco") { return $this->Endereco; }
        if ($name === "Complemento") { return $this->Complemento; }
        if ($name === "Bairro") { return $this->Bairro; }
        if ($name === "Cidade") { return $this->Cidade; }
        if ($name === "UF") { return $this->UF; }
        if ($name === "Pais") { return $this->Pais; }
        if ($name === "Telefone") { return $this->Telefone; }
        if ($name === "Email") { return $this->Email; }
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
        if($name === "Nome") {
            $this->Nome = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Nome;
        }
        if($name === "RazaoSocial") {
            $this->RazaoSocial = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->RazaoSocial;
        }
        if($name === "Cnpj") {
            $this->Cnpj = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->Cnpj;
        }
        if($name === "InscEstadual") {
            $this->InscEstadual = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->InscEstadual;
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
                        instituicao
                    set 
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        razaosocial = " . ( isset($this->RazaoSocial) ? $this->o_db->quote($RazaoSocial) : "null" ) . ",
                        cnpj = " . ( isset($this->Cnpj) ? $this->o_db->quote($Cnpj) : "null" ) . ",
                        inscestadual = " . ( isset($this->InscEstadual) ? $this->o_db->quote($InscEstadual) : "null" ) . ",
                        endereco = " . ( isset($this->Endereco) ? $this->o_db->quote($Endereco) : "null" ) . ",
                        complemento = " . ( isset($this->Complemento) ? $this->o_db->quote($Complemento) : "null" ) . ",
                        bairro = " . ( isset($this->Bairro) ? $this->o_db->quote($Bairro) : "null" ) . ",
                        cidade = " . ( isset($this->Cidade) ? $this->o_db->quote($Cidade) : "null" ) . ",
                        uf = " . ( isset($this->UF) ? $this->o_db->quote($UF) : "null" ) . ",
                        pais = " . ( isset($this->Pais) ? $this->o_db->quote($Pais) : "null" ) . ",
                        telefone = " . ( isset($this->Telefone) ? $this->o_db->quote($Telefone) : "null" ) . ",
                        email = " . ( isset($this->Email) ? $this->o_db->quote($Email) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        instituicao (
                            idinstituicao,
                            nome,
                            razaosocial,
                            cnpj,
                            inscestadual,
                            endereco,
                            complemento,
                            bairro,
                            cidade,
                            uf,
                            pais,
                            telefone,
                            email,
                            status
                        )
                        values (
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                            " . ( isset($this->RazaoSocial) ? $this->o_db->quote($RazaoSocial) : "null" ) . ",
                            " . ( isset($this->Cnpj) ? $this->o_db->quote($Cnpj) : "null" ) . ",
                            " . ( isset($this->InscEstadual) ? $this->o_db->quote($InscEstadual) : "null" ) . ",
                            " . ( isset($this->Endereco) ? $this->o_db->quote($Endereco) : "null" ) . ",
                            " . ( isset($this->Complemento) ? $this->o_db->quote($Complemento) : "null" ) . ",
                            " . ( isset($this->Bairro) ? $this->o_db->quote($Bairro) : "null" ) . ",
                            " . ( isset($this->Cidade) ? $this->o_db->quote($Cidade) : "null" ) . ",
                            " . ( isset($this->UF) ? $this->o_db->quote($UF) : "null" ) . ",
                            " . ( isset($this->Pais) ? $this->o_db->quote($Pais) : "null" ) . ",
                            " . ( isset($this->Telefone) ? $this->o_db->quote($Telefone) : "null" ) . ",
                            " . ( isset($this->Email) ? $this->o_db->quote($Email) : "null" ) . ",
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
        if (isset($this->IdInstituicao)) {
            $sql = "delete from 
                        instituicao
                     where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . ""; 
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
        string $Nome = null,
        string $RazaoSocial = null,
        string $Cnpj = null,
        string $InscEstadual = null,
        string $Endereco = null,
        string $Complemento = null,
        string $Bairro = null,
        string $Cidade = null,
        string $UF = null,
        string $Pais = null,
        string $Telefone = null,
        string $Email = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idinstituicao as IdInstituicao,
                    nome as Nome,
                    razaosocial as RazaoSocial,
                    cnpj as Cnpj,
                    inscestadual as InscEstadual,
                    endereco as Endereco,
                    complemento as Complemento,
                    bairro as Bairro,
                    cidade as Cidade,
                    uf as UF,
                    pais as Pais,
                    telefone as Telefone,
                    email as Email,
                    status as Status
                from
                    instituicao
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($RazaoSocial)) { $sql = $sql . " and (razaosocial = " . $this->o_db->quote("%" . $RazaoSocial. "%") . ")"; }
        if (isset($Cnpj)) { $sql = $sql . " and (cnpj = " . $this->o_db->quote("%" . $Cnpj. "%") . ")"; }
        if (isset($InscEstadual)) { $sql = $sql . " and (inscestadual = " . $this->o_db->quote("%" . $InscEstadual. "%") . ")"; }
        if (isset($Endereco)) { $sql = $sql . " and (endereco = " . $this->o_db->quote("%" . $Endereco. "%") . ")"; }
        if (isset($Complemento)) { $sql = $sql . " and (complemento = " . $this->o_db->quote("%" . $Complemento. "%") . ")"; }
        if (isset($Bairro)) { $sql = $sql . " and (bairro = " . $this->o_db->quote("%" . $Bairro. "%") . ")"; }
        if (isset($Cidade)) { $sql = $sql . " and (cidade = " . $this->o_db->quote("%" . $Cidade. "%") . ")"; }
        if (isset($UF)) { $sql = $sql . " and (uf = " . $this->o_db->quote("%" . $UF. "%") . ")"; }
        if (isset($Pais)) { $sql = $sql . " and (pais = " . $this->o_db->quote("%" . $Pais. "%") . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone = " . $this->o_db->quote("%" . $Telefone. "%") . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email = " . $this->o_db->quote("%" . $Email. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_instituicao = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new InstituicaoModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->RazaoSocial = $obj_in->RazaoSocial;
                $obj_out->Cnpj = $obj_in->Cnpj;
                $obj_out->InscEstadual = $obj_in->InscEstadual;
                $obj_out->Endereco = $obj_in->Endereco;
                $obj_out->Complemento = $obj_in->Complemento;
                $obj_out->Bairro = $obj_in->Bairro;
                $obj_out->Cidade = $obj_in->Cidade;
                $obj_out->UF = $obj_in->UF;
                $obj_out->Pais = $obj_in->Pais;
                $obj_out->Telefone = $obj_in->Telefone;
                $obj_out->Email = $obj_in->Email;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_instituicao, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_instituicao;
    }

    // --------------------------------------------------------------------------------
    // listByNome
    // Lista os registros com base em Nome
    // --------------------------------------------------------------------------------
    public function listByNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $Nome, null, null, null, null, null, null, null, null, null, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdInstituicao = null,
        string $Nome = null,
        string $RazaoSocial = null,
        string $Cnpj = null,
        string $InscEstadual = null,
        string $Endereco = null,
        string $Complemento = null,
        string $Bairro = null,
        string $Cidade = null,
        string $UF = null,
        string $Pais = null,
        string $Telefone = null,
        string $Email = null,
        string $Status = null)
    {
        $sql = "select
                    idinstituicao as IdInstituicao,
                    nome as Nome,
                    razaosocial as RazaoSocial,
                    cnpj as Cnpj,
                    inscestadual as InscEstadual,
                    endereco as Endereco,
                    complemento as Complemento,
                    bairro as Bairro,
                    cidade as Cidade,
                    uf as UF,
                    pais as Pais,
                    telefone as Telefone,
                    email as Email,
                    status as Status
                from
                    instituicao
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($RazaoSocial)) { $sql = $sql . " and (razaosocial = " . $this->o_db->quote($RazaoSocial) . ")"; }
        if (isset($Cnpj)) { $sql = $sql . " and (cnpj = " . $this->o_db->quote($Cnpj) . ")"; }
        if (isset($InscEstadual)) { $sql = $sql . " and (inscestadual = " . $this->o_db->quote($InscEstadual) . ")"; }
        if (isset($Endereco)) { $sql = $sql . " and (endereco = " . $this->o_db->quote($Endereco) . ")"; }
        if (isset($Complemento)) { $sql = $sql . " and (complemento = " . $this->o_db->quote($Complemento) . ")"; }
        if (isset($Bairro)) { $sql = $sql . " and (bairro = " . $this->o_db->quote($Bairro) . ")"; }
        if (isset($Cidade)) { $sql = $sql . " and (cidade = " . $this->o_db->quote($Cidade) . ")"; }
        if (isset($UF)) { $sql = $sql . " and (uf = " . $this->o_db->quote($UF) . ")"; }
        if (isset($Pais)) { $sql = $sql . " and (pais = " . $this->o_db->quote($Pais) . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone = " . $this->o_db->quote($Telefone) . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email = " . $this->o_db->quote($Email) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new InstituicaoModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->RazaoSocial = $obj_in->RazaoSocial;
                $obj_out->Cnpj = $obj_in->Cnpj;
                $obj_out->InscEstadual = $obj_in->InscEstadual;
                $obj_out->Endereco = $obj_in->Endereco;
                $obj_out->Complemento = $obj_in->Complemento;
                $obj_out->Bairro = $obj_in->Bairro;
                $obj_out->Cidade = $obj_in->Cidade;
                $obj_out->UF = $obj_in->UF;
                $obj_out->Pais = $obj_in->Pais;
                $obj_out->Telefone = $obj_in->Telefone;
                $obj_out->Email = $obj_in->Email;
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
    public function loadById( string $IdInstituicao )
    {
        $obj = $this->objectByFields($IdInstituicao, null, null, null, null, null, null, null, null, null, null, null, null, null);
        if ($obj) {
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->Nome = $obj->Nome;
            $this->RazaoSocial = $obj->RazaoSocial;
            $this->Cnpj = $obj->Cnpj;
            $this->InscEstadual = $obj->InscEstadual;
            $this->Endereco = $obj->Endereco;
            $this->Complemento = $obj->Complemento;
            $this->Bairro = $obj->Bairro;
            $this->Cidade = $obj->Cidade;
            $this->UF = $obj->UF;
            $this->Pais = $obj->Pais;
            $this->Telefone = $obj->Telefone;
            $this->Email = $obj->Email;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsNome
    // Verifica se um registro existe com Nome
    // --------------------------------------------------------------------------------
    public function existsNome()
    {
        $obj = $this->objectByFields(null, $this->Nome, null, null, null, null, null, null, null, null, null, null, null, null);
        return !($obj && ($obj->IdInstituicao === $this->IdInstituicao));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdInstituicao = null,
        string $Nome = null,
        string $RazaoSocial = null,
        string $Cnpj = null,
        string $InscEstadual = null,
        string $Endereco = null,
        string $Complemento = null,
        string $Bairro = null,
        string $Cidade = null,
        string $UF = null,
        string $Pais = null,
        string $Telefone = null,
        string $Email = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    instituicao
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome like " . $this->o_db->quote("%" . $Nome . "%") . ")"; }
        if (isset($RazaoSocial)) { $sql = $sql . " and (razaosocial like " . $this->o_db->quote("%" . $RazaoSocial . "%") . ")"; }
        if (isset($Cnpj)) { $sql = $sql . " and (cnpj like " . $this->o_db->quote("%" . $Cnpj . "%") . ")"; }
        if (isset($InscEstadual)) { $sql = $sql . " and (inscestadual like " . $this->o_db->quote("%" . $InscEstadual . "%") . ")"; }
        if (isset($Endereco)) { $sql = $sql . " and (endereco like " . $this->o_db->quote("%" . $Endereco . "%") . ")"; }
        if (isset($Complemento)) { $sql = $sql . " and (complemento like " . $this->o_db->quote("%" . $Complemento . "%") . ")"; }
        if (isset($Bairro)) { $sql = $sql . " and (bairro like " . $this->o_db->quote("%" . $Bairro . "%") . ")"; }
        if (isset($Cidade)) { $sql = $sql . " and (cidade like " . $this->o_db->quote("%" . $Cidade . "%") . ")"; }
        if (isset($UF)) { $sql = $sql . " and (uf like " . $this->o_db->quote("%" . $UF . "%") . ")"; }
        if (isset($Pais)) { $sql = $sql . " and (pais like " . $this->o_db->quote("%" . $Pais . "%") . ")"; }
        if (isset($Telefone)) { $sql = $sql . " and (telefone like " . $this->o_db->quote("%" . $Telefone . "%") . ")"; }
        if (isset($Email)) { $sql = $sql . " and (email like " . $this->o_db->quote("%" . $Email . "%") . ")"; }
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
    // countByNome
    // Conta os registros com base em Nome
    // --------------------------------------------------------------------------------
    public function countByNome(
        string $Nome = null)
    {
        return $this->countBy(null, $Nome, null, null, null, null, null, null, null, null, null, null, null, null);
    }

}

?>
