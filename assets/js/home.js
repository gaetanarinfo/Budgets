$(document).ready(function() {

    $('#form-sub').submit(function(event) {

        $('#progress').show();

        setTimeout(() => {

            performSearch(event);

        }, 1000);

        return false;

    });

});

function performSearch(event) {
    var request;
    event.preventDefault();
    $("#city-name").text("");
    $("#city-temp").text("");
    $("#city-img").attr('src', "");
    $("#city-weather").text("");

    // Send the request
    request = $.ajax({
        url: 'https://api.openweathermap.org/data/2.5/weather',
        type: "GET",
        data: {
            q: $("#city").val(),
            appid: '11e4274f4ede847ad20a12a8f70fdd95', // put your appid
            units: 'metric'
        }
    });

    // Callback handler for success
    request.done(function(response) {
        formatSearchResults(response);
    });

    // Callback handler for failure
    request.fail(function() {
        $("#city-name").text("Veuillez réessayer, saisie incorrecte !");
        $("#city-temp").text("");
        $("#city-img").attr('src', "");
        $("#city-weather").text("");
    });

}

function formatSearchResults(jsonObject) {

    const settings = {
        "async": false,
        "crossDomain": false,
        "url": "https://google-translate20.p.rapidapi.com/translate",
        "method": "POST",
        "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "x-rapidapi-key": "30a4456310msh35ea3e2a34f659bp13ec63jsnf22f04f6cd26",
            "x-rapidapi-host": "google-translate20.p.rapidapi.com"
        },
        "data": {
            "text": jsonObject.weather[0].main,
            "tl": "fr",
            "sl": "en"
        }
    };

    var city_name = jsonObject.name;
    city_name = city_name + ", " + jsonObject.sys.country;
    $.ajax(settings).done(function(res) {

        $('#progress').hide();

        var city_weather = res.data.translation;

        var city_temp = jsonObject.main.temp;
        var city_temp_min = jsonObject.main.temp_min;
        var city_temp_max = jsonObject.main.temp_max;
        var imgurl = 'https://openweathermap.org/img/wn/' + jsonObject.weather[0].icon + '@2x.png';
        $("#city-img").attr('src', imgurl);
        $("#city-name").text(city_name);
        $("#city-weather").text(city_weather);
        $("#city-temp").text("Température actuel : " + city_temp + " °");
        $("#city-temp-min").text("Température minimum : " + city_temp_min + " °");
        $("#city-temp-max").text("Température maximum : " + city_temp_max + " °");

    });
}