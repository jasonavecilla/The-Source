
$(document).ready(function() {

  $('.counter').each(function () {
    $(this).prop('Counter',0).animate({
      Counter: $(this).text()
      }, {
      duration: 4000,
      easing: 'swing',
      step: function (now) {
        $(this).text(addCommas(Math.ceil(now)));
      }
    });
  });

});

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}



$(document).ready(function() {
    document.getElementById('copyright-year').appendChild(
      document.createTextNode(
        new Date().getFullYear()
      )
    );
});