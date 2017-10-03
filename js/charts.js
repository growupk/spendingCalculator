function createConfig(gridlines, title) {
    return {
        type: 'line',
        data: {
            labels: ['Január','Február','Március','Április','Május','Június','Július','Augusztus','Szeptember','Október','November','December'],
            datasets: [{
                label: "My First dataset",
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: [10, 30, 39, 20, 25, 34, 0],
                fill: false,
            }, {
                label: "My Second dataset",
                fill: false,
                backgroundColor: window.chartColors.blue,
                borderColor: window.chartColors.blue,
                data: [18, 33, 22, 19, 11, 39, 30],
            }]
        },
        options: {
            responsive: true,
            title:{
                display: true,
                text: title
            },
            scales: {
                xAxes: [{
                    gridLines: gridlines
                }],
                yAxes: [{
                    gridLines: gridlines,
                    ticks: {
                        min: 0,
                        max: 200000,
                        stepSize: 50000
                    }
                }]
            }
        }
    };
}

window.onload = function() {
    var container = document.querySelector('.container');

    [{
        title: 'Display: true',
        gridLines: {
            display: true
        }
    }].forEach(function(details) {
        var div = document.createElement('div');
        div.classList.add('chart-container');

        var canvas = document.createElement('canvas');
        div.appendChild(canvas);
        container.appendChild(div);

        var ctx = canvas.getContext('2d');
        var config = createConfig(details.gridLines, details.title);
        new Chart(ctx, config);
    });
};