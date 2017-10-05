(function() {
    'use strict';

    let alertMessage = document.querySelector('.alert.alert-success');

    if(!alertMessage) {
        return;
    }

    setTimeout(function() {

        alertMessage.classList.add('fadeout');

        setTimeout(function() {

            alertMessage.remove();

        }, 1000);
    }, 3000);




})();
