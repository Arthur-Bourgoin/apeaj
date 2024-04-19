import * as helpers from '/assets/js/functions.js';

helpers.eventChangePicture("#inputImgUser", "#imgUser");
helpers.eventChangePicture("#inputImgTraining", "#imgTraining");
helpers.removeDivFeedback();
helpers.changeModalPwd("#newUser");
helpers.initModalPwd("#newUser", 1, true);

// supprimer une formation
document.querySelectorAll(".btn-removed").forEach(btn => {
    btn.addEventListener("click", e => {
        if(!confirm("Voulez vous vraiment supprimer cette formation ?")) {
            e.preventDefault();
        } else {
            setTimeout(() => {
                window.location.href = "/";
            }, 1000);
        }
    });
});

// ajouter un utilisateur (maj de l'idTraining)
document.querySelectorAll(".btn-add-user").forEach(btn => {
    btn.addEventListener("click", e => {
        document.querySelector("#newUser form input:nth-child(2)").value = e.currentTarget.dataset.idTraining;
    });
});

document.querySelector(".btn-add-user").addEventListener("click", e => {
    helpers.initModalPwd("#newUser", 1, true);
});

// validation du formulaire et div d'erreur
document.querySelector('#newUser form').addEventListener('submit', e => helpers.verifPwdModal(e, ".input-pwd", "#newUser"));


