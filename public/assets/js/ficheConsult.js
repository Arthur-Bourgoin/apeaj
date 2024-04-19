import * as helpers from '/assets/js/speechToText.js';

// Sélectionne tous les éléments avec l'attribut data-material-id
var materialElements = document.querySelectorAll(".material-list");
// Pour chaque élément, ajoute un écouteur de clic
materialElements.forEach(function(item) {
    item.addEventListener('click', function() {
        // Récupère l'ID du matériau à partir de l'attribut data
        var materialId = parseInt(item.getAttribute('data-material-id'));

        // Recherche l'objet correspondant dans $allmaterials
        var materialToAdd = allMaterials.find(function(item2) {
            return item2.idMaterial === materialId;
        });

        // Ajoute l'objet trouvé à materials
        if (materialToAdd) {
            materialsA.push(materialToAdd);
            var materialElements = elements.filter(function(element) {
                return element.idElementForm === 'materials';
            });
            var materialLevel = materialElements[0].level;
            var clone;
            switch(materialLevel){
                case 1 :
                    clone = (document.querySelector("#template-materials-1-add").content.cloneNode(true));
                    clone.querySelector('img').src = "/assets/images/materials/" + materialToAdd.picture;
                    clone.querySelector(".collapse").id = "collapse" + materialToAdd.idMaterial;
                    clone.querySelector(".description").textContent = materialToAdd.description;
                    clone.querySelector(".btn-information").setAttribute('data-bs-target', "#collapse" + materialToAdd.idMaterial);
                    clone.querySelector(".div-material").style.backgroundColor = materialElements[0].bgColor; 
                    clone.querySelector(".btn-danger").setAttribute('data-material-id', materialToAdd.idMaterial)
                    clone.querySelector(".div-material").style.fontFamily =  materialElements[0].fontFamily;
                    clone.querySelector(".div-material").style.color =  materialElements[0].fontColor;
                    if(materialElements[0].textToSpeechBool){
                        const btnmat = document.createElement("button");
                            btnmat.classList.add("btn-audio", "ms-2","btn","btn-primary");
                            btnmat.type="button";
                            const iconmat = document.createElement("i");
                            iconmat.classList.add("bi", "bi-volume-up");
                            btnmat.append(iconmat);
                            clone.querySelector(".material-buttons").append(btnmat);
                            eventAudio(btnmat,materialToAdd.description);
                            }
                    break;
                case 2 : 
                   clone = (document.querySelector("#template-materials-2-add").content.cloneNode(true));
                   clone.querySelector('img').src = "/assets/images/materials/" + materialToAdd.picture;
                   clone.querySelector('p').textContent = materialToAdd.wording;
                   clone.querySelector(".collapse").id = "collapse" + materialToAdd.idMaterial;
                   clone.querySelector(".description").textContent = materialToAdd.description;
                   clone.querySelector(".btn-information").setAttribute('data-bs-target', "#collapse" + materialToAdd.idMaterial);
                   clone.querySelector(".div-material").style.backgroundColor = materialElements[0].bgColor;
                   clone.querySelector(".div-label").style.fontSize = materialElements[0].fontSize + "px";
                   clone.querySelector(".div-label").style.fontWeight =  materialElements[0].bold ? "bold" : "normal";
                   clone.querySelector(".div-material").style.fontFamily =  materialElements[0].fontFamily;
                   clone.querySelector(".div-material").style.color =  materialElements[0].fontColor;
                   clone.querySelector(".btn-danger").setAttribute('data-material-id', materialToAdd.idMaterial)
                   if(materialElements[0].textToSpeechBool){
                    const btnmat = document.createElement("button");
                        btnmat.classList.add("btn-audio", "ms-2","btn","btn-primary");
                        btnmat.type="button";
                        const iconmat = document.createElement("i");
                        iconmat.classList.add("bi", "bi-volume-up");
                        btnmat.append(iconmat);
                        clone.querySelector(".material-buttons").append(btnmat);
                        eventAudio(btnmat,materialToAdd.description);
                        }
                    break;
                case 3 :
                    clone = (document.querySelector("#template-materials-3-add").content.cloneNode(true));
                    clone.querySelector('p').textContent = materialToAdd.wording;
                    clone.querySelector(".collapse").id = "collapse" + materialToAdd.idMaterial;
                    clone.querySelector(".description").textContent = materialToAdd.description;
                    clone.querySelector(".btn-information").setAttribute('data-bs-target', "#collapse" + materialToAdd.idMaterial);
                    clone.querySelector(".div-material").style.backgroundColor = materialElements[0].bgColor;
                    clone.querySelector(".div-label").style.fontSize = materialElements[0].fontSize + "px";
                    clone.querySelector(".div-label").style.fontWeight =  materialElements[0].bold ? "bold" : "normal";
                    clone.querySelector(".div-material").style.fontFamily =  materialElements[0].fontFamily;
                    clone.querySelector(".div-material").style.color =  materialElements[0].fontColor;
                    clone.querySelector(".btn-danger").setAttribute('data-material-id', materialToAdd.idMaterial)
                    if(materialElements[0].textToSpeechBool){
                        const btnmat = document.createElement("button");
                            btnmat.classList.add("btn-audio", "ms-2","btn","btn-primary");
                            btnmat.type="button";
                            const iconmat = document.createElement("i");
                            iconmat.classList.add("bi", "bi-volume-up");
                            btnmat.append(iconmat);
                            clone.querySelector(".material-buttons").append(btnmat);
                            eventAudio(btnmat,materialToAdd.description);
                            }
                    break;
            }
            document.querySelector(".div-materials").append(clone);
        } else {
        }
        document.querySelector(".btn-dissmis-modal").click();

        
    });
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
    // levely
    if(elementForm.type == "materials"){
        let elemMaterials =elements.find(element => element.idElementForm === "materials");
        document.querySelector(".div-materials").append(document.querySelector("#template-materials-"+ elemMaterials.level).content.cloneNode(true));
        document.querySelectorAll(".div-material").forEach(div =>{
            switch(elemMaterials.level) {
                case 1:
                    div.style.backgroundColor = elemMaterials.bgColor; 
                    if(!elemMaterials.textToSpeechBool){
                        div.querySelector(".btn-audio-material").remove();
                    }
                    break;
                case 2:
                    div.style.backgroundColor = elemMaterials.bgColor;
                    div.querySelector(".div-label").style.fontSize = elemMaterials.fontSize + "px";
                    div.querySelector(".div-label").style.fontWeight = elemMaterials.bold ? "bold" : "normal";
                    div.querySelector(".div-label").style.fontFamily =  elemMaterials.fontFamily;
                    div.style.color =  elemMaterials.fontColor;
                    if(!elemMaterials.textToSpeechBool){
                        div.querySelector(".btn-audio-material").remove();
                    }
                    break;
                case 3:
                    div.style.backgroundColor = elemMaterials.bgColor;
                    div.querySelector(".div-label").style.fontSize = elemMaterials.fontSize + "px";
                    div.querySelector(".div-label").style.fontWeight = elemMaterials.bold ? "bold" : "normal";
                    div.querySelector(".div-label").style.fontFamily =  elemMaterials.fontFamily;
                    div.style.color =  elemMaterials.fontColor;
                    if(!elemMaterials.textToSpeechBool){
                        div.querySelector(".btn-audio-material").remove();
                    }
                    break;
            }
        });
    } else {
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
    }   
    if (elementForm.type !== "materials"){
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
        switch(elementForm.type) {
            case "materials":
                document.querySelectorAll(".div-material").forEach(div =>{
                    div.style.backgroundColor = toHexa(elementForm.bgColor);
                });
                break;
            case "fieldset":
                element.parentElement.style.backgroundColor = toHexa(elementForm.bgColor);
            default : 
                element.style.backgroundColor = toHexa(elementForm.bgColor);
        }  
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

        if(elementForm.speechToTextBool) {
            let icon;
            if(elementForm.type === "text" || elementForm.type === "textarea") {
                    const btn = document.createElement("button");
                    btn.classList.add("input-group-text", "btn-speech");
                    icon = document.createElement("i");
                    icon.classList.add("bi", "bi-mic-fill");
                    btn.append(icon);
                    btn.role = "button";
                    btn.type = "button";
                    element.querySelector(".div-input").append(btn);
                    switch(elementForm.type){
                        case "text":
                            helpers.speechtotext(element.querySelector(".div-input input"),btn);
                            break
                        case "textarea":
                            helpers.speechtotext(element.querySelector(".div-input textarea"),btn);
                            break
                    }
            }
        }

        // images
            element.querySelector("img").src = "/assets/images/pictos/" + elementForm.picto;
     }
});


