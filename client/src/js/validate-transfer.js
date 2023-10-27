const formulario_transfer = document.getElementById("formulario_transfer");
const transfer = document.getElementById("transfer");
const inputs_transfer = document.querySelectorAll("#formulario_transfer input");
const selects_transfer = document.querySelectorAll(
  "#formulario_transfer select"
);

const campos_transfer = {
  monto_transfer: false,
  descripcion_transfer: false,
  cuenta1_transfer: false,
  cuenta2_transfer: false,
  divisa_transfer: false,
  razon_transfer: false,
  fecha_transfer: false,
};

const validarFormularioTransfer = (e) => {
  switch (e.target.name) {
    case "monto_transfer":
      validarCampoTransfer(expresiones.monto, e.target, "monto_transfer");
      break;
    case "descripcion_transfer":
      validarCampoTransfer(
        expresiones.descripcion,
        e.target,
        "descripcion_transfer"
      );
      break;
    case "cuenta1_transfer":
      validarCampoTransfer(expresiones.cuenta, e.target, "cuenta1_transfer");
      break;
    case "cuenta2_transfer":
      validarCampoTransfer(expresiones.cuenta, e.target, "cuenta2_transfer");
      break;
    case "divisa_transfer":
      validarCampoTransfer(expresiones.divisa, e.target, "divisa_transfer");
      break;
    case "razon_transfer":
      validarCampoTransfer(expresiones.razon, e.target, "razon_transfer");
      break;
    case "fecha_transfer":
      if (Date.parse(e.target.value) <= Date.parse(today)) {
        validarCampoTransfer(expresiones.fecha, e.target, "fecha_transfer");
        break;
      } else {
        validarCampoTransfer(expresiones.fecha, "", "fecha_transfer");
        break;
      }
  }
};

const validarCampoTransfer = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos_transfer[campo] = true;
  } else {
    document.getElementById(`${campo}`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos_transfer[campo] = false;
  }
};

inputs_transfer.forEach((input) => {
  input.addEventListener("keyup", validarFormularioTransfer);
  input.addEventListener("blur", validarFormularioTransfer);
  input.addEventListener("change", validarFormularioTransfer);
});

selects_transfer.forEach((select) => {
  select.addEventListener("change", validarFormularioTransfer);
});

transfer.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos_transfer.monto_transfer &&
    campos_transfer.descripcion_transfer &&
    campos_transfer.cuenta1_transfer &&
    campos_transfer.cuenta2_transfer &&
    campos_transfer.divisa_transfer &&
    campos_transfer.razon_transfer &&
    campos_transfer.fecha_transfer
  ) {
    const monto = document.getElementById("monto_transfer").value;
    const descripcion = document.getElementById("descripcion_transfer").value;
    const cuenta1 = document.getElementById("cuenta1_transfer").value;
    const cuenta2 = document.getElementById("cuenta2_transfer").value;
    const divisa = document.getElementById("divisa_transfer").value;
    const razon = document.getElementById("razon_transfer").value;
    const fecha = document.getElementById("fecha_transfer").value;

    let data = {
      action: "transfer_transaction",
      monto: monto,
      descripcion: descripcion,
      cuenta1: cuenta1,
      cuenta2: cuenta2,
      divisa: divisa,
      razon: razon,
      fecha: fecha,
    };
    console.log(data);
    fetch("/accountly/server/controllers/controllerTransaction.php", {
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
          getData();
          document
            .getElementById("formulario__mensaje-exito_transfer")
            .classList.add("formulario__mensaje-exito-activo");
          setTimeout(() => {
            document
              .getElementById("formulario__mensaje-exito_transfer")
              .classList.remove("formulario__mensaje-exito-activo");
          }, 2500);
          campos_transfer.monto_transfer = false;
          campos_transfer.descripcion_transfer = false;
          campos_transfer.cuenta1_transfer = false;
          campos_transfer.cuenta2_transfer = false;
          campos_transfer.divisa_transfer = false;
          campos_transfer.razon_transfer = false;
          campos_transfer.fecha_transfer = false;
          formulario_transfer.reset();
        } else {
          document
            .getElementById("formulario__mensaje_validacion_transfer")
            .classList.add("formulario__mensaje-activo");
          setTimeout(() => {
            document
              .getElementById("formulario__mensaje_validacion_transfer")
              .classList.remove("formulario__mensaje-activo");
          }, 2500);
        }
      });
  } else {
    Object.keys(campos_transfer).forEach((campo) => {
      if (!campos_transfer[campo]) {
        document.getElementById(`${campo}`).classList.add("form-control-error");
        document
          .querySelector(`#grupo__${campo} .formulario__input-error`)
          .classList.add("formulario__input-error-activo");
      }
    });
    document
      .getElementById("formulario__mensaje_transfer")
      .classList.add("formulario__mensaje-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje_transfer")
        .classList.remove("formulario__mensaje-activo");
    }, 2500);
  }
});
