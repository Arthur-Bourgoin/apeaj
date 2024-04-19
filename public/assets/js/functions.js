export const divErrorPwd = document.createElement("div");
divErrorPwd.classList.add("alert", "alert-danger");
divErrorPwd.role = "alert";
divErrorPwd.style.opacity = 1;
divErrorPwd.innerText = "Erreur, les deux mots de passes ne correspondent pas.";

function eyeOnClick(e) {
    const input = e.currentTarget.previousElementSibling;
    if(input.type === "text") {
        input.type = "password";
        e.currentTarget.innerHTML = '<i class="bi bi-eye"></i>';
    }
    else {
        input.type = "text";
        e.currentTarget.innerHTML = '<i class="bi bi-eye-slash"></i>';
    }
}

export function initModalPwd(modal, typePwd, initEvent) {

    const divText = document.querySelector(modal + " .textField");
    const divCode = document.querySelector(modal + " .codeField");
    if(initEvent) {
        [divText, divCode].forEach(div => {
            div.querySelectorAll("span").forEach(span => {
                span.addEventListener("click", e => eyeOnClick(e));
            });
        });
    }
    let div;
    switch(typePwd) {
        case 1:
            divCode?.remove();
            div = divText;
            break;
        case 2:
            divText?.remove();
            div = divCode;
            break;
    }
    if(typePwd !== 0) document.querySelector(modal + " .selectTypePwd").parentElement.parentElement.insertAdjacentElement('afterend', div);
}

export function changeModalPwd(modal) {

    const divText = document.querySelector(modal + " .textField");
    const divCode = document.querySelector(modal + " .codeField");
    function removeAllDivPwd() {
        [divText, divCode].forEach(div => {
            div.querySelectorAll("input").forEach(input => input.type = "password");
            div.querySelectorAll("span").forEach(span => span.innerHTML = '<i class="bi bi-eye"></i>');
            div?.remove();
        })
    }

    function appendAllDivPwd() {
        removeAllDivPwd();
        const inputSelect = document.querySelector(modal + " .selectTypePwd").parentElement.parentElement;
        [divText, divCode].forEach(div => {
            inputSelect.insertAdjacentElement('afterend', div);
        });
    }

    function resetInput(div) { div.querySelectorAll("input").forEach(input => input.value = "") }

    function eventChangeTypePwd(select) {
        document.querySelector(select).addEventListener('change', e => {
            let div = null;
            removeAllDivPwd();
            switch(e.currentTarget.value) {
                case "1":
                    div = divText; break;
                case "2":
                    div = divCode; break;
            }
            resetInput(div);
            e.currentTarget.parentElement.parentElement.insertAdjacentElement('afterend', div);
        });
    }
    
    function eventBtnsCancel(selectors) {
        document.querySelectorAll(selectors).forEach(btn => {
            btn.addEventListener("click", e => appendAllDivPwd());
        });
    }
    if (modal==="#profileConsultation"){
            eventBtnsCancel(modal + " .btn-close, " + modal + " .btn-cancel-account");
    }else{
        eventBtnsCancel(modal + " .btn-close, " + modal + " .btn-cancel");
    }
    eventChangeTypePwd(modal + " .selectTypePwd");
}

/**
 * checks that the two passwords match and displays an error accordingly
 * @export
 * @param {Event} event
 * @param {string} inputs
 * @param {string} modal
 */
export function verifPwdModal(event, inputs, modal) {
    const pwd = document.querySelectorAll(inputs);
    if(pwd[0].value !== pwd[1].value) {
        if(!document.querySelector(modal + " .modal-body .alert-danger")) {
            document.querySelector(modal + " .modal-body").prepend(divErrorPwd);
            setTimeout(() => {
                const interval = setInterval(() => {
                    divErrorPwd.style.opacity -= 0.01;
                    if(divErrorPwd.style.opacity <= 0) {
                        clearInterval(interval);
                        divErrorPwd.remove();
                        divErrorPwd.style.opacity = 1;
                    }
                }, 10);
            }, 5000);
        }
        event.preventDefault();
    }

}

/**
 * to manage dynamic photo change
 * @export
 * @param {string} 
 * @param {string} 
 */
export function eventChangePicture(input, img) {
    document.querySelector(input).addEventListener("input", e => {
        const reader = new FileReader();
        reader.onload = e => document.querySelector(img).src = e.target.result
        reader.addEventListener('progress', e => {
            if (e.loaded && e.total)
              console.log("Progress: " + Math.round((e.loaded / e.total) * 100));
          });    
        reader.readAsDataURL(e.currentTarget.files[0]);
    });
}  

/**
 * reduces the opacity of the feddback div until it is removed
 * @export
 */
export function removeDivFeedback() {
    const divAlert = document.querySelector(".divFeedback");
    if(divAlert) {
        setTimeout(() => {
            divAlert.style.opacity = 1;
            const interval = setInterval(() => {
                divAlert.style.opacity -= 0.01;
                if(divAlert.style.opacity <= 0) {
                    clearInterval(interval);
                    divAlert.remove();
                }
            }, 10);
        }, 5000);
    }
}
export function initModalAdminPwd(modal, user, initEvent) {

    const divText = document.querySelector(modal + " .textField");
    const divCode = document.querySelector(modal + " .codeField");

    if (initEvent) {
        [divText, divCode].forEach(div => {
            div.querySelectorAll("span").forEach(span => {
                span.addEventListener("click", e => eyeOnClick(e));
            });
        });
    }

    // Remplir les champs avec les valeurs de l'utilisateur courant
    document.querySelector("#inputImgCurrentUser").src = user.picture;
    document.querySelector("#inputCurrentUserLastName").value = user.lastName;
    document.querySelector("#inputCurrentUserFirstName").value = user.firstName;
    document.querySelector("#idCurrentUser").value = user.idUser;

    // Réinitialiser les champs d'input de mot de passe
    document.querySelectorAll('.input-pwd').forEach(input => {
        input.value = '';
    });

    // Sélectionner le bon type de mot de passe
    document.querySelector(`#CurrentUserinputTypePwd option[value="${user.typePwd}"]`).selected = true;


    let div;
    switch (user.typePwd) {
        case 1:
            divCode?.remove();
            div = divText;
            break;
        case 2:
            divText?.remove();
            div = divCode;
            break;
    }
}