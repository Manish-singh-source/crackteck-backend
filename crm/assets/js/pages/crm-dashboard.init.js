"use strict";
var options = {
    series: [
      {
        name: "Total Income",
        data: [
          1e3, 2100, 1800, 4540, 4540, 2300, 2300, 6860, 6860, 3500, 3500, 2100,
        ],
      },
      {
        name: "Total Revenue",
        data: [
          2e3, 5300, 1100, 1300, 4800, 5200, 7800, 4350, 4750, 7380, 4540, 4800,
        ],
      },
      {
        name: "Total Expence",
        data: [
          7400, 5900, 3200, 7300, 3400, 5800, 8900, 6540, 4100, 6380, 2300,
          6750,
        ],
      },
    ],
    chart: {
      type: "area",
      height: 300,
      parentHeightOffset: 0,
      toolbar: { show: !1 },
      dropShadow: {
        enabled: !1,
        enabledOnSeries: void 0,
        top: 0,
        left: 0,
        blur: 4,
        color: "#000",
        opacity: 0.3,
      },
    },
    dataLabels: { enabled: !1 },
    colors: ["#108dff", "#E77636", "#db398a"],
    fill: {
      opacity: 1,
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.4,
        opacityTo: 0.1,
        stops: [0, 90, 100],
        colorStops: [
          [
            { offset: 0, color: "#108dff", opacity: 0.3 },
            { offset: 50, color: "#108dff", opacity: 0.2 },
            { offset: 100, color: "#108dff", opacity: 0 },
          ],
          [
            { offset: 0, color: "#E77636", opacity: 0.3 },
            { offset: 50, color: "#E77636", opacity: 0.2 },
            { offset: 100, color: "#E77636", opacity: 0 },
          ],
          [
            { offset: 0, color: "#db398a", opacity: 0.08 },
            { offset: 50, color: "#db398a", opacity: 0.06 },
            { offset: 100, color: "#db398a", opacity: 0 },
          ],
        ],
      },
    },
    stroke: { curve: ["smooth", "smooth", "smooth"], width: [2, 0, 2] },
    grid: {
      strokeDashArray: 3,
      xaxis: { lines: { show: !0 } },
      yaxis: { lines: { show: !1 } },
    },
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
    },
    yaxis: {
      min: 0,
      labels: {
        formatter: function (e) {
          return "₹".concat((e / 1e3).toFixed(0), "k");
        },
      },
    },
    legend: { position: "bottom" },
  },
  chart = new ApexCharts(document.querySelector("#sales-overview"), options);
