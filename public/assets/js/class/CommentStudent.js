export class CommentStudent {
    idStudent;
    educator;
    text;
    lastUpdate;
    combinedID;
    
    
    constructor(obj){
        for(const property in this) {
            this[property]=obj[property];
        }
        this.combinedId = `${this.idStudent}-${this.educator.idUser}`;
    }
    updateModal() {
        const modal = document.querySelector("#ModalUpdateComs");
        modal.querySelector("#formText").value = this.text;
    }
}