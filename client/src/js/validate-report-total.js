const formulario = document.getElementById("formulario");
const filter = document.getElementById("filter");
const inputs = document.querySelectorAll("#formulario input");
const selects = document.querySelectorAll("#formulario select");

const expresiones = {
  cuenta: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/, // Letras y espacios, pueden llevar acentos.
  divisa: /^[0-9a-zA-ZÀ-ÿ\s]{1,10}$/,
};

const campos = {
  cuenta: true,
  divisa: true,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "cuenta":
      validarCampo(expresiones.cuenta, e.target, "cuenta");
      break;
    case "divisa":
      validarCampo(expresiones.divisa, e.target, "divisa");
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

  if (campos.cuenta && campos.divisa) {
    const cuenta = document.getElementById("cuenta").value;
    const divisa = document.getElementById("divisa").value;

    let content = document.getElementById("content");
    let data = {
      action: "report_total",
      cuenta: cuenta,
      divisa: divisa,
    };

    fetch("/accountly/server/controllers/controllerReportTotal.php", {
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
        chart.updateOptions({
          series: dat.chart.amounts,
          labels: dat.chart.accounts,
        });
      });
    // campos.cuenta = false;
    // campos.divisa = false;
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
