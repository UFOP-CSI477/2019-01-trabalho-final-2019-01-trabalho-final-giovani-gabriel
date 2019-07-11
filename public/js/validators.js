// <script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>
// onclick="return filmValidator(document.filmedit)"

function validaCompra(){
	if(document.comprar.session_id.selectedIndex == 0){
		document.comprar.session_id.classList.add("is-invalid");
		return false;
	}
	campo.classList.remove("is-invalid");
	campo.classList.add("is-valid");
	return true;
}

function filmValidator(form){
	var title = form.title;
	var time = form.time;
	var rating = form.rating;
	var casting = form.casting;
	var synopsis = form.synopsis;
	var photo = form.photo;
	var director = form.director;

	var v1 = validarTexto(title);
	var v2 = validarNumero(time);
	var v3 = validarNumero(rating);
	var v4 = validarTexto(casting);
	var v5 = validarTexto(synopsis);
	var v6 = validarTexto(photo);
	var v7 = validarTexto(director);

	if(v1 && v2 && v3 && v4 && v5 && v6 & v7){
		return true;
	}
	return false;
}

function userValidator(form){
	var name = form.name;
	var email = form.email;
	var password = form.password;
	var cpf = form.cpf;

	var v1 = validarTexto(name);
	var v2= validarTexto(email);
	var v3 = validarSenha(password);
	var v4 = validarCpf(cpf);

	if(v1 && v2 && v3 && v4){
		return true;
	}
	return false;
}

function sessionValidator(form){
	var date = form.date;
	var price = form.price;

	var v1 = validarNumero(price);
	var v2 = validarData(date);

	if(v1 && v2){
		return true;
	}
	return false;
}

function validarData(campo){
	// regular expression to match required date format
	re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
	console.log(campo.startdate.value);

	if(campo.startdate.value != '' && !campo.startdate.value.match(re)) {
		campo.classList.add("is-invalid");
		campo.startdate.focus();
		campo.value = "";
		return false;
	}

    // regular expression to match required time format
    re = /^\d{1,2}:\d{2}([ap]m)?$/;

    if(campo.starttime.value != '' && !campo.starttime.value.match(re)) {
    	campo.classList.add("is-invalid");
    	campo.starttime.focus();
    	campo.value = "";
    	return false;
    }

    return true;
}


function validarTexto(campo){
	if(campo.value.length == 0 || !isNaN(campo.value) ){
		campo.classList.add("is-invalid");
		campo.value = "";
		campo.focus();
		return false;
	}
	campo.classList.remove("is-invalid");
	campo.classList.add("is-valid");
	return true;
}

function validarNumero(campo){
	var n = parseFloat(campo.value);

	if(campo.value.length == 0 || isNaN(n) || n<=0){
		campo.classList.add("is-invalid");
		campo.value = "";
		campo.focus();
		return false;
	}
	campo.classList.remove("is-invalid");
	campo.classList.add("is-valid");
	return true;
}

function validarCpf(campo){
	var n = parseFloat(campo.value);

	if(campo.value.length != 11 || isNaN(n) || n<=0){
		campo.classList.add("is-invalid");
		campo.value = "";
		campo.focus();
		return false;
	}
	campo.classList.remove("is-invalid");
	campo.classList.add("is-valid");
	return true;
}

function validarSenha(campo){
	var n = parseFloat(campo.value);

	if(campo.value.length < 8 && campo.value.length !=0 ){
		campo.classList.add("is-invalid");
		campo.value = "";
		campo.focus();
		return false;
	}
	campo.classList.remove("is-invalid");
	campo.classList.add("is-valid");
	return true;
}