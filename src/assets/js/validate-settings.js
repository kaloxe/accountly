const formulario = document.getElementById("formulario");
const submitPassword = document.getElementById("submitPassword");
const inputs = document.querySelectorAll("#formulario input");
const expresiones = {
  oldPassword: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras, numeros, guion y guion_bajo
  password: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // 7 a 14 numeros.
  password2: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // 7 a 14 numeros.
};

const campos = {
  oldPassword: false,
  password: false,
  password2: false
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "oldPassword":
      validarCampo(expresiones.oldPassword, e.target, "oldPassword");
      break;
    case "password":
      validarCampo(expresiones.password, e.target, "password");
      validarPassword2();
      break;
    case "password2":
      validarCampo(expresiones.password2, e.target, "password2");
      validarPassword2();
      break;
  }
};

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos[campo] = true;
  } else {
    document.getElementById(`${campo}`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos[campo] = false;
  }
};

const validarPassword2 = () => {
  const inputPassword1 = document.getElementById("password");
  const inputPassword2 = document.getElementById("password2");

  if (inputPassword1.value !== inputPassword2.value) {
    document.getElementById(`password2`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__password2 .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos["password"] = false;
  } else {
    document.getElementById(`password2`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__password2 .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos["password"] = true;
  }
};

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

submitPassword.addEventListener("click", (e) => {
  if (campos.oldPassword && campos.password && campos.password2) {
    campos.oldPassword = false;
    campos.password = false;
    campos.password2 = false;
    formulario.reset();

    document
      .getElementById("formulario__mensaje-exito")
      .classList.add("formulario__mensaje-exito-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje-exito")
        .classList.remove("formulario__mensaje-exito-activo");
    }, 5000);
  } else {
    Object.keys(campos).forEach((campo) => {
      if (!campos[campo]) {
        document.getElementById(`${campo}`).classList.add("form-control-error");
        document
          .querySelector(`#grupo__${campo} .formulario__input-error`)
          .classList.add("formulario__input-error-activo");
      }
    });
    document
      .getElementById("formulario__mensaje")
      .classList.add("formulario__mensaje-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje")
        .classList.remove("formulario__mensaje-activo");
    }, 5000);
  }
});
