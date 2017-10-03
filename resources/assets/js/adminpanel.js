(function() {

    'use strict';

    let userSection = document.querySelector('.admin__users-section');

    if(userSection) {

        let userShowButton = userSection.querySelector('.admin__showbutton'),
            usersTable = userSection.querySelector('.admin__userstable');

        userShowButton.addEventListener('click', function() {

            userShowButton.classList.toggle('hideTable');
            usersTable.classList.toggle('active');
        });
    }

})();
