import * as helpers from '/assets/js/functions.js';
import { CommentForm } from "../class/CommentForm.js";

helpers.eventChangePicture("#inputImgForm", "#imgForm");
helpers.removeDivFeedback();

const comments = new Map();
commentsTab.forEach(comment => {
    comments.set(comment.idCommentForm, new CommentForm(comment));
});
document.querySelectorAll(".comment-container div button:nth-child(1)").forEach(btn => {
    btn.addEventListener("click", e => {
        e.stopPropagation();
        comments.get(parseInt(e.currentTarget.dataset.id)).updateModal();
    });
});


document.querySelectorAll(".comment-container form button").forEach(form => {
    form.addEventListener("click", e => {
        e.stopPropagation();
        if(!window.confirm("Voulez vous vraiment supprimer ce commentaire ?"))
            e.preventDefault();
    });
});

document.querySelectorAll(".btn-delete-picture").forEach(form => {
    form.addEventListener("click", e => {
        e.stopPropagation();
        if(!window.confirm("Voulez vous vraiment supprimer cette photo ?"))
            e.preventDefault();
    });
});

document.querySelector(".btn-finish-form")?.addEventListener("click", e => {
    if(!window.confirm("Voulez vous vraiment modifier l'état de la fiche à 'terminée' ?"))
            e.preventDefault();
});

document.querySelector(".btn-remove-form")?.addEventListener("click", e => {
    if(!window.confirm("Voulez vous vraiment supprimer cette fiche ?"))
            e.preventDefault();
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