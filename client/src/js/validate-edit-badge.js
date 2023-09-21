const formulario_update = document.getElementById("formulario_update");
const update = document.getElementById("update");
const inputs_update = document.querySelectorAll("#formulario_update input");
let index;

function openUpdateModal(id) {
  index = {
    action: "read_badge",
    id: id,
  };
  fetch("/accountly/server/controllers/controllerBadge.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(index),
  })
    .then((res) => res.json())
    .then((dat) => {
      document.getElementById("divisa_update").value = dat.name_badge;
      document.getElementById("valor_update").value = dat.value;
    });
}

const campos_update = {
  divisa_update: true,
  valor_update: true,
};

const validarFormularioUpdate = (e) => {
  switch (e.target.name) {
    case "divisa_update":
      validarCampoCreate(expresiones.divisa, e.target, "divisa_update");
      break;
    case "valor_update":
      validarCampoCreate(expresiones.valor, e.target, "valor_update");
      break;
  }
};

const validarCampoUpdate = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos_update[campo] = true;
  } else {
    document.getElementById(`${campo}`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos_update[campo] = false;
  }
};

inputs_update.forEach((input) => {
  input.addEventListener("keyup", validarFormularioUpdate);
  input.addEventListener("blur", validarFormularioUpdate);
});

update.addEventListener("click", (e) => {
  e.preventDefault();

  if (campos_update.divisa_update && campos_update.valor_update) {
    const divisa = document.getElementById("divisa_update").value;
    const valor = document.getElementById("valor_update").value;
    let data = {
      action: "update_badge",
      id: index.id,
      divisa: divisa,
      valor: valor,
    };
    fetch("/accountly/server/controllers/controllerBadge.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.text())
      .then((dat) => console.log(dat));

    document
      .getElementById("formulario__mensaje-exito_update")
      .classList.add("formulario__mensaje-exito-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje-exito_update")
        .classList.remove("formulario__mensaje-exito-activo");
    }, 5000);
  } else {
    Object.keys(campos_update).forEach((campo) => {
      if (!campos_update[campo]) {
        document.getElementById(`${campo}`).classList.add("form-control-error");
        document
          .querySelector(`#grupo__${campo} .formulario__input-error`)
          .classList.add("formulario__input-error-activo");
      }
    });
    document
      .getElementById("formulario__mensaje_update")
      .classList.add("formulario__mensaje-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje_update")
        .classList.remove("formulario__mensaje-activo");
    }, 5000);
  }
});
