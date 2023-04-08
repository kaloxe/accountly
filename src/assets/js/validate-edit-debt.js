const formulario = document.getElementById("formulario");
const submit = document.getElementById("submit");
const inputs = document.querySelectorAll("#formulario input");
const textareas = document.querySelectorAll("#formulario textarea");
let index;
let debt;

function openModal(id) {
  index = {
    action: "read_debt",
    id: id,
  };
  fetch("/accountly/server/controllers/controllerDebt.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(index),
  })
    .then((res) => res.json())
    .then((dat) => {
      document.getElementById("descripcion").value = dat.description;
      document.getElementById("monto").value = dat.amount;
    });
}

const expresiones = {
  descripcion: /^[0-9a-zA-ZÀ-ÿ\s]{4,80}$/, // Letras, numeros, guion y guion_bajo
  monto: /^[0-9]+([\,\.][0-9]+)?$/, // 7 a 14 numeros.
};

const campos = {
  descripcion: true,
  monto: true,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "descripcion":
      validarCampo(expresiones.descripcion, e.target, "descripcion");
      break;
    case "monto":
      validarCampo(expresiones.monto, e.target, "monto");
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

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});
textareas.forEach((textarea) => {
  textarea.addEventListener("keyup", validarFormulario);
  textarea.addEventListener("blur", validarFormulario);
});

submit.addEventListener("click", (e) => {
  e.preventDefault();

  if (campos.monto && campos.descripcion) {
    const descripcion = document.getElementById("descripcion").value;
    const monto = document.getElementById("monto").value;
    let data = {
      action: "update_debt",
      id: index.id,
      descripcion: descripcion,
      monto: monto,
    };
    fetch("/accountly/server/controllers/controllerDebt.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.text())
      .then((dat) => console.log(dat));

    // campos.nombre = false;
    // campos.monto = false;
    // formulario.reset();

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
