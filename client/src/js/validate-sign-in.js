const formulario = document.getElementById("formulario");
const submit = document.getElementById("submit");
const inputs = document.querySelectorAll("#formulario input");

console.log(formulario);
console.log(submit);
console.log(inputs);

const expresiones = {
  password: /^.{1,40}$/, // 4 a 12 digitos.
  usuario: /^[a-zA-Z0-9\_\-]{4,20}$/,
};

const campos = {
  usuario: false,
  password: false,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "usuario":
      validarCampo(expresiones.usuario, e.target, "usuario");
      break;
    case "password":
      validarCampo(expresiones.password, e.target, "password");
      break;
  }
};

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("form-control-error");
    // document
    //   .querySelector(`#grupo__${campo} .formulario__input-error`)
    //   .classList.remove("formulario__input-error-activo");
    campos[campo] = true;
  } else {
    document.getElementById(`${campo}`).classList.add("form-control-error");
    // document
    //   .querySelector(`#grupo__${campo} .formulario__input-error`)
    //   .classList.add("formulario__input-error-activo");
    campos[campo] = false;
  }
};

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

submit.addEventListener("click", (e) => {
  e.preventDefault();
  if (campos.password && campos.usuario) {
    const usuario = document.getElementById("usuario").value;
    const password = document.getElementById("password").value;
    let data = {
      action: "valid_user",
      usuario: usuario,
      password: password,
    };
    console.log(data);
    fetch("/accountly/server/controllers/controllerSession.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.json())
      .then((dat) => {
        console.log(dat);
        if (dat.state == true) {
          window.location.href = "/accountly/client/index.php";
        } else {
          document
            .getElementById("formulario__mensaje_validacion")
            .classList.add("formulario__mensaje-activo");
          setTimeout(() => {
            document
              .getElementById("formulario__mensaje_validacion")
              .classList.remove("formulario__mensaje-activo");
          }, 5000);
        }
      });
    campos.usuario = false;
    campos.password = false;
    formulario.reset();
  } else {
     Object.keys(campos).forEach((campo) => {
       if (!campos[campo]) {
         document.getElementById(`${campo}`).classList.add("form-control-error");
        //  document
        //    .querySelector(`#grupo__${campo} .formulario__input-error`)
        //    .classList.add("formulario__input-error-activo");
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
