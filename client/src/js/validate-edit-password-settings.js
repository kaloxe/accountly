const formulario_update = document.getElementById("formulario_update");
const update_password = document.getElementById("update_password");
const inputs_update = document.querySelectorAll("#formulario_update input");
let index;

const expresiones = {
  usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  password: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // 7 a 14 numeros.
  oldPassword: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras, numeros, guion y guion_bajo
  password1: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // 7 a 14 numeros.
  password2: /^[0-9a-zA-ZÀ-ÿ\s]{3,40}$/, // 7 a 14 numeros.
};

const campos_password_update = {
  oldPassword: false,
  password1: false,
  password2: false,
};

const validarFormularioUpdatePassword = (e) => {
  switch (e.target.name) {
    case "oldPassword":
      validarCampoUpdatePassword(
        expresiones.oldPassword,
        e.target,
        "oldPassword"
      );
      break;
    case "password1":
      validarCampoUpdatePassword(
        expresiones.password,
        e.target,
        "password1"
      );
      validarPassword2UpdatePassword();
      break;
    case "password2":
      validarPassword2UpdatePassword();
      break;
  }
};

const validarCampoUpdatePassword = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos_password_update[campo] = true;
  } else {
    document.getElementById(`${campo}`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos_password_update[campo] = false;
  }
};

const validarPassword2UpdatePassword = () => {
  const inputPassword1 = document.getElementById("password1");
  const inputPassword2 = document.getElementById("password2");

  if (inputPassword1.value !== inputPassword2.value) {
    document
      .getElementById(`password2`)
      .classList.add("form-control-error");
    document
      .querySelector(`#grupo__password2 .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
      campos_password_update["password2"] = false;
  } else {
    document
      .getElementById(`password2`)
      .classList.remove("form-control-error");
    document
      .querySelector(`#grupo__password2 .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
      campos_password_update["password2"] = true;
  }
};

inputs_update.forEach((input) => {
  input.addEventListener("keyup", validarFormularioUpdatePassword);
  input.addEventListener("blur", validarFormularioUpdatePassword);
  input.addEventListener("change", validarFormularioUpdatePassword);
});

update_password.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos_password_update.oldPassword &&
    campos_password_update.password1 &&
    campos_password_update.password2
  ) {
    const oldPassword = document.getElementById("oldPassword").value;
    const password1 = document.getElementById("password1").value;
    const password2 = document.getElementById("password2").value;
    let data = {
      action: "update_password",
      oldPassword: oldPassword,
      password1: password1,
      password2: password2,
    };
    console.log(data)
    fetch("/accountly/server/controllers/controllerSettings.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.text())
      .then((dat) => {
        console.log(dat)
        if(!dat.state) {
          alert("Contraseña incorrecta")
        }
      });

    document
      .getElementById("formulario__mensaje-exito")
      .classList.add("formulario__mensaje-exito-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje-exito")
        .classList.remove("formulario__mensaje-exito-activo");
    }, 5000);
  } else {
    Object.keys(campos_password_update).forEach((campo) => {
      if (!campos_password_update[campo]) {
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
