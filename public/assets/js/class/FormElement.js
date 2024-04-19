import {speechtotext} from '../speechToText.js';
export class FormElement {
  
   
    idElementForm;
    label; // OK
    level;
    picto;
    active; // OK
    bold; // OK
    fontFamily; // OK
    fontSize; // OK
    fontColor; // OK
    bgColor; // OK
    textToSpeechText; 
    textToSpeechBool;
    speechToTextBool; // OK

    type;
    text;

    temp; // contains temporary values (modal)
    #element; // HTMLelement

    /**
     * Creates an instance of FormElement.
     * @param {object} obj
     * @memberof FormElement
     */
    constructor(obj) {
        this.idElementForm = obj.idElementForm;
        this.type = obj.type;
        this.label = obj.label;
        this.picto = obj.picto;
        this.level = 2;
        this.active = true;
        this.bold = false;
        this.fontFamily = "'Segoe UI', sans-serif";
        this.fontSize = obj.type == "fieldset" ? 20 : 16;
        this.fontColor = "#000000";
        this.bgColor = "#FFFFFF";
        this.textToSpeechText = obj.label;
        this.textToSpeechBool = true;
        this.speechToTextBool =false;
        // for (const property in this) {
        //     this[property] = obj[property];
        // }
        if(this.type == "fieldset")
            this.#element = document.querySelector("#div-" + this.idElementForm + " legend");
        else
            this.#element = document.querySelector("#div-" + this.idElementForm); 
        // if(this.#element == null)
        this.temp = {};
    }

    get element() {
        return this.#element;
    }