document.querySelectorAll("#template-materials-1, #template-materials-2, #template-materials-3").forEach(tmp => tmp.remove());
document.querySelectorAll(".btn-audio-material").forEach(btn => {
        const text = btn.closest(".div-material").querySelector(".collapse").firstElementChild.innerText;
        eventAudio(btn, text);
});
document.querySelector("#btn-submit")?.addEventListener("click", e => {
    if(!confirm("Voulez vous vraiment confirmer ces informations ?"))
        e.preventDefault();
    else{
        var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'json';
            input.value = JSON.stringify(materialsA)
            document.getElementById('form-form').appendChild(input);
    }
});

document.querySelector("#btn-print").addEventListener("click", e => {
    printForm();
});

document.querySelector("#div-materials").addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-danger') || event.target.classList.contains('bi-trash')) {
        // Récupérer l'ID du matériau associé à ce bouton
        const materialId = event.target.closest('.btn-danger').getAttribute('data-material-id');
        
        // Supprimer l'élément HTML correspondant
        event.target.closest('.div-material').remove();

        const materialList = document.querySelector('.material-list[data-material-id="' + materialId + '"]');
        if (materialList) {
            // Rendre l'élément visible
            materialList.style.display = 'flex';
        }

        // Trouver l'objet correspondant dans materialsA
        const materialToDelete = materialsA.find(material => material.idMaterial === parseInt(materialId));
        
        if (materialToDelete) {
            // Supprimer l'élément de la liste materialsA
            const index = materialsA.indexOf(materialToDelete);
            if (index !== -1) {
                materialsA.splice(index, 1);
            }
        } else {
        }
    }
});


