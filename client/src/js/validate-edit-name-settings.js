const update_user = document.getElementById("update_user");

getuser();
function getuser() {
  index = {
    action: "read_user",
  };
  fetch("/accountly/server/controllers/controllerSettings.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(index),
  })
    .then((res) => res.json())
    .then((dat) => {
      console.log(dat);
      //corregir despues
      document.getElementById("correo_update").value = dat.email;
      document.getElementById("usuario_update").value = dat.nickname;
    });
}

const campos_update = {
  usuario_update: true,
  correo_update: true,
  password_update: true,
};

const validarFormularioUpdate = (e) => {
  switch (e.target.name) {
    case "usuario_update":
      validarCampoUpdate(expresiones.usuario, e.target, "usuario_update");
      break;
    case "correo_update":
      validarCampoUpdate(expresiones.correo, e.target, "correo_update");
      break;
    case "password_update":
      validarCampoUpdate(expresiones.password, e.target, "password_update");
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
  input.addEventListener("change", validarFormularioUpdate);
});

update_user.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos_update.usuario_update &&
    campos_update.correo_update &&
    campos_update.password_update
  ) {
    const usuario = document.getElementById("usuario_update").value;
    const correo = document.getElementById("correo_update").value;
    const password = document.getElementById("password_update").value;
    let data = {
      action: "update_user",
      usuario: usuario,
      correo: correo,
      password: password,
    };
    fetch("/accountly/server/controllers/controllerSettings.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.text())
      .then((dat) => console.log(dat));

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
