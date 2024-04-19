import * as helpers from '/assets/js/functions.js';
import  { CommentStudent } from "../class/CommentStudent.js";
import {User} from "../class/User.js";


const currentStudent = new User(student);

helpers.removeDivFeedback(".alert");
const comments = commentsStudentTab.map(comment => {
    const combinedId = `${comment.idStudent}-${comment.educator.idUser}`;
    return new CommentStudent({ ...comment, combinedId });
});

document.querySelectorAll(".comment-container div button:nth-child(1)").forEach(btn => {
    btn.addEventListener("click", e => {
        e.stopPropagation();
        const ids = e.currentTarget.dataset;
        const combinedId = `${ids.idStudent}-${ids.idEducator}`;
        const comment = comments.find(comment => comment.combinedId === combinedId);
        if (comment) {
            comment.updateModal();
        }
    });
});

document.querySelectorAll(".btn-delete-comment").forEach(form => {
    form.addEventListener("click", e => {
        e.stopPropagation();
        if(!window.confirm("Voulez vous vraiment supprimer ce commentaire ?"))
            e.preventDefault();
    });
});

document.querySelectorAll(".comment-container").forEach(divCom => {
    divCom.addEventListener("click", e => {
        const msg = new SpeechSynthesisUtterance();
        msg.voice = speechSynthesis.getVoices()[2];
        msg.text = e.currentTarget.querySelector("p").innerText;
        msg.lang = 'fr';
        speechSynthesis.speak(msg);
    })
});

document.querySelector(".button-update").addEventListener("click", e => {
    e.stopPropagation();
    currentStudent.updateModifModal('#ModalModifie');
});

helpers.removeDivFeedback(".alert");

helpers.eventChangePicture("#inputImgUser", "#imgUser");
helpers.removeDivFeedback(".alert");
helpers.changeModalPwd("#ModalModifie");
helpers.initModalPwd("#ModalModifie", 0, true);
document.querySelector('#ModalModifie form').addEventListener('submit', e => helpers.verifPwdModal(e, ".input-pwd", "#ModalModifie"));

