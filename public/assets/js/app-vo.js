import { FormElement } from "./class/FormElement.js";
import { Form } from "./class/Form.js";
import { eventChangePicture, removeDivFeedback } from '/assets/js/functions.js';

eventChangePicture("#inputImgPicto", "#imgPicto");
removeDivFeedback();

(function createModalPictos(category = null) {
    document.querySelector("#modal-body-pictos .row").remove();
    const divRow = document.createElement("div");
    divRow.classList.add("row", "g-3");
    pictos.forEach(picto => {
        const divImg = document.createElement("div");
        divImg.classList.add("col-3", "d-flex", "align-items-center", "justify-content-center");
        divImg.style.height = "100px";
        divImg.role = "button";
        const img = document.createElement("img");
        img.src = "/assets/images/pictos/" + picto;
        img.classList.add("object-fit-contain", "mw-100", "mh-100", "border", "border-2", "border-black", "rounded");
        divImg.append(img);
        divRow.append(divImg);
        divImg.addEventListener("click", e => {
            form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.picto = e.currentTarget.firstChild.src.split("/").pop();
            document.querySelector("#modal-content-pictos").classList.add("d-none");
            document.querySelector("#modal-content-home img").src = "/assets/images/pictos/" + picto;
            document.querySelector("#modal-content-home").classList.remove("d-none");
        });
    });
    document.querySelector("#modal-body-pictos .container-fluid").append(divRow);
})();

const form = new Form(datas, null);

form.forEach((value, key) => {
    const element = value.element;
    
    element.addEventListener("click", e => {
        //e.stopPropagation();
        //e.currentTarget.classList.remove("border", "border-primary", "border-3", "rounded");
        if(e.currentTarget.querySelector(".div-hover") !== null)
            return;   
        const docFragment = document.querySelector("#template-hover").content.cloneNode(true);
        e.currentTarget.append(docFragment);
        const divHover = e.currentTarget.querySelector(".div-hover");
        const timeout = setTimeout(() => {
            element.querySelector(".div-hover").remove();
        }, 1500);
        divHover.querySelector("button:nth-child(1)").addEventListener("click", e => {
            e.stopPropagation();
            clearTimeout(timeout);
            value.textToSpeechBool = !value.textToSpeechBool;
            value.updateDOM();
            element.querySelector(".div-hover").remove();
        }, {passive: true});
        divHover.querySelector("button:nth-child(2)").addEventListener("click", e => {
            e.stopPropagation();
            clearTimeout(timeout);
            value.active = !value.active;
            value.updateDOM();
            element.querySelector(".div-hover").remove();
        },  {passive: true});
        divHover.querySelector("button:nth-child(3)").addEventListener("click", e => {
            e.stopPropagation();
            clearTimeout(timeout);
            value.updateModal();
            element.querySelector(".div-hover").remove();
        },  {passive: true});
    }, {passive: true});
});

// button cancel
document.querySelectorAll("#btn-modal-cancel, #btn-cross-modal").forEach(btn => {
    btn.addEventListener("click", e => {
        form.get(document.querySelector("#staticBackdrop").dataset.idElement).clearTemp();
    });
});

// button confirm
document.querySelector("#btn-modal-confirm").addEventListener("click", e => {
    const elem = form.get(document.querySelector("#staticBackdrop").dataset.idElement);
    elem.updateThisFromTemp();
    elem.updateDOM();
})

/*####################
#      SELECTORS     #
#####################*/

// Selectors level
document.querySelectorAll(".modal-level").forEach(check => {
    check.addEventListener("click", e => {
        const level = parseInt(check.id.charAt(check.id.length - 1), 10);
        switch(level) {
            case 1:
                document.querySelector("#modal-body-home .row:nth-child(2) .div-img").classList.remove("d-none");
                document.querySelector("#modal-body-home .row:nth-child(2) label").classList.add("d-none");
                break;
            case 2:
                document.querySelector("#modal-body-home .row:nth-child(2) .div-img").classList.remove("d-none");
                document.querySelector("#modal-body-home .row:nth-child(2) label").classList.remove("d-none");
                break;
            case 3:
                document.querySelector("#modal-body-home .row:nth-child(2) .div-img").classList.add("d-none");
                document.querySelector("#modal-body-home .row:nth-child(2) label").classList.remove("d-none");
                break;
        }
        form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.level = level;
    });
});

