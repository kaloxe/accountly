const formulario_update = document.getElementById("formulario_update");
const update = document.getElementById("update");
const inputs_update = document.querySelectorAll("#formulario_update input");
let index;
let account;

function openUpdateModal(id) {
  index = {
    action: "read_account",
    id: id,
  };
  fetch("/accountly/server/controllers/controllerAccount.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(index),
  })
    .then((res) => res.json())
    .then((dat) => {
      document.getElementById("nombre_update").value = dat.name_account;
    });
}

const campos_update = {
  nombre: true,
};

inputs_update.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

update.addEventListener("click", (e) => {
  e.preventDefault();

  if (campos_update.nombre) {
    const nombre = document.getElementById("nombre_update").value;
    let data = {
      action: "update_account",
      id: index.id,
      nombre: nombre,
    };
    fetch("/accountly/server/controllers/controllerAccount.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.text())
      .then((dat) => console.log(dat));

    // campos_update.nombre = false;
    // campos_update.monto = false;
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
    Object.keys(campos_update).forEach((campo) => {
      if (!campos_update[campo]) {
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
