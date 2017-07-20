$(document).on("ready", inicio);


function inicio(){
	$("#msg-error").hide();
	mostrarDatos();
	$("#buscar").keyup(function(){
		var buscar = $("#buscar").val();
		mostrarDatos(buscar);
	});

	$("#btnbuscar").click(function(){
		mostrarDatos();
		$("#buscar").val("");
	});

	$("#btnActualizar").click(actualizar);

	$("#form-create-empleado").submit(function (e){

		e.preventDefault();
		var formData = new FormData($("#form-create-empleado")[0]);

		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			data:formData,
			cache:false,
			contentType:false,
			processData:false,

			success:function(respuesta){

				if (respuesta === "exito") {
					alert("Tu empleado ha sido guardado correctamente");
					$("#form-create-empleado")[0].reset();
					$("#msg-error").hide();
					mostrarDatos();
				}else if (respuesta === "error") {
					alert("Tu empleado no se pudo guardar");
					$("#form-create-empleado")[0].reset();
					$("#msg-error").hide();
					mostrarDatos();
				}else{
					$("#msg-error").show();
					$(".list-errores").html(respuesta);
				}
			}
		});
	});

	// seleccionar el body del documento y que cargue el evento click,
	//cuando se halla echo clic en la etiqueta <a> y que se ejecute la función.

	$("body").on("click", "#listaEmpleados a", function(event){
		event.preventDefault();
		//selecciona del elemento <a> con this
		id = $(this).attr("href");
		//estas en etiqueta <a> con parent ingresas a su <td>,
		// con el siguiente parent entras al <tr>, haces que busque 
		// a sus hijos con children que son los <td> en este caso el indice 1,
		// que es el campo de nombre y con text obtienes el valor de dicho <td>
		id = $(this).parent().parent().children("td:eq(0)").text();
		nombre = $(this).parent().parent().children("td:eq(1)").text();
		paterno = $(this).parent().parent().children("td:eq(2)").text();
		materno = $(this).parent().parent().children("td:eq(3)").text();
		nacimiento = $(this).parent().parent().children("td:eq(4)").text();
		telefono = $(this).parent().parent().children("td:eq(5)").text();
		celular = $(this).parent().parent().children("td:eq(6)").text();
		email = $(this).parent().parent().children("td:eq(7)").text();

		// alert(nombre);

		$("#idEdit").val(id);
		$("#nombreEdit").val(nombre);
		$("#paternoEdit").val(paterno);
		$("#maternoEdit").val(materno);
		$("#nacimientoEdit").val(nacimiento);
		$("#telefonoEdit").val(telefono);
		$("#celularEdit").val(celular);
		$("#emailEdit").val(email);
	});

	$("body").on("click", "#listaEmpleados button", function(event){
		id = $(this).attr("value");
		eliminar(id);
	});
}//inicio

function mostrarDatos(valor){
	$.ajax({
		url: baseurl + "Empleados/mostrar",
		type:"POST",
		data:{buscar:valor},
		success:function(respuesta){
			// alert(respuesta);
			var registros = eval(respuesta);

			html ="<table class='table table-responsive table-bordered'><thead>";
			html +="<tr><th>#</th><th>Nombre</th><th>A. Paterno</th><th>A. Materno</th><th>F. Nacimiento</th><th>Teléfono</th><th>Celular</th><th>Email</th><th>Fotografia</th><th>Acción</th></tr>";
			html +="</thead><tbody>";
			for (var i = 0; i < registros.length; i++) {
				html +="<tr><td>"+registros[i]["id_empleado"]+"</td><td>"+registros[i]["nombre_empleado"]+"</td><td>"+registros[i]["paterno_empleado"]+"</td><td>"+registros[i]["materno_empleado"]+"</td><td>"+registros[i]["nacimiento_empleado"]+"</td><td>"+registros[i]["telefono_empleado"]+"</td><td>"+registros[i]["celular_empleado"]+"</td><td>"+registros[i]["email_empleado"]+"</td>"+
				"<td style='text-align: center;'><img style='width:100px; height:100px;' src="+baseurl+"assets/images/uploads/"+registros[i]["fotografia_empleado"]+"></td><td><a href='"+registros[i]["id_empleado"]+"' id='btnEditar' class='btn btn-success btn-xs'>Editar</a> <br> <button type='button' id='btnEliminar' class='btn btn-danger btn-xs' value='"+registros[i]["id_empleado"]+"'>Borrar</button></td></tr>";
			};
			html +="</tbody></table>";
			$("#listaEmpleados").html(html);
		}
	});
}//mostrarDatos

function actualizar(){
	var formData = new FormData($("#form-actualizar")[0]);
	$.ajax({
		url: baseurl + "Empleados/actualizar",
		type:  "POST",
		data:formData,
		cache:false,
		contentType:false,
		processData:false,

		success: function(respuesta){
			alert(respuesta);
			$("#form-actualizar")[0].reset();
			mostrarDatos();
		}
	});
}

function eliminar(id){
	$.ajax({
		url: baseurl + "Empleados/eliminar",
		type: "POST",
		data: {idEliminar: id},
		success:function(data){
			alert(data);
			mostrarDatos();
		}
	});
}

$("#cerrar").on("click", function(event){
	event.preventDefault();

	$.ajax({
		url: baseurl + "empleados/cerrar",
		type:"POST",
		data:{},
		success: function(){
			window.location.href = baseurl;
		}
	});
});

$("#paterno").keyup(function (){
	$(this).val($(this).val().toUpperCase());
});
$("#materno").keyup(function (){
	$(this).val($(this).val().toUpperCase());
});
$("#nombre").keyup(function (){
	$(this).val($(this).val().toUpperCase());
});