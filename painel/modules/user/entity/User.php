<?php

class User {
    
    protected $id;
    
    protected $nome;
    
    protected $contato;
	
	protected $doc1;
	
	protected $doc2;
    
    protected $ddd;
    
    protected $telefone;
    
    protected $email;
    
    protected $endereco;
    
    protected $obs;
    
    protected $login;
    
    protected $senha;
    
    /* User Type List:
     * 1: Usuário normal
     * 2: Administrador
     * 3: Fornecedor
     */
    protected $type;
    
    protected $active;
    
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

    public function getContato() {
        return $this->contato;
    }

    public function setContato($contato) {
        $this->contato = $contato;
    }
	
	public function getDoc1() {
        return $this->doc1;
    }

    public function setDoc1($doc1) {
        $this->doc1 = $doc1;
    }
	
	public function getDoc2() {
        return $this->doc2;
    }

    public function setDoc2($doc2) {
        $this->doc2 = $doc2;
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

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getObs() {
        return $this->obs;
    }

    public function setObs($obs) {
        $this->obs = $obs;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function __construct() {
        $this->setActive(1);
        $this->setType(2);
    }

    public function assocEntity(){
        
        $fields = array(
            "user_10_id"       => $this->getId(),
            "user_30_nome"     => $this->getNome(),
            "user_30_contato"  => $this->getContato(),
			"user_30_doc1"  => $this->getDoc1(),
			"user_30_doc2"  => $this->getDoc2(),
            "user_10_tel_ddd"  => $this->getDdd(),
            "user_10_tel"      => $this->getTelefone(),
            "user_30_endereco" => $this->getEndereco(),
            "user_30_obs"      => $this->getObs(),
            "user_30_username" => $this->getLogin(),
            "user_30_password" => $this->encriptPassword(),
            "user_30_email"    => $this->getEmail(),
            "user_12_type"     => $this->getType(),
            "user_12_active"   => $this->getActive()
        );
        
        return $fields;
        
    }
	
	public function assocEntitySemSenha(){
        
        $fields = array(
            "user_10_id"       => $this->getId(),
            "user_30_nome"     => $this->getNome(),
            "user_30_contato"  => $this->getContato(),
			"user_30_doc1"  => $this->getDoc1(),
			"user_30_doc2"  => $this->getDoc2(),
            "user_10_tel_ddd"  => $this->getDdd(),
            "user_10_tel"      => $this->getTelefone(),
            "user_30_endereco" => $this->getEndereco(),
            "user_30_obs"      => $this->getObs(),
            "user_30_username" => $this->getLogin(),
            "user_30_email"    => $this->getEmail(),
            "user_12_type"     => $this->getType(),
            "user_12_active"   => $this->getActive()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['user_10_id']);
        $this->setNome($row['user_30_nome']);
        $this->setContato($row['user_30_contato']);
		$this->setDoc1($row['user_30_doc1']);
		$this->setDoc2($row['user_30_doc2']);
        $this->setDdd($row['user_10_tel_ddd']);
        $this->setTelefone($row['user_10_tel']);
        $this->setEndereco($row['user_30_endereco']);
        $this->setObs($row['user_30_obs']);
        $this->setLogin($row['user_30_username']);
        $this->setSenha($row['user_30_password']);
        $this->setEmail($row['user_30_email']);
        $this->setType($row['user_12_type']);
        $this->setActive($row['user_12_active']);
        
        return $this;
    }
    
    public function getHierarchy(){
        
        $hie = array(
            "1" => "ROLE_SUPERADMIN",
            "2" => "ROLE_ADMIN",
            "3" => "ROLE_FORNECEDOR",
            "4" => "ROLE_USER"
        );
        
        return $hie;
        
    }
    
    public function encriptPassword(){

        $password = $this->getSenha();
        
        $password = md5($password);

        $password = base64_encode($password);
        
        return $password;
        
    }
    
    public function tableName(){
        return "user";
    }
    
}

?>