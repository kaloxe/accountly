let options8 = {
  series: [50, 70, 40, 80, 30],
  chart: {
    type: "pie",
  },
  labels: ["Hola", "Vaina", "Maicra", "Pana", "Carnal"],
  responsive: [
    {
      breakpoint: 480,
      options: {
        chart: {
          width: 200,
        },
        legend: {
          position: "bottom",
        },
      },
    },
  ],
};
let chart = new ApexCharts(document.querySelector("#chartTotal"), options8);
chart.render();

fetch("/accountly/server/controllers/controllerReportTotal.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json; charset=utf-8",
  },
  body: JSON.stringify({
    action: "report_total",
    cuenta: "all",
    divisa: "all",
  }),
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
