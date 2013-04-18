$(document).ready(function(){
    $("#login").blur(function(){
        $.ajax({
            type: 'POST',
            url: 'ajaxUsername.php',
            data: { login : $(this).val() }
        }).done(function(html){
            if (html == 0){
                $("#resLogin").css("color", "green");
                $("#resLogin").html("Login Disponível");
                $("#verError").val("1");
            }else {
                $("#resLogin").css("color", "red");
                $("#resLogin").html("Login Indisponível");
                $("#verError").val("0");
            }
        });
    });
    
    $("#cadastroUser").submit(function(){
        var errorMsg = "";
        var nome = $("#nome").val();
        var cpf = $("#cpf").val();
        var rg = $("#rg").val();
        var email = $("#email").val();
        var ddd = $("#ddd").val();
        var telefone = $("#telefone").val();
        var endereco = $("#endereco").val();
        var login = $("#login").val();
        var senha = $("#senha").val();
        if (nome.trim() == ""){
            $("#nome").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo nome obrigatório \n";
            $("#nome").focus();
        }else {
            $("#nome").css("border", "1px solid green");
        }
        if (cpf.trim() == ""){
            $("#cpf").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo cpf obrigatório \n";
            $("#cpf").focus();
        }else {
            $("#cpf").css("border", "1px solid green");
        }
        if (rg.trim() == ""){
            $("#rg").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo rg obrigatório \n";
            $("#rg").focus();
        }else {
            $("#rg").css("border", "1px solid green");
        }
        if (email.trim() == ""){
            $("#email").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo email obrigatório \n";
            $("#email").focus();
        }else {
            $("#email").css("border", "1px solid green");
        }
        if (ddd.trim() == ""){
            $("#ddd").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo DDD obrigatório \n";
            $("#ddd").focus();
        }else {
            $("#ddd").css("border", "1px solid green");
        }
        if (telefone.trim() == ""){
            $("#telefone").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo telefone obrigatório \n";
            $("#telefone").focus();
        }else {
            $("#telefone").css("border", "1px solid green");
        }
        if (endereco.trim() == ""){
            $("#endereco").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo endereco obrigatório \n";
            $("#endereco").focus();
        }else {
            $("#endereco").css("border", "1px solid green");
        }
        if (login.trim() == ""){
            $("#login").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo login obrigatório \n";
            $("#login").focus();
        }else {
            $("#login").css("border", "1px solid green");
        }
        if (senha.trim() == ""){
            $("#senha").css("border", "1px solid red");
            errorMsg += "- Preenchimento do campo senha obrigatório \n";
            $("#senha").focus();
        }else {
            $("#senha").css("border", "1px solid green");
        }
        if ($("#verError").val() == 0){
            errorMsg += "- Favor escolher um login válido \n";
            $("#login").focus();
        }
        if (errorMsg != ""){
            alert(errorMsg);
        }
        if ($("#verError").val() == 1){
            if (errorMsg != ""){
                return false;
            }
        }else {
            return false;
        }
    });
});