if(finished !== 1){
    const divMaterials = document.querySelectorAll(".div-material");
    if (divMaterials.length >= 10 ) {
    document.querySelector(".btn-rm-material").classList.add("pe-none");
    }else{
        document.querySelector(".btn-rm-material").classList.remove("pe-none");
    }
}

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
    document.querySelectorAll("header, .row-header, .btn-rm-material, #btns-form, footer, .div-materials, .bi-voume-up").forEach(div => {
        div.classList.add("d-none");
    })
    const parentElement = document.querySelector('#impression'); 
    materialsA.forEach(material => {
        // Créer un nouvel élément div
        const divtemp = document.createElement('div');
        divtemp.classList.add("temp-mat");
        divtemp.classList.add("col-12");
        divtemp.classList.add("text-align-center");
        divtemp.innerText = material.wording;
        parentElement.append(divtemp);
    });
    window.print();
    document.querySelectorAll("header, .row-header, .btn-rm-material, #btns-form, footer, .div-materials, .bi-voume-up").forEach(div => {
        div.classList.remove("d-none");
    });
    const elementsToRemove = document.querySelectorAll('.temp-mat')
    elementsToRemove.forEach(element => {
        element.parentNode.removeChild(element);
    });
}

function updateButtonVisibility() {
    const divMaterials = document.querySelectorAll(".div-material");
    const btnRmMaterial = document.querySelector(".btn-rm-material");
    if(finished !== 1){
        if (divMaterials.length >= 10) {
            btnRmMaterial.classList.add("pe-none");
            btnRmMaterial.classList.add("disabled");
        } else {
            btnRmMaterial.classList.remove("pe-none");
            btnRmMaterial.classList.remove("disabled");
        }
    }
}

