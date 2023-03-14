const formulario2 = document.getElementById("formulario2");
const selects2 = document.querySelectorAll("#formulario2 select");

const expresiones2 = {
  cuenta2: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras, numeros, guion y guion_bajo
};

const campos2 = {
  cuenta2: false
};

const validarFormulario2 = (e) => {
  switch (e.target.name) {
    case "cuenta2":
      validarCampo2(expresiones2.cuenta2, e.target, "cuenta2");
      break;
  }
};

const validarCampo2 = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos2[campo] = true;
  } else {
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario2__input-error-activo");
    campos2[campo] = false;
  }
};

selects2.forEach((select) => {
  alert(select)
  select.addEventListener("change", validarFormulario2);
});

formulario2.addEventListener("submit", (e) => {
  e.preventDefault();

  if (campos2.cuenta2) {
    campos2.cuenta2 = false;
    formulario2.reset();

    document
      .getElementById("formulario__mensaje-exito")
      .classList.add("formulario__mensaje-exito-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje-exito")
        .classList.remove("formulario__mensaje-exito-activo");
    }, 5000);
  } else {
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
