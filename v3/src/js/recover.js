$(document).ready(function(){
	var enviou = false;
	$("#loginForm").submit(function(){
		var email = $("#emailInput").val();
		var func = "RecuperarSenha";
		var data = {
			email: email,
			func: func
		}
		if(!enviou){
			$.post("/include/db-global.php",data,function(result){
				console.log(result);
				if(result==0){
					$("#recoverReturn").html("E-mail não cadastrado");
				}else{
					$("#recoverReturn").html("Solicitação enviada. <b>Verifique seu e-mail</b> com as intruções para recuperar a senha.");
					$("#emailDiv").hide();
					enviou = true;
				}
			});
		}
		return false;
	});
});