    updateDOM() {
        if(this.type==='materials'){
            document.querySelector("#div-materials").innerHTML="";
            document.querySelector("#div-materials").append(document.querySelector("#template-materials-" + this.level).content.cloneNode(true));
        }else{
            switch(this.level) {
                case 1:
                    this.#element.querySelector(".div-img").classList.remove("d-none");
                    this.#element.querySelector("label").classList.add("d-none");
                    break;
                case 2:
                    this.#element.querySelector(".div-img").classList.remove("d-none");
                    this.#element.querySelector("label").classList.remove("d-none");
                    break;
                case 3:
                    this.#element.querySelector(".div-img").classList.add("d-none");
                    this.#element.querySelector("label").classList.remove("d-none");
                    break;
            }
        }
    
        // Text
        // this.#element.querySelector(".field").value ="azerty";
        // Bold
        this.#element.style.fontWeight = this.bold ? "bold" : "normal";
        // Font size
        this.#element.style.fontSize = this.fontSize + "px";
        // Font family
        this.#element.style.fontFamily = this.fontFamily;
        // Font color
        this.#element.style.color = toHexa(this.fontColor);
        // Background color
        if(this.type === "fieldset")
            this.#element.parentElement.style.backgroundColor = toHexa(this.bgColor);
        if(this.type !== "materials")
            this.#element.style.backgroundColor = toHexa(this.bgColor);
        this.#element.querySelectorAll(".div-material").forEach(divMaterial => {
            divMaterial.style.backgroundColor = toHexa(this.bgColor);
        });
        // Text to speech
        if(this.textToSpeechBool) {
            if(this.#element.querySelector(".btn-audio") === null) {
                let icon;
                switch(this.type) {
                    case "text":
                    case "date":
                    case "time":
                    case "textarea":
                        const btn = document.createElement("button");
                        btn.classList.add("input-group-text", "pe-none", "btn-audio");
                        icon = document.createElement("i");
                        icon.classList.add("bi", "bi-volume-up");
                        btn.append(icon);
                        this.#element.querySelector(".div-input").append(btn);
                        break;
                    case "checkbox":
                        icon = document.createElement("i");
                        icon.classList.add("ms-2", "bi", "bi-volume-up", "btn-audio");
                        this.#element.querySelector(".div-input").append(icon);
                        break;
                    case "fieldset":
                        icon = document.createElement("i");
                        icon.classList.add("ms-2", "bi", "bi-volume-up", "btn-audio");
                        this.#element.append(icon);
                        break;
                    case "materials":
                        const btnmat = document.createElement("button");
                        btnmat.classList.add("pe-none", "btn-audio", "ms-2","btn","btn-primary");
                        const iconmat = document.createElement("i");
                        iconmat.classList.add("bi", "bi-volume-up");
                        btnmat.append(iconmat);
                        this.#element.querySelector(".material-buttons").append(btnmat);
                        break;
                }
            }
        } else {
            this.#element.querySelector(".btn-audio")?.remove();            
        }
        // speech to text
        if(this.speechToTextBool){
            if(this.#element.querySelector(".btn-speech") === null) {
                if ((this.type === "text" || this.type === "textarea") &&
                this.idElementForm !== "applicantName" &&
                this.idElementForm !== "urgencyDegree" &&
                this.idElementForm !== "location" &&
                this.idElementForm !== "description") {
                    const btn = document.createElement("button");
                    btn.classList.add("input-group-text", "btn-speech");
                    const icon = document.createElement("i");
                    icon.classList.add("bi", "bi-mic-fill");
                    btn.append(icon);
                    btn.role = "button";
                    btn.type = "button";
                    this.#element.querySelector(".div-input").append(btn);
                    speechtotext(this.#element.querySelector(".div-input input"),btn);
                }
            }
        }else {
            this.#element.querySelector(".btn-speech")?.remove();
        }
        // Hidden/active element
        if(this.active) {
            document.querySelector("#div-" + this.idElementForm).style.opacity="1"; 
        } else {
            document.querySelector("#div-" + this.idElementForm).style.opacity="0.25"; 
        }
        // Images
        if(this.type !== "materials"){
            const img = this.#element.querySelector("img");
            img.src = "/assets/images/pictos/" + this.picto;
        }
    }
    
    updateModal() {
        const modal = document.querySelector("#staticBackdrop");
        modal.dataset.idElement = "#div-" + this.idElementForm;
        const row = modal.querySelector("#modal-body-home .row:nth-child(2)");
        modal.querySelector("#modal-speechToTextBool").classList.remove("pe-none");
        let div; 
        row.innerText = "";
        if(this.type === "materials") {
            row.append(document.querySelector("#template-materials-" + this.level).content.cloneNode(true));
            div = row.firstElementChild;
        } else {
            row.append(document.querySelector("#template-" + this.type).content.cloneNode(true));
            div = row.firstElementChild;
            switch(this.level) {
                case 1:
                    div.querySelector(".div-img").classList.remove("d-none");
                    break;
                case 2:
                    div.querySelector(".div-img").classList.remove("d-none");
                    div.querySelector("label").classList.remove("d-none");
                    break;
                case 3:
                    div.querySelector("label").classList.remove("d-none");
                    break;
            }
        }
        this.temp.textToSpeechText = this.textToSpeechText;        
        modal.querySelector("#modal-level-" + this.level).checked = true;
        // label
        if(this.type !== "materials"){
        div.querySelector("label").innerText = this.label;
        }
        // bold
        div.style.fontWeight = this.bold ? "bold" : "normal";
        modal.querySelector("#modal-bold").checked = this.bold;

        modal.querySelector("#modal-speechToTextBool").checked = this.speechToTextBool;
        if ((this.type === "text" || this.type === "textarea") && (
        this.idElementForm === "applicantName" ||
        this.idElementForm === "urgencyDegree" ||
        this.idElementForm === "location" ||
        this.idElementForm === "description")) {
            modal.querySelector("#modal-speechToTextBool").classList.add("pe-none");
            modal.querySelector("#modal-speechToTextBool").previousElementSibling.classList.add("pe-none");
        }
        // font family
        div.style.fontFamily = this.fontFamily;
        modal.querySelector("#modal-fontFamily").style.fontFamily = this.fontFamily;
        modal.querySelector("#modal-fontFamily").value = this.fontFamily;
        // font color
        div.style.color = toHexa(this.fontColor);
        modal.querySelector("#modal-fontColor").value = toHexa(this.fontColor);
        // font size
        div.style.fontSize = this.fontSize + "px";
        modal.querySelector("#modal-fontSizeRange").value = this.fontSize;
        modal.querySelector("#modal-fontSizeInput").value = this.fontSize;
        // background color
        div.style.backgroundColor = toHexa(this.bgColor);
        modal.querySelector("#modal-bgColor").value = toHexa(this.bgColor);
        // text to speech
        let icon;
        if(this.textToSpeechBool) {
            // if(querySelector("btn-audio") != null) inutile car true
            switch(this.type) {
                case "text":
                case "date":
                case "time":
                case "textarea":
                    const btn = document.createElement("button");
                    btn.classList.add("input-group-text", "pe-none", "btn-audio");
                    icon = document.createElement("i");
                    icon.classList.add("bi", "bi-volume-up");
                    btn.append(icon);
                    div.querySelector(".div-input").append(btn);
                    break;
                case "checkbox":
                    icon = document.createElement("i");
                    icon.classList.add("ms-2", "bi", "bi-volume-up", "btn-audio");
                    div.querySelector(".div-input").append(icon);
                    break;
                case "fieldset":
                    icon = document.createElement("i");
                    icon.classList.add("ms-2", "bi", "bi-volume-up", "btn-audio");
                    div.querySelector("legend").append(icon);
                    break;
                case "materials":
                    const btnmat = document.createElement("button");
                    btnmat.classList.add("pe-none", "btn-audio", "ms-2","btn","btn-primary");
                    const iconmat = document.createElement("i");
                    iconmat.classList.add("bi", "bi-volume-up");
                    btnmat.append(iconmat);
                    div.querySelector(".material-buttons").append(btnmat);
                    break;
            }
        }
        // speech to text
        if(this.speechToTextBool) {
            if ((this.type === "text" || this.type === "textarea") &&
    this.idElementForm !== "applicantName" &&
    this.idElementForm !== "urgencyDegree" &&
    this.idElementForm !== "location" &&
    this.idElementForm !== "description") {
                const btn = document.createElement("button");
                btn.classList.add("input-group-text", "btn-speech", "pe-none");
                let iconS = document.createElement("i");
                iconS.classList.add("bi", "bi-mic-fill");
                btn.append(iconS);
                btn.role = "button";
                div.querySelector(".div-input").append(btn);
            }
        }

        modal.querySelector("#modal-tts").checked = this.textToSpeechBool;
        // picto
        if(this.type !== "materials"){
            div.querySelector("img").src = "/assets/images/pictos/" + this.picto;
            div.querySelector(".div-img").addEventListener("click", e => {
                document.querySelector("#modal-content-home").classList.add("d-none");
                document.querySelector("#modal-content-pictos").classList.remove("d-none");
            });
        }
    }
    


    // if click on "annuler"
    clearTemp() {
        for (const prop in this.temp)
            delete this.temp[prop];
    }

    // if click on "valider"
    updateThisFromTemp() {
        for (const prop in this.temp) {
            if(prop in this)
                this[prop] = this.temp[prop];
        }
        this.clearTemp();
    }

    /**
     * @param {String} context
     * @memberof FormElement
     */
    adjustImageSize(context) {
        if(context !== "DOM" && context !== "modal")
            throw new Error("The context must be 'DOM' or 'modal'");
        const img = context === "DOM" ? this.#element.querySelector("img") : document.querySelector("#modal-body-home .row:nth-child(2) img");
        const ratioImg = img.naturalWidth / img.naturalHeight;
        const ratioDiv = img.parentElement.offsetWidth / img.parentElement.offsetHeight;
        if(ratioImg > ratioDiv) {
            img.classList.remove("h-100", "w-auto");
            img.classList.add("h-auto", "w-100");
        } else {
            img.classList.remove("w-100", "h-auto");
            img.classList.add("h-100", "w-auto");
        }
    }
}


    /**
     * converts a color code : rgb(255, 182, 193) --> #FFB6C1
     * @param {string} rgb
     * @return {string} 
     */
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

