const formulario_update = document.getElementById("formulario_update");
const update = document.getElementById("update");
const inputs_update = document.querySelectorAll("#formulario_update input");
let index;

function openUpdateModal(id) {
  index = {
    action: "read_account",
    id: id,
    user_id: null
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
      console.log(dat);
      index.user_id=dat.user_id;
      console.log(index);
      document.getElementById("nombre_update").value = dat.name_account;
    });
}

const campos_update = {
  nombre_update: true,
};

const validarFormularioUpdate = (e) => {
  switch (e.target.name) {
    case "nombre_update":
      validarCampoUpdate(expresiones.nombre, e.target, "nombre_update");
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

  if (campos_update.nombre_update) {
    const nombre = document.getElementById("nombre_update").value;
    let data = {
      action: "update_account",
      id: index.id,
      user_id: index.user_id,
      nombre: nombre,
    };
    fetch("/accountly/server/controllers/controllerAccount.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.json())
      .then((dat) => {
        console.log(dat);
        if (dat.state) {
          getData();
          document
            .getElementById("formulario__mensaje-exito_update")
            .classList.add("formulario__mensaje-exito-activo");
          setTimeout(() => {
            document
              .getElementById("formulario__mensaje-exito_update")
              .classList.remove("formulario__mensaje-exito-activo");
          }, 2500);
        } else {
          document
            .getElementById("formulario__mensaje_validacion_update")
            .classList.add("formulario__mensaje-activo");
          setTimeout(() => {
            document
              .getElementById("formulario__mensaje_validacion_update")
              .classList.remove("formulario__mensaje-activo");
          }, 2500);
        }
      });
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
    }, 2500);
  }
});
