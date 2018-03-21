<?php

require_once $APP_PATH_ROOT."/lib/BDConBaseModel.php";

// --------------------------------------------------------------------------------
// GoEdInstrucaoModel
//
// Instru��es utilizadas no decorrer das partidas.
//
// Gerado em: 2018-03-16 07:24:39
// --------------------------------------------------------------------------------
class GoEdInstrucaoModel extends BDConBaseModel
{
    // Construtor da classe, executado quando a classe � criada
    function __construct() {
        parent::__construct();
        $this->IdGoEdInstrucao = md5(uniqid(rand(), true));
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = false;                                          // indica se o registro j� foi salvo

    protected $IdGoEdInstrucao;                                            // char(32), PK, obrigat�rio - Identifica��o da Instru��o GOEDUCA
    protected $IdGoEdDisciplina;                                           // char(32), FK, obrigat�rio - Identifica��o da Disciplina GOEDUCA
    protected $IdGoEdTema;                                                 // char(32), FK, obrigat�rio - Identifica��o do Tema dentro uma Disciplina GOEDUCA
    protected $IdGoEdTopico;                                               // char(32), FK, opcional - Identifica��o do T�pico de um Tema dentro uma Disciplina GOEDUCA
    protected $IdGoEdCurso;                                                // char(32), opcional - Identifica��o do Curso GOEDUCA
    protected $IdGoEdEtapa;                                                // char(32), opcional - Identifica��o da Etapa de um Curso GOEDUCA
    protected $Nome;                                                       // varchar(256), obrigat�rio - Nome da instru��o
    protected $Descricao;                                                  // text, opcional - Descri��o da instru��o
    protected $Status = 'AT';                                              // varchar(8), obrigat�rio - Situa��o do registro no BD

    // --------------------------------------------------------------------------------
    // Indica que o registro j� foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter das propriedades
    // --------------------------------------------------------------------------------
    public function __get($name) {
        if ($name === "IdGoEdInstrucao") { return $this->IdGoEdInstrucao; }
        if ($name === "IdGoEdDisciplina") { return $this->IdGoEdDisciplina; }
        if ($name === "IdGoEdTema") { return $this->IdGoEdTema; }
        if ($name === "IdGoEdTopico") { return $this->IdGoEdTopico; }
        if ($name === "IdGoEdCurso") { return $this->IdGoEdCurso; }
        if ($name === "IdGoEdEtapa") { return $this->IdGoEdEtapa; }
        if ($name === "Nome") { return $this->Nome; }
        if ($name === "Descricao") { return $this->Descricao; }
        if ($name === "Status") { return $this->Status; }
        throw new Exception( $name . " => Propriedade inv�lida.");
    }

    // --------------------------------------------------------------------------------
    // Setters das propriedades
    // --------------------------------------------------------------------------------
    public function __set($name, $value) {
        if($name === "IdGoEdInstrucao") {
            $this->IdGoEdInstrucao = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdInstrucao;
        }
        if($name === "IdGoEdDisciplina") {
            $this->IdGoEdDisciplina = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdDisciplina;
        }
        if($name === "IdGoEdTema") {
            $this->IdGoEdTema = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdTema;
        }
        if($name === "IdGoEdTopico") {
            $this->IdGoEdTopico = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdTopico;
        }
        if($name === "IdGoEdCurso") {
            $this->IdGoEdCurso = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdCurso;
        }
        if($name === "IdGoEdEtapa") {
            $this->IdGoEdEtapa = substr($value, 0, 32);
            $this->_iSaved_ = false;
            return $this->IdGoEdEtapa;
        }
        if($name === "Nome") {
            $this->Nome = substr($value, 0, 256);
            $this->_iSaved_ = false;
            return $this->Nome;
        }
        if($name === "Descricao") {
            $this->Descricao = $value;
            $this->_iSaved_ = false;
            return $this->Descricao;
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
                        goedinstrucao
                    set 
                        idgoedinstrucao = " . ( isset($this->IdGoEdInstrucao) ? $this->o_db->quote($IdGoEdInstrucao) : "null" ) . ",
                        idgoeddisciplina = " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                        idgoedtema = " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                        idgoedtopico = " . ( isset($this->IdGoEdTopico) ? $this->o_db->quote($IdGoEdTopico) : "null" ) . ",
                        idgoedcurso = " . ( isset($this->IdGoEdCurso) ? $this->o_db->quote($IdGoEdCurso) : "null" ) . ",
                        idgoedetapa = " . ( isset($this->IdGoEdEtapa) ? $this->o_db->quote($IdGoEdEtapa) : "null" ) . ",
                        nome = " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                        descricao = " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
                        status = " . ( isset($this->Status) ? $this->o_db->quote($Status) : "null" ) . "
                    where 
                        idgoedinstrucao" . ( isset($this->IdGoEdInstrucao) ? " = " . $this->o_db->quote($this->IdGoEdInstrucao) : " is null" ) . "";
        }
        else {
            $sql = "insert into 
                        goedinstrucao (
                            idgoedinstrucao,
                            idgoeddisciplina,
                            idgoedtema,
                            idgoedtopico,
                            idgoedcurso,
                            idgoedetapa,
                            nome,
                            descricao,
                            status
                        )
                        values (
                            " . ( isset($this->IdGoEdInstrucao) ? $this->o_db->quote($IdGoEdInstrucao) : "null" ) . ",
                            " . ( isset($this->IdGoEdDisciplina) ? $this->o_db->quote($IdGoEdDisciplina) : "null" ) . ",
                            " . ( isset($this->IdGoEdTema) ? $this->o_db->quote($IdGoEdTema) : "null" ) . ",
                            " . ( isset($this->IdGoEdTopico) ? $this->o_db->quote($IdGoEdTopico) : "null" ) . ",
                            " . ( isset($this->IdGoEdCurso) ? $this->o_db->quote($IdGoEdCurso) : "null" ) . ",
                            " . ( isset($this->IdGoEdEtapa) ? $this->o_db->quote($IdGoEdEtapa) : "null" ) . ",
                            " . ( isset($this->Nome) ? $this->o_db->quote($Nome) : "null" ) . ",
                            " . ( isset($this->Descricao) ? $this->o_db->quote($Descricao) : "null" ) . ",
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
        if (isset($this->IdGoEdInstrucao)) {
            $sql = "delete from 
                        goedinstrucao
                     where 
                        idgoedinstrucao" . ( isset($this->IdGoEdInstrucao) ? " = " . $this->o_db->quote($this->IdGoEdInstrucao) : " is null" ) . ""; 
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
        string $IdGoEdInstrucao = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null,
        string $IdGoEdCurso = null,
        string $IdGoEdEtapa = null,
        string $Nome = null,
        string $Descricao = null,
        string $Status = null)
    {
        if (is_null($pagenumber) || ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) || ($pagesize < 1) || ($pagesize > 100)) { $pagesize = 100; }

        $sql = "select
                    idgoedinstrucao as IdGoEdInstrucao,
                    idgoeddisciplina as IdGoEdDisciplina,
                    idgoedtema as IdGoEdTema,
                    idgoedtopico as IdGoEdTopico,
                    idgoedcurso as IdGoEdCurso,
                    idgoedetapa as IdGoEdEtapa,
                    nome as Nome,
                    descricao as Descricao,
                    status as Status
                from
                    goedinstrucao
                where 1 = 1";

        if (isset($IdGoEdInstrucao)) { $sql = $sql . " and (idgoedinstrucao = " . $this->o_db->quote("%" . $IdGoEdInstrucao. "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote("%" . $IdGoEdDisciplina. "%") . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote("%" . $IdGoEdTema. "%") . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico = " . $this->o_db->quote("%" . $IdGoEdTopico. "%") . ")"; }
        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso = " . $this->o_db->quote("%" . $IdGoEdCurso. "%") . ")"; }
        if (isset($IdGoEdEtapa)) { $sql = $sql . " and (idgoedetapa = " . $this->o_db->quote("%" . $IdGoEdEtapa. "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote("%" . $Nome. "%") . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote("%" . $Descricao. "%") . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote("%" . $Status. "%") . ")"; }


        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_goedinstrucao = array();

        // l� os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdInstrucaoModel();

                $obj_out->IdGoEdInstrucao = $obj_in->IdGoEdInstrucao;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->IdGoEdTopico = $obj_in->IdGoEdTopico;
                $obj_out->IdGoEdCurso = $obj_in->IdGoEdCurso;
                $obj_out->IdGoEdEtapa = $obj_in->IdGoEdEtapa;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Descricao = $obj_in->Descricao;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_goedinstrucao, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_goedinstrucao;
    }

    // --------------------------------------------------------------------------------
    // listByIdGoEdDisciplinaIdGoEdTemaNome
    // Lista os registros com base em IdGoEdDisciplina, IdGoEdTema, Nome
    // --------------------------------------------------------------------------------
    public function listByIdGoEdDisciplinaIdGoEdTemaNome(
        int $pagenumber = 1,
        int $pagesize   = 25,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $Nome = null)
    {
        return $this->listBy($pagenumber, $pagesize, null, $IdGoEdDisciplina, $IdGoEdTema, null, null, null, $Nome, null, null);
    }

    // --------------------------------------------------------------------------------
    // objectByFields
    // Carrega a primeira ocorr�ncia do objeto que coincida com os campos informados
    // --------------------------------------------------------------------------------
    public function objectByFields(
        string $IdGoEdInstrucao = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null,
        string $IdGoEdCurso = null,
        string $IdGoEdEtapa = null,
        string $Nome = null,
        string $Descricao = null,
        string $Status = null)
    {
        $sql = "select
                    idgoedinstrucao as IdGoEdInstrucao,
                    idgoeddisciplina as IdGoEdDisciplina,
                    idgoedtema as IdGoEdTema,
                    idgoedtopico as IdGoEdTopico,
                    idgoedcurso as IdGoEdCurso,
                    idgoedetapa as IdGoEdEtapa,
                    nome as Nome,
                    descricao as Descricao,
                    status as Status
                from
                    goedinstrucao
                where 1 = 1";

        if (isset($IdGoEdInstrucao)) { $sql = $sql . " and (idgoedinstrucao = " . $this->o_db->quote($IdGoEdInstrucao) . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina = " . $this->o_db->quote($IdGoEdDisciplina) . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema = " . $this->o_db->quote($IdGoEdTema) . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico = " . $this->o_db->quote($IdGoEdTopico) . ")"; }
        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso = " . $this->o_db->quote($IdGoEdCurso) . ")"; }
        if (isset($IdGoEdEtapa)) { $sql = $sql . " and (idgoedetapa = " . $this->o_db->quote($IdGoEdEtapa) . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome = " . $this->o_db->quote($Nome) . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao = " . $this->o_db->quote($Descricao) . ")"; }
        if (isset($Status)) { $sql = $sql . " and (status = " . $this->o_db->quote($Status) . ")"; }

        $sql = $sql . " limit 1";

        // l� o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj_in = $resultset->fetchObject()) {
                $obj_out = new GoEdInstrucaoModel();

                $obj_out->IdGoEdInstrucao = $obj_in->IdGoEdInstrucao;
                $obj_out->IdGoEdDisciplina = $obj_in->IdGoEdDisciplina;
                $obj_out->IdGoEdTema = $obj_in->IdGoEdTema;
                $obj_out->IdGoEdTopico = $obj_in->IdGoEdTopico;
                $obj_out->IdGoEdCurso = $obj_in->IdGoEdCurso;
                $obj_out->IdGoEdEtapa = $obj_in->IdGoEdEtapa;
                $obj_out->Nome = $obj_in->Nome;
                $obj_out->Descricao = $obj_in->Descricao;
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
    public function loadById( string $IdGoEdInstrucao )
    {
        $obj = $this->objectByFields($IdGoEdInstrucao, null, null, null, null, null, null, null, null);
        if ($obj) {
            $this->IdGoEdInstrucao = $obj->IdGoEdInstrucao;
            $this->IdGoEdDisciplina = $obj->IdGoEdDisciplina;
            $this->IdGoEdTema = $obj->IdGoEdTema;
            $this->IdGoEdTopico = $obj->IdGoEdTopico;
            $this->IdGoEdCurso = $obj->IdGoEdCurso;
            $this->IdGoEdEtapa = $obj->IdGoEdEtapa;
            $this->Nome = $obj->Nome;
            $this->Descricao = $obj->Descricao;
            $this->Status = $obj->Status;

            $this->_isSaved_ = true;

            return $this;
        }
        return null;
    }

    // --------------------------------------------------------------------------------
    // existsIdGoEdDisciplinaIdGoEdTemaNome
    // Verifica se um registro existe com IdGoEdDisciplina, IdGoEdTema, Nome
    // --------------------------------------------------------------------------------
    public function existsIdGoEdDisciplinaIdGoEdTemaNome()
    {
        $obj = $this->objectByFields(null, $this->IdGoEdDisciplina, $this->IdGoEdTema, null, null, null, $this->Nome, null, null);
        return !($obj && ($obj->IdGoEdInstrucao === $this->IdGoEdInstrucao));
    }

    // --------------------------------------------------------------------------------
    // countBy
    // Conta os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function countBy(
        string $IdGoEdInstrucao = null,
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $IdGoEdTopico = null,
        string $IdGoEdCurso = null,
        string $IdGoEdEtapa = null,
        string $Nome = null,
        string $Descricao = null,
        string $Status = null) : int
    {
        $sql = "select
                    count(*) as Quantity
                from
                    goedinstrucao
                where 1 = 1";

        if (isset($IdGoEdInstrucao)) { $sql = $sql . " and (idgoedinstrucao like " . $this->o_db->quote("%" . $IdGoEdInstrucao . "%") . ")"; }
        if (isset($IdGoEdDisciplina)) { $sql = $sql . " and (idgoeddisciplina like " . $this->o_db->quote("%" . $IdGoEdDisciplina . "%") . ")"; }
        if (isset($IdGoEdTema)) { $sql = $sql . " and (idgoedtema like " . $this->o_db->quote("%" . $IdGoEdTema . "%") . ")"; }
        if (isset($IdGoEdTopico)) { $sql = $sql . " and (idgoedtopico like " . $this->o_db->quote("%" . $IdGoEdTopico . "%") . ")"; }
        if (isset($IdGoEdCurso)) { $sql = $sql . " and (idgoedcurso like " . $this->o_db->quote("%" . $IdGoEdCurso . "%") . ")"; }
        if (isset($IdGoEdEtapa)) { $sql = $sql . " and (idgoedetapa like " . $this->o_db->quote("%" . $IdGoEdEtapa . "%") . ")"; }
        if (isset($Nome)) { $sql = $sql . " and (nome like " . $this->o_db->quote("%" . $Nome . "%") . ")"; }
        if (isset($Descricao)) { $sql = $sql . " and (descricao like " . $this->o_db->quote("%" . $Descricao . "%") . ")"; }
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
    // countByIdGoEdDisciplinaIdGoEdTemaNome
    // Conta os registros com base em IdGoEdDisciplina, IdGoEdTema, Nome
    // --------------------------------------------------------------------------------
    public function countByIdGoEdDisciplinaIdGoEdTemaNome(
        string $IdGoEdDisciplina = null,
        string $IdGoEdTema = null,
        string $Nome = null)
    {
        return $this->countBy(null, $IdGoEdDisciplina, $IdGoEdTema, null, null, null, $Nome, null, null);
    }

}

?>
