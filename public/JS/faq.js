$(function () {
    var apri = $(".fa-angle-down");
    var chiudi = $(".fa-angle-up");
    var x = $(".testo_risposta");

    apri.on('click', function (e) {
    y=$(".fa-angle-down").index(this);
//fa comparire la risposta e la freccia in alto e fa scomparire quella in basso
    x.eq(y).css('display', 'block');
    chiudi.eq(y).css('display', 'block');
    apri.eq(y).css('display', 'none');
});
    chiudi.on('click', function (e) {
    y=$(".fa-angle-up").index(this);
//fa scomparire la risposta e la freccia in alto e fa comparire quella in basso
    x.eq(y).css('display', 'none');
    apri.eq(y).css('display', 'block');
    chiudi.eq(y).css('display', 'none');
});
});
