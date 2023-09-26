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
  cuenta: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/, // Letras y espacios, pueden llevar acentos.
  divisa: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/,
  razon: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/,
  fecha: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
};

const campos = {
  cuenta: true,
  divisa: true,
  razon: true,
  fecha1: false,
  fecha2: false,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "cuenta":
      validarCampo(expresiones.cuenta, e.target, "cuenta");
      break;
    case "divisa":
      validarCampo(expresiones.divisa, e.target, "divisa");
      break;
    case "razon":
      validarCampo(expresiones.razon, e.target, "razon");
      break;
    case "fecha1":
      if (Date.parse(e.target.value) <= Date.parse(today)) {
        validarCampo(expresiones.fecha, e.target, "fecha1");
        validarfecha2();
        break;
      } else {
        validarCampo(expresiones.fecha, "", "fecha1");
        break;
      }
    case "fecha2":
      if (Date.parse(e.target.value) <= Date.parse(today)) {
        validarCampo(expresiones.fecha, e.target, "fecha2");
        validarfecha2();
        break;
      } else {
        validarCampo(expresiones.fecha, "", "fecha2");
        break;
      }
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

  if (
    campos.cuenta &&
    campos.divisa &&
    campos.razon &&
    campos.fecha1 &&
    campos.fecha2
  ) {
    const cuenta = document.getElementById("cuenta").value;
    const divisa = document.getElementById("divisa").value;
    const razon = document.getElementById("razon").value;
    const fecha1 = document.getElementById("fecha1").value;
    const fecha2 = document.getElementById("fecha2").value;

    let content = document.getElementById("content");
    let data = {
      action: "report_transaction",
      cuenta: cuenta,
      divisa: divisa,
      razon: razon,
      fecha1: fecha1,
      fecha2: fecha2,
    };
    console.log(data);
    
    fetch("/accountly/server/controllers/controllerReportTransaction.php", {
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
    // campos.cuenta = false;
    // campos.divisa = false;
    // campos.razon = false;
    // campos.fecha1 = false;
    // campos.fecha2 = false;
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
