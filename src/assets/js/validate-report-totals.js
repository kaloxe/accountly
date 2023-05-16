const formulario = document.getElementById("formulario");
const submit = document.getElementById("submit");
const selects = document.querySelectorAll("#formulario select");


const expresiones = {
  cuenta: /^[0-9a-zA-ZÀ-ÿ\s]{1,40}$/ // Letras, numeros, guion y guion_bajo
};

const campos = {
  cuenta: false
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "cuenta":
      validarCampo(expresiones.cuenta, e.target, "cuenta");
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

selects.forEach((select) => {
  select.addEventListener("change", validarFormulario);
});

submit.addEventListener("click", (e) => {
  if (!campos.cuenta) {
    e.preventDefault();
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
