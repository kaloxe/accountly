let data = {
  action: "get_recent_movements",
};
fetch("/accountly/server/controllers/controllerIndex.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json; charset=utf-8",
  },
  body: JSON.stringify(data),
})
  .then((res) => res.json())
  .then((dat) => {
    console.log(dat);
    var chartData = {
      series: [
        {
          name: "Ingresos",
          data: dat.incomes,
        },
        {
          name: "Egresos",
          data: dat.becomes,
        },
      ],
      chart: {
        height: 300,
        type: "line",
        zoom: {
          enabled: false,
        },
        dropShadow: {
          enabled: true,
          color: "#000",
          top: 18,
          left: 7,
          blur: 16,
          opacity: 0.2,
        },
        toolbar: {
          show: false,
        },
      },
      colors: ["#255cd3", "#f0746c"],
      dataLabels: {
        enabled: false,
      },
      stroke: {
        width: [3, 3],
        curve: "smooth",
      },
      grid: {
        show: false,
      },
      markers: {
        colors: ["#255cd3", "#f0746c"],
        size: 5,
        strokeColors: "#ffffff",
        strokeWidth: 2,
        hover: {
          sizeOffset: 2,
        },
      },
      xaxis: {
        categories: dat.dates,
        labels: {
          style: {
            colors: "#8c9094",
          },
        },
      },
      // yaxis: {
      // 	min: 0,
      // 	max: 55,
      // 	labels:{
      // 		style:{
      // 			colors: '#8c9094'
      // 		}
      // 	}
      // },
      legend: {
        position: "top",
        horizontalAlign: "right",
        floating: true,
        offsetY: 0,
        labels: {
          useSeriesColors: true,
        },
        markers: {
          width: 10,
          height: 10,
        },
      },
    };
    var chartMovements = new ApexCharts(
      document.querySelector("#movimientos-recientes"),
      chartData
    );
    chartMovements.render();

    // chartMovements.updateOptions({
    //   series: [
    //     {
    //       name: "Ingresos",
    //       data: [1,2,3,4,5,6,7],
    //     },
    //     {
    //       name: "Egresos",
    //       data: [2,4,6,2,7,1,9],
    //     },
    //   ],
    // });

  })
  .catch((err) => console.log(err));
