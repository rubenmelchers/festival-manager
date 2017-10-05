(function() {

    'use strict';

    let userSection = document.querySelector('.admin__users-section'),
        festivalSection = document.querySelector('.admin__festivals-section'),
        typesSection = document.querySelector('.admin__types-section');
        
    if(userSection) {

        let userShowButton = userSection.querySelector('.admin__showbutton'),
            usersTable = userSection.querySelector('.admin__userstable'),
            deleteButton = userSection.querySelectorAll('.admin__userdelete');

        userShowButton.addEventListener('click', function() {
            userShowButton.classList.toggle('hideTable');
            usersTable.classList.toggle('active');
        });

        deleteButton.forEach(function(el) {
            el.addEventListener('click', function(e) {
                let target = e.target,
                    parentRow = target.parentElement.parentElement;

                let userid = parentRow.querySelector('.admin__iddata').innerHTML,
                    username = parentRow.querySelector('.admin__namedata').innerHTML;


                let confirmation = document.createElement('div'),
                    textElement = document.createElement('p'),
                    confirmText = document.createTextNode(`Are you sure you want to delete user ${username}?`),
                    exitButton = document.createElement('span'),
                    applyButton = document.createElement('a'),
                    applyText = document.createTextNode(`Yes, delete ${username}`),
                    canvas = document.createElement('div');

                exitButton.classList.add('admin__confirmdelete-exitbutton');
                applyButton.classList.add('admin__confirmdelete-applybutton');
                applyButton.classList.add('btn');
                applyButton.classList.add('btn-danger');
                applyButton.appendChild(applyText);
                applyButton.setAttribute('href', `/admin/delete/user/${userid}`);
                canvas.classList.add('admin__confirmdelete-canvas');


                exitButton.addEventListener('click', function(event) {
                    let eventTarget = event.target,
                        eventParent = eventTarget.parentElement;

                    eventParent.remove();
                    canvas.remove();
                });

                textElement.appendChild(confirmText);
                confirmation.appendChild(textElement);
                confirmation.appendChild(exitButton);
                confirmation.appendChild(applyButton);
                confirmation.classList.add('admin__confirmdelete')
                canvas.appendChild(confirmation);


                let app = document.querySelector('#app');
                app.appendChild(canvas);
            });
        });

    };

    if(festivalSection) {

        let festivalShowButton = festivalSection.querySelector('.admin__showbutton'),
            festivalsTable = festivalSection.querySelector('.admin__festivalstable');

        festivalShowButton.addEventListener('click', function() {

            festivalShowButton.classList.toggle('hideTable');
            festivalsTable.classList.toggle('active');
        });
    };

    if(typesSection) {

        let typeShowButton = typesSection.querySelector('.admin__showbutton'),
            typesTable = typesSection.querySelector('.admin__typestable');

        typeShowButton.addEventListener('click', function() {

            console.log("test");

            typeShowButton.classList.toggle('hideTable');
            typesTable.classList.toggle('active');
        });
    };



})();