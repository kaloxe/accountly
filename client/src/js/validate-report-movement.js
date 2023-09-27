const formulario = document.getElementById("formulario");
const filter = document.getElementById("filter");
const inputs = document.querySelectorAll("#formulario input");
const selects = document.querySelectorAll("#formulario select");

const expresiones = {
  tiempo: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/, // Letras y espacios, pueden llevar acentos.
};

const campos = {
  tiempo: true,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "tiempo":
      validarCampo(expresiones.tiempo, e.target, "tiempo");
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
  input.addEventListener("change", validarFormulario);
});

selects.forEach((select) => {
  select.addEventListener("change", validarFormulario);
});

filter.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos.tiempo
  ) {
    const tiempo = document.getElementById("tiempo").value;

    let content = document.getElementById("content");
    let data = {
      action: "report_movement",
      tiempo: tiempo,
    };
    console.log(data);
    
    fetch("/accountly/server/controllers/controllerReportMovement.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.json())
      .then((dat) => {
        console.log(dat);
        content.innerHTML = dat.data;
      });
  } else {
    Object.keys(campos).forEach((campo) => {
      if (!campos[campo]) {
        document.getElementById(`${campo}`).classList.add("form-control-error");
        document
          .querySelector(`#grupo__${campo} .formulario__input-error`)
          .classList.add("formulario__input-error-activo");
      }
    });
  }
});
