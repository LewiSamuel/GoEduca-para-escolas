<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// TurmaModel
//
// Defini��o das turmas das institui��es.
//
// Gerado em: 2018-03-16 07:25:29
// --------------------------------------------------------------------------------
class TurmaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdTurma = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdTurma;                                                    // char(32), PK, obrigat�rio - Identificador da Turma
    protected $IdInstituicao;                                              // char(32), PK, FK, obrigat�rio - Identificador da Institui��o
    protected $IdUnidade;                                                  // char(32), PK, FK, obrigat�rio - Identificador da Unidade
    protected $IdCurso;                                                    // char(32), PK, FK, obrigat�rio - Identificador do Curso
    protected $IdEtapa;                                                    // char(32), FK, opcional - Identificador do Etapa de um Curso
    protected $IdTurno;                                                    // char(32), FK, opcional - Identificador do Turno
    protected $PeriodoLetivo;                                              // varchar(128), obrigat�rio - Per�odo Letivo que ocorreu a turma (Ano, Ano/Semestre, Ano/M�s, etc)
    protected $Sigla;                                                      // varchar(32), obrigat�rio - Sigla da Turma
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdTurma") { return $this->IdTurma; }
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
        if ($name === "IdUnidade") { return $this->IdUnidade; }
        if ($name === "IdCurso") { return $this->IdCurso; }
        if ($name === "IdEtapa") { return $this->IdEtapa; }
        if ($name === "IdTurno") { return $this->IdTurno; }
        if ($name === "PeriodoLetivo") { return $this->PeriodoLetivo; }
        if ($name === "Sigla") { return $this->Sigla; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdTurma") {
            $this->IdTurma = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdTurma;
        }
        if($name === "IdInstituicao") {
            $this->IdInstituicao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdInstituicao;
        }
        if($name === "IdUnidade") {
            $this->IdUnidade = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdUnidade;
        }
        if($name === "IdCurso") {
            $this->IdCurso = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdCurso;
        }
        if($name === "IdEtapa") {
            $this->IdEtapa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdEtapa;
        }
        if($name === "IdTurno") {
            $this->IdTurno = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdTurno;
        }
        if($name === "PeriodoLetivo") {
            $this->PeriodoLetivo = substr($value, 0, 128);
            $this->_iSaved_ = false;
            return $this->PeriodoLetivo;
        }
        if($name === "Sigla") {
            $this->Sigla = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->Sigla;
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
                        turma
                    set 
                        idturma = " . ( isset($this->IdTurma) ? $this->o_db->quote($IdTurma) : "null" ) . ",
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        idunidade = " . ( isset($this->IdUnidade) ? $this->o_db->quote($IdUnidade) : "null" ) . ",
                        idcurso = " . ( isset($this->IdCurso) ? $this->o_db->quote($IdCurso) : "null" ) . ",
                        idetapa = " . ( isset($this->IdEtapa) ? $this->o_db->quote($IdEtapa) : "null" ) . ",
                        idturno = " . ( isset($this->IdTurno) ? $this->o_db->quote($IdTurno) : "null" ) . ",
                        periodoletivo = " . ( isset($this->PeriodoLetivo) ? $this->o_db->quote($PeriodoLetivo) : "null" ) . ",
                        sigla = " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idturma" . ( isset($this->IdTurma) ? " = " . $this->o_db->quote($this->IdTurma) : " is null" ) . "
                        and
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and
                        idunidade" . ( isset($this->IdUnidade) ? " = " . $this->o_db->quote($this->IdUnidade) : " is null" ) . "
                        and
                        idcurso" . ( isset($this->IdCurso) ? " = " . $this->o_db->quote($this->IdCurso) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        turma (
                            idturma,
                            idinstituicao,
                            idunidade,
                            idcurso,
                            idetapa,
                            idturno,
                            periodoletivo,
                            sigla,
                            status
                        )
                        values (
                            " . ( isset($this->IdTurma) ? $this->o_db->quote($IdTurma) : "null" ) . ",
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->IdUnidade) ? $this->o_db->quote($IdUnidade) : "null" ) . ",
                            " . ( isset($this->IdCurso) ? $this->o_db->quote($IdCurso) : "null" ) . ",
                            " . ( isset($this->IdEtapa) ? $this->o_db->quote($IdEtapa) : "null" ) . ",
                            " . ( isset($this->IdTurno) ? $this->o_db->quote($IdTurno) : "null" ) . ",
                            " . ( isset($this->PeriodoLetivo) ? $this->o_db->quote($PeriodoLetivo) : "null" ) . ",
                            " . ( isset($this->Sigla) ? $this->o_db->quote($Sigla) : "null" ) . ",
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
        if (isset($this->IdTurma) && isset($this->IdInstituicao) && isset($this->IdUnidade) && isset($this->IdCurso)) {
            $sql = "delete from 
                        turma
                     where 
                        idturma" . ( isset($this->IdTurma) ? " = " . $this->o_db->quote($this->IdTurma) : " is null" ) . "
                        and 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and 
                        idunidade" . ( isset($this->IdUnidade) ? " = " . $this->o_db->quote($this->IdUnidade) : " is null" ) . "
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
        string $IdTurma = null,
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdEtapa = null,
        string $IdTurno = null,
        string $PeriodoLetivo = null,
        string $Sigla = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idturma as IdTurma,
                    idinstituicao as IdInstituicao,
                    idunidade as IdUnidade,
                    idcurso as IdCurso,
                    idetapa as IdEtapa,
                    idturno as IdTurno,
                    periodoletivo as PeriodoLetivo,
                    sigla as Sigla,
                    status as Status
                from
                    turma
                where 1 = 1";

        if (isset($IdTurma)) { $sql = $sql . " and (idturma = " . $this->o_db->quote("%" . $IdTurma. "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade = " . $this->o_db->quote("%" . $IdUnidade. "%") . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso = " . $this->o_db->quote("%" . $IdCurso. "%") . ")"; }
        if (isset($IdEtapa)) { $sql = $sql . " and (idetapa = " . $this->o_db->quote("%" . $IdEtapa. "%") . ")"; }
        if (isset($IdTurno)) { $sql = $sql . " and (idturno = " . $this->o_db->quote("%" . $IdTurno. "%") . ")"; }
        if (isset($PeriodoLetivo)) { $sql = $sql . " and (periodoletivo = " . $this->o_db->quote("%" . $PeriodoLetivo. "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote("%" . $Sigla. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_turma = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new TurmaModel();

                $obj_out->IdTurma = $obj_in->IdTurma;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdUnidade = $obj_in->IdUnidade;
                $obj_out->IdCurso = $obj_in->IdCurso;
                $obj_out->IdEtapa = $obj_in->IdEtapa;
                $obj_out->IdTurno = $obj_in->IdTurno;
                $obj_out->PeriodoLetivo = $obj_in->PeriodoLetivo;
                $obj_out->Sigla = $obj_in->Sigla;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_turma, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_turma;
    }

    // --------------------------------------------------------------------------------
    // listByIdInstituicaoIdUnidadeIdCursoIdEtapaIdTurnoPeriodoLetivoSigla
    // Lista os registros com base em IdInstituicao, IdUnidade, IdCurso, IdEtapa, IdTurno, PeriodoLetivo, Sigla
    // --------------------------------------------------------------------------------
    public function listByIdInstituicaoIdUnidadeIdCursoIdEtapaIdTurnoPeriodoLetivoSigla(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdEtapa = null,
        string $IdTurno = null,
        string $PeriodoLetivo = null,
        string $Sigla = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdInstituicao, $IdUnidade, $IdCurso, $IdEtapa, $IdTurno, $PeriodoLetivo, $Sigla, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdTurma = null,
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdEtapa = null,
        string $IdTurno = null,
        string $PeriodoLetivo = null,
        string $Sigla = null,
        string $Status = null)
    {
        $sql = "select
                    idturma as IdTurma,
                    idinstituicao as IdInstituicao,
                    idunidade as IdUnidade,
                    idcurso as IdCurso,
                    idetapa as IdEtapa,
                    idturno as IdTurno,
                    periodoletivo as PeriodoLetivo,
                    sigla as Sigla,
                    status as Status
                from
                    turma
                where 1 = 1";

        if (isset($IdTurma)) { $sql = $sql . " and (idturma = " . $this->o_db->quote($IdTurma) . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade = " . $this->o_db->quote($IdUnidade) . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso = " . $this->o_db->quote($IdCurso) . ")"; }
        if (isset($IdEtapa)) { $sql = $sql . " and (idetapa = " . $this->o_db->quote($IdEtapa) . ")"; }
        if (isset($IdTurno)) { $sql = $sql . " and (idturno = " . $this->o_db->quote($IdTurno) . ")"; }
        if (isset($PeriodoLetivo)) { $sql = $sql . " and (periodoletivo = " . $this->o_db->quote($PeriodoLetivo) . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla = " . $this->o_db->quote($Sigla) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new TurmaModel();

                $obj_out->IdTurma = $obj_in->IdTurma;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdUnidade = $obj_in->IdUnidade;
                $obj_out->IdCurso = $obj_in->IdCurso;
                $obj_out->IdEtapa = $obj_in->IdEtapa;
                $obj_out->IdTurno = $obj_in->IdTurno;
                $obj_out->PeriodoLetivo = $obj_in->PeriodoLetivo;
                $obj_out->Sigla = $obj_in->Sigla;
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
    public function loadById( string $IdTurma, string $IdInstituicao, string $IdUnidade, string $IdCurso )
    {
        $obj = $this->objectByFields($IdTurma, $IdInstituicao, $IdUnidade, $IdCurso, null, null, null, null, null);
        if ($obj) {
            $this->IdTurma = $obj->IdTurma;
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->IdUnidade = $obj->IdUnidade;
            $this->IdCurso = $obj->IdCurso;
            $this->IdEtapa = $obj->IdEtapa;
            $this->IdTurno = $obj->IdTurno;
            $this->PeriodoLetivo = $obj->PeriodoLetivo;
            $this->Sigla = $obj->Sigla;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdInstituicaoIdUnidadeIdCursoIdEtapaIdTurnoPeriodoLetivoSigla
    // Verifica se um registro existe com IdInstituicao, IdUnidade, IdCurso, IdEtapa, IdTurno, PeriodoLetivo, Sigla
    // --------------------------------------------------------------------------------
    public function existsIdInstituicaoIdUnidadeIdCursoIdEtapaIdTurnoPeriodoLetivoSigla()
    {
        $obj = $this->objectByFields(null, $this->IdInstituicao, $this->IdUnidade, $this->IdCurso, $this->IdEtapa, $this->IdTurno, $this->PeriodoLetivo, $this->Sigla, null);
        return !($obj && ($obj->IdTurma === $this->IdTurma) && ($obj->IdInstituicao === $this->IdInstituicao) && ($obj->IdUnidade === $this->IdUnidade) && ($obj->IdCurso === $this->IdCurso));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdTurma = null,
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdEtapa = null,
        string $IdTurno = null,
        string $PeriodoLetivo = null,
        string $Sigla = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    turma
                where 1 = 1";

        if (isset($IdTurma)) { $sql = $sql . " and (idturma like " . $this->o_db->quote("%" . $IdTurma . "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade like " . $this->o_db->quote("%" . $IdUnidade . "%") . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso like " . $this->o_db->quote("%" . $IdCurso . "%") . ")"; }
        if (isset($IdEtapa)) { $sql = $sql . " and (idetapa like " . $this->o_db->quote("%" . $IdEtapa . "%") . ")"; }
        if (isset($IdTurno)) { $sql = $sql . " and (idturno like " . $this->o_db->quote("%" . $IdTurno . "%") . ")"; }
        if (isset($PeriodoLetivo)) { $sql = $sql . " and (periodoletivo like " . $this->o_db->quote("%" . $PeriodoLetivo . "%") . ")"; }
        if (isset($Sigla)) { $sql = $sql . " and (sigla like " . $this->o_db->quote("%" . $Sigla . "%") . ")"; }
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
    // countByIdInstituicaoIdUnidadeIdCursoIdEtapaIdTurnoPeriodoLetivoSigla
    // Conta os registros com base em IdInstituicao, IdUnidade, IdCurso, IdEtapa, IdTurno, PeriodoLetivo, Sigla
    // --------------------------------------------------------------------------------
    public function countByIdInstituicaoIdUnidadeIdCursoIdEtapaIdTurnoPeriodoLetivoSigla(
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdEtapa = null,
        string $IdTurno = null,
        string $PeriodoLetivo = null,
        string $Sigla = null)
    {
        return $this->countBy(null, $IdInstituicao, $IdUnidade, $IdCurso, $IdEtapa, $IdTurno, $PeriodoLetivo, $Sigla, null);
    }

}

?>
