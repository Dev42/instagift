function validaContato(){
	if(document.getElementById("nome").value == "")
	{
		alert("Preencha o Nome");
		document.getElementById("nome").focus();		
		return false;
	}
	if(document.getElementById("empresa").value == "")
	{
		alert("Preencha a Empresa");
		document.getElementById("empresa").focus();		
		return false;
	}
	if(document.getElementById("email").value == "")
	{
		alert("Preencha o E-mail");
		document.getElementById("email").focus();		
		return false;
	}
	if(document.getElementById("telefone").value == "")
	{
		alert("Preencha o Telefone");
		document.getElementById("telefone").focus();		
		return false;
	}
	if(document.getElementById("conhecimento").value == "")
	{
		alert("Selecione como nos conheceu");
		document.getElementById("conhecimento").focus();		
		return false;
	}
	if(document.getElementById("assunto").value == "")
	{
		alert("Preencha o Assunto");
		document.getElementById("assunto").focus();		
		return false;
	}
	if(document.getElementById("mensagem").value == "")
	{
		alert("Preencha a Mensagem");
		document.getElementById("mensagem").focus();		
		return false;
	}
	document.formContato.submit();
}

function validaOrcamento(){
	if(document.getElementById("nome").value == "")
	{
		alert("Preencha o Nome");
		document.getElementById("nome").focus();		
		return false;
	}
	if(document.getElementById("empresa").value == "")
	{
		alert("Preencha a Empresa");
		document.getElementById("empresa").focus();		
		return false;
	}
	if(document.getElementById("email").value == "")
	{
		alert("Preencha o E-mail");
		document.getElementById("email").focus();		
		return false;
	}
	if(document.getElementById("telefone").value == "")
	{
		alert("Preencha o Telefone");
		document.getElementById("telefone").focus();		
		return false;
	}
	if(document.getElementById("mensagem").value == "")
	{
		alert("Preencha a Mensagem");
		document.getElementById("mensagem").focus();		
		return false;
	}
	document.formOrcamento.submit();
}