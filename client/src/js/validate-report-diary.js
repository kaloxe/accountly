const formulario = document.getElementById("formulario");
const filter = document.getElementById("filter");
const inputs = document.querySelectorAll("#formulario input");
const selects = document.querySelectorAll("#formulario select");

let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1;
let yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;

const expresiones = {
  estado: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/, // Letras y espacios, pueden llevar acentos.
  divisa: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/,
  fecha: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
};

const campos = {
  estado: true,
  divisa: true,
  fecha1: false,
  fecha2: false,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "estado":
      validarCampo(expresiones.estado, e.target, "estado");
      break;
    case "divisa":
      validarCampo(expresiones.divisa, e.target, "divisa");
      break;
    case "fecha1":
      validarCampo(expresiones.fecha, e.target, "fecha1");
      validarfecha2();
      break;
    case "fecha2":
      validarCampo(expresiones.fecha, e.target, "fecha2");
      validarfecha2();
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

const validarfecha2 = () => {
  const inputFecha1 = document.getElementById("fecha1");
  const inputFecha2 = document.getElementById("fecha2");

  if (inputFecha1.value <= inputFecha2.value) {
    document.getElementById(`fecha2`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__fecha2 .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos["fecha2"] = true;
  } else {
    document.getElementById(`fecha2`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__fecha2 .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos["fecha2"] = false;
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

  if (campos.estado && campos.divisa && campos.fecha1 && campos.fecha2) {
    const estado = document.getElementById("estado").value;
    const divisa = document.getElementById("divisa").value;
    const fecha1 = document.getElementById("fecha1").value;
    const fecha2 = document.getElementById("fecha2").value;

    let content = document.getElementById("content");
    let data = {
      action: "report_diary",
      estado: estado,
      divisa: divisa,
      fecha1: fecha1,
      fecha2: fecha2,
    };
    console.log(data);

    fetch("/accountly/server/controllers/controllerReportDiary.php", {
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
