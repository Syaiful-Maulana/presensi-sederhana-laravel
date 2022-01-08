function getServerTime() {
    return $.ajax({ async: false }).getResponseHeader("Date");
}
function realtimeClock() {
    var rtClock = new Date();

    var hours = rtClock.getHours();
    var minutes = rtClock.getMinutes();
    var second = rtClock.getSeconds();

    // Menampilkan AM PM
    // var amPm = (hours < 12) ? "AM" : "PM";
    // hours = (hours > 12) ? hours - 12 : hours;

    hours = ("0" + hours).slice(-2);
    minutes = ("0" + minutes).slice(-2);
    second = ("0" + second).slice(-2);

    document.getElementById("clock").innerHTML =
        hours + " : " + minutes + " : " + second;
    // + " " +amPm;
    var jamnya = setTimeout(realtimeClock, 500);
}
