<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// LoginModel
// Classe para realização do login.
//
// Gerado em: 2018-03-09 07:03:24
// --------------------------------------------------------------------------------
class LoginModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe e criada
    function __construct() {
        parent::__construct();
    }

    private $GOEDUCA_TPLOGIN_PESSOA    = 1;
    private $GOEDUCA_TPLOGIN_PROFESSOR = 2;
    private $GOEDUCA_TPLOGIN_GESTOR    = 3;

    private $CodigoAcesso;
    private $Senha;
    private $TipoLogin;
    private $Id;
    private $IdInstituicao;

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "CodigoAcesso") { return $this->CodigoAcesso; }
        if ($name === "Senha") { return $this->Senha; }
        if ($name === "TipoLogin") { return $this->TipoLogin; }
        if ($name === "Id") { return $this->Id; }
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
        throw new Exception( $name . ' => Propriedade inválida.');
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "CodigoAcesso") { $this->CodigoAcesso = $value; return $value; }
        if($name === "Senha") { $this->Senha = $value; return $value; }
        if($name === "TipoLogin") { $this->TipoLogin = $value; return $value; }
        if($name === "Id") { $this->Id = $value; return $value; }
        if($name === "IdInstituicao") { $this->IdInstituicao = $value; return $value; }
        throw new Exception( $name . ' => Propriedade inválida.');
    }

    public function login()
    {
        if (!isset($this->CodigoAcesso) || ($this->CodigoAcesso == '')) {
            $this->TipoLogin = null;
            $this->Id = null;
            return false;
        }
        // login para Pessoa
        $sql = "select codigoacesso.idpessoa as IdPessoa,
                       codigoacesso.idinstituicao as IdInstituicao,
                       perfil as Perfil
                  from codigoacesso
                 where codigoacesso.codigoacesso = " . $this->o_db->quote($this->CodigoAcesso) . "
                       and
                       codigoacesso.senha = " . $this->o_db->quote($this->Senha) . "
                 limit 1";

        // le o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj = $resultset->fetchObject()) {
                $this->Id = $obj->IdPessoa;
                $this->IdInstituicao = $obj->IdInstituicao;
                if ($obj->IdPessoa = 'Pessoa') {
                    $this->TipoLogin = $this->GOEDUCA_TPLOGIN_PESSOA;
                }
                else if ($obj->IdPessoa = 'Professor') {
                    $this->TipoLogin = $this->GOEDUCA_TPLOGIN_PROFESSOR;
                }
                else {
                    $this->TipoLogin = $this->GOEDUCA_TPLOGIN_GESTOR;
                }
                
                return true;
            }
        }

        $this->TipoLogin = null;
        $this->Id = null;
        return false;
    }
}

?>
