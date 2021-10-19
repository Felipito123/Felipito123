function covidRegionAricaYParinacota() {

    var aricYparic = document.getElementById('aricayparinacota').getContext('2d');
    
    var chart = new Chart(aricYparic, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/AricYParic.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/arica-y-parinacota.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) {
            return Object.values(item)[0]
        })
        chart.data.datasets[0].data = data.datos.map(function (item) {
            return Object.values(item)[1]
        })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }
        chart.update()
    });
}

function covidRegionTarapaca() {

    var Tarap = document.getElementById('tarapaca').getContext('2d');

    var chart = new Chart(Tarap, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/tarapaca.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })

        // console.log("1:::: "+ chart.data.labels);

        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })

        // console.log("2:::: "+ chart.data.datasets[0].data);

        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================ATACAMA================================================ */

function covidRegionAtacama() {

    var Atac = document.getElementById('atacama').getContext('2d');

    var chart = new Chart(Atac, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/atacama.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================COQUIMBO================================================ */

function covidRegionCoquimbo() {

    var Coquim = document.getElementById('coquimbo').getContext('2d');

    var chart = new Chart(Coquim, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/coquimbo.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}


/*==========================================ANTOFAGASTA================================================ */

function covidRegionAntofagasta() {

    var Antof = document.getElementById('antofagasta').getContext('2d');

    var chart = new Chart(Antof, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/antofagasta.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}


/*==========================================VALPARAISO================================================ */

function covidRegionValparaiso() {

    var Valpa = document.getElementById('valparaiso').getContext('2d');

    var chart = new Chart(Valpa, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/valparaiso.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================METROPOLITANA================================================ */

function covidRegionMetropolitana() {

    var Metropl = document.getElementById('metropolitana').getContext('2d');

    var chart = new Chart(Metropl, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/metropolitana.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}


/*==========================================O'HIGGINS================================================ */

function covidRegionOhiggins() {

    var Ohig = document.getElementById('ohiggins').getContext('2d');

    var chart = new Chart(Ohig, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/ohiggins.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================MAULE================================================ */

function covidRegionMaule() {

    var MAUl = document.getElementById('maule').getContext('2d');

    var chart = new Chart(MAUl, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/maule.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}


/*==========================================ÑUBLE================================================ */

function covidRegionNuble() {

    var NUBL = document.getElementById('ñuble').getContext('2d');

    var chart = new Chart(NUBL, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/nuble.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================BIOBIO================================================ */

function covidRegionBioBio() {

    var Bio = document.getElementById('biobio').getContext('2d');

    var chart = new Chart(Bio, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/biobio.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================ARAUCANÍA================================================ */

function covidRegionAraucania() {

    var Arauc = document.getElementById('araucania').getContext('2d');

    var chart = new Chart(Arauc, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/araucania.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================LOS RIOS================================================ */

function covidRegionLosRios() {

    var LosRi = document.getElementById('losrios').getContext('2d');

    var chart = new Chart(LosRi, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/los-rios.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================LOS LAGOS================================================ */

function covidRegionLosLagos() {

    var LosLa = document.getElementById('loslagos').getContext('2d');

    var chart = new Chart(LosLa, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/los-lagos.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================AYSÉN================================================ */

function covidRegionAysen() {

    var Ays = document.getElementById('aysen').getContext('2d');

    var chart = new Chart(Ays, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/aysen.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}

/*==========================================MAGALLANES================================================ */

function covidRegionMagallanes() {

    var MAG = document.getElementById('magallanes').getContext('2d');

    var chart = new Chart(MAG, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        // return moment(data.labels[tooltipItem.index]).format('DD-MMM') + ": " + data.datasets[0].data[tooltipItem.index];

                        let var1 = moment(data.labels[tooltipItem.index]).format('DD-MMM');
                        let expl = var1.split("-");
                        return expl[0] + '-' + traducirmeses(expl[1]) + ": " + data.datasets[0].data[tooltipItem.index];
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/tarap.json
    $.getJSON("https://www.biobiochile.cl/static/graficos/json/magallanes.json", {
        _: new Date().getTime()
    }, function (data) {
        chart.data.labels = data.datos.map(function (item) { return Object.values(item)[0] })
        chart.data.datasets[0].data = data.datos.map(function (item) { return Object.values(item)[1] })
        var nombreRegion = data.nombreRegion;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return nombreRegion
        }

        chart.update()
    });
}
