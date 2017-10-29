(function() {
    'use strict';

    let alertMessage = document.querySelector('.alert.alert-success'),
        errorMessage = document.querySelector('.alert.alert-danger');

    if(alertMessage) {
        setTimeout(function() {

            alertMessage.classList.add('fadeout');

            setTimeout(function() {

                alertMessage.remove();

            }, 1000);
        }, 3000);
    }

    if(errorMessage) {
        setTimeout(function() {

            errorMessage.classList.add('fadeout');

            setTimeout(function() {

                errorMessage.remove();

            }, 1000);
        }, 6000);
    }





})();
