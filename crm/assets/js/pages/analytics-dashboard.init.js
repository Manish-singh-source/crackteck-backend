"use strict";
var options = {
    series: [{ name: "Desktops", data: [35, 78, 40, 90, 56, 80, 15] }],
    chart: {
      height: 45,
      type: "area",
      sparkline: { enabled: !0 },
      animations: { enabled: !1 },
      dropShadow: {
        enabled: !0,
        top: 10,
        left: 0,
        bottom: 10,
        blur: 2,
        color: "#f0f4f7",
        opacity: 0.3,
      },
    },
    colors: ["#c26316"],
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.5,
        opacityTo: 0.1,
        stops: [0, 90, 100],
      },
    },
    tooltip: { enabled: !1 },
    dataLabels: { enabled: !1 },
    grid: { show: !1 },
    xaxis: {
      labels: { show: !1 },
      axisBorder: { show: !1 },
      axisTicks: { show: !1 },
    },
    yaxis: { show: !1 },
    stroke: { curve: "smooth", width: 2 },
  },
  chartOne = new ApexCharts(
    document.querySelector("#website-traffic"),
    options
  );
chartOne.render();
options = {
  series: [{ name: "Desktops", data: [25, 55, 20, 60, 35, 60, 15] }],
  chart: {
    height: 45,
    type: "area",
    sparkline: { enabled: !0 },
    animations: { enabled: !1 },
    dropShadow: {
      enabled: !0,
      top: 10,
      left: 0,
      bottom: 10,
      blur: 2,
      color: "#f0f4f7",
      opacity: 0.3,
    },
  },
  colors: ["#E7366B"],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.5,
      opacityTo: 0.1,
      stops: [0, 90, 100],
    },
  },
  tooltip: { enabled: !1 },
  dataLabels: { enabled: !1 },
  grid: { show: !1 },
  xaxis: {
    labels: { show: !1 },
    axisBorder: { show: !1 },
    axisTicks: { show: !1 },
  },
  yaxis: { show: !1 },
  stroke: { curve: "smooth", width: 2 },
};
(chartOne = new ApexCharts(
  document.querySelector("#conversion-visitors"),
  options
)).render();
options = {
  series: [{ name: "Desktops", data: [25, 68, 2, 50, 25, 55, 89] }],
  chart: {
    height: 45,
    type: "area",
    sparkline: { enabled: !0 },
    animations: { enabled: !1 },
    dropShadow: {
      enabled: !0,
      top: 10,
      left: 0,
      bottom: 10,
      blur: 2,
      color: "#f0f4f7",
      opacity: 0.3,
    },
  },
  colors: ["#287F71"],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.5,
      opacityTo: 0.1,
      stops: [0, 90, 100],
    },
  },
  tooltip: { enabled: !1 },
  dataLabels: { enabled: !1 },
  grid: { show: !1 },
  xaxis: {
    labels: { show: !1 },
    axisBorder: { show: !1 },
    axisTicks: { show: !1 },
  },
  yaxis: { show: !1 },
  stroke: { curve: "smooth", width: 2 },
};
(chartOne = new ApexCharts(
  document.querySelector("#session-duration"),
  options
)).render();
options = {
  series: [{ name: "Desktops", data: [36, 78, 36, 58, 35, 65, 55] }],
  chart: {
    height: 45,
    type: "area",
    sparkline: { enabled: !0 },
    animations: { enabled: !1 },
    dropShadow: {
      enabled: !0,
      top: 10,
      left: 0,
      bottom: 10,
      blur: 2,
      color: "#f0f4f7",
      opacity: 0.3,
    },
  },
  colors: ["#108dff"],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.5,
      opacityTo: 0.1,
      stops: [0, 90, 100],
    },
  },
  tooltip: { enabled: !1 },
  dataLabels: { enabled: !1 },
  grid: { show: !1 },
  xaxis: {
    labels: { show: !1 },
    axisBorder: { show: !1 },
    axisTicks: { show: !1 },
  },
  yaxis: { show: !1 },
  stroke: { curve: "smooth", width: 2 },
};
(chartOne = new ApexCharts(
  document.querySelector("#active-users"),
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
options = {
  series: [65.48, 112.02, 80.48, 58.65],
  labels: ["Chrome", "Firefox", "Safari", "Opera"],
  chart: { type: "donut", height: 259 },
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
  colors: ["#287F71", "#522c8f", "#E77636", "#01D4FF"],
};
(chart = new ApexCharts(
  document.querySelector("#top-session"),
  options
)).render();
