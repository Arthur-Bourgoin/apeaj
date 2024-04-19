import * as helpers from '/assets/js/functions.js';

helpers.eventChangePicture("#inputImgCurrentUser", "#imgCurrentUser");
helpers.changeModalPwd("#profileConsultation");
helpers.initModalAdminPwd("#profileConsultation", currentUser, true);
document.querySelector('#profileConsultation form').addEventListener('submit', e => helpers.verifPwdModal(e, ".input-pwd", "#profileConsultation"));

// Sélectionnez le bouton qui ouvre la modal
const openModalButton = document.querySelector('#openModalProfilButton');
// Ajoutez un écouteur d'événements pour détecter le clic sur le bouton d'ouverture de la modal
openModalButton.addEventListener('click', function () {
    // Mettez à jour les champs avec les données de l'utilisateur courant
    helpers.initModalAdminPwd("#profileConsultation", currentUser, false);
});