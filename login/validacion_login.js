function login(){
	var user = document.getElementById('user').value;
	var password = document.getElementById('password').value;

	if (user == '' && password == '') {
		document.getElementById('mensaje').innerHTML = 'El campo user y password son obligatorios';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('user').style.border = '2px solid red';
		document.getElementById('password').style.border = '2px solid red';
		return false;
	}else if(user == ''){
		document.getElementById('mensaje').innerHTML = 'El campo user es obligatorio';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('user').style.border = '2px solid red';
		document.getElementById('password').style.border = '2px solid #EBE9ED';
		return false;
	}else if(password == ''){
		document.getElementById('mensaje').innerHTML = 'El campo password es obligatorio';
		document.getElementById('mensaje').style.display = 'block';
		document.getElementById('password').style.border = '2px solid red';
		document.getElementById('user').style.border = '2px solid #EBE9ED';
		return false;
	}else{
		return true;
	}
}