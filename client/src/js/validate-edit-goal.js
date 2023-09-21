const formulario_update = document.getElementById("formulario_update");
const update = document.getElementById("update");
const inputs_update = document.querySelectorAll("#formulario_update input");
const selects_update = document.querySelectorAll("#formulario_update select");
let index;
let account;

function openUpdateModal(id) {
  index = {
    action: "read_goal",
    id: id,
  };
  fetch("/accountly/server/controllers/controllerGoal.php", {
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
      document.getElementById("monto_update").value = dat.amount;
      document.getElementById("meta_update").value = dat.name_goal;
      document.getElementById("descripcion_update").value = dat.description;
    });
}

const campos_update = {
  movimiento_update: true,
  monto_update: true,
  meta_update: true,
  descripcion_update: true,
  divisa_update: true,
};

const validarFormularioUpdate = (e) => {
  switch (e.target.name) {
    case "movimiento_update":
      validarCampoUpdate(expresiones.movimiento, e.target, "movimiento_update");
      break;
    case "monto_update":
      validarCampoUpdate(expresiones.monto, e.target, "monto_update");
      break;
    case "meta_update":
      validarCampoUpdate(expresiones.meta, e.target, "meta_update");
      break;

    case "descripcion_update":
      validarCampoUpdate(
        expresiones.descripcion,
        e.target,
        "descripcion_update"
      );
      break;
    case "divisa_update":
      validarCampoUpdate(expresiones.divisa, e.target, "divisa_update");
      break;
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
    campos_update.meta_update &&
    campos_update.descripcion_update &&
    campos_update.divisa_update
  ) {
    const movimiento = document.getElementById("movimiento_update").value;
    const monto = document.getElementById("monto_update").value;
    const meta = document.getElementById("meta_update").value;
    const descripcion = document.getElementById("descripcion_update").value;
    const divisa = document.getElementById("divisa_update").value;

    let data = {
      action: "update_goal",
      id: index.id,
      movimiento: movimiento,
      monto: monto,
      meta: meta,
      descripcion: descripcion,
      divisa: divisa,
    };
    fetch("/accountly/server/controllers/controllerGoal.php", {
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
    Object.keys(campos_update).forEach((campo) => {
      if (!campos_update[campo]) {
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
