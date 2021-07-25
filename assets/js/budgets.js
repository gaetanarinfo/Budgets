$('#addBudgets').submit(function() {

    $.ajax({
        url: "../ajax/ajax-addBudgets.php",
        type: "POST",
        data: {
            name: $('#name').val(),
            sommes: $('#sommes').val(),
            sommes_due: $('#sommes_due').val(),
            montant_due: $('#montant_due').val(),
            status: $('#status').val(),
            month: $('#month').val()
        },
        cache: false,
        success: function(data) {

            $('.toast_message').html('<i class="fas fa-check me-1"></i> Votre dépense est ajouter !')
            $('.toast_addBudgets').fadeIn();

            setTimeout(() => {
                location.reload();
            }, 1500);

        }

    });

    return false;

});

$('#close_toast_success').click(function(e) {

    e.preventDefault();

    $('.toast_success').fadeOut();

})

$('#addSalaire').submit(function() {

    $.ajax({
        url: "../ajax/ajax-addSalaire.php",
        type: "POST",
        data: {
            montant: $('#montant').val(),
            pole_emplois: $('#pole_emplois').val(),
            month: $('#month').val(),
            status: $('#status').val()
        },
        cache: false,
        success: function(data) {

            $('.toast_message').html('<i class="fas fa-check me-1"></i> Votre salaire est ajouter !')
            $('.toast_add').fadeIn();

            setTimeout(() => {
                location.reload();
            }, 1500);

        }

    });

    return false;

});

$('#editSalaire').submit(function() {

    $.ajax({
        url: `../ajax/ajax-editSalaire.php?id=${$('#id').val()}`,
        type: "POST",
        data: {
            montant: $('#montant_edit').val(),
            pole_emplois: $('#pole_emplois_edit').val(),
            month: $('#month_edit').val(),
            status: $('#status_edit').val()
        },
        cache: false,
        success: function(data) {

            $('.toast_message').html('<i class="fas fa-check me-1"></i> Votre modification à été pris en compte !')
            $('.toast_edit').fadeIn();

            setTimeout(() => {
                location.reload();
            }, 1500);

        }

    });

    return false;

});

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
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    lineTension: 0,
                },
                {
                    label: 'Salaires',
                    // data: [461, 79, 55, 58, 39, 75, 52, 48, 98, 44, 0],

                    backgroundColor: '#2a9829',
                    borderColor: '#2a9829',
                    borderWidth: 5,
                },
                {
                    label: 'Pôle Emploi',
                    // data: [461, 79, 55, 58, 39, 75, 52, 48, 98, 44, 0],
                    backgroundColor: 'red',
                    borderColor: 'red',
                    borderWidth: 5,
                },
                {
                    label: 'Montant due',
                    // data: [461, 79, 55, 58, 39, 75, 52, 48, 98, 44, 0],
                    backgroundColor: '#b02cc7',
                    borderColor: '#b02cc7',
                    borderWidth: 5,
                    display: false,
                    enabled: false
                }
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
                enabled: false
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    })

    loadContact($('input[name=year]').val(), $('input[name=month]').val(), myChart);
    loadContact2($('input[name=year]').val(), $('input[name=month]').val(), myChart);
    loadContact3($('input[name=year]').val(), $('input[name=month]').val(), myChart);
    loadContact4($('input[name=year]').val(), $('input[name=month]').val(), myChart);
    loadContact5($('input[name=year]').val(), $('input[name=month]').val(), myChart);

    $('.link:not(active)').on('click', function() {
        var year = $(this).text();
        $('.link.active').text(year);
        loadContact(year, month, myChart);
        loadContact2(year, month, myChart);
        loadContact3(year, month, myChart);
        loadContact4(year, month, myChart);
        loadContact5(year, month, myChart);
    });

    $(document).on('click', '.dataset', function() {
        var year = $('.link.active').text();
        $(this).toggleClass('active');
        loadContact(year, month, myChart);
        loadContact2(year, month, myChart);
        loadContact3(year, month, myChart);
        loadContact4(year, month, myChart);
        loadContact5(year, month, myChart);
    })
})()

function loadContact(year, month, myChart) {

    $.ajax({
        url: '../ajax/ajax-Budgets.php',
        method: 'POST',
        data: {
            year: year,
            month: month
        },
        success: function(data) {

            if (data != "") {

                myChart.data.datasets.forEach((dataset) => {

                    if (dataset.label == "Dépenses") {

                        dataset.data = JSON.parse(`[${data}0]`);

                    }
                })
                myChart.update();
            }
        }
    })
}

function loadContact2(year, month, myChart) {

    $.ajax({
        url: '../ajax/ajax-Budgets2.php',
        method: 'POST',
        data: {
            year: year,
            month: month
        },
        success: function(data) {

            if (data != "") {

                myChart.data.labels = JSON.parse(`[${data}0]`);

                myChart.update();

            }
        }
    })
}

function loadContact3(year, month, myChart) {

    $.ajax({
        url: '../ajax/ajax-Budgets3.php',
        method: 'POST',
        data: {
            year: year,
            month: month
        },
        success: function(data) {

            myChart.data.datasets.forEach((dataset) => {

                if (dataset.label == "Salaires") {

                    dataset.data = JSON.parse(`[${data}]`);

                }
            })
            myChart.update();
        }
    })
}

function loadContact4(year, month, myChart) {

    $.ajax({
        url: '../ajax/ajax-Budgets4.php',
        method: 'POST',
        data: {
            year: year,
            month: month
        },
        success: function(data) {

            myChart.data.datasets.forEach((dataset) => {

                if (dataset.label == "Pôle Emploi") {

                    dataset.data = JSON.parse(`[${data}]`);

                }
            })
            myChart.update();
        }
    })
}

function loadContact5(year, month, myChart) {

    $.ajax({
        url: '../ajax/ajax-Budgets5.php',
        method: 'POST',
        data: {
            year: year,
            month: month
        },
        success: function(data) {

            myChart.data.datasets.forEach((dataset) => {

                if (dataset.label == "Montant due") {

                    dataset.data = JSON.parse(`[${data}0]`);

                }
            })
            myChart.update();
        }
    })
}

$(document).ready(function() {
    $('#table_budgets').DataTable({
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10', '25', '50', 'Tout voir']
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });
});

$(function() {
    $('.popper').popover({
        placement: 'bottom',
        container: 'body',
        html: true,
        content: function() {
            return $(this).next('.popper-content').html();
        }
    })
})