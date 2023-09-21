const formulario_create = document.getElementById("formulario_create");
const create = document.getElementById("create");
const inputs_create = document.querySelectorAll("#formulario_create input");
const selects_create = document.querySelectorAll("#formulario_create select");

let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1;
let yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;

const expresiones = {
  movimiento: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/, // Letras, numeros, guion y guion_bajo
  monto: /^[0-9]+([\,\.][0-9]+)?$/, // 7 a 14 numeros.
  descripcion: /^[0-9a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  cuenta: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/, // Letras y espacios, pueden llevar acentos.
  divisa: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/,
  razon: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/,
  fecha: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
};

const campos_create = {
  movimiento_create: false,
  monto_create: false,
  descripcion_create: false,
  cuenta_create: false,
  divisa_create: false,
  razon_create: false,
  fecha_create: false,
};

const validarFormularioCreate = (e) => {
  switch (e.target.name) {
    case "movimiento_create":
      validarCampoCreate(expresiones.movimiento, e.target, "movimiento_create");
      break;
    case "monto_create":
      validarCampoCreate(expresiones.monto, e.target, "monto_create");
      break;
    case "descripcion_create":
      validarCampoCreate(expresiones.descripcion, e.target, "descripcion_create");
      break;
    case "cuenta_create":
      validarCampoCreate(expresiones.cuenta, e.target, "cuenta_create");
      break;
    case "divisa_create":
      validarCampoCreate(expresiones.divisa, e.target, "divisa_create");
      break;
    case "razon_create":
      validarCampoCreate(expresiones.razon, e.target, "razon_create");
      break;
    case "fecha_create":
      if (Date.parse(e.target.value) <= Date.parse(today)) {
        validarCampoCreate(expresiones.fecha, e.target, "fecha_create");
        break;
      } else {
        validarCampoCreate(expresiones.fecha, "", "fecha_create");
        break;
      }
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
  input.addEventListener("change", validarFormularioCreate);
});

selects_create.forEach((select) => {
  select.addEventListener("change", validarFormularioCreate);
});

create.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos_create.movimiento_create &&
    campos_create.monto_create &&
    campos_create.descripcion_create &&
    campos_create.cuenta_create &&
    campos_create.divisa_create &&
    campos_create.razon_create &&
    campos_create.fecha_create
  ) {
    const movimiento = document.getElementById("movimiento_create").value;
    const monto = document.getElementById("monto_create").value;
    const descripcion = document.getElementById("descripcion_create").value;
    const cuenta = document.getElementById("cuenta_create").value;
    const divisa = document.getElementById("divisa_create").value;
    const razon = document.getElementById("razon_create").value;
    const fecha = document.getElementById("fecha_create").value;

    let data = {
      action: "create_transaction",
      movimiento: movimiento,
      monto: monto,
      descripcion: descripcion,
      cuenta: cuenta,
      divisa: divisa,
      razon: razon,
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

    campos_create.movimiento_create = false;
    campos_create.monto_create = false;
    campos_create.descripcion_create = false;
    campos_create.cuenta_create = false;
    campos_create.divisa_create = false;
    campos_create.razon_create = false;
    campos_create.fecha_create = false;
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
    Object.keys(campos_create).forEach((campo) => {
      if (!campos_create[campo]) {
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
