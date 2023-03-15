const formulario = document.getElementById("formulario");
const submit = document.getElementById("submit");
const inputs = document.querySelectorAll("#formulario input");
const selects = document.querySelectorAll("#formulario select");

let today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;

const expresiones = {
  cuenta: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras, numeros, guion y guion_bajo
  cuenta2: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras, numeros, guion y guion_bajo
  fecha: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
  fecha2: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
};

const campos = {
  cuenta: false,
  fecha: false,
  fecha2: false,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "cuenta2":
      validarCampo(expresiones.cuenta2, e.target, "cuenta2");
      break;
    case "cuenta":
      validarCampo(expresiones.cuenta, e.target, "cuenta");
      break;
    case "fecha":
      if (Date.parse(e.target.value) <= Date.parse(today)) {
        validarCampo(expresiones.fecha, e.target, "fecha");
        validarfecha2();
        break;
      } else {
        validarCampo(expresiones.fecha, "", "fecha");
        break;
      }
    case "fecha2":
      if (Date.parse(e.target.value) <= Date.parse(today)) {
        validarCampo(expresiones.fecha2, e.target, "fecha2");
        validarfecha2();
        break;
      } else {
        validarCampo(expresiones.fecha2, "", "fecha2");
        break;
      }
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

const validarfecha2 = () => {
  const inputFecha1 = document.getElementById("fecha");
  const inputFecha2 = document.getElementById("fecha2");

  if (inputFecha1.value <= inputFecha2.value) {
    document.getElementById(`fecha2`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__fecha2 .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos["fecha2"] = true;
  } else {
    document.getElementById(`fecha2`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__fecha2 .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos["fecha2"] = false;
  }
};

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
  input.addEventListener("change", validarFormulario);
});

selects.forEach((select) => {
  select.addEventListener("change", validarFormulario);
});

submit.addEventListener("click", (e) => {
  e.preventDefault();

  if (campos.cuenta && campos.fecha && campos.fecha2) {
    campos.cuenta = false;
    campos.fecha = false;
    campos.fecha2 = false;
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
