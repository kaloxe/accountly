let options8 = {
  series: [50, 70, 40, 80, 30],
  chart: {
      type: 'pie',
  },
  labels: ["Hola", "Vaina", "Maicra", "Pana", "Carnal"],
  responsive: [{
      breakpoint: 480,
      options: {
          chart: {
              width: 200
          },
          legend: {
              position: 'bottom'
          }
      }
  }]
};
let chart = new ApexCharts(document.querySelector("#chartTotal"), options8);
chart.render();

// fetch("/accountly/server/controllers/controllerReportMovement.php", {
//   method: "POST",
//   headers: {
//     "Content-Type": "application/json; charset=utf-8",
//   },
//   body: JSON.stringify({
//     action: "report_movement",
//     tiempo: "week",
//   }),
// })
//   .then((res) => res.json())
//   .then((dat) => {
//     console.log(dat);
//     console.log(dat.chart);
//     content.innerHTML = dat.data;
    
//     chart.updateOptions({
//       series: [
//         {
//           name: "Ingresos",
//           data: dat.chart["incomes"],
//         },
//         {
//           name: "Egresos",
//           data: dat.chart["becomes"],
//         },
//       ],
//       xaxis: {
//         type: "date",
//         categories: dat.chart["dates"],
//       },
//     });
//   });