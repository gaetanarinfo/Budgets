(function() {
    'use strict'

    // Graphs
    var ctx = document.getElementById('myChart').getContext('2d');
    // eslint-disable-next-line no-unused-vars
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                    label: 'Dépenses',
                    // data: [461, 79, 55, 58, 39, 75, 52, 48, 98, 44, 0],
                    backgroundColor: '#198754',
                    borderColor: '#198754',
                    lineTension: 0,
                },
                {
                    label: 'Salaires',
                    // data: [461, 79, 55, 58, 39, 75, 52, 48, 98, 44, 0],

                    backgroundColor: '#0dcaf0',
                    borderColor: '#0dcaf0',
                    borderWidth: 5,
                },
                // {
                //     label: 'Pôle Emploi',
                //     // data: [461, 79, 55, 58, 39, 75, 52, 48, 98, 44, 0],
                //     backgroundColor: 'red',
                //     borderColor: 'red',
                //     borderWidth: 5,
                // },
                // {
                //     label: 'Montant due',
                //     // data: [461, 79, 55, 58, 39, 75, 52, 48, 98, 44, 0],
                //     backgroundColor: '#b02cc7',
                //     borderColor: '#b02cc7',
                //     borderWidth: 5,
                //     display: false,
                //     enabled: false
                // }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            responsive: true,
            legend: {
                display: true,
                position: 'bottom'
            },
            tooltips: {
                enabled: true
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    })

    loadContact($('input[name=year]').val(), myChart);
    loadContact2($('input[name=year]').val(), myChart);
    // loadContact3($('input[name=year]').val(), myChart);

    $('.link:not(active)').on('click', function() {
        var year = $(this).text();
        $('.link.active').text(year);
        loadContact(year, myChart);
        loadContact2(year, myChart);
        // loadContact3(year, myChart);
    });

    $(document).on('click', '.dataset', function() {
        var year = $('.link.active').text();
        $(this).toggleClass('active');
        loadContact(year, myChart);
        loadContact2(year, myChart);
        // loadContact3(year, myChart);
    })
})()

function loadContact(year, myChart) {

    $.ajax({
        url: '../ajax/ajax-Annee.php',
        method: 'POST',
        data: {
            year: year
        },
        success: function(data) {

            if (data != "") {

                myChart.data.datasets.forEach((dataset) => {

                    if (dataset.label == "Dépenses") {

                        dataset.data = data;

                    }
                })
                myChart.update();
            }
        }
    })
}

function loadContact2(year, myChart) {

    $.ajax({
        url: '../ajax/ajax-Annee2.php',
        method: 'POST',
        data: {
            year: year
        },
        success: function(data) {

            if (data != "") {

                myChart.data.datasets.forEach((dataset) => {

                    if (dataset.label == "Salaires") {

                        dataset.data = data;

                    }
                })
                myChart.update();

            }
        }
    })
}

// function loadContact3(year, month, myChart) {

//     $.ajax({
//         url: '../ajax/ajax-Budgets3.php',
//         method: 'POST',
//         data: {
//             year: year
//         },
//         success: function(data) {

//             myChart.data.datasets.forEach((dataset) => {

//                 if (dataset.label == "Salaires") {

//                     dataset.data = JSON.parse(`[${data}]`);

//                 }
//             })
//             myChart.update();
//         }
//     })
// }