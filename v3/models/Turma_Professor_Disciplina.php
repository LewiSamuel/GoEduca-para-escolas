<?php

// --------------------------------------------------------------------------------
// Turma_Professor_DisciplinaModel
// Classe de persistência da tabela TURMA_PROFESSOR_DISCIPLINA.
//
// Gerado em: 2018-03-09 07:03:34
// --------------------------------------------------------------------------------
class Turma_Professor_DisciplinaModel extends PersistModelAbstract
{
    // Construtor da classe, executado quando a classa é criada
    function __construct() {
        parent::__construct();
    }

    // --------------------------------------------------------------------------------
    // Propriedades privadas do objeto
    // --------------------------------------------------------------------------------

    protected $_isSaved_ = true;             // indica se o registro já foi salvo

    private $Idinstituicao;                  // int(11)
    private $Idturma;                        // int(11)
    private $Idprofessor;                    // int(11)
    private $Iddisciplina;                   // int(11)
    private $Status;                         // varchar(8)

    // --------------------------------------------------------------------------------
    // Indica que o registro já foi salvo no bd
    // --------------------------------------------------------------------------------
    public function isSaved() { return $this->_iSaved_; }

    // --------------------------------------------------------------------------------
    // Getter e Setter da propriedades
    // --------------------------------------------------------------------------------

    public function getIdinstituicao() { return $this->Idinstituicao; }
    public function setIdinstituicao($Idinstituicao) { $this->Idinstituicao = $Idinstituicao; $this->_iSaved_ = false; }

    public function getIdturma() { return $this->Idturma; }
    public function setIdturma($Idturma) { $this->Idturma = $Idturma; $this->_iSaved_ = false; }

    public function getIdprofessor() { return $this->Idprofessor; }
    public function setIdprofessor($Idprofessor) { $this->Idprofessor = $Idprofessor; $this->_iSaved_ = false; }

    public function getIddisciplina() { return $this->Iddisciplina; }
    public function setIddisciplina($Iddisciplina) { $this->Iddisciplina = $Iddisciplina; $this->_iSaved_ = false; }

    public function getStatus() { return $this->Status; }
    public function setStatus($Status) { $this->Status = $Status; $this->_iSaved_ = false; }

    // --------------------------------------------------------------------------------
    // save
    // Sava o objeto
    // --------------------------------------------------------------------------------
    public function save()
    {
        if (!$this->_iSaved_) { return true; }

        $regexists = $this->exists(
                                     // Idinstituicao
                                     $this->Idinstituicao,
                                     // Idturma
                                     $this->Idturma,
                                     // Idprofessor
                                     $this->Idprofessor,
                                     // Iddisciplina
                                     $this->Iddisciplina,
                                     // Status
                                     null
                                  );

        if ( $regexists ) {
            $sql = "update 
                        Turma_Professor_Disciplina
                    set 
                        Idinstituicao = $this->Idinstituicao,
                        Idturma = $this->Idturma,
                        Idprofessor = $this->Idprofessor,
                        Iddisciplina = $this->Iddisciplina,
                        Status = '$this->Status'
                    where 
                        Idinstituicao = $this->Idinstituicao
                        and
                        Idturma = $this->Idturma
                        and
                        Idprofessor = $this->Idprofessor
                        and
                        Iddisciplina = $this->Iddisciplina";
        }
        else {
            $sql = "insert into 
                        Turma_Professor_Disciplina (
                            Idinstituicao,
                            Idturma,
                            Idprofessor,
                            Iddisciplina,
                            Status
                        )
                        values (
                            $this->Idinstituicao,
                            $this->Idturma,
                            $this->Idprofessor,
                            $this->Iddisciplina,
                            '$this->Status'
                        );";
        }

        if ($this->o_db->exec($sql) > 0) {
            if (!$regexists) {
                $this->_isSaved_ = true;
                return true;
            }
            return false;
        }

        return true;
    }

    // --------------------------------------------------------------------------------
    // remove
    // Remove o objeto com base na chave primária
    // --------------------------------------------------------------------------------
    public function remove()
    {
        if (!(is_null($this->Idinstituicao)) and !(is_null($this->Idturma)) and !(is_null($this->Idprofessor)) and !(is_null($this->Iddisciplina))) {
            $sql = "delete from 
                        Turma_Professor_Disciplina
                     where 
                        Idinstituicao = $this->Idinstituicao
                        and 
                        Idturma = $this->Idturma
                        and 
                        Idprofessor = $this->Idprofessor
                        and 
                        Iddisciplina = $this->Iddisciplina"; 
            if ($this->o_db->exec($sql) > 0) {
                $this->_isSaved_ = false;
                return true;
            }
        }
        return false;
    }