// Selector font color
document.querySelector("#modal-fontColor").addEventListener("input", e => {
    document.querySelector("#modal-body-home .row:nth-child(2) div").style.color = e.currentTarget.value;
    form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.fontColor =  e.currentTarget.value;
});

// Selector background color
document.querySelector("#modal-bgColor").addEventListener("input", e => {
    document.querySelector("#modal-body-home .row:nth-child(2) div").style.backgroundColor = e.currentTarget.value;
    form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.bgColor =  e.currentTarget.value;
});

// // Selector text
// document.querySelector("#modal-body-home .row:nth-child(2) input").addEventListener("input", e => {
//     form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.text =  e.currentTarget.value;
// });

// Selector font size (range)
document.querySelector("#modal-fontSizeRange").addEventListener("input", e => {
    const elem = form.get(document.querySelector("#staticBackdrop").dataset.idElement);
    document.querySelector("#modal-fontSizeInput").value = e.currentTarget.value;
    if(elem.type == "fieldset")
        document.querySelector("#modal-body-home .row:nth-child(2) div legend").style.fontSize = e.currentTarget.value + "px";
    else
        document.querySelector("#modal-body-home .row:nth-child(2) div").style.fontSize = e.currentTarget.value + "px";
    elem.temp.fontSize = e.currentTarget.value;
});

// Selector font size (input)
document.querySelector("#modal-fontSizeInput").addEventListener("input", e => {
    const elem = form.get(document.querySelector("#staticBackdrop").dataset.idElement);
    document.querySelector("#modal-fontSizeRange").value = e.currentTarget.value;
    if(elem.type == "fieldset")
        document.querySelector("#modal-body-home .row:nth-child(2) div legend").style.fontSize = e.currentTarget.value + "px";
    else
        document.querySelector("#modal-body-home .row:nth-child(2) div").style.fontSize = e.currentTarget.value + "px";
    elem.temp.fontSize = e.currentTarget.value;
});

// Selector font family
document.querySelector("#modal-fontFamily").addEventListener("change", e => {
    e.currentTarget.style.fontFamily = e.currentTarget.value;
    document.querySelector("#modal-body-home .row:nth-child(2) div").style.fontFamily = e.currentTarget.value;
    form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.fontFamily = e.currentTarget.value;
});

// Selector bold
document.querySelector("#modal-bold").addEventListener("input", e => {
    if(e.currentTarget.checked) {
        document.querySelector("#modal-body-home .row:nth-child(2) div").style.fontWeight = "bold"
        form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.bold = true;
    } else {
        document.querySelector("#modal-body-home .row:nth-child(2) div").style.fontWeight = "normal"
        form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.bold = false;
    }
});

// Selector italic
document.querySelector("#modal-italic").addEventListener("input", e => {
    if(e.currentTarget.checked) {
        document.querySelector("#modal-body-home .row:nth-child(2) div").style.fontStyle = "italic";
        form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.italic = true;
    } else {
        document.querySelector("#modal-body-home .row:nth-child(2) div").style.fontStyle = "normal"
        form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.italic = false;
    }
});

