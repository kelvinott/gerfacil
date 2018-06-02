<?php
class Conexao {
    private $hostBanco;
    private $portaBanco;
    private $usuarioBanco;
    private $senhaBanco;
    private $dataBase;
    private $conexao;

    public function __construct() {
        $this->hostBanco    = 'localhost';
        $this->usuarioBanco = 'root';
        $this->senhaBanco   = 'root';
        $this->portaBanco   = '3306';
        $this->dataBase     = 'dbgerfacil';
    }

    public function conectaBanco() {

        $this->conexao = mysqli_connect($this->hostBanco,$this->usuarioBanco,$this->senhaBanco,$this->dataBase);

        if (!$this->conexao)
            exit("Banco nao conectado [MYSQL]");

            $db = mysqli_select_db($this->conexao, $this->dataBase) or die('Erro ao selecionar o Banco de Dados!');

    }

    public function query($sSQL) {
        $sSQL = str_replace("'null'","null",$sSQL);

        mysqli_real_escape_string($this->conexao, $sSQL);
        $qQuery = mysqli_query($this->conexao, $sSQL);


        if(!$qQuery)
            exit("Erro ao tentar executar o SQL <br>".$sSQL.mysqli_error($this->conexao));
        else
            return $qQuery;
    }

    public function begin() {
        $this->query("begin;");
    }

    public function rollback() {
        $this->query("rollback;");
    }

    public function commit() {
        $this->query("commit;");
    }

    public function fetch_query($sSQL) {
        $qQuery = $this->query($sSQL);
        $oObj   = $this->fetch_object($qQuery);
        $this->free_result($qQuery);
        return $oObj;
    }

    public function fetch_object($query) {
        return mysqli_fetch_object($query);

    }

    public function exec_sql_trans(&$bErro, $sSQL) {
        if (!$this->query($sSQL))
            $bErro = true;
        return $bErro;
    }

    public function fechaConexao() {
        return mysqli_close($this->conexao);
    }

    public function getMaxCodigo($sTabela, $sCampo, $sCondicao = false){
        $sSQL = "select max(".$sCampo.") as resultado from ".$sTabela." ";
        if ($sCondicao){
            $sSQL .= " where ".$sCondicao." ";
        }

        $oDados = $this->fetch_query($sSQL);
        return ($oDados->resultado + 1);
    }

    public function free_result($qQuery){
        mysqli_free_result($qQuery);
    }

    public function num_rows($qQuery) {

        $iTotalLinha = mysqli_num_rows($qQuery);
        return $iTotalLinha;
    }

    public function associativa($qQuery) {
        return mysqli_fetch_assoc($qQuery);
    }

    public function getConexao() {
        return $this->conexao;
    }
}

$oConexao = new Conexao();

?>
