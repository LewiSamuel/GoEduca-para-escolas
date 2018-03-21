/*$("form").submit(function(){
	var login;
	var password;
	login = $("input#login").val();
	password = $("input#password").val();

	var url = "/include/login-logar.php";
	var data;
	data = {
		login: login,
		password: password
	}

	$.post(url,
		data,
		function(result){
			if(result){
				window.location.href= "/?login=true";
			}else{
				$("#formCallback").html("<p class='red-text center-align'>Usuário ou senha inválida</p>");
			}
			//tratando o resultado...
			//alert("result: "+result+" | login: "+login+" | password: "+password);
		});
    return false;
});*/