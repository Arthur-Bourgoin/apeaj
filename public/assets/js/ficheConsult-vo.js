import * as helpers from '/assets/js/speechToText.js';

materials.forEach(material => {
    const num = Math.floor((material.idMaterial-0.1) / 11) + 1;
    document.querySelector("#div-fsMaterials .row .col-6:nth-child(" + num + ") select").value = material.idMaterial;
});

elements.forEach(elementForm => {
    if(elementForm.idElementForm == "fsTitle") return;
    let btn;
    let element;
    if(elementForm.type == "fieldset")
        element = document.querySelector("#div-" + elementForm.idElementForm + " legend");
    else
        element = document.querySelector("#div-" + elementForm.idElementForm);
    if(!elementForm.active) {
        document.querySelector("#div-" + elementForm.idElementForm).classList.add("d-none");
        return; // ??
    }
    // level
    switch(elementForm.level) {
        case 1:
            element.querySelector(".div-img").classList.remove("d-none");
            break;
        case 2:
            element.querySelector(".div-img").classList.remove("d-none");
            element.querySelector("label").classList.remove("d-none");
            break;
        case 3:
            element.querySelector("label").classList.remove("d-none");
            break;
    }
    // bold
    element.style.fontWeight = elementForm.bold ? "bold" : "normal";
    // italic
    element.style.fontStyle = elementForm.italic ? "italic" : "normal";
    // font size
    element.style.fontSize = elementForm.fontSize + "px";
    // font family
    element.style.fontFamily = elementForm.fontFamily;
    // font color
    element.style.color = toHexa(elementForm.fontColor);
    // background color
    if(elementForm.type == "fieldset")
        element.parentElement.style.backgroundColor = toHexa(elementForm.bgColor);
    element.style.backgroundColor = toHexa(elementForm.bgColor);
    element.style.backgroundColor = elementForm.bgColor;
    // text to speech
    if(elementForm.textToSpeechBool) {
        let icon;
        switch(elementForm.type) {
            case "text":
            case "date":
            case "time":
            case "textarea":
                const btn = document.createElement("button");
                btn.classList.add("input-group-text", "btn-audio");
                icon = document.createElement("i");
                icon.classList.add("bi", "bi-volume-up");
                btn.append(icon);
                btn.role = "button";
                btn.type = "button";
                element.querySelector(".div-input").append(btn);
                eventAudio(btn, elementForm.textToSpeechText);
                break;
            case "checkbox":
                icon = document.createElement("i");
                icon.classList.add("ms-2", "bi", "bi-volume-up", "btn-audio");
                icon.role = "button";
                element.querySelector(".div-input").append(icon);
                eventAudio(icon, elementForm.textToSpeechText);
                break;
            case "fieldset":
                icon = document.createElement("i");
                icon.classList.add("ms-2", "bi", "bi-volume-up", "btn-audio");
                icon.role = "button";
                element.append(icon);
                eventAudio(icon, elementForm.textToSpeechText);
                break;
        }
    }
    // images
    element.querySelector("img").src = "/assets/images/pictos/" + elementForm.picto;
});

document.querySelector("#btn-submit")?.addEventListener("click", e => {
    if(!confirm("Voulez vous vraiment confirmer ces informations ?"))
        e.preventDefault();
});

document.querySelector("#btn-print").addEventListener("click", e => {
    printForm();
});

function eventAudio(btn, text) {
    btn.addEventListener("click", e => {
        const msg = new SpeechSynthesisUtterance();
        msg.voice = speechSynthesis.getVoices()[2];
        msg.text = text;
        msg.lang = 'fr';
        speechSynthesis.speak(msg);
    });
}

function toHexa(rgb) {
    if(rgb[0] === "#") {
        return rgb;
    }
    const matches = rgb.match(/\d+/g);
    const r = parseInt(matches[0], 10).toString(16).padStart(2, '0');
    const g = parseInt(matches[1], 10).toString(16).padStart(2, '0');
    const b = parseInt(matches[2], 10).toString(16).padStart(2, '0');
    return `#${r}${g}${b}`;
}

function printForm() {
    elements.forEach(elementForm => {
        document.querySelector("#div-" + elementForm.idElementForm).classList.remove("d-none");
    });
    document.querySelectorAll(".div-img").forEach(element => {
        element.classList.add("d-none");
    });
    document.querySelectorAll("label").forEach(element => {
        element.classList.remove("d-none");
    });
    const original = document.body.innerHTML;
    document.querySelector("#btns-form").remove();
    const toPrint = document.querySelector("#divForm").innerHTML;
    document.body.innerHTML = toPrint;
    window.print();
    document.body.innerHTML = original;

}

helpers.speechtotext("nomIntervenant","btn-nomIntervenant");
helpers.speechtotext("prenomIntervenant","btn-prenomIntervenant");
helpers.speechtotext("applicantName","btn-applicantName");
helpers.speechtotext("urgencyDegree","btn-urgencyDegree");
helpers.speechtotext("location","btn-location");
helpers.speechtotext("description","btn-description");
helpers.speechtotext("workDone","btn-workDone");
helpers.speechtotext("workNotDone","btn-workNotDone");