// Selector text to speech 
document.querySelector("#modal-tts").addEventListener("input", e => {
    const elem = form.get(document.querySelector("#staticBackdrop").dataset.idElement);
    const divModal = document.querySelector("#modal-body-home .row:nth-child(2) div");
    let icon;
    if(e.currentTarget.checked) {
        if(divModal.querySelector(".btn-audio") === null) {
            switch(elem.type) {
                case "text":
                case "date":
                case "time":
                case "textarea":
                    const btn = document.createElement("button");
                    btn.classList.add("input-group-text", "pe-none", "btn-audio");
                    icon = document.createElement("i");
                    icon.classList.add("bi", "bi-volume-up");
                    btn.append(icon);
                    divModal.querySelector(".div-input").append(btn);
                    break;
                case "checkbox":
                    icon = document.createElement("i");
                    icon.classList.add("ms-2", "bi", "bi-volume-up", "btn-audio");
                    divModal.querySelector(".div-input").append(icon);
                    break;
                case "fieldset":
                    icon = document.createElement("i");
                    icon.classList.add("ms-2", "bi", "bi-volume-up", "btn-audio");
                    divModal.querySelector("legend").append(icon);
                    break;
            }
        }
        elem.textToSpeechBool = true;
    } else {
        document.querySelector("#modal-body-home .row:nth-child(2) .btn-audio")?.remove();
        elem.textToSpeechBool = false;
    }
});

// Selector modif text to speech
document.querySelector("#modal-modiftts").addEventListener("click", e => {
    e.stopPropagation();
    e.preventDefault();
    document.querySelector("#modal-content-tts textarea").value = form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.textToSpeechText;
    document.querySelector("#modal-content-home").classList.add("d-none");
    document.querySelector("#modal-content-tts").classList.remove("d-none");
});


/* ######################
   MODAL TEXT TO SPEECH
########################*/

document.querySelector("#modal-body-tts #div-buttons button:nth-child(1)").addEventListener("click", e => {
    document.querySelector("#modal-content-tts").classList.add("d-none");
    document.querySelector("#modal-content-home").classList.remove("d-none");
});

document.querySelector("#modal-body-tts #div-buttons button:nth-child(2)").addEventListener("click", e => {
    form.get(document.querySelector("#staticBackdrop").dataset.idElement).temp.textToSpeechText = document.querySelector("#modal-body-tts textarea").value;
    document.querySelector("#modal-content-tts").classList.add("d-none");
    document.querySelector("#modal-content-home").classList.remove("d-none");
});

document.querySelector("#modal-body-tts div:nth-child(1) button").addEventListener("click", e => {
    const msg = new SpeechSynthesisUtterance();
    msg.voice = speechSynthesis.getVoices()[2];
    msg.text = document.querySelector("#modal-body-tts textarea").value;
    msg.lang = 'fr';
    speechSynthesis.speak(msg);
});


/*################
   MODAL PICTOS
################*/

document.querySelector("#modal-content-pictos .btn-close").addEventListener("click", e => {
    document.querySelector("#modal-content-pictos").classList.add("d-none");
    document.querySelector("#modal-content-home").classList.remove("d-none");
});


/*######################
    GLOBAL SELECTORS    
#######################*/

// background color
document.querySelector("#bgColor").addEventListener("input", e => {
    document.querySelector("#divForm").style.backgroundColor = e.currentTarget.value;
});

// background color
document.querySelector("#global-bgColor").addEventListener("input", e => {
    form.forEach(element => {
        element.bgColor = e.currentTarget.value;
        element.updateDOM();
    });
    document.querySelector("#bgColor").value = e.currentTarget.value;
    document.querySelector("#divForm").style.backgroundColor = e.currentTarget.value;
});

// text to speech
document.querySelector("#global-tts").addEventListener("input", e => {
    form.forEach(element => {
        element.textToSpeechBool = e.currentTarget.checked;
        element.updateDOM();
    });
});

// font color
document.querySelector("#global-fontColor").addEventListener("input", e => {
    form.forEach(element => {
        element.fontColor = e.currentTarget.value;
        element.updateDOM();
    });
});

// font family
document.querySelector("#global-fontFamily").addEventListener("change", e => {
    form.forEach(element => {
        element.fontFamily = e.currentTarget.value;
        element.updateDOM();
    });
});

// bold
document.querySelector("#global-bold").addEventListener("input", e => {
    form.forEach(element => {
        element.bold = e.currentTarget.checked;
        element.updateDOM();
    });
});

