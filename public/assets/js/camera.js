//Récupération des templates de caméra
const templatePicture = document.querySelector("#takePhotoContainer").content.cloneNode(true);
document.querySelector("#takePhotoContainer").remove();
const templateConfirmPicture = document.querySelector("#confirmPhotoContainer").content.cloneNode(true);
document.querySelector("#confirmPhotoContainer").remove();

document.addEventListener('DOMContentLoaded', function () {
    //Stockage du bouton d'appel à la caméra
    const cameraOpen = document.querySelector('.camera');
    const originalContent = document.body.innerHTML;

    //Ajout d'un évènement d'ouverture de caméra
    cameraOpen.addEventListener('click', () => {
        // Efface le contenu actuel du body
        document.body.innerHTML = "";
        // Remplace par le contenu du template takePhoto
        document.body.append(templatePicture);
        
        //Récupération des boutons pour gérer la caméra
        const videoElement = document.querySelector('#videoCam');
        const takePhoto = document.querySelector('#takePhoto');
        const cancelPhoto = document.querySelector('#cancelPhoto');
        //Redimension et design du pattern
        document.documentElement.style.height = "100%";
        document.body.style.height = "100%";
        document.body.style.overflow = "hidden";

        // Démarre la capture vidéo
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                // Récupération du flux vidéo
                videoElement.srcObject = stream;
                // Ajout de l'élément vidéo au corps du document
                document.body.appendChild(videoElement);
                // Lecture du flux vidéo
                videoElement.play();
                
                cancelPhoto.addEventListener('click',(e)=>{
                    e.preventDefault();
                    window.location.reload();
                })

                takePhoto.addEventListener('click', (e) => {
                    e.preventDefault();
                    // Efface le contenu actuel du body
                    document.body.innerHTML = "";
                    // Remplace par le contenu du template takePhoto
                    document.body.append(templateConfirmPicture);
                    
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    let photoBlob;
                    canvas.width = videoElement.videoWidth;
                    canvas.height = videoElement.videoHeight;
                    context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
                    canvas.toBlob(blob => {
                        photoBlob = blob; // Stocke le blob de la photo capturée dans la variable             
                        const confirmCanvas = document.querySelector('#photoCaptureVisu');
                        const confirmContext = confirmCanvas.getContext('2d');

                        // Convertir le blob en URL d'objet
                        const blobUrl = URL.createObjectURL(photoBlob);

                        // Créer une nouvelle image
                        const image = new Image();
                        image.onload = function() {
                            // Dessiner l'image sur le canvas
                            confirmContext.drawImage(image, 0, 0, confirmCanvas.width, confirmCanvas.height);
                        };
                        image.src = blobUrl;
                        // Champ de formulaire pour le fichier photo
                        const photoInput = document.querySelector('#inputFilePicture');
                        // Utilisez DataTransfer pour associer le blob de la photo à l'input
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(new File([photoBlob], 'photoCapture.png', { type: 'image/png' }));
                        photoInput.files = dataTransfer.files;

                        // Champ de formulaire pour le fichier photo
                        const photoTitle = document.querySelector('#inputTitlePicture');
                        // Confirmation de la photo
                        const savePhoto = document.querySelector("#confirmThisPhoto");
                        savePhoto.addEventListener('click', (e) => {
                            e.preventDefault();
                            // Soumettez le formulaire
                            const form = document.querySelector('#photoForm');
                            form.submit();
                        });
                        // Annuler la photo
                        const refusePhoto = document.querySelector("#refuseThisPhoto");
                        refusePhoto.addEventListener('click', (e) => {
                            e.preventDefault();
                            window.location.reload();
                        });
                    
                     }, 'image/png');

                 });
                
            })
            .catch(error => {
                // Gestion des erreurs en cas de refus d'accès à la caméra
                console.error('Erreur lors de la demande d\'accès à la caméra:', error);
            });
     
    });

})