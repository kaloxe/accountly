const formulario_create = document.getElementById("formulario_create");
const create = document.getElementById("create");
const inputs_create = document.querySelectorAll("#formulario_create input");

const expresiones = {
  nombre: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras, numeros, guion y guion_bajo
};

const campos_create = {
  nombre_create: false,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "nombre_create":
      validarCampo(expresiones.nombre, e.target, "nombre_create");
      break;
  }
};

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos_create[campo] = true;
  } else {
    document.getElementById(`${campo}`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos_create[campo] = false;
  }
};

inputs_create.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

create.addEventListener("click", (e) => {
  e.preventDefault();

  if (campos_create.nombre_create) {

    const nombre = document.getElementById("nombre_create").value;
    let data = {
      action: "create_account",
      nombre: nombre,
    }
    fetch('/accountly/server/controllers/controllerAccount.php', {
      "method": 'POST',
      "headers": {
        "Content-Type": "application/json; charset=utf-8"
      },
      "body": JSON.stringify(data)
    }).then( res => res.text())
      .then( dat => console.log(dat))

    campos_create.nombre_create = false;
    formulario_create.reset();

    document
      .getElementById("formulario__mensaje-exito")
      .classList.add("formulario__mensaje-exito-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje-exito")
        .classList.remove("formulario__mensaje-exito-activo");
    }, 5000);
  } else {
    Object.keys(campos_create).forEach((campo) => {
      if (!campos_create[campo]) {
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
