const formulario_convert = document.getElementById("formulario_convert");
const convert = document.getElementById("convert");
const inputs_convert = document.querySelectorAll("#formulario_convert input");
const selects_convert = document.querySelectorAll("#formulario_convert select");

let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1;
let yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;

const campos_convert = {
  monto_1: false,
  divisa_1: false,
  divisa_2: false,
};

const validarFormularioConvert = (e) => {
  switch (e.target.name) {
    case "monto_1":
      validarCampoConvert(expresiones.monto, e.target, "monto_1");
      break;
    case "divisa_1":
      validarCampoConvert(expresiones.divisa, e.target, "divisa_1");
      break;
    case "divisa_2":
      validarCampoConvert(expresiones.divisa, e.target, "divisa_2");
      break;
  }
};

const validarCampoConvert = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
    campos_convert[campo] = true;
  } else {
    document.getElementById(`${campo}`).classList.add("form-control-error");
    document
      .querySelector(`#grupo__${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
    campos_convert[campo] = false;
  }
};

inputs_convert.forEach((input) => {
  input.addEventListener("keyup", validarFormularioConvert);
  input.addEventListener("blur", validarFormularioConvert);
  input.addEventListener("change", validarFormularioConvert);
});

selects_convert.forEach((select) => {
  select.addEventListener("change", validarFormularioConvert);
});

convert.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    campos_convert.monto_1 &&
    campos_convert.divisa_1 &&
    campos_convert.divisa_2
  ) {
    const divisa1 = document.getElementById("divisa_1").value;
    const divisa2 = document.getElementById("divisa_2").value;

    let data = {
      action: "convert_badge",
      divisa1: divisa1,
      divisa2: divisa2,
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
        console.log();
        console.log(dat[0]["value"]);
        if (dat.length < 2) {
          let monto1 = document.getElementById("monto_1").value;
          let monto2 = ((monto1 * dat[0]["value"]) / dat[0]["value"]).toFixed(2);
          document.getElementById("monto_2").value = monto2;
        } else {
          let monto1 = document.getElementById("monto_1").value;
          let monto2 = ((monto1 * dat[0]["value"]) / dat[1]["value"]).toFixed(2);
          document.getElementById("monto_2").value = monto2;
        }
      });
  } else {
    Object.keys(campos_convert).forEach((campo) => {
      if (!campos_convert[campo]) {
        document.getElementById(`${campo}`).classList.add("form-control-error");
        document
          .querySelector(`#grupo__${campo} .formulario__input-error`)
          .classList.add("formulario__input-error-activo");
      }
    });
  }
});