function handleDOMChanges(mutationsList, observer) {
    updateButtonVisibility(); // Mettre à jour la visibilité du bouton
}

// Créer une instance de MutationObserver avec la fonction de gestion des changements
const observer = new MutationObserver(handleDOMChanges);

// Configurer l'observateur pour surveiller les changements dans le DOM, en particulier les ajouts d'éléments
observer.observe(document.body, { subtree: true, childList: true });

// Appeler la fonction une fois au chargement de la page pour initialiser l'état du bouton
updateButtonVisibility();


function removeElementsOnModalOpen() {
    
    document.querySelectorAll(".material-list").forEach(function(element) {
        // Récupérer l'ID du matériel de l'élément
        var materialId = parseInt(element.getAttribute('data-material-id'));

        // Vérifier si l'ID correspond à l'un des ID dans materialsA
        if (materialsA.some(material => material.idMaterial === materialId)) {
            // Supprimer l'élément HTML
            element.style.display = 'none';
        }
    });
}
document.getElementById('AddMaterialModal').addEventListener('shown.bs.modal', removeElementsOnModalOpen)


// Fonction pour vérifier si l'ID du matériel appartient à une catégorie spécifique
function isIdInType(materialId, type) {
    var material = allMaterials.find(function(item) {
        return item.idMaterial === materialId;
    });
    if (material) {
        return material.type.includes(type);
    } else {
        return false;
    }
}

// Fonction pour mettre à jour la visibilité des éléments en fonction de la catégorie sélectionnée et du terme de recherche
function updateVisibility(selectedType, searchValue) {
    // Parcourir tous les éléments .material-list
    document.querySelectorAll(".material-list").forEach(function(element) {
        var materialId = parseInt(element.getAttribute('data-material-id'));
        var materialName = element.querySelector("p").textContent.toLowerCase();

        // Vérifier si l'ID du matériel appartient à la catégorie sélectionnée
        var isInSelectedCategory = selectedType === "" || isIdInType(materialId, selectedType);

        // Vérifier si le nom du matériel contient la chaîne de recherche
        var containsSearchTerm = materialName.includes(searchValue);

        // Afficher l'élément si le nom correspond à la recherche et s'il appartient à la catégorie sélectionnée
        if (containsSearchTerm && isInSelectedCategory) {
            element.style.display = 'flex';
        } else {
            element.style.display = 'none';
        }
    });
}

document.getElementById("materialTypeFilter").addEventListener('change', function() {
    var selectedType = this.value; // Récupérer la valeur sélectionnée dans le sélecteur
    var searchValue = document.getElementById("materialNameSearch").value.trim().toLowerCase(); // Récupérer la valeur de la recherche en minuscules

    updateVisibility(selectedType, searchValue);
    removeElementsOnModalOpen();
});

document.getElementById("materialNameSearch").addEventListener("input", function() {
    var searchValue = this.value.trim().toLowerCase(); // Récupérer la valeur de la recherche en minuscules
    var selectedType = document.getElementById("materialTypeFilter").value; // Récupérer la catégorie sélectionnée

    updateVisibility(selectedType, searchValue);
});

// Appeler la fonction une fois au chargement de la page pour initialiser l'état de visibilité des éléments
updateVisibility("", "");


if (finished === 1) {
    var elementsS = document.querySelectorAll(".btn-speech");
    elementsS.forEach(function(element) {
        element.classList.add("pe-none");
    });
}