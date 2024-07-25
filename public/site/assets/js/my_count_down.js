let default_labels = {
    d: "روز",
    h: "ساعت",
    m: "دقیقه",
    s: "ثانیه",
}

function startMyCountDown(time = "Jan 5, 2024 15:37:25", id = '', labels = default_labels) {
    var countDownDate = new Date(time).getTime();

    var x = setInterval(function () {
        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById(id).innerHTML =
            "<div class='my_count_down_badge'>" + days + " <span>" + labels.d + "</span> </div>" +
            "<div class='my_count_down_badge'>" + hours + " <span>" + labels.h + "</span> </div>" +
            "<div class='my_count_down_badge'>" + minutes + " <span>" + labels.m + "</span> </div>" +
            "<div class='my_count_down_badge'>" + seconds + " <span>" + labels.s + "</span> </div>";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById(id).innerHTML = "EXPIRED";
        }
    }, 1000);
}
