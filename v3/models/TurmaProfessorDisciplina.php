<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// TurmaProfessorDisciplinaModel
//
// Vincula��o das turmas aos professores e disciplinas.
//
// Gerado em: 2018-03-16 07:25:34
// --------------------------------------------------------------------------------
class TurmaProfessorDisciplinaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();

    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdInstituicao;                                              // char(32), PK, FK, obrigat�rio - Identificador da Institui��o
    protected $IdUnidade;                                                  // char(32), PK, FK, obrigat�rio - Identificador da Unidade
    protected $IdCurso;                                                    // char(32), PK, FK, obrigat�rio - Identificador do Curso
    protected $IdTurma;                                                    // char(32), PK, FK, obrigat�rio - Identificador da Turma
    protected $IdProfessor;                                                // char(32), PK, FK, obrigat�rio - Identificador do Professor
    protected $IdDisciplina;                                               // char(32), PK, FK, obrigat�rio - Identificador da disciplina
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
        if ($name === "IdUnidade") { return $this->IdUnidade; }
        if ($name === "IdCurso") { return $this->IdCurso; }
        if ($name === "IdTurma") { return $this->IdTurma; }
        if ($name === "IdProfessor") { return $this->IdProfessor; }
        if ($name === "IdDisciplina") { return $this->IdDisciplina; }
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
        if($name === "IdTurma") {
            $this->IdTurma = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdTurma;
        }
        if($name === "IdProfessor") {
            $this->IdProfessor = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdProfessor;
        }
        if($name === "IdDisciplina") {
            $this->IdDisciplina = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdDisciplina;
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
                        turma_professor_disciplina
                    set 
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        idunidade = " . ( isset($this->IdUnidade) ? $this->o_db->quote($IdUnidade) : "null" ) . ",
                        idcurso = " . ( isset($this->IdCurso) ? $this->o_db->quote($IdCurso) : "null" ) . ",
                        idturma = " . ( isset($this->IdTurma) ? $this->o_db->quote($IdTurma) : "null" ) . ",
                        idprofessor = " . ( isset($this->IdProfessor) ? $this->o_db->quote($IdProfessor) : "null" ) . ",
                        iddisciplina = " . ( isset($this->IdDisciplina) ? $this->o_db->quote($IdDisciplina) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and
                        idunidade" . ( isset($this->IdUnidade) ? " = " . $this->o_db->quote($this->IdUnidade) : " is null" ) . "
                        and
                        idcurso" . ( isset($this->IdCurso) ? " = " . $this->o_db->quote($this->IdCurso) : " is null" ) . "
                        and
                        idturma" . ( isset($this->IdTurma) ? " = " . $this->o_db->quote($this->IdTurma) : " is null" ) . "
                        and
                        idprofessor" . ( isset($this->IdProfessor) ? " = " . $this->o_db->quote($this->IdProfessor) : " is null" ) . "
                        and
                        iddisciplina" . ( isset($this->IdDisciplina) ? " = " . $this->o_db->quote($this->IdDisciplina) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        turma_professor_disciplina (
                            idinstituicao,
                            idunidade,
                            idcurso,
                            idturma,
                            idprofessor,
                            iddisciplina,
                            status
                        )
                        values (
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->IdUnidade) ? $this->o_db->quote($IdUnidade) : "null" ) . ",
                            " . ( isset($this->IdCurso) ? $this->o_db->quote($IdCurso) : "null" ) . ",
                            " . ( isset($this->IdTurma) ? $this->o_db->quote($IdTurma) : "null" ) . ",
                            " . ( isset($this->IdProfessor) ? $this->o_db->quote($IdProfessor) : "null" ) . ",
                            " . ( isset($this->IdDisciplina) ? $this->o_db->quote($IdDisciplina) : "null" ) . ",
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
        if (isset($this->IdInstituicao) && isset($this->IdUnidade) && isset($this->IdCurso) && isset($this->IdTurma) && isset($this->IdProfessor) && isset($this->IdDisciplina)) {
            $sql = "delete from 
                        turma_professor_disciplina
                     where 
                        idinstituicao" . ( isset($this->IdInstituicao) ? " = " . $this->o_db->quote($this->IdInstituicao) : " is null" ) . "
                        and 
                        idunidade" . ( isset($this->IdUnidade) ? " = " . $this->o_db->quote($this->IdUnidade) : " is null" ) . "
                        and 
                        idcurso" . ( isset($this->IdCurso) ? " = " . $this->o_db->quote($this->IdCurso) : " is null" ) . "
                        and 
                        idturma" . ( isset($this->IdTurma) ? " = " . $this->o_db->quote($this->IdTurma) : " is null" ) . "
                        and 
                        idprofessor" . ( isset($this->IdProfessor) ? " = " . $this->o_db->quote($this->IdProfessor) : " is null" ) . "
                        and 
                        iddisciplina" . ( isset($this->IdDisciplina) ? " = " . $this->o_db->quote($this->IdDisciplina) : " is null" ) . ""; 
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
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdTurma = null,
        string $IdProfessor = null,
        string $IdDisciplina = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idinstituicao as IdInstituicao,
                    idunidade as IdUnidade,
                    idcurso as IdCurso,
                    idturma as IdTurma,
                    idprofessor as IdProfessor,
                    iddisciplina as IdDisciplina,
                    status as Status
                from
                    turma_professor_disciplina
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade = " . $this->o_db->quote("%" . $IdUnidade. "%") . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso = " . $this->o_db->quote("%" . $IdCurso. "%") . ")"; }
        if (isset($IdTurma)) { $sql = $sql . " and (idturma = " . $this->o_db->quote("%" . $IdTurma. "%") . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor = " . $this->o_db->quote("%" . $IdProfessor. "%") . ")"; }
        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina = " . $this->o_db->quote("%" . $IdDisciplina. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_turma_professor_disciplina = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new TurmaProfessorDisciplinaModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdUnidade = $obj_in->IdUnidade;
                $obj_out->IdCurso = $obj_in->IdCurso;
                $obj_out->IdTurma = $obj_in->IdTurma;
                $obj_out->IdProfessor = $obj_in->IdProfessor;
                $obj_out->IdDisciplina = $obj_in->IdDisciplina;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_turma_professor_disciplina, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_turma_professor_disciplina;
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdTurma = null,
        string $IdProfessor = null,
        string $IdDisciplina = null,
        string $Status = null)
    {
        $sql = "select
                    idinstituicao as IdInstituicao,
                    idunidade as IdUnidade,
                    idcurso as IdCurso,
                    idturma as IdTurma,
                    idprofessor as IdProfessor,
                    iddisciplina as IdDisciplina,
                    status as Status
                from
                    turma_professor_disciplina
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade = " . $this->o_db->quote($IdUnidade) . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso = " . $this->o_db->quote($IdCurso) . ")"; }
        if (isset($IdTurma)) { $sql = $sql . " and (idturma = " . $this->o_db->quote($IdTurma) . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor = " . $this->o_db->quote($IdProfessor) . ")"; }
        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina = " . $this->o_db->quote($IdDisciplina) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new TurmaProfessorDisciplinaModel();

                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdUnidade = $obj_in->IdUnidade;
                $obj_out->IdCurso = $obj_in->IdCurso;
                $obj_out->IdTurma = $obj_in->IdTurma;
                $obj_out->IdProfessor = $obj_in->IdProfessor;
                $obj_out->IdDisciplina = $obj_in->IdDisciplina;
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
    public function loadById( string $IdInstituicao, string $IdUnidade, string $IdCurso, string $IdTurma, string $IdProfessor, string $IdDisciplina )
    {
        $obj = $this->objectByFields($IdInstituicao, $IdUnidade, $IdCurso, $IdTurma, $IdProfessor, $IdDisciplina, null);
        if ($obj) {
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->IdUnidade = $obj->IdUnidade;
            $this->IdCurso = $obj->IdCurso;
            $this->IdTurma = $obj->IdTurma;
            $this->IdProfessor = $obj->IdProfessor;
            $this->IdDisciplina = $obj->IdDisciplina;
            $this->Status = $obj->Status;

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
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdTurma = null,
        string $IdProfessor = null,
        string $IdDisciplina = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    turma_professor_disciplina
                where 1 = 1";

        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade like " . $this->o_db->quote("%" . $IdUnidade . "%") . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso like " . $this->o_db->quote("%" . $IdCurso . "%") . ")"; }
        if (isset($IdTurma)) { $sql = $sql . " and (idturma like " . $this->o_db->quote("%" . $IdTurma . "%") . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor like " . $this->o_db->quote("%" . $IdProfessor . "%") . ")"; }
        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina like " . $this->o_db->quote("%" . $IdDisciplina . "%") . ")"; }
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
}

?>
