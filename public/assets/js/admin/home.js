import * as helpers from '/assets/js/functions.js';
import {User} from "../class/User.js";


const students = new Map();
studentsTab.forEach( student => {
    students.set(student.idUser , new User(student));
});

document.querySelectorAll(".button-update").forEach(btn => {
    btn.addEventListener("click", e => {
        e.stopPropagation();
        students.get(parseInt(e.currentTarget.dataset.id)).updateModifModal('#ModalModifie');
    });
});
helpers.eventChangePicture("#inputImgUser", "#imgUser");
helpers.removeDivFeedback(".alert");
helpers.changeModalPwd("#ModalModifie");
helpers.initModalPwd("#ModalModifie", 0, true);
document.querySelector('#ModalModifie form').addEventListener('submit', e => helpers.verifPwdModal(e, ".input-pwd", "#ModalModifie"));
helpers.eventChangePicture("#inputImgPicto", "#imgPicto");
helpers.eventChangePicture("#inputImgMaterial", "#imgMaterial");
helpers.removeDivFeedback();

document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('addTypeButton').addEventListener('click', addNewTypeSelector);
});




function addNewTypeSelector() {
    var newSelect = document.createElement("select");
    newSelect.setAttribute("name", "type[]");
    newSelect.classList.add("form-select", "my-2");

    // Options à ajouter dans le nouveau sélecteur
    var options = [
        { value: "", text: "Sélectionner un type" },
        { value: "electricite", text: "Electricité" },
        { value: "plomberie", text: "Plomberie" },
        { value: "construction", text: "Construction" },
        { value: "quincaillerie", text: "Quincaillerie" },
        { value: "menuiserie", text: "Menuiserie" },
        { value: "isolation", text: "Isolation" },
        { value: "equipements sanitaires", text: "Equipements sanitaires" },
        { value: "esthetique", text: "Esthetique" },
        { value: "interieur", text: "Intérieur" },
        { value: "tuyauterie", text: "Tuyauterie" }
    ];

    // Création et ajout des options au sélecteur
    options.forEach(optionData => {
        var option = document.createElement("option");
        option.value = optionData.value;
        option.text = optionData.text;
        newSelect.appendChild(option);
    });

    // Ajout du nouvel élément select au conteneur
    document.getElementById("typeSelectorsContainer").appendChild(newSelect);
}
