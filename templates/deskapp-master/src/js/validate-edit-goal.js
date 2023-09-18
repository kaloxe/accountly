const formulario_update = document.getElementById("formulario_update");
const update = document.getElementById("update");
const inputs_update = document.querySelectorAll("#formulario_update input");
const selects_update = document.querySelectorAll("#formulario_update select");
let index;
let account;

function openUpdateModal(id) {
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
      document.getElementById("movimiento_update").value = dat.type;
      document.getElementById("divisa_update").value = dat.id_badge;
      document.getElementById("razon_update").value = dat.id_reason;
      document.getElementById("monto_update").value = dat.amount;
      document.getElementById("descripcion_update").value = dat.description;
      document.getElementById("cuenta_update").value = dat.id_account;
      document.getElementById("referencia_update").value = dat.reference;
      document.getElementById("fecha_update").value = dat.date;
    });
}

const campos_update = {
  movimiento_update: true,
  monto_update: true,
  descripcion_update: true,
  cuenta_update: true,
  divisa_update: true,
  razon_update: true,
  referencia_update: true,
  fecha_update: true,
};

const validarFormularioUpdate = (e) => {
  switch (e.target.name) {
    case "movimiento_update":
      validarCampoUpdate(expresiones.movimiento, e.target, "movimiento_update");
      break;
    case "monto_update":
      validarCampoUpdate(expresiones.monto, e.target, "monto_update");
      break;
    case "descripcion_update":
      validarCampoUpdate(expresiones.descripcion, e.target, "descripcion_update");
      break;
    case "cuenta_update":
      validarCampoUpdate(expresiones.cuenta, e.target, "cuenta_update");
      break;
    case "divisa_update":
      validarCampoUpdate(expresiones.divisa, e.target, "divisa_update");
      break;
    case "razon_update":
      validarCampoUpdate(expresiones.razon, e.target, "razon_update");
      break;
    case "referencia_update":
      validarCampoUpdate(expresiones.referencia, e.target, "referencia_update");
      break;
    case "fecha_update":
      if (Date.parse(e.target.value) <= Date.parse(today)) {
        validarCampoUpdate(expresiones.fecha, e.target, "fecha_update");
        break;
      } else {
        validarCampoUpdate(expresiones.fecha, "", "fecha_update");
        break;
      }
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

inputs_update.forEach((input) => {
  input.addEventListener("keyup", validarFormularioUpdate);
  input.addEventListener("blur", validarFormularioUpdate);
  input.addEventListener("change", validarFormularioUpdate);
});

selects_update.forEach((select) => {
  select.addEventListener("change", validarFormularioUpdate);
});

update.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos_update.movimiento_update &&
    campos_update.monto_update &&
    campos_update.descripcion_update &&
    campos_update.cuenta_update &&
    campos_update.divisa_update &&
    campos_update.razon_update &&
    campos_update.referencia_update &&
    campos_update.fecha_update
  ) {
    const movimiento = document.getElementById("movimiento_update").value;
    const monto = document.getElementById("monto_update").value;
    const descripcion = document.getElementById("descripcion_update").value;
    const cuenta = document.getElementById("cuenta_update").value;
    const divisa = document.getElementById("divisa_update").value;
    const razon = document.getElementById("razon_update").value;
    const referencia = document.getElementById("referencia_update").value;
    const fecha = document.getElementById("fecha_update").value;
    let data = {
      action: "update_transaction",
      id: index.id,
      movimiento: movimiento,
      monto: monto,
      descripcion: descripcion,
      cuenta: cuenta,
      divisa: divisa,
      razon: razon,
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
