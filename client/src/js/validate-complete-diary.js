const formulario_complete = document.getElementById("formulario_complete");
const complete = document.getElementById("complete");
const inputs_complete = document.querySelectorAll("#formulario_complete input");
const selects_complete = document.querySelectorAll(
  "#formulario_complete select"
);
let indexGoal;

const campos_complete = {
  descripcion_complete: false,
  cuenta_complete: false,
};

function openCompleteModal(id) {
  indexGoal = id;
  document
    .querySelector(`#modal_complete .modal-content`)
    .classList.remove("d-none");
  document
    .getElementById("formulario__mensaje-exito_complete")
    .classList.remove("formulario__mensaje-exito-activo");
}

const validarFormularioComplete = (e) => {
  switch (e.target.name) {
    case "descripcion_complete":
      validarCampoComplete(
        expresiones.descripcion,
        e.target,
        "descripcion_complete"
      );
      break;
    case "cuenta_complete":
      validarCampoComplete(expresiones.cuenta, e.target, "cuenta_complete");
      break;
  }
};

const validarCampoComplete = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos_complete[campo] = true;
  } else {
    document.getElementById(`${campo}`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos_complete[campo] = false;
  }
};

inputs_complete.forEach((input) => {
  input.addEventListener("keyup", validarFormularioComplete);
  input.addEventListener("blur", validarFormularioComplete);
  input.addEventListener("change", validarFormularioComplete);
});

selects_complete.forEach((select) => {
  select.addEventListener("change", validarFormularioComplete);
});

complete.addEventListener("click", (e) => {
  e.preventDefault();

  if (campos_complete.descripcion_complete && campos_complete.cuenta_complete) {
    const descripcion = document.getElementById("descripcion_complete").value;
    const cuenta = document.getElementById("cuenta_complete").value;

    let data = {
      action: "complete_event",
      id: indexGoal,
      descripcion: descripcion,
      cuenta: cuenta,
    };
    console.log(data);
    fetch("/accountly/server/controllers/controllerDiary.php", {
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
            .querySelector(`#modal_complete .modal-content`)
            .classList.add("d-none");
          document
            .getElementById("formulario__mensaje-exito_complete")
            .classList.add("formulario__mensaje-exito-activo");
          campos_complete.descripcion_complete = false;
          campos_complete.cuenta_complete = false;
          formulario_complete.reset();
        } else {
          document
            .getElementById("formulario__mensaje_validacion_complete")
            .classList.add("formulario__mensaje-activo");
          setTimeout(() => {
            document
              .getElementById("formulario__mensaje_validacion_complete")
              .classList.remove("formulario__mensaje-activo");
          }, 2500);
        }
      });
  } else {
    Object.keys(campos_complete).forEach((campo) => {
      if (!campos_complete[campo]) {
        document.getElementById(`${campo}`).classList.add("form-control-error");
        document
          .querySelector(`#grupo__${campo} .formulario__input-error`)
          .classList.add("formulario__input-error-activo");
      }
    });
    document
      .getElementById("formulario__mensaje_complete")
      .classList.add("formulario__mensaje-activo");
    setTimeout(() => {
      document
        .getElementById("formulario__mensaje_complete")
        .classList.remove("formulario__mensaje-activo");
    }, 2500);
  }
});
