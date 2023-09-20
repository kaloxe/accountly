const formulario_create = document.getElementById("formulario_create");
const create = document.getElementById("create");
const inputs_create = document.querySelectorAll("#formulario_create input");

const expresiones = {
  usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
  password: /^.{4,12}$/, // 4 a 12 digitos.
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
};

const campos_create = {
  usuario_create: false,
  correo_create: false,
  password_create: false,
  password2_create: false,
};

const validarFormularioCreate = (e) => {
  switch (e.target.name) {
    case "usuario_create":
      validarCampoCreate(expresiones.usuario, e.target, "usuario_create");
      break;
    case "correo_create":
      validarCampoCreate(expresiones.correo, e.target, "correo_create");
      break;
    case "password_create":
      validarCampoCreate(expresiones.password, e.target, "password_create");
      validarPassword2Create();
      break;
    case "password2_create":
      validarPassword2Create();
      break;
  }
};

const validarCampoCreate = (expresion, input, campo) => {
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

const validarPassword2Create = () => {
  const inputPassword1 = document.getElementById("password_create");
  const inputPassword2 = document.getElementById("password2_create");

  if (inputPassword1.value !== inputPassword2.value) {
    document.getElementById(`password2_create`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__password2_create .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos_create["password_create"] = false;
  } else {
    document.getElementById(`password2_create`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__password2_create .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos_create["password_create"] = true;
  }
};

inputs_create.forEach((input) => {
  input.addEventListener("keyup", validarFormularioCreate);
  input.addEventListener("blur", validarFormularioCreate);
});

create.addEventListener("click", (e) => {
  e.preventDefault();
  if (campos_create.usuario_create && campos_create.password_create && campos_create.correo_create) {

    const usuario = document.getElementById("usuario_create").value;
    const correo = document.getElementById("correo_create").value;
    const password = document.getElementById("password_create").value;
    let data = {
      action: "create_user",
      usuario: usuario,
      correo: correo,
      password: password
    };
    fetch("/accountly/server/controllers/controllerUser.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.text())
      .then((dat) => console.log(dat));

    campos_create.usuario_create = false;
    campos_create.correo_create = false;
    campos_create.password_create = false;
    campos_create.password2_create = false;
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