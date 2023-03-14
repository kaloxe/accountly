const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const textareas = document.querySelectorAll('#formulario textarea');

const expresiones = {
	descripcion: /^[0-9a-zA-ZÀ-ÿ\s]{4,80}$/, // Letras, numeros, guion y guion_bajo
	monto: /^[0-9]+([\,\.][0-9]+)?$/, // 7 a 14 numeros.
}

const campos = {
	descripcion: false,
	monto: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "descripcion":
			validarCampo(expresiones.descripcion, e.target, 'descripcion');
		break;
		case "monto":
			validarCampo(expresiones.monto, e.target, 'monto');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});
textareas.forEach((textarea) => {
	textarea.addEventListener('keyup', validarFormulario);
	textarea.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	if(campos.descripcion && campos.monto){
		campos.descripcion = false;
		campos.monto = false;
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 5000);
	}
});