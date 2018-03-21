<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// EtapaModel
//
// Etapas dos Cursos disponibilizados na institui��o.
//
// Gerado em: 2018-03-16 07:24:17
// --------------------------------------------------------------------------------
class EtapaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdEtapa = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdEtapa;                                                    // char(32), PK, obrigat�rio - Identificador da Etapa de um Curso
    protected $IdInstituicao;                                              // char(32), PK, FK, obrigat�rio - Identificador da Institui��o
    protected $IdCurso;                                                    // char(32), PK, FK, obrigat�rio - Identificador do Curso
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome da Etapa de um Curso
    protected $Sigla;                                                      // varchar(32), obrigat�rio - Sigla da Etapa de um Curso
    protected $Duracao;                                                    // varchar(256), opcional - Dura��o pode ser: semanal, quinzenal, mensal, semestral, anual, etc
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdEtapa") { return $this->IdEtapa; }
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
        if ($name === "IdCurso") { return $this->IdCurso; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Sigla") { return $this->Sigla; }
        if ($name === "Duracao") { return $this->Duracao; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdEtapa") {
            $this->IdEtapa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdEtapa;
        }
        if($name === "IdInstituicao") {
            $this->IdInstituicao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdInstituicao;
        }
        if($name === "IdCurso") {
            $this->IdCurso = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdCurso;
        }
        if($name === "Nome") {
            $this->Nome = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Nome;
        }
        if($name === "Sigla") {
            $this->Sigla = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->Sigla;
        }
        if($name === "Duracao") {
            $this->Duracao = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Duracao;
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
                        etapa
                    set 
                        idetapa = " . ( isset($this->IdEtapa) ? $this->o_db->quote($IdEtapa) : "null" ) . ",
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        idcurso = " . ( isset($this->IdCurso) ? $this->o_db->quote($IdCurso) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        sigla = " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                        duracao = " . ( isset($this->Duracao) ? $this->o_db->quote($Duracao) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idetapa" . ( isset($this->IdEtapa) ? " = " . $this->o_db->quote($this->IdEtapa) : " is null" ) . "
                        and
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and
                        idcurso" . ( isset($this->IdCurso) ? " = " . $this->o_db->quote($this->IdCurso) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        etapa (
                            idetapa,
                            idinstituicao,
                            idcurso,
                            nome,
                            sigla,
                            duracao,
                            status
                        )
                        values (
                            " . ( isset($this->IdEtapa) ? $this->o_db->quote($IdEtapa) : "null" ) . ",
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->IdCurso) ? $this->o_db->quote($IdCurso) : "null" ) . ",
                            " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                            " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                            " . ( isset($this->Duracao) ? $this->o_db->quote($Duracao) : "null" ) . ",
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
        if (isset($this->IdEtapa) && isset($this->IdInstituicao) && isset($this->IdCurso)) {
            $sql = "delete from 
                        etapa
                     where 
                        idetapa" . ( isset($this->IdEtapa) ? " = " . $this->o_db->quote($this->IdEtapa) : " is null" ) . "
                        and 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and 
                        idcurso" . ( isset($this->IdCurso) ? " = " . $this->o_db->quote($this->IdCurso) : " is null" ) . ""; 
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
        string $IdEtapa = null,
        string $IdInstituicao = null,
        string $IdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Duracao = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idetapa as IdEtapa,
                    idinstituicao as IdInstituicao,
                    idcurso as IdCurso,
                    nome as Nome,
                    sigla as Sigla,
                    duracao as Duracao,
                    status as Status
                from
                    etapa
                where 1 = 1";

        if (isset($IdEtapa)) { $sql = $sql . " and (idetapa = " . $this->o_db->quote("%" . $IdEtapa. "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso = " . $this->o_db->quote("%" . $IdCurso. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote("%" . $Sigla. "%") . ")"; }
        if (isset($Duracao)) { $sql = $sql . " and (duracao = " . $this->o_db->quote("%" . $Duracao. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_etapa = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new EtapaModel();

                $obj_out->IdEtapa = $obj_in->IdEtapa;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdCurso = $obj_in->IdCurso;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Duracao = $obj_in->Duracao;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_etapa, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_etapa;
    }

    // --------------------------------------------------------------------------------
    // listByIdInstituicaoIdCursoNome
    // Lista os registros com base em IdInstituicao, IdCurso, Nome
    // --------------------------------------------------------------------------------
    public function listByIdInstituicaoIdCursoNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdInstituicao = null,
        string $IdCurso = null,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdInstituicao, $IdCurso, $Nome, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // listByIdInstituicaoIdCursoSigla
    // Lista os registros com base em IdInstituicao, IdCurso, Sigla
    // --------------------------------------------------------------------------------
    public function listByIdInstituicaoIdCursoSigla(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdInstituicao = null,
        string $IdCurso = null,
        string $Sigla = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdInstituicao, $IdCurso, null, $Sigla, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdEtapa = null,
        string $IdInstituicao = null,
        string $IdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Duracao = null,
        string $Status = null)
    {
        $sql = "select
                    idetapa as IdEtapa,
                    idinstituicao as IdInstituicao,
                    idcurso as IdCurso,
                    nome as Nome,
                    sigla as Sigla,
                    duracao as Duracao,
                    status as Status
                from
                    etapa
                where 1 = 1";

        if (isset($IdEtapa)) { $sql = $sql . " and (idetapa = " . $this->o_db->quote($IdEtapa) . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso = " . $this->o_db->quote($IdCurso) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote($Sigla) . ")"; }
        if (isset($Duracao)) { $sql = $sql . " and (duracao = " . $this->o_db->quote($Duracao) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new EtapaModel();

                $obj_out->IdEtapa = $obj_in->IdEtapa;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdCurso = $obj_in->IdCurso;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Duracao = $obj_in->Duracao;
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
    public function loadById( string $IdEtapa, string $IdInstituicao, string $IdCurso )
    {
        $obj = $this->objectByFields($IdEtapa, $IdInstituicao, $IdCurso, null, null, null, null);
        if ($obj) {
            $this->IdEtapa = $obj->IdEtapa;
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->IdCurso = $obj->IdCurso;
            $this->Nome = $obj->Nome;
            $this->Sigla = $obj->Sigla;
            $this->Duracao = $obj->Duracao;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdInstituicaoIdCursoNome
    // Verifica se um registro existe com IdInstituicao, IdCurso, Nome
    // --------------------------------------------------------------------------------
    public function existsIdInstituicaoIdCursoNome()
    {
        $obj = $this->objectByFields(null, $this->IdInstituicao, $this->IdCurso, $this->Nome, null, null, null);
        return !($obj && ($obj->IdEtapa === $this->IdEtapa) && ($obj->IdInstituicao === $this->IdInstituicao) && ($obj->IdCurso === $this->IdCurso));
    }

    // --------------------------------------------------------------------------------
    // existsIdInstituicaoIdCursoSigla
    // Verifica se um registro existe com IdInstituicao, IdCurso, Sigla
    // --------------------------------------------------------------------------------
    public function existsIdInstituicaoIdCursoSigla()
    {
        $obj = $this->objectByFields(null, $this->IdInstituicao, $this->IdCurso, null, $this->Sigla, null, null);
        return !($obj && ($obj->IdEtapa === $this->IdEtapa) && ($obj->IdInstituicao === $this->IdInstituicao) && ($obj->IdCurso === $this->IdCurso));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdEtapa = null,
        string $IdInstituicao = null,
        string $IdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Duracao = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    etapa
                where 1 = 1";

        if (isset($IdEtapa)) { $sql = $sql . " and (idetapa like " . $this->o_db->quote("%" . $IdEtapa . "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso like " . $this->o_db->quote("%" . $IdCurso . "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome like " . $this->o_db->quote("%" . $Nome . "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla like " . $this->o_db->quote("%" . $Sigla . "%") . ")"; }
        if (isset($Duracao)) { $sql = $sql . " and (duracao like " . $this->o_db->quote("%" . $Duracao . "%") . ")"; }
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
    // countByIdInstituicaoIdCursoNome
    // Conta os registros com base em IdInstituicao, IdCurso, Nome
    // --------------------------------------------------------------------------------
    public function countByIdInstituicaoIdCursoNome(
        string $IdInstituicao = null,
        string $IdCurso = null,
        string $Nome = null)
    {
        return $this->countBy(null, $IdInstituicao, $IdCurso, $Nome, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // countByIdInstituicaoIdCursoSigla
    // Conta os registros com base em IdInstituicao, IdCurso, Sigla
    // --------------------------------------------------------------------------------
    public function countByIdInstituicaoIdCursoSigla(
        string $IdInstituicao = null,
        string $IdCurso = null,
        string $Sigla = null)
    {
        return $this->countBy(null, $IdInstituicao, $IdCurso, null, $Sigla, null, null);
    }

}

?>
