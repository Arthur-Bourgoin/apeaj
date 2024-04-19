export class CommentForm {

    idCommentForm;
    wording;
    text;
    audio;
    admin;
    lastModif;
    idAuthor;
    note;
    numero;
    idStudent;

    constructor(obj){
        for(const property in this) {
            this[property]=obj[property];
        }
    }

    updateModal() {
        const modal = document.querySelector("#ModalUpdateComs");
        modal.querySelector("#formWording").value = this.wording;
        modal.querySelector("#formText").value = this.text;
        modal.querySelector("#idCommentForm").value = this.idCommentForm;
        modal.querySelector("#formNote").value = this.note;
        modal.querySelector("#admin").checked = this.admin;
    }

}