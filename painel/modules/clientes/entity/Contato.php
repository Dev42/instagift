<?php


class Contato {
    
    protected $id;
    
    protected $clienteId;
    
    protected $tipo;
    
    protected $nome;
    
    protected $ddd;
    
    protected $tel;
    
    protected $email;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getClienteId() {
        return $this->clienteId;
    }

    public function setClienteId($clienteId) {
        $this->clienteId = $clienteId;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDdd() {
        return $this->ddd;
    }

    public function setDdd($ddd) {
        $this->ddd = $ddd;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function allContatoTipo(){
        
        $arrTipos = array(
            1 => "Celular",
            2 => "Comercal",
            3 => "Residencial",
            4 => "Financeiro"
            
        );
        
        return $arrTipos;
        
    }

    public function fetchEntity($row){
        
        $this->setId($row['cnt_10_id']);
        $this->setClienteId($row['cli_10_id']);
        $this->setNome($row['cnt_30_nome']);
        $this->setTipo($row['cnt_10_tipo']);
        $this->setDdd($row['cnt_10_ddd']);
        $this->setTel($row['cnt_10_tel']);
        $this->setEmail($row['cnt_30_email']);
        
        return $this;
    }
    
    public function assocEntity(){
        
        $fields = array(
            'cnt_10_id' => $this->getId(),
            'cli_10_id' => $this->getClienteId(),
            'cnt_30_nome' => $this->getNome(),
            'cnt_10_tipo' => $this->getTipo(),
            'cnt_10_ddd' => $this->getDdd(),
            'cnt_10_tel' => $this->getTel(),
            'cnt_30_email' => $this->getEmail()
        );
        
        return $fields;
        
    }
    
    public function tableName(){
        return "contato";
    }
    
}

?>