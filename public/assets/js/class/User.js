import { initModalPwd } from "/assets/js/functions.js";

export class User {

    idUser;
    login;
    lastName;
    firstName;
    picture;
    typePwd;
    role;
    idTraining;
    

    constructor(obj) {
        this.idUser = obj.idUser;
        this.login = obj.login;
        this.lastName = obj.lastName;
        this.firstName= obj.firstName;
        this.picture = obj.picture;
        this.typePwd= obj.typePwd;
        this.role = obj.role;
        this.idTraining = obj.idTraining;
    }

    updateConnexionModal() {
        const modal = document.querySelector(this.typePwd === 1 ? '#modalConnexionTexte' : '#modalConnexionCode');
        modal.querySelector('.modal-title').textContent = this.lastName + ' ' + this.firstName;
        modal.querySelector('.input-group input').value = "";
        modal.querySelector('.input-group input').type = "password";
        modal.querySelector('.input-group button').innerHTML = "<i class='bi bi-eye'></i>";
        modal.querySelector('img').src = this.picture;
        modal.querySelector(".loginStudent").value = this.login;
    }

    updateModifModal(selectorModal) {
        const modal = document.querySelector(selectorModal);
        modal.querySelector('#inputLastName').value= this.lastName;
        modal.querySelector('#inputFirstName').value= this.firstName;
        modal.querySelector('img').src = this.picture;
        modal.querySelector('#inputTypePwd').value = this.typePwd;
        modal.querySelectorAll(".input-pwd").forEach(input => input.value = "");
        modal.querySelector("#idUser").value = this.idUser;
        initModalPwd(selectorModal, this.typePwd, false);
        if(this.role !== "student") {
            modal.querySelector(".selectRole").value = this.role;
        }
    }

}