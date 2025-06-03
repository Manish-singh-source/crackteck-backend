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
  series: [65.48, 112.02, 80.48],
  labels: ["Won", "Discovery", "Undiscovery"],
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
  colors: ["#287F71", "#522c8f", "#E77636"],
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
    { name: "Hot Leads", data: [80, 50, 30, 40, 100, 20] },
    { name: "Normal Leads", data: [20, 100, 35, 78, 60, 30] },
    { name: "Cold Leads", data: [20, 30, 40, 80, 20, 80] },
    { name: "Qualified", data: [44, 76, 78, 13, 43, 10] },
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

var options = {
    series: [
      {
        name: "Total Income",
        type: "bar",
        data: [34, 65, 46, 68, 49, 61, 42, 44, 78, 52, 63, 67],
      },
      {
        name: "Total Expense",
        type: "bar",
        data: [16, 20, 32, 38, 42, 25, 15, 21, 17, 29, 12, 35],
      },
      {
        name: "Total Revenue",
        type: "line",
        data: [12, 16, 28, 32, 38, 22, 10, 18, 14, 58, 24, 70],
      },
    ],
    chart: { height: 340, type: "line", toolbar: { show: !1 } },
    stroke: { dashArray: [0, 0], width: [0, 0, 2], curve: "smooth" },
    fill: {
      opacity: [1, 1],
      type: ["solid", "solid"],
      gradient: {
        type: "horizontal",
        inverseColors: !1,
        opacityFrom: 0.5,
        opacityTo: 0,
        stops: [0, 90],
      },
    },
    markers: { size: [0, 0], strokeWidth: 2, hover: { size: 4 } },
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
      axisTicks: { show: !1 },
      axisBorder: { show: !1 },
    },
    yaxis: { min: 0, axisBorder: { show: !1 } },
    grid: {
      show: !0,
      strokeDashArray: 3,
      xaxis: { lines: { show: !1 } },
      yaxis: { lines: { show: !0 } },
      padding: { top: 0, right: -2, bottom: 0, left: 10 },
    },
    legend: {
      show: !0,
      horizontalAlign: "center",
      offsetX: 0,
      offsetY: 5,
      markers: { width: 9, height: 9, radius: 6 },
      itemMargin: { horizontal: 10, vertical: 0 },
    },
    plotOptions: {
      bar: { columnWidth: "50%", barHeight: "70%", borderRadius: 3 },
    },
    colors: ["#108dff", "#963b68", "#287F71"],
    tooltip: {
      shared: !0,
      y: [
        {
          formatter: function (e) {
            return void 0 !== e ? e.toFixed(1) + "k" : e;
          },
        },
        {
          formatter: function (e) {
            return void 0 !== e ? e.toFixed(1) + "k" : e;
          },
        },
        {
          formatter: function (e) {
            return void 0 !== e ? e.toFixed(1) + "k" : e;
          },
        },
      ],
    },
  },
  chart = new ApexCharts(document.querySelector("#monthly-sales"), options);
chart.render();
