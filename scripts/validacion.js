function comprobar(){
	var nick = document.formularioRegistro.nick.value;
	var contrasenia = document.formularioRegistro.contrasenia.value;
	var contrasenia2 = document.formularioRegistro.contrasenia2.value;
	var nombre = document.formularioRegistro.nombre.value;
	var apellidos = document.formularioRegistro.apellidos.value;
	var correo = document.formularioRegistro.correo.value
	
	if(nick.length == 0){
		alert('El campo nick es obligatorio. Recuerde rellenarlo');
		document.formularioRegistro.nick.focus();
		return 0;
	}
	if(contrasenia.length < 6){
		alert('La contraseña es poco segura. Debe tener un minimo de 6 caracteres');
		document.formularioRegistro.contrasenia.focus();
		return 0;
	}
	if(contrasenia != contrasenia2){
		alert('Las contraseñas deben coincidir');
		document.formularioRegistro.contrasenia2.focus();
		return 0;
	}
	if(correo.length == 0){
		alert('El campo correo electronico es obligatorio. Recuerde rellenarlo');
		document.formularioRegistro.correo.focus();
		return 0;
	}
	if(validarEmail(correo)==0){
		document.formularioRegistro.correo.focus();
		return 0;
	}
	//el formulario se envia
    alert("Muchas gracias por enviar el formulario");
    //document.formularioRegistro.submit();
}

function validarEmail(correo) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(correo) ){
        alert("Error: La dirección de correo " + correo + " es incorrecta.");
        return 0;
       }
       
}
function registrar(){
	return <a href="registrar.html"></a>
}