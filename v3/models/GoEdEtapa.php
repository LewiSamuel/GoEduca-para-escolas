<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GoEdEtapaModel
//
// Etapas dos Cursos disponibilizados na plataforma, ser�o usados como sugest�es para as institui��es.
//
// Gerado em: 2018-03-16 07:24:34
// --------------------------------------------------------------------------------
class GoEdEtapaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdGoEdEtapa = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdGoEdEtapa;                                                // char(32), PK, obrigat�rio - Identifica��o da Etapa de um Curso GOEDUCA
    protected $IdGoEdCurso;                                                // char(32), PK, FK, obrigat�rio - Identifica��o do Curso GOEDUCA
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
        if ($name === "IdGoEdEtapa") { return $this->IdGoEdEtapa; }
        if ($name === "IdGoEdCurso") { return $this->IdGoEdCurso; }
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
        if($name === "IdGoEdEtapa") {
            $this->IdGoEdEtapa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdEtapa;
        }
        if($name === "IdGoEdCurso") {
            $this->IdGoEdCurso = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdCurso;
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
                        goedetapa
                    set 
                        idgoedetapa = " . ( isset($this->IdGoEdEtapa) ? $this->o_db->quote($IdGoEdEtapa) : "null" ) . ",
                        idgoedcurso = " . ( isset($this->IdGoEdCurso) ? $this->o_db->quote($IdGoEdCurso) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        sigla = " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                        duracao = " . ( isset($this->Duracao) ? $this->o_db->quote($Duracao) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idgoedetapa" . ( isset($this->IdGoEdEtapa) ? " = " . $this->o_db->quote($this->IdGoEdEtapa) : " is null" ) . "
                        and
                        idgoedcurso" . ( isset($this->IdGoEdCurso) ? " = " . $this->o_db->quote($this->IdGoEdCurso) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        goedetapa (
                            idgoedetapa,
                            idgoedcurso,
                            nome,
                            sigla,
                            duracao,
                            status
                        )
                        values (
                            " . ( isset($this->IdGoEdEtapa) ? $this->o_db->quote($IdGoEdEtapa) : "null" ) . ",
                            " . ( isset($this->IdGoEdCurso) ? $this->o_db->quote($IdGoEdCurso) : "null" ) . ",
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
        if (isset($this->IdGoEdEtapa) && isset($this->IdGoEdCurso)) {
            $sql = "delete from 
                        goedetapa
                     where 
                        idgoedetapa" . ( isset($this->IdGoEdEtapa) ? " = " . $this->o_db->quote($this->IdGoEdEtapa) : " is null" ) . "
                        and 
                        idgoedcurso" . ( isset($this->IdGoEdCurso) ? " = " . $this->o_db->quote($this->IdGoEdCurso) : " is null" ) . ""; 
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
        string $IdGoEdEtapa = null,
        string $IdGoEdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Duracao = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idgoedetapa as IdGoEdEtapa,
                    idgoedcurso as IdGoEdCurso,
                    nome as Nome,
                    sigla as Sigla,
                    duracao as Duracao,
                    status as Status
                from
                    goedetapa
                where 1 = 1";

        if (isset($IdGoEdEtapa)) { $sql = $sql . " and (idgoedetapa = " . $this->o_db->quote("%" . $IdGoEdEtapa. "%") . ")"; }
        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso = " . $this->o_db->quote("%" . $IdGoEdCurso. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote("%" . $Sigla. "%") . ")"; }
        if (isset($Duracao)) { $sql = $sql . " and (duracao = " . $this->o_db->quote("%" . $Duracao. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_goedetapa = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdEtapaModel();

                $obj_out->IdGoEdEtapa = $obj_in->IdGoEdEtapa;
                $obj_out->IdGoEdCurso = $obj_in->IdGoEdCurso;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Duracao = $obj_in->Duracao;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_goedetapa, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_goedetapa;
    }

    // --------------------------------------------------------------------------------
    // listByIdGoEdCursoNome
    // Lista os registros com base em IdGoEdCurso, Nome
    // --------------------------------------------------------------------------------
    public function listByIdGoEdCursoNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdGoEdCurso = null,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdGoEdCurso, $Nome, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // listByIdGoEdCursoSigla
    // Lista os registros com base em IdGoEdCurso, Sigla
    // --------------------------------------------------------------------------------
    public function listByIdGoEdCursoSigla(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdGoEdCurso = null,
        string $Sigla = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdGoEdCurso, null, $Sigla, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdGoEdEtapa = null,
        string $IdGoEdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Duracao = null,
        string $Status = null)
    {
        $sql = "select
                    idgoedetapa as IdGoEdEtapa,
                    idgoedcurso as IdGoEdCurso,
                    nome as Nome,
                    sigla as Sigla,
                    duracao as Duracao,
                    status as Status
                from
                    goedetapa
                where 1 = 1";

        if (isset($IdGoEdEtapa)) { $sql = $sql . " and (idgoedetapa = " . $this->o_db->quote($IdGoEdEtapa) . ")"; }
        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso = " . $this->o_db->quote($IdGoEdCurso) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote($Sigla) . ")"; }
        if (isset($Duracao)) { $sql = $sql . " and (duracao = " . $this->o_db->quote($Duracao) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdEtapaModel();

                $obj_out->IdGoEdEtapa = $obj_in->IdGoEdEtapa;
                $obj_out->IdGoEdCurso = $obj_in->IdGoEdCurso;
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
    public function loadById( string $IdGoEdEtapa, string $IdGoEdCurso )
    {
        $obj = $this->objectByFields($IdGoEdEtapa, $IdGoEdCurso, null, null, null, null);
        if ($obj) {
            $this->IdGoEdEtapa = $obj->IdGoEdEtapa;
            $this->IdGoEdCurso = $obj->IdGoEdCurso;
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
    // existsIdGoEdCursoNome
    // Verifica se um registro existe com IdGoEdCurso, Nome
    // --------------------------------------------------------------------------------
    public function existsIdGoEdCursoNome()
    {
        $obj = $this->objectByFields(null, $this->IdGoEdCurso, $this->Nome, null, null, null);
        return !($obj && ($obj->IdGoEdEtapa === $this->IdGoEdEtapa) && ($obj->IdGoEdCurso === $this->IdGoEdCurso));
    }

    // --------------------------------------------------------------------------------
    // existsIdGoEdCursoSigla
    // Verifica se um registro existe com IdGoEdCurso, Sigla
    // --------------------------------------------------------------------------------
    public function existsIdGoEdCursoSigla()
    {
        $obj = $this->objectByFields(null, $this->IdGoEdCurso, null, $this->Sigla, null, null);
        return !($obj && ($obj->IdGoEdEtapa === $this->IdGoEdEtapa) && ($obj->IdGoEdCurso === $this->IdGoEdCurso));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdGoEdEtapa = null,
        string $IdGoEdCurso = null,
        string $Nome = null,
        string $Sigla = null,
        string $Duracao = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    goedetapa
                where 1 = 1";

        if (isset($IdGoEdEtapa)) { $sql = $sql . " and (idgoedetapa like " . $this->o_db->quote("%" . $IdGoEdEtapa . "%") . ")"; }
        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso like " . $this->o_db->quote("%" . $IdGoEdCurso . "%") . ")"; }
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
    // countByIdGoEdCursoNome
    // Conta os registros com base em IdGoEdCurso, Nome
    // --------------------------------------------------------------------------------
    public function countByIdGoEdCursoNome(
        string $IdGoEdCurso = null,
        string $Nome = null)
    {
        return $this->countBy(null, $IdGoEdCurso, $Nome, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // countByIdGoEdCursoSigla
    // Conta os registros com base em IdGoEdCurso, Sigla
    // --------------------------------------------------------------------------------
    public function countByIdGoEdCursoSigla(
        string $IdGoEdCurso = null,
        string $Sigla = null)
    {
        return $this->countBy(null, $IdGoEdCurso, null, $Sigla, null, null);
    }

}

?>