// italic
document.querySelector("#global-italic").addEventListener("input", e => {
    form.forEach(element => {
        element.italic = e.currentTarget.checked;
        element.updateDOM();
    });
});

// level
document.querySelectorAll(".global-level").forEach(check => {
    check.addEventListener("change", e => {
        const level = parseInt(check.id.charAt(check.id.length - 1), 10);
        form.forEach(element => {
            element.level = level;
            element.updateDOM();
        });
    });
});

// font size field
document.querySelector("#global-fontSizeInput-field").addEventListener("input", e => {
    document.querySelector("#global-fontSizeRange-field").value = e.currentTarget.value;
    form.forEach(element => {
        if(element.type != "fieldset") {
            element.fontSize = e.currentTarget.value;
            element.updateDOM();
        }
    });
});
document.querySelector("#global-fontSizeRange-field").addEventListener("input", e => {
    document.querySelector("#global-fontSizeInput-field").value = e.currentTarget.value;
    form.forEach(element => {
        if(element.type != "fieldset") {
            element.fontSize = e.currentTarget.value;
            element.updateDOM();
        }
    });
});

// font size frame
document.querySelector("#global-fontSizeInput-frame").addEventListener("input", e => {
    document.querySelector("#global-fontSizeRange-frame").value = e.currentTarget.value;
    form.forEach(element => {
        if(element.type == "fieldset") {
            element.fontSize = e.currentTarget.value;
            element.updateDOM();
        }
    });
});
document.querySelector("#global-fontSizeRange-frame").addEventListener("input", e => {
    document.querySelector("#global-fontSizeInput-frame").value = e.currentTarget.value;
    form.forEach(element => {
        if(element.type == "fieldset") {
            element.fontSize = e.currentTarget.value;
            element.updateDOM();
        }
    });
});


/*#################
    FORMULAIRE    
##################*/

// document.querySelector("#btn-sendForm").addEventListener("click", e => {
//     document.querySelector("#form-json").value = JSON.stringify(Array.from(form.getMap().values()));
//     document.querySelector("#form-bgColor").value = document.querySelector("#bgColor").value;
// });

document.querySelectorAll("#modal-session tr").forEach(tr => {
    tr.addEventListener("click", e => {
        if(confirm("Confirmation des informations")) {
            document.querySelector("#form-idSession").value = e.currentTarget.dataset.id;
            document.querySelector("#form-json").value = JSON.stringify(Array.from(form.getMap().values()));
            document.querySelector("#form-bgColor").value = document.querySelector("#bgColor").value;
            document.querySelector("#formDatas").submit();
        }
    });
});


document.addEventListener("keyup", e => {
    if(!document.querySelector("#staticBackdrop").classList.contains("show") || document.querySelector("#modal-content-home").classList.contains("d-none"))
        return;
    switch(e.key) {
        case "1":
        case "2":
        case "3":
            document.querySelectorAll("#modal-level input").forEach(checkbox => {
                if( checkbox.id.charAt(checkbox.id.length - 1) === e.key ) {
                    checkbox.checked = true;
                    checkbox.dispatchEvent(new Event("click"));
                } else {
                    checkbox.checked = false;
                }
            });
            break;
        case "i":
        case "I":
            const checkboxItalic = document.querySelector("#modal-italic");
            checkboxItalic.checked = !checkboxItalic.checked;
            checkboxItalic.dispatchEvent(new Event("input"));
            break;
        case "b":
        case "B":
            const checkboxBold = document.querySelector("#modal-bold");
            checkboxBold.checked = !checkboxBold.checked;
            checkboxBold.dispatchEvent(new Event("input"));
            break;
        case "t":
        case "T":
            const checkboxTts = document.querySelector("#modal-tts");
            checkboxTts.checked = !checkboxTts.checked;
            checkboxTts.dispatchEvent(new Event("input"));
            break;
        case "Enter":
            document.querySelector("#btn-modal-confirm").dispatchEvent(new Event("click"));
            break;
        case "Escape":
            document.querySelector("#btn-modal-cancel").dispatchEvent(new Event("click"));
            break;
    }
});