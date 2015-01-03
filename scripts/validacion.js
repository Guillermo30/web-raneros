function comprobar(){
	var nick = document.formularioRegistro.nick.value;
	var contrasenia = document.formularioRegistro.contrasenia.value;
	var contrasenia2 = document.formularioRegistro.contrasenia2.value;
	var nombre = document.formularioRegistro.nombre.value;
	var apellidos = document.formularioRegistro.apellidos.value;
	var correo = document.formularioRegistro.correo.value;
	var todo_correcto = true;	

	if(document.getElementById('nick').value.length.length == 0){
		alert('El campo nick es obligatorio. Recuerde rellenarlo');
		document.formularioRegistro.nick.focus();
		todo_correcto = false;
	}
	if(contrasenia.length < 6){
		alert('La contraseña es poco segura. Debe tener un minimo de 6 caracteres');
		document.formularioRegistro.contrasenia.focus();
		todo_correcto = false;
	}
	if(contrasenia != contrasenia2){
		alert('Las contraseñas deben coincidir');
		document.formularioRegistro.contrasenia2.focus();
		todo_correcto = false;
	}
	if(correo.length == 0){
		alert('El campo correo electronico es obligatorio. Recuerde rellenarlo');
		document.formularioRegistro.correo.focus();
		todo_correcto = false;
	}
	//if(validarEmail(correo)==0){
	//	document.formularioRegistro.correo.focus();
	//	todo_correcto = false;
	//}
	
	//el formulario se envia
	if(!todo_correcto)
	{
		alert("El formulario no se ha enviado, revise errores e intentelo de nuevo");
		
		return 0;
	}else{
		alert("Formulario Enviado Correctamente")
		 document.formularioRegistro.submit();
	}
    

   
    //return todo_correcto;
}

function validarEmail(correo) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(correo) ){
        alert("Error: La dirección de correo " + correo + " es incorrecta.");
        return 0;
       }
       
}


//function registrar(){
//	return <a href="registrar.html"></a>
//}