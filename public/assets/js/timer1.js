
var sec         = 900,
    countDiv    = document.getElementById("timer"),
    secpass,
    countDown   = setInterval(function () {
        'use strict';

        secpass();
    }, 1000);

function secpass() {
    'use strict';


    var min     = Math.floor(sec / 60),
        remSec  = sec % 60;

    if (remSec < 10) {

        remSec = '0' + remSec;

    }
    if (min < 10) {

        min = '0' + min;

    }
    countDiv.innerHTML = min + ":" + remSec;

    if (sec > 0) {

        sec = sec - 1;

    } else {

        clearInterval(countDown);

        $.ajax({
            type: "GET",
            url: "/api/empty-cart-after-counter-down",
            success: function (data) {
                if( data == "done" ){
                    location.reload(true);
                }
            },
            error: function (data) {
                console.log("error");
            },
        });

        countDiv.innerHTML = 'countdown done';

    }
}
