$('.logout').click(function() {

    if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {

        $.ajax({
            url: "../ajax/ajax-logout.php",
            cache: false,
            success: function(data) {

                setTimeout(() => {
                    location.reload();
                }, 1000);

            }

        });

    }

    return false;

});

$(document).ready(function() {
    var eq = "";
    var curNumber = "";
    var result = "";
    var entry = "";
    var reset = false;

    $("button").click(function() {
        entry = $(this).attr("value");

        if (entry === "ac") {
            entry = 0;
            eq = 0;
            result = 0;
            curNumber = 0;
            $('#result p').html(entry);
            $('#previous p').html(eq);
        } else if (entry === "ce") {
            if (eq.length > 1) {
                eq = eq.slice(0, -1);
                $('#previous p').html(eq);
            } else {
                eq = 0;
                $('#result p').html(0);
            }

            $('#previous p').html(eq);

            if (curNumber.length > 1) {
                curNumber = curNumber.slice(0, -1);
                $('#result p').html(curNumber);
            } else {
                curNumber = 0;
                $('#result p').html(0);
            }

        } else if (entry === "=") {
            result = eval(eq);
            $('#result p').html(result);
            eq += "=" + result;
            $('#previous p').html(eq);
            eq = result;
            entry = result;
            curNumber = result;
            reset = true;
        } else if (isNaN(entry)) { //check if is not a number, and after that, prevents for multiple "." to enter the same number
            if (entry !== ".") {
                reset = false;
                if (curNumber === 0 || eq === 0) {
                    curNumber = 0;
                    eq = entry;
                } else {
                    curNumber = "";
                    eq += entry;
                }
                $('#previous p').html(eq);
            } else if (curNumber.indexOf(".") === -1) {
                reset = false;
                if (curNumber === 0 || eq === 0) {
                    curNumber = 0.;
                    eq = 0.;
                } else {
                    curNumber += entry;
                    eq += entry;
                }
                $('#result p').html(curNumber);
                $('#previous p').html(eq);
            }
        } else {
            if (reset) {
                eq = entry;
                curNumber = entry;
                reset = false;
            } else {
                eq += entry;
                curNumber += entry;
            }
            $('#previous p').html(eq);
            $('#result p').html(curNumber);
        }


        if (curNumber.length > 10 || eq.length > 26) {
            $("#result p").html("0");
            $("#previous p").html("Too many digits");
            curNumber = "";
            eq = "";
            result = "";
            reset = true;
        }

        if (result.indexOf(".") !== -1) {
            result = result.truncate()
        }

    });


});

const socket = new WebSocket('wss://ws.finnhub.io?token=c3ui9f2ad3i8b5scfrt0');

// Connection opened -> Subscribe
socket.addEventListener('open', function(event) {
    socket.send(JSON.stringify({ 'type': 'subscribe', 'symbol': 'BINANCE:BTCUSDT' }))
    socket.send(JSON.stringify({ 'type': 'subscribe', 'symbol': 'BINANCE:ETHUSDT' }))
    socket.send(JSON.stringify({ 'type': 'subscribe', 'symbol': 'BINANCE:EURUSDT' }))
});

// Listen for messages
socket.addEventListener('message', function(event) {

    var arr = JSON.parse(event.data).data,
        finance_card_1 = $('#card_finance_1'),
        finance_card_2 = $('#card_finance_2'),
        finance_card_3 = $('#card_finance_3'),
        finance_card_4 = $('#card_finance_4');

    arr.forEach(datas => {

        if (datas.s == "BINANCE:BTCUSDT") {

            finance_card_1.html(`<div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title"><i class="fab fa-bitcoin text-success me-2"></i>Bitcoin</h5>
                <p class="card-text">${datas.p} $</p>
            </div>
        </div>`);

        }

        if (datas.s == "BINANCE:ETHUSDT") {

            finance_card_2.html(`<div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title"><i class="fab fa-ethereum text-warning me-2"></i>Ethereum</h5>
                <p class="card-text">${datas.p} $</p>
            </div>
        </div>`);

        }

        if (datas.s == "BINANCE:EURUSDT") {

            finance_card_3.html(`<div class="card mt-2 mb-4">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-euro-sign text-info me-2"></i>Euro</h5>
                <p class="card-text">${datas.p} $</p>
            </div>
        </div>`);

        }
    })


});