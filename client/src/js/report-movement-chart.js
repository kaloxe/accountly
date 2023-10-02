var options = {
  series: [
    {
      name: "Ingresos",
      data: [30, 100, 30, 100, 30, 100, 30, 100],
    },
    {
      name: "Egresos",
      data: [100, 30, 100, 30, 100, 30, 100, 30],
    },
  ],
  chart: {
    height: 350,
    type: "area",
    toolbar: {
      show: false,
    },
  },
  grid: {
    show: false,
    padding: {
      left: 0,
      right: 0,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
  },
  xaxis: {
    type: "date",
    categories: [
      "1111-11-11",
      "1111-11-11",
      "1111-11-11",
      "1111-11-11",
      "1111-11-11",
      "1111-11-11",
      "1111-11-11",
      "1111-11-11",
    ],
  },
  tooltip: {
    x: {
      format: "dd/MM/yy",
    },
  },
};
var chart = new ApexCharts(document.querySelector("#chart2"), options);
chart.render();

fetch("/accountly/server/controllers/controllerReportMovement.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json; charset=utf-8",
  },
  body: JSON.stringify({
    action: "report_movement",
    tiempo: "week",
  }),
})
  .then((res) => res.json())
  .then((dat) => {
    console.log(dat);
    console.log(dat.chart);
    content.innerHTML = dat.data;
    
    chart.updateOptions({
      series: [
        {
          name: "Ingresos",
          data: dat.chart["incomes"],
        },
        {
          name: "Egresos",
          data: dat.chart["becomes"],
        },
      ],
      xaxis: {
        type: "date",
        categories: dat.chart["dates"],
      },
    });
  });