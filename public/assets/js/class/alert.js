const divAlert = document.querySelector(".alert");
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
    }, 2000);
}