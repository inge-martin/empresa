$(document).on("ready", inicio);

function inicio(){
	$("#login-form").submit(function (event){
		event.preventDefault();

		$.ajax({
			url:$(this).attr("action"),
			type: $(this).attr("method"),
			data: $(this).serialize(),
			success:function(respuesta){
				// alert(respuesta);
				if (respuesta === "error") {
					alert("Tu usuario o contraseña estan erroneos");
					window.location.href = baseurl;
				}else{
					window.location.href = baseurl + "empleados";
				}
			}
		});
	});
}


