const formulario_create = document.getElementById("formulario_create");
const create = document.getElementById("create");
const inputs_create = document.querySelectorAll("#formulario_create input");

const expresiones = {
  divisa: /^[0-9a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras, numeros, guion y guion_bajo
  valor: /^[0-9]+([\,\.][0-9]+)?$/, // 7 a 14 numeros.
};

const campos_create = {
  divisa_create: false,
  valor_create: false,
};

const validarFormularioCreate = (e) => {
  switch (e.target.name) {
    case "divisa_create":
      validarCampoCreate(expresiones.divisa, e.target, "divisa_create");
      break;
    case "valor_create":
      validarCampoCreate(expresiones.valor, e.target, "valor_create");
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

inputs_create.forEach((input) => {
  input.addEventListener("keyup", validarFormularioCreate);
  input.addEventListener("blur", validarFormularioCreate);
});

create.addEventListener("click", (e) => {
  e.preventDefault();

  if (campos_create.divisa_create && campos_create.valor_create) {
    const divisa = document.getElementById("divisa_create").value;
    const valor = document.getElementById("valor_create").value;
    let data = {
      action: "create_badge",
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
      .then((res) => res.json())
      .then((dat) => {
        console.log(dat);
        if (dat.state) {
          document
            .getElementById("formulario__mensaje-exito_create")
            .classList.add("formulario__mensaje-exito-activo");
          setTimeout(() => {
            document
              .getElementById("formulario__mensaje-exito_create")
              .classList.remove("formulario__mensaje-exito-activo");
          }, 5000);
          campos_create.divisa_create = false;
          campos_create.valor_create = false;
          formulario_create.reset();
        }
      });
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
      .getElementById("formulario__mensaje_create")
      .classList.add("formulario__mensaje-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje_create")
        .classList.remove("formulario__mensaje-activo");
    }, 5000);
  }
});
