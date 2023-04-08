const formulario = document.getElementById("formulario");
const submit = document.getElementById("submit");
const inputs = document.querySelectorAll("#formulario input");
const selects = document.querySelectorAll("#formulario select");
let index;
let font;

function openModal(id) {
  index = {
    action: "read_transaction",
    id: id,
  };
  fetch("/accountly/server/controllers/controllerTransaction.php", {
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
      document.getElementById("cuenta").value = dat.id_management;
      document.getElementById("monto").value = dat.amount;
      document.getElementById("descripcion").value = dat.description;
      document.getElementById("fuente").value = dat.id_font;
      document.getElementById("referencia").value = dat.reference;
      document.getElementById("fecha").value = dat.date;
    });
}

let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1;
let yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;

const expresiones = {
  cuenta: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/, // Letras, numeros, guion y guion_bajo
  monto: /^[0-9]+([\,\.][0-9]+)?$/, // 7 a 14 numeros.
  descripcion: /^[0-9a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  fuente: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/, // Letras y espacios, pueden llevar acentos.
  referencia: /^\d{4,16}$/, // 7 a 14 numeros.
  fecha: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
};

const campos = {
  cuenta: true,
  monto: true,
  descripcion: true,
  fuente: true,
  referencia: true,
  fecha: true,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "cuenta":
      validarCampo(expresiones.cuenta, e.target, "cuenta");
      break;
    case "monto":
      validarCampo(expresiones.monto, e.target, "monto");
      break;
    case "descripcion":
      validarCampo(expresiones.descripcion, e.target, "descripcion");
      break;
    case "fuente":
      validarCampo(expresiones.fuente, e.target, "fuente");
      break;
    case "referencia":
      validarCampo(expresiones.referencia, e.target, "referencia");
      break;
    case "fecha":
      if (Date.parse(e.target.value) <= Date.parse(today)) {
        validarCampo(expresiones.fecha, e.target, "fecha");
        break;
      } else {
        validarCampo(expresiones.fecha, "", "fecha");
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

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
  input.addEventListener("change", validarFormulario);
});

selects.forEach((select) => {
  select.addEventListener("change", validarFormulario);
});

submit.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos.cuenta &&
    campos.monto &&
    campos.descripcion &&
    campos.fuente &&
    campos.referencia &&
    campos.fecha
  ) {
    const cuenta = document.getElementById("cuenta").value;
    const monto = document.getElementById("monto").value;
    const descripcion = document.getElementById("descripcion").value;
    const fuente = document.getElementById("fuente").value;
    const referencia = document.getElementById("referencia").value;
    const fecha = document.getElementById("fecha").value;
    let data = {
      action: "update_transaction",
      id: index.id,
      cuenta: cuenta,
      monto: monto,
      descripcion: descripcion,
      fuente: fuente,
      referencia: referencia,
      fecha: fecha,
    };
    fetch("/accountly/server/controllers/controllerTransaction.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.text())
      .then((dat) => console.log(dat));

    // campos.nombre = false;
    // campos.monto = false;
    // formulario.reset();

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
