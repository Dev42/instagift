<?php


class Endereco {
    
    protected $id;
    
    protected $clienteId;
    
    protected $endereco;
    
    protected $numero;
    
    protected $complemento;
    
    protected $bairro;
    
    protected $cidade;
    
    protected $estado;
    
    protected $cep;
    
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
    
    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }
    
    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function fetchEntity($row){
        
        $this->setId($row['end_10_id']);
        $this->setClienteId($row['cli_10_id']);
        $this->setEndereco($row['end_30_logradouro']);
        $this->setBairro($row['end_30_bairro']);
        $this->setNumero($row['end_10_numero']);
        $this->setComplemento($row['end_30_complemento']);
        $this->setCidade($row['end_30_cidade']);
        $this->setEstado($row['end_30_estado']);
        $this->setCep($row['end_30_cep']);
        
        return $this;
    }
    
    public function assocEntity(){
        
        $fields = array(
            'end_10_id' => $this->getId(),
            'cli_10_id' => $this->getClienteId(),
            'end_30_logradouro' => $this->getEndereco(),
            'end_30_bairro' => $this->getBairro(),
            'end_10_numero' => $this->getNumero(),
            'end_30_complemento' => $this->getComplemento(),
            'end_30_cidade' => $this->getCidade(),
            'end_30_estado' => $this->getEstado(),
            'end_30_cep' => $this->getCep()
        );
        
        return $fields;
        
    }
    
    public function tableName(){
        return "endereco";
    }
    
}

?>