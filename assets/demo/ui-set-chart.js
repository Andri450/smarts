  var barOptions = {
  series: [
    {
      name: "Surat masuk",
      data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 70, 60, 30],
    },
    {
      name: "Surat keluar",
      data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 40, 50, 70],
    },
    {
      name: "Disposisi",
      data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 40, 70, 80],
    },
  ],
  chart: {
    type: "bar",
    height: 350,
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "55%",
      endingShape: "rounded",
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    show: true,
    width: 2,
    colors: ["transparent"],
  },
  xaxis: {
    categories: ["Jan","Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct","Nov","Dec"],
  },
  fill: {
    opacity: 1,
  },
};

var bar = new ApexCharts(document.querySelector("#bar"), barOptions);
bar.render();