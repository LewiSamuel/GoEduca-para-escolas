<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// TarefaTurmaModel
//
// Tarefas que os professores definem para as turmas.
//
// Gerado em: 2018-03-16 07:25:25
// --------------------------------------------------------------------------------
class TarefaTurmaModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdTarefaTurma = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdTarefaTurma;                                              // char(32), PK, obrigat�rio - Identificador da Tarefa da Turma
    protected $IdInstituicao;                                              // char(32), FK, obrigat�rio - Identificador da Institui��o
    protected $IdUnidade;                                                  // char(32), FK, obrigat�rio - Identificador da Unidade
    protected $IdCurso;                                                    // char(32), FK, obrigat�rio - Identificador do Curso
    protected $IdTurma;                                                    // char(32), FK, obrigat�rio - Identificador da Turma
    protected $IdProfessor;                                                // char(32), FK, obrigat�rio - Identificador do Professor
    protected $IdDisciplina;                                               // char(32), FK, obrigat�rio - Identificador da disciplina
    protected $IdJogo;                                                     // char(32), FK, obrigat�rio - Identifica��o do Jogo
    protected $Localizador;                                                // varchar(64), opcional - Localizador da tarefa definido pelo professor
    protected $Titulo;                                                     // varchar(256), obrigat�rio - T�tulo da Tarefa
    protected $Descricao;                                                  // varchar(256), opcional - T�tulo da Tarefa
    protected $DataInicial;                                                // varchar(256), obrigat�rio - Data Inicial da Tarefa da Turma
    protected $DataFinal;                                                  // varchar(256), obrigat�rio - Data Final da Tarefa da Turma
    protected $MetaPontuacao;                                              // int(11), opcional - Meta de pontua��o a ser alcan�ada
    protected $MetaQtdPartidas;                                            // int(11), opcional - Meta de quantidade de partidas a serem jogadas
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdTarefaTurma") { return $this->IdTarefaTurma; }
        if ($name === "IdInstituicao") { return $this->IdInstituicao; }
        if ($name === "IdUnidade") { return $this->IdUnidade; }
        if ($name === "IdCurso") { return $this->IdCurso; }
        if ($name === "IdTurma") { return $this->IdTurma; }
        if ($name === "IdProfessor") { return $this->IdProfessor; }
        if ($name === "IdDisciplina") { return $this->IdDisciplina; }
        if ($name === "IdJogo") { return $this->IdJogo; }
        if ($name === "Localizador") { return $this->Localizador; }
        if ($name === "Titulo") { return $this->Titulo; }
        if ($name === "Descricao") { return $this->Descricao; }
        if ($name === "DataInicial") { return $this->DataInicial; }
        if ($name === "DataFinal") { return $this->DataFinal; }
        if ($name === "MetaPontuacao") { return $this->MetaPontuacao; }
        if ($name === "MetaQtdPartidas") { return $this->MetaQtdPartidas; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdTarefaTurma") {
            $this->IdTarefaTurma = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdTarefaTurma;
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
        if($name === "IdJogo") {
            $this->IdJogo = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdJogo;
        }
        if($name === "Localizador") {
            $this->Localizador = substr($value, 0, 64);
            $this->_iSaved_ = false;
            return $this->Localizador;
        }
        if($name === "Titulo") {
            $this->Titulo = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Titulo;
        }
        if($name === "Descricao") {
            $this->Descricao = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Descricao;
        }
        if($name === "DataInicial") {
            $this->DataInicial = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->DataInicial;
        }
        if($name === "DataFinal") {
            $this->DataFinal = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->DataFinal;
        }
        if($name === "MetaPontuacao") {
            $this->MetaPontuacao = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->MetaPontuacao;
        }
        if($name === "MetaQtdPartidas") {
            $this->MetaQtdPartidas = (is_numeric($value) ? (int) $value : null);
            $this->_iSaved_ = false;
            return $this->MetaQtdPartidas;
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
                        tarefaturma
                    set 
                        idtarefaturma = " . ( isset($this->IdTarefaTurma) ? $this->o_db->quote($IdTarefaTurma) : "null" ) . ",
                        idinstituicao = " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                        idunidade = " . ( isset($this->IdUnidade) ? $this->o_db->quote($IdUnidade) : "null" ) . ",
                        idcurso = " . ( isset($this->IdCurso) ? $this->o_db->quote($IdCurso) : "null" ) . ",
                        idturma = " . ( isset($this->IdTurma) ? $this->o_db->quote($IdTurma) : "null" ) . ",
                        idprofessor = " . ( isset($this->IdProfessor) ? $this->o_db->quote($IdProfessor) : "null" ) . ",
                        iddisciplina = " . ( isset($this->IdDisciplina) ? $this->o_db->quote($IdDisciplina) : "null" ) . ",
                        idjogo = " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                        localizador = " . ( isset($this->Localizador) ? $this->o_db->quote($Localizador) : "null" ) . ",
                        titulo = " . ( isset($this->Titulo) ? $this->o_db->quote($Titulo) : "null" ) . ",
                        descricao = " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                        datainicial = " . ( isset($this->DataInicial) ? $this->o_db->quote($DataInicial) : "null" ) . ",
                        datafinal = " . ( isset($this->DataFinal) ? $this->o_db->quote($DataFinal) : "null" ) . ",
                        metapontuacao = " . ( isset($this->MetaPontuacao) ? $this->o_db->quote($this->MetaPontuacao) : "null" ) . ",
                        metaqtdpartidas = " . ( isset($this->MetaQtdPartidas) ? $this->o_db->quote($this->MetaQtdPartidas) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idtarefaturma" . ( isset($this->IdTarefaTurma) ? " = " . $this->o_db->quote($this->IdTarefaTurma) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        tarefaturma (
                            idtarefaturma,
                            idinstituicao,
                            idunidade,
                            idcurso,
                            idturma,
                            idprofessor,
                            iddisciplina,
                            idjogo,
                            localizador,
                            titulo,
                            descricao,
                            datainicial,
                            datafinal,
                            metapontuacao,
                            metaqtdpartidas,
                            status
                        )
                        values (
                            " . ( isset($this->IdTarefaTurma) ? $this->o_db->quote($IdTarefaTurma) : "null" ) . ",
                            " . ( isset($this->IdInstituicao) ? $this->o_db->quote($IdInstituicao) : "null" ) . ",
                            " . ( isset($this->IdUnidade) ? $this->o_db->quote($IdUnidade) : "null" ) . ",
                            " . ( isset($this->IdCurso) ? $this->o_db->quote($IdCurso) : "null" ) . ",
                            " . ( isset($this->IdTurma) ? $this->o_db->quote($IdTurma) : "null" ) . ",
                            " . ( isset($this->IdProfessor) ? $this->o_db->quote($IdProfessor) : "null" ) . ",
                            " . ( isset($this->IdDisciplina) ? $this->o_db->quote($IdDisciplina) : "null" ) . ",
                            " . ( isset($this->IdJogo) ? $this->o_db->quote($IdJogo) : "null" ) . ",
                            " . ( isset($this->Localizador) ? $this->o_db->quote($Localizador) : "null" ) . ",
                            " . ( isset($this->Titulo) ? $this->o_db->quote($Titulo) : "null" ) . ",
                            " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                            " . ( isset($this->DataInicial) ? $this->o_db->quote($DataInicial) : "null" ) . ",
                            " . ( isset($this->DataFinal) ? $this->o_db->quote($DataFinal) : "null" ) . ",
                            " . ( isset($this->MetaPontuacao) ? $this->o_db->quote($this->MetaPontuacao) : "null" ) . ",
                            " . ( isset($this->MetaQtdPartidas) ? $this->o_db->quote($this->MetaQtdPartidas) : "null" ) . ",
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
        if (isset($this->IdTarefaTurma)) {
            $sql = "delete from 
                        tarefaturma
                     where 
                        idtarefaturma" . ( isset($this->IdTarefaTurma) ? " = " . $this->o_db->quote($this->IdTarefaTurma) : " is null" ) . ""; 
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
        string $IdTarefaTurma = null,
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdTurma = null,
        string $IdProfessor = null,
        string $IdDisciplina = null,
        string $IdJogo = null,
        string $Localizador = null,
        string $Titulo = null,
        string $Descricao = null,
        string $DataInicial = null,
        string $DataFinal = null,
        int $MetaPontuacao = null,
        int $MetaQtdPartidas = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idtarefaturma as IdTarefaTurma,
                    idinstituicao as IdInstituicao,
                    idunidade as IdUnidade,
                    idcurso as IdCurso,
                    idturma as IdTurma,
                    idprofessor as IdProfessor,
                    iddisciplina as IdDisciplina,
                    idjogo as IdJogo,
                    localizador as Localizador,
                    titulo as Titulo,
                    descricao as Descricao,
                    datainicial as DataInicial,
                    datafinal as DataFinal,
                    metapontuacao as MetaPontuacao,
                    metaqtdpartidas as MetaQtdPartidas,
                    status as Status
                from
                    tarefaturma
                where 1 = 1";

        if (isset($IdTarefaTurma)) { $sql = $sql . " and (idtarefaturma = " . $this->o_db->quote("%" . $IdTarefaTurma. "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote("%" . $IdInstituicao. "%") . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade = " . $this->o_db->quote("%" . $IdUnidade. "%") . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso = " . $this->o_db->quote("%" . $IdCurso. "%") . ")"; }
        if (isset($IdTurma)) { $sql = $sql . " and (idturma = " . $this->o_db->quote("%" . $IdTurma. "%") . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor = " . $this->o_db->quote("%" . $IdProfessor. "%") . ")"; }
        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina = " . $this->o_db->quote("%" . $IdDisciplina. "%") . ")"; }
        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote("%" . $IdJogo. "%") . ")"; }
        if (isset($Localizador)) { $sql = $sql . " and (localizador = " . $this->o_db->quote("%" . $Localizador. "%") . ")"; }
        if (isset($Titulo)) { $sql = $sql . " and (titulo = " . $this->o_db->quote("%" . $Titulo. "%") . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote("%" . $Descricao. "%") . ")"; }
        if (isset($DataInicial)) { $sql = $sql . " and (datainicial = " . $this->o_db->quote("%" . $DataInicial. "%") . ")"; }
        if (isset($DataFinal)) { $sql = $sql . " and (datafinal = " . $this->o_db->quote("%" . $DataFinal. "%") . ")"; }
        if (isset($MetaPontuacao)) { $sql = $sql . " and (metapontuacao = " . MetaPontuacao . ")"; }
        if (isset($MetaQtdPartidas)) { $sql = $sql . " and (metaqtdpartidas = " . MetaQtdPartidas . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_tarefaturma = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new TarefaTurmaModel();

                $obj_out->IdTarefaTurma = $obj_in->IdTarefaTurma;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdUnidade = $obj_in->IdUnidade;
                $obj_out->IdCurso = $obj_in->IdCurso;
                $obj_out->IdTurma = $obj_in->IdTurma;
                $obj_out->IdProfessor = $obj_in->IdProfessor;
                $obj_out->IdDisciplina = $obj_in->IdDisciplina;
                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->Localizador = $obj_in->Localizador;
                $obj_out->Titulo = $obj_in->Titulo;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->DataInicial = $obj_in->DataInicial;
                $obj_out->DataFinal = $obj_in->DataFinal;
                $obj_out->MetaPontuacao = $obj_in->MetaPontuacao;
                $obj_out->MetaQtdPartidas = $obj_in->MetaQtdPartidas;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_tarefaturma, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_tarefaturma;
    }

    // --------------------------------------------------------------------------------
    // listByIdInstituicaoLocalizador
    // Lista os registros com base em IdInstituicao, Localizador
    // --------------------------------------------------------------------------------
    public function listByIdInstituicaoLocalizador(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdInstituicao = null,
        string $Localizador = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdInstituicao, null, null, null, null, null, null, $Localizador, null, null, null, null, null, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdTarefaTurma = null,
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdTurma = null,
        string $IdProfessor = null,
        string $IdDisciplina = null,
        string $IdJogo = null,
        string $Localizador = null,
        string $Titulo = null,
        string $Descricao = null,
        string $DataInicial = null,
        string $DataFinal = null,
        int $MetaPontuacao = null,
        int $MetaQtdPartidas = null,
        string $Status = null)
    {
        $sql = "select
                    idtarefaturma as IdTarefaTurma,
                    idinstituicao as IdInstituicao,
                    idunidade as IdUnidade,
                    idcurso as IdCurso,
                    idturma as IdTurma,
                    idprofessor as IdProfessor,
                    iddisciplina as IdDisciplina,
                    idjogo as IdJogo,
                    localizador as Localizador,
                    titulo as Titulo,
                    descricao as Descricao,
                    datainicial as DataInicial,
                    datafinal as DataFinal,
                    metapontuacao as MetaPontuacao,
                    metaqtdpartidas as MetaQtdPartidas,
                    status as Status
                from
                    tarefaturma
                where 1 = 1";

        if (isset($IdTarefaTurma)) { $sql = $sql . " and (idtarefaturma = " . $this->o_db->quote($IdTarefaTurma) . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao = " . $this->o_db->quote($IdInstituicao) . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade = " . $this->o_db->quote($IdUnidade) . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso = " . $this->o_db->quote($IdCurso) . ")"; }
        if (isset($IdTurma)) { $sql = $sql . " and (idturma = " . $this->o_db->quote($IdTurma) . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor = " . $this->o_db->quote($IdProfessor) . ")"; }
        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina = " . $this->o_db->quote($IdDisciplina) . ")"; }
        if (isset($IdJogo)) { $sql = $sql . " and (idjogo = " . $this->o_db->quote($IdJogo) . ")"; }
        if (isset($Localizador)) { $sql = $sql . " and (localizador = " . $this->o_db->quote($Localizador) . ")"; }
        if (isset($Titulo)) { $sql = $sql . " and (titulo = " . $this->o_db->quote($Titulo) . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote($Descricao) . ")"; }
        if (isset($DataInicial)) { $sql = $sql . " and (datainicial = " . $this->o_db->quote($DataInicial) . ")"; }
        if (isset($DataFinal)) { $sql = $sql . " and (datafinal = " . $this->o_db->quote($DataFinal) . ")"; }
        if (isset($MetaPontuacao)) { $sql = $sql . " and (metapontuacao = " . MetaPontuacao . ")"; }
        if (isset($MetaQtdPartidas)) { $sql = $sql . " and (metaqtdpartidas = " . MetaQtdPartidas . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new TarefaTurmaModel();

                $obj_out->IdTarefaTurma = $obj_in->IdTarefaTurma;
                $obj_out->IdInstituicao = $obj_in->IdInstituicao;
                $obj_out->IdUnidade = $obj_in->IdUnidade;
                $obj_out->IdCurso = $obj_in->IdCurso;
                $obj_out->IdTurma = $obj_in->IdTurma;
                $obj_out->IdProfessor = $obj_in->IdProfessor;
                $obj_out->IdDisciplina = $obj_in->IdDisciplina;
                $obj_out->IdJogo = $obj_in->IdJogo;
                $obj_out->Localizador = $obj_in->Localizador;
                $obj_out->Titulo = $obj_in->Titulo;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->DataInicial = $obj_in->DataInicial;
                $obj_out->DataFinal = $obj_in->DataFinal;
                $obj_out->MetaPontuacao = $obj_in->MetaPontuacao;
                $obj_out->MetaQtdPartidas = $obj_in->MetaQtdPartidas;
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
    public function loadById( string $IdTarefaTurma )
    {
        $obj = $this->objectByFields($IdTarefaTurma, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
        if ($obj) {
            $this->IdTarefaTurma = $obj->IdTarefaTurma;
            $this->IdInstituicao = $obj->IdInstituicao;
            $this->IdUnidade = $obj->IdUnidade;
            $this->IdCurso = $obj->IdCurso;
            $this->IdTurma = $obj->IdTurma;
            $this->IdProfessor = $obj->IdProfessor;
            $this->IdDisciplina = $obj->IdDisciplina;
            $this->IdJogo = $obj->IdJogo;
            $this->Localizador = $obj->Localizador;
            $this->Titulo = $obj->Titulo;
            $this->Descricao = $obj->Descricao;
            $this->DataInicial = $obj->DataInicial;
            $this->DataFinal = $obj->DataFinal;
            $this->MetaPontuacao = $obj->MetaPontuacao;
            $this->MetaQtdPartidas = $obj->MetaQtdPartidas;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdInstituicaoLocalizador
    // Verifica se um registro existe com IdInstituicao, Localizador
    // --------------------------------------------------------------------------------
    public function existsIdInstituicaoLocalizador()
    {
        $obj = $this->objectByFields(null, $this->IdInstituicao, null, null, null, null, null, null, $this->Localizador, null, null, null, null, null, null, null);
        return !($obj && ($obj->IdTarefaTurma === $this->IdTarefaTurma));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdTarefaTurma = null,
        string $IdInstituicao = null,
        string $IdUnidade = null,
        string $IdCurso = null,
        string $IdTurma = null,
        string $IdProfessor = null,
        string $IdDisciplina = null,
        string $IdJogo = null,
        string $Localizador = null,
        string $Titulo = null,
        string $Descricao = null,
        string $DataInicial = null,
        string $DataFinal = null,
        int $MetaPontuacao = null,
        int $MetaQtdPartidas = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    tarefaturma
                where 1 = 1";

        if (isset($IdTarefaTurma)) { $sql = $sql . " and (idtarefaturma like " . $this->o_db->quote("%" . $IdTarefaTurma . "%") . ")"; }
        if (isset($IdInstituicao)) { $sql = $sql . " and (idinstituicao like " . $this->o_db->quote("%" . $IdInstituicao . "%") . ")"; }
        if (isset($IdUnidade)) { $sql = $sql . " and (idunidade like " . $this->o_db->quote("%" . $IdUnidade . "%") . ")"; }
        if (isset($IdCurso)) { $sql = $sql . " and (idcurso like " . $this->o_db->quote("%" . $IdCurso . "%") . ")"; }
        if (isset($IdTurma)) { $sql = $sql . " and (idturma like " . $this->o_db->quote("%" . $IdTurma . "%") . ")"; }
        if (isset($IdProfessor)) { $sql = $sql . " and (idprofessor like " . $this->o_db->quote("%" . $IdProfessor . "%") . ")"; }
        if (isset($IdDisciplina)) { $sql = $sql . " and (iddisciplina like " . $this->o_db->quote("%" . $IdDisciplina . "%") . ")"; }
        if (isset($IdJogo)) { $sql = $sql . " and (idjogo like " . $this->o_db->quote("%" . $IdJogo . "%") . ")"; }
        if (isset($Localizador)) { $sql = $sql . " and (localizador like " . $this->o_db->quote("%" . $Localizador . "%") . ")"; }
        if (isset($Titulo)) { $sql = $sql . " and (titulo like " . $this->o_db->quote("%" . $Titulo . "%") . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao like " . $this->o_db->quote("%" . $Descricao . "%") . ")"; }
        if (isset($DataInicial)) { $sql = $sql . " and (datainicial like " . $this->o_db->quote("%" . $DataInicial . "%") . ")"; }
        if (isset($DataFinal)) { $sql = $sql . " and (datafinal like " . $this->o_db->quote("%" . $DataFinal . "%") . ")"; }
        if (isset($MetaPontuacao)) { $sql = $sql . " and (metapontuacao = " . MetaPontuacao . ")"; }
        if (isset($MetaQtdPartidas)) { $sql = $sql . " and (metaqtdpartidas = " . MetaQtdPartidas . ")"; }
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
    // countByIdInstituicaoLocalizador
    // Conta os registros com base em IdInstituicao, Localizador
    // --------------------------------------------------------------------------------
    public function countByIdInstituicaoLocalizador(
        string $IdInstituicao = null,
        string $Localizador = null)
    {
        return $this->countBy(null, $IdInstituicao, null, null, null, null, null, null, $Localizador, null, null, null, null, null, null, null);
    }

}

?>