chart.render();
options = {
  series: [65.48, 112.02, 80.48, 32.34],
  labels: ["Won", "Lost", "Qualified", "Unqualified"],
  chart: { type: "donut", height: 225 },
  plotOptions: { pie: { size: 100, donut: { size: "80%" } } },
  dataLabels: { enabled: !1 },
  legend: { show: !1 },
  stroke: { width: 0 },
  yaxis: {
    labels: {
      formatter: function (e) {
        return e + "k Session";
      },
    },
    tickAmount: 4,
    min: 0,
  },
  colors: ["#28C76F", "#EA5455", "#FF9F43", "#B8C2CC"],
};
(chart = new ApexCharts(
  document.querySelector("#top-session"),
  options
)).render();
options = {
  chart: { height: 330, type: "radialBar" },
  plotOptions: {
    radialBar: {
      startAngle: -135,
      endAngle: 135,
      dataLabels: {
        name: { fontSize: "13px", color: void 0, offsetY: 25 },
        value: {
          offsetY: -15,
          fontSize: "25px",
          color: "#343a40",
          formatter: function (e) {
            return e + "%";
          },
        },
      },
    },
  },
  fill: {
    gradient: {
      enabled: !0,
      shade: "dark",
      shadeIntensity: 0.2,
      inverseColors: !1,
      opacityFrom: 1,
      opacityTo: 1,
      stops: [0, 50, 65, 91],
    },
  },
  stroke: { dashArray: 7 },
  colors: ["#E77636"],
  series: [87],
  labels: ["Growth"],
};
(chart = new ApexCharts(
  document.querySelector("#browservisiting"),
  options
)).render();
options = {
  series: [
    { name: "New Leads", data: [80, 50, 30, 40, 100, 20] },
    { name: "Qualified Leads", data: [20, 100, 35, 78, 60, 30] },
    { name: "Unqualified Leads", data: [20, 30, 40, 80, 20, 80] },
    { name: "Lost", data: [44, 76, 78, 13, 43, 10] },
  ],
  chart: {
    type: "radar",
    height: 323,
    parentHeightOffset: 0,
    toolbar: { show: !1 },
  },
  stroke: { width: 1 },
  fill: { opacity: 0.1 },
  markers: { size: 3, hover: { size: 4 } },
  tooltip: {
    y: {
      formatter: function (e) {
        return e;
      },
    },
  },
  legend: {
    show: !0,
    markers: {
      width: 6,
      height: 6,
      strokeWidth: 0,
      strokeColor: "#fff",
      fillColors: void 0,
      radius: 5,
      customHTML: void 0,
      onClick: void 0,
      offsetX: 0,
      offsetY: 0,
    },
  },
  xaxis: {
    categories: ["2019", "2020", "2021", "2022", "2023", "2024"],
    axisBorder: { show: !1 },
    labels: {
      show: !0,
      style: {
        colors: [
          "#001b2f",
          "#001b2f",
          "#001b2f",
          "#001b2f",
          "#001b2f",
          "#001b2f",
        ],
        fontSize: "13px",
      },
    },
  },
  yaxis: { stepSize: 20 },
  colors: ["#108dff", "#963b68", "#E77636", "#27ebb0"],
  dataLabels: { enabled: !1, background: { enabled: !0 } },
};
(chart = new ApexCharts(
  document.querySelector("#deals-statistics"),
  options
)).render();
options = {
  series: [
    { name: "Created", data: [48, 32, 42, 28, 15, 32, 20] },
    { name: "Converted", data: [32, 33, 39, 42, 72, 55, 60] },
  ],
  chart: {
    type: "bar",
    height: 367,
    stacked: !0,
    foreColor: "#adb0bb",
    parentHeightOffset: 0,
    toolbar: { show: !1 },
  },
  plotOptions: {
    bar: {
      horizontal: !1,
      columnWidth: "20%",
      endingShape: "rounded",
      startingShape: "rounded",
    },
  },
  dataLabels: { enabled: !1 },
  xaxis: { categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"] },
  grid: {
    borderColor: "rgba(0,0,0,0.1)",
    strokeDashArray: 3,
    xaxis: { lines: { show: !1 } },
    yaxis: { lines: { show: !0 } },
  },
  colors: ["#c26316", "#D49664"],
  legend: { position: "bottom" },
  fill: { opacity: 1 },
};
(chart = new ApexCharts(
  document.querySelector("#totalleads"),
  options
)).render();

var options = {
    series: [
      { name: "Net Profit", data: [44, 55, 57, 56, 61, 58, 63, 60, 66] },
      { name: "Revenue", data: [76, 85, 101, 98, 87, 105, 91, 114, 94] },
      { name: "Free Cash Flow", data: [35, 41, 36, 26, 45, 48, 52, 53, 41] },
    ],
    chart: {
      type: "bar",
      height: 350,
      parentHeightOffset: 0,
      toolbar: { show: !1 },
    },
    colors: ["#b8c2cc", "#28c76f", "#ff9f43"],
    plotOptions: {
      bar: { horizontal: !1, columnWidth: "45%", endingShape: "rounded" },
    },
    dataLabels: { enabled: !1 },
    stroke: { show: !0, width: 2, colors: ["transparent"] },
    xaxis: {
      categories: [
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
      ],
    },
    yaxis: { title: { text: "₹ (thousands)" } },
    grid: { borderColor: "#f1f1f1" },
    fill: { opacity: 1 },
    tooltip: {
      y: {
        formatter: function (e) {
          return "₹ " + e + " thousands";
        },
      },
    },
  },
  chart = new ApexCharts(
    document.querySelector("#basic_column_chart"),
    options
  );
chart.render();
