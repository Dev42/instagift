<?php

class Pedidos {
    
    protected $id;
    
    protected $nome;
	
	protected $email;
	
	protected $ddd;
	
	protected $telefone;
	
	protected $logradouro;
	
	protected $numero;
	
	protected $complemento;
	
	protected $cep;
	
	protected $bairro;
	
	protected $cidade;
	
	protected $estado;
	
	protected $valorPedido;
	
	protected $valorFrete;
	
	protected $peso;
	
	protected $frete;
    
    protected $status;
	
	protected $statusPag;
	
	protected $paymode;
    
    protected $createdAt;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
	
	public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
	
	public function getDdd() {
        return $this->ddd;
    }

    public function setDdd($ddd) {
        $this->ddd = $ddd;
    }
	
	public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
	
	public function getLogradouro() {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
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

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }
	
	public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }
	
	public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
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
	
	public function getValorPedido() {
        return $this->valorPedido;
    }

    public function setValorPedido($valorPedido) {
        $this->valorPedido = $valorPedido;
    }
	
	public function getValorFrete() {
        return $this->valorFrete;
    }

    public function setValorFrete($valorFrete) {
        $this->valorFrete = $valorFrete;
    }
	
	public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }
	
	public function getFrete() {
        return $this->frete;
    }

    public function setFrete($frete) {
        $this->frete = $frete;
    }
	
	public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
	
	public function getStatusPag() {
        return $this->statusPag;
    }

    public function setStatusPag($statusPag) {
        $this->statusPag = $statusPag;
    }
	
	public function getPaymode() {
        return $this->paymode;
    }

    public function setPaymode($paymode) {
        $this->paymode = $paymode;
    }
	
	public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }
    
    public function assocEntity(){
        
        $fields = array(
            "ped_10_id"       			=> $this->getId(),
			"ped_35_nome"       		=> $this->getNome(),
			"ped_35_email"       		=> $this->getEmail(),
			"ped_35_ddd"       			=> $this->getDdd(),
			"ped_35_telefone"       	=> $this->getTelefone(),
			"ped_35_logradouro"       	=> $this->getLogradouro(),
			"ped_35_numero"       		=> $this->getNumero(),
			"ped_35_complemento"       	=> $this->getComplemento(),
			"ped_35_cep"       			=> $this->getCep(),
			"ped_35_bairro"       		=> $this->getBairro(),
			"ped_35_cidade"       		=> $this->getCidade(),
			"ped_35_estado"       		=> $this->getEstado(),
			"ped_20_valorPedido"       	=> $this->getValorPedido(),
			"ped_20_valorFrete"       	=> $this->getValorFrete(),
			"ped_20_peso"       		=> $this->getPeso(),
			"ped_12_frete"       		=> $this->getFrete(),
            "ped_12_status"             => $this->getStatus(),
			"ped_12_statusPag"          => $this->getStatusPag(),
			"ped_30_paymode"            => $this->getPaymode(),
            "ped_22_created_at"         => $this->getCreatedAt()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['ped_10_id']);
		$this->setNome($row['ped_35_nome']);
		$this->setEmail($row['ped_35_email']);
        $this->setDdd($row['ped_35_ddd']);
		$this->setTelefone($row['ped_35_telefone']);
		$this->setLogradouro($row['ped_35_logradouro']);
		$this->setNumero($row['ped_35_numero']);
		$this->setComplemento($row['ped_35_complemento']);
		$this->setCep($row['ped_35_cep']);
		$this->setBairro($row['ped_35_bairro']);
		$this->setCidade($row['ped_35_cidade']);
		$this->setEstado($row['ped_35_estado']);
		$this->setValorPedido($row['ped_20_valorPedido']);
		$this->setValorFrete($row['ped_20_valorFrete']);
		$this->setPeso($row['ped_20_peso']);
		$this->setFrete($row['ped_12_frete']);
		$this->setStatus($row['ped_12_status']);
		$this->setStatusPag($row['ped_12_statusPag']);
		$this->setPaymode($row['ped_30_paymode']);
		$this->setCreatedAt($row['ped_22_created_at']);
		
        return $this;
    }
    
    public function tableName(){
        return "pedidos";
    }
    
}

?>