    // --------------------------------------------------------------------------------
    // loadById
    // Recupera um objeto com base na chave primária
    // --------------------------------------------------------------------------------
    public function loadById( int $Idinstituicao, int $Idturma, int $Idprofessor, int $Iddisciplina )
    {
        $sql = "select
                    Idinstituicao,
                    Idturma,
                    Idprofessor,
                    Iddisciplina,
                    Status
                from
                    Turma_Professor_Disciplina
                where
                    idinstituicao = $Idinstituicao
                    and
                    idturma = $Idturma
                    and
                    idprofessor = $Idprofessor
                    and
                    iddisciplina = $Iddisciplina";

        // lê o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma o registro em um objeto
            if ($obj = $resultset->fetchObject()) {
                $this->Idinstituicao = $obj->Idinstituicao;
                $this->Idturma = $obj->Idturma;
                $this->Idprofessor = $obj->Idprofessor;
                $this->Iddisciplina = $obj->Iddisciplina;
                $this->Status = $obj->Status;

                $this->_isSaved_ = true;
            }
        }

        // retorna o objeto preenchido
        return $this;
    }

    // --------------------------------------------------------------------------------
    // exists
    // Verifica se um registro existe
    // --------------------------------------------------------------------------------
    public function exists(
        $Idinstituicao = null,
        $Idturma = null,
        $Idprofessor = null,
        $Iddisciplina = null,
        $Status = null)
    {
        $sql = "select 1 from Turma_Professor_Disciplina where 1 = 1";

        if (!(is_null($Idinstituicao))) { $sql = $sql . " and (Idinstituicao = $Idinstituicao)"; }
        if (!(is_null($Idturma))) { $sql = $sql . " and (Idturma = $Idturma)"; }
        if (!(is_null($Idprofessor))) { $sql = $sql . " and (Idprofessor = $Idprofessor)"; }
        if (!(is_null($Iddisciplina))) { $sql = $sql . " and (Iddisciplina = $Iddisciplina)"; }
        if (!(is_null($Status))) { $sql = $sql . " and (Status = '$Status')"; }

        $sql = $sql . " limit 1";

        // lê o registro no bd
        if ($resultset = $this->o_db->query($sql)) {
            if ($obj = $resultset->fetchObject()) {
                $ret = true;
            }
            else {
                $ret = false;
            }
        }

        // retorna se o registro existe
        return $ret;
    }

    // --------------------------------------------------------------------------------
    // list
    // Lista os registros com base em filtros
    // --------------------------------------------------------------------------------
    public function list(
        $pagenumber = 1,
        $pagesize   = 25,
        $Idinstituicao = null,
        $Idturma = null,
        $Idprofessor = null,
        $Iddisciplina = null,
        $Status = null)
    {
        if (is_null($pagenumber) or ($pagenumber < 1)) { $pagenumber = 1; }
        if (is_null($pagesize) or ($pagesize < 1) or ($pagesize > 100)) { $pagesize = 25; }

        $sql = "select Idinstituicao, Idturma, Idprofessor, Iddisciplina, Status from Turma_Professor_Disciplina where 1 = 1";

        if (!(is_null($Idinstituicao))) { $sql = $sql . " and (Idinstituicao = $Idinstituicao)"; }
        if (!(is_null($Idturma))) { $sql = $sql . " and (Idturma = $Idturma)"; }
        if (!(is_null($Idprofessor))) { $sql = $sql . " and (Idprofessor = $Idprofessor)"; }
        if (!(is_null($Iddisciplina))) { $sql = $sql . " and (Iddisciplina = $Iddisciplina)"; }
        if (!(is_null($Status))) { $sql = $sql . " and (Status = '%$Status%')"; }

        $skipvalue = ($pagesize * ($pagenumber - 1));
        $sql = $sql . " limit $pagesize offset $skipvalue";

        $array_turma_professor_disciplina = array();

        // lê os registros no bd
        if ($resultset = $this->o_db->query($sql)) {
            // transforma os registros em objetos e adiciona ao array de retorno
            while ($obj_in = $resultset->fetchObject()) {
                $obj_out = new Turma_Professor_DisciplinaModel();

                $obj_out->Idinstituicao = $obj_in->Idinstituicao;
                $obj_out->Idturma = $obj_in->Idturma;
                $obj_out->Idprofessor = $obj_in->Idprofessor;
                $obj_out->Iddisciplina = $obj_in->Iddisciplina;
                $obj_out->Status = $obj_in->Status;

                $obj_out->_isSaved_ = true;

                array_push($array_turma_professor_disciplina, $obj_out);
            }
        }

        // retorna a lista de objetos como array
        return $array_turma_professor_disciplina;
    }

}

?>
