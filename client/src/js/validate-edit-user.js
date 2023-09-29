const formulario_update = document.getElementById("formulario_update");
const update = document.getElementById("update");
const inputs_update = document.querySelectorAll("#formulario_update input");
let index;

function openUpdateModal(id) {
  index = {
    action: "read_user",
    id: id,
  };
  fetch("/accountly/server/controllers/controllerUser.php", {
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
      document.getElementById("password_update").value = dat.password;
    });
}

const campos_update = {
  usuario_update: true,
  correo_update: true,
  password_update: true,
  password2_update: false,
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
      validarPassword2Update();
      break;
    case "password2_update":
      validarPassword2Update();
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

const validarPassword2Update = () => {
  const inputPassword1 = document.getElementById("password_update");
  const inputPassword2 = document.getElementById("password2_update");

  if (inputPassword1.value !== inputPassword2.value) {
    document
      .getElementById(`password2_update`)
      .classList.add("form-control-error");
    document
      .querySelector(`#grupo__password2_update .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos_update["password2_update"] = false;
  } else {
    document
      .getElementById(`password2_update`)
      .classList.remove("form-control-error");
    document
      .querySelector(`#grupo__password2_update .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos_update["password2_update"] = true;
  }
};

inputs_update.forEach((input) => {
  input.addEventListener("keyup", validarFormularioUpdate);
  input.addEventListener("blur", validarFormularioUpdate);
  input.addEventListener("change", validarFormularioUpdate);
});

update.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos_update.usuario_update &&
    campos_update.password_update &&
    campos_update.password2_update &&
    campos_update.correo_update
  ) {
    const usuario = document.getElementById("usuario_update").value;
    const correo = document.getElementById("correo_update").value;
    const password = document.getElementById("password_update").value;
    let data = {
      action: "update_user",
      id: index.id,
      usuario: usuario,
      correo: correo,
      password: password,
    };
    fetch("/accountly/server/controllers/controllerUser.php", {
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
          }, 5000);
        } else {
          document
            .getElementById("formulario__mensaje_validacion_update")
            .classList.add("formulario__mensaje-activo");
          setTimeout(() => {
            document
              .getElementById("formulario__mensaje_validacion_update")
              .classList.remove("formulario__mensaje-activo");
          }, 5000);
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
    }, 5000);
  }
});
