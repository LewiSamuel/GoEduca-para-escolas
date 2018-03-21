<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// CodigoAcessoModel
//
// Gera o c�digo de acesso �nico por pessoa.
// 
// Aten��o:
// * Usu�rios GOEDUCA ter� o IDINSTITUICAO com o valor.
//
// Gerado em: 2018-03-16 07:24:01
// --------------------------------------------------------------------------------
class CodigoAcessoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();

    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdCodigoAcesso;                                             // bigint(20), PK, obrigat�rio - C�digo de Acesso Sequencial
    protected $IdPessoa;                                                   // char(32), FK, obrigat�rio - Identificador da Pessoa
    protected $IdInstituicao;                                              // char(32), FK, opcional - Identificador da Institui��o
    protected $perfil = 'Pessoa';                                          // varchar(32), obrigat�rio - Perfil para a pessoa junto a institui��o
    protected $CodigoAlfa;                                                 // varchar(32), opcional - Representa��o reduzida alfanum�rica do C�digo de Acesso
    protected $Senha;                                                      // varchar(256), opcional - Senha criptografada

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdCodigoAcesso") { return $this->IdCodigoAcesso; }
        if ($name === "IdPessoa") { return $this->IdPessoa; }
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
        if ($name === "perfil") { return $this->perfil; }
        if ($name === "CodigoAlfa") { return $this->CodigoAlfa; }
        if ($name === "Senha") { return $this->Senha; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdCodigoAcesso") {
            $this->IdCodigoAcesso = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->IdCodigoAcesso;
        }
        if($name === "IdPessoa") {
            $this->IdPessoa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdPessoa;
        }
        if($name === "IdInstituicao") {
            $this->IdInstituicao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdInstituicao;
        }
        if($name === "perfil") {
            $this->perfil = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->perfil;
        }
        if($name === "CodigoAlfa") {
            $this->CodigoAlfa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->CodigoAlfa;
        }
        if($name === "Senha") {
            $this->Senha = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Senha;
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
                        codigoacesso
                    set 
                        idcodigoacesso = " . ( isset($this->IdCodigoAcesso) ? $this->o_db->quote($this->IdCodigoAcesso) : "null" ) . ",
                        idpessoa = " . ( isset($this->IdPessoa) ? $this->o_db->quote($IdPessoa) : "null" ) . ",
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        perfil = " . ( isset($this->perfil) ? $this->o_db->quote($perfil) : "null" ) . ",
                        codigoalfa = " . ( isset($this->CodigoAlfa) ? $this->o_db->quote($CodigoAlfa) : "null" ) . ",
                        senha = " . ( isset($this->Senha) ? $this->o_db->quote($Senha) : "null" ) . "
                    where 
                        idcodigoacesso" . ( isset($this->IdCodigoAcesso) ? " = " . $this->o_db->quote($this->IdCodigoAcesso) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        codigoacesso (
                            idcodigoacesso,
                            idpessoa,
                            idinstituicao,
                            perfil,
                            codigoalfa,
                            senha
                        )
                        values (
                            null,
                            " . ( isset($this->IdPessoa) ? $this->o_db->quote($IdPessoa) : "null" ) . ",
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->perfil) ? $this->o_db->quote($perfil) : "null" ) . ",
                            " . ( isset($this->CodigoAlfa) ? $this->o_db->quote($CodigoAlfa) : "null" ) . ",
                            " . ( isset($this->Senha) ? $this->o_db->quote($Senha) : "null" ) . "
                        );";
        }

        if ($this->o_db->exec($sql) > 0) {
            if (!$regexists) {
                $this->IdCodigoAcesso = $this->o_db->lastInsertId();
            }
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
        if (isset($this->IdCodigoAcesso)) {
            $sql = "delete from 
                        codigoacesso
                     where 
                        idcodigoacesso" . ( isset($this->IdCodigoAcesso) ? " = " . $this->o_db->quote($this->IdCodigoAcesso) : " is null" ) . ""; 
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
        int $IdCodigoAcesso = null,
        string $IdPessoa = null,
        string $IdInstituicao = null,
        string $perfil = null,
        string $CodigoAlfa = null,
        string $Senha = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idcodigoacesso as IdCodigoAcesso,
                    idpessoa as IdPessoa,
                    idinstituicao as IdInstituicao,
                    perfil as perfil,
                    codigoalfa as CodigoAlfa,
                    senha as Senha
                from
                    codigoacesso
                where 1 = 1";

        if (isset($IdCodigoAcesso)) { $sql = $sql . " and (idcodigoacesso = " . IdCodigoAcesso . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa = " . $this->o_db->quote("%" . $IdPessoa. "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($perfil)) { $sql = $sql . " and (perfil = " . $this->o_db->quote("%" . $perfil. "%") . ")"; }
        if (isset($CodigoAlfa)) { $sql = $sql . " and (codigoalfa = " . $this->o_db->quote("%" . $CodigoAlfa. "%") . ")"; }
        if (isset($Senha)) { $sql = $sql . " and (senha = " . $this->o_db->quote("%" . $Senha. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_codigoacesso = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new CodigoAcessoModel();

                $obj_out->IdCodigoAcesso = $obj_in->IdCodigoAcesso;
                $obj_out->IdPessoa = $obj_in->IdPessoa;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->perfil = $obj_in->perfil;
                $obj_out->CodigoAlfa = $obj_in->CodigoAlfa;
                $obj_out->Senha = $obj_in->Senha;

                $obj_out->_isSaved_ = true;

                array_push($array_codigoacesso, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_codigoacesso;
    }

    // --------------------------------------------------------------------------------
    // listByIdPessoaIdInstituicaoperfil
    // Lista os registros com base em IdPessoa, IdInstituicao, perfil
    // --------------------------------------------------------------------------------
    public function listByIdPessoaIdInstituicaoperfil(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdPessoa = null,
        string $IdInstituicao = null,
        string $perfil = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdPessoa, $IdInstituicao, $perfil, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        int $IdCodigoAcesso = null,
        string $IdPessoa = null,
        string $IdInstituicao = null,
        string $perfil = null,
        string $CodigoAlfa = null,
        string $Senha = null)
    {
        $sql = "select
                    idcodigoacesso as IdCodigoAcesso,
                    idpessoa as IdPessoa,
                    idinstituicao as IdInstituicao,
                    perfil as perfil,
                    codigoalfa as CodigoAlfa,
                    senha as Senha
                from
                    codigoacesso
                where 1 = 1";

        if (isset($IdCodigoAcesso)) { $sql = $sql . " and (idcodigoacesso = " . IdCodigoAcesso . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa = " . $this->o_db->quote($IdPessoa) . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($perfil)) { $sql = $sql . " and (perfil = " . $this->o_db->quote($perfil) . ")"; }
        if (isset($CodigoAlfa)) { $sql = $sql . " and (codigoalfa = " . $this->o_db->quote($CodigoAlfa) . ")"; }
        if (isset($Senha)) { $sql = $sql . " and (senha = " . $this->o_db->quote($Senha) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new CodigoAcessoModel();

                $obj_out->IdCodigoAcesso = $obj_in->IdCodigoAcesso;
                $obj_out->IdPessoa = $obj_in->IdPessoa;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->perfil = $obj_in->perfil;
                $obj_out->CodigoAlfa = $obj_in->CodigoAlfa;
                $obj_out->Senha = $obj_in->Senha;

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
    public function loadById( int $IdCodigoAcesso )
    {
        $obj = $this->objectByFields($IdCodigoAcesso, null, null, null, null, null);
        if ($obj) {
            $this->IdCodigoAcesso = $obj->IdCodigoAcesso;
            $this->IdPessoa = $obj->IdPessoa;
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->perfil = $obj->perfil;
            $this->CodigoAlfa = $obj->CodigoAlfa;
            $this->Senha = $obj->Senha;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdPessoaIdInstituicaoperfil
    // Verifica se um registro existe com IdPessoa, IdInstituicao, perfil
    // --------------------------------------------------------------------------------
    public function existsIdPessoaIdInstituicaoperfil()
    {
        $obj = $this->objectByFields(null, $this->IdPessoa, $this->IdInstituicao, $this->perfil, null, null);
        return !($obj && ($obj->IdCodigoAcesso === $this->IdCodigoAcesso));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        int $IdCodigoAcesso = null,
        string $IdPessoa = null,
        string $IdInstituicao = null,
        string $perfil = null,
        string $CodigoAlfa = null,
        string $Senha = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    codigoacesso
                where 1 = 1";

        if (isset($IdCodigoAcesso)) { $sql = $sql . " and (idcodigoacesso = " . IdCodigoAcesso . ")"; }
        if (isset($IdPessoa)) { $sql = $sql . " and (idpessoa like " . $this->o_db->quote("%" . $IdPessoa . "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($perfil)) { $sql = $sql . " and (perfil like " . $this->o_db->quote("%" . $perfil . "%") . ")"; }
        if (isset($CodigoAlfa)) { $sql = $sql . " and (codigoalfa like " . $this->o_db->quote("%" . $CodigoAlfa . "%") . ")"; }
        if (isset($Senha)) { $sql = $sql . " and (senha like " . $this->o_db->quote("%" . $Senha . "%") . ")"; }

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
    // countByIdPessoaIdInstituicaoperfil
    // Conta os registros com base em IdPessoa, IdInstituicao, perfil
    // --------------------------------------------------------------------------------
    public function countByIdPessoaIdInstituicaoperfil(
        string $IdPessoa = null,
        string $IdInstituicao = null,
        string $perfil = null)
    {
        return $this->countBy(null, $IdPessoa, $IdInstituicao, $perfil, null, null);
    }

}

?>
