<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Enregistrement audio en JavaScript</title>
</head>
<body>
    <div class=container>

    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Enregistrer un commentaire audio
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enregistrer un commentaire</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <button type="button" id="startRecording" class="btn btn-success">Commencer l'enregistrement</button>
                        <button type="button" id="stopRecording" disabled class="btn btn-danger" data-bs-dismiss="modal">Arrêter l'enregistrement</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteneur pour les pistes audio -->
        <div id="audioTracksContainer" class="row row-cols-1 row-cols-md-4">
            <!-- Les éléments audio seront disposés en 4 colonnes sur les écrans de taille moyenne et supérieure -->
        </div>
    </div>

  <script>
    // Obtenez les références des boutons et de l'élément audio
    const startRecordingButton = document.getElementById('startRecording');
    const stopRecordingButton = document.getElementById('stopRecording');
    const audioTracksContainer = document.getElementById('audioTracksContainer');
    
    // Déclarez les variables nécessaires
    let audioContext;
    let mediaRecorder;
    let audioChunks = [];
    let trackIndex = 1; // Indice de la piste audio

    // Fonction pour initialiser l'enregistrement
    async function startRecording() {
      try {
        audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });

        // Créez un nœud de source audio à partir du flux audio
        const source = audioContext.createMediaStreamSource(stream);

        // Créez un nœud de destination audio
        const destination = audioContext.createMediaStreamDestination();

        // Connectez le nœud source au nœud destination
        source.connect(destination);

        // Créez un nouvel enregistreur média
        mediaRecorder = new MediaRecorder(destination.stream);

        // Événement lorsqu'un morceau de données est disponible
        mediaRecorder.ondataavailable = event => {
          if (event.data.size > 0) {
            audioChunks.push(event.data);
          }
        };

        // Événement lorsque l'enregistrement est terminé
        mediaRecorder.onstop = () => {
            const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
            const audioUrl = URL.createObjectURL(audioBlob);

            // Créez un nouvel élément audio à chaque enregistrement
            const newAudio = document.createElement('audio');
            newAudio.controls = true;
            newAudio.src = audioUrl;

            // Ajoutez des classes Bootstrap à l'élément audio
            newAudio.classList.add('form-control', 'mt-2', 'col-md');

            // Ajoutez le nouvel élément audio à la ligne
            const audioContainer = document.getElementById('audioTracksContainer');
            audioContainer.appendChild(newAudio);

            // Incrémente l'indice de la piste audio
            trackIndex++;

            // Réinitialise les variables pour le nouvel enregistrement
            audioChunks = [];
            audioContext.close();
        };


        // Commencez l'enregistrement
        mediaRecorder.start();

        // Désactivez le bouton "Commencer l'enregistrement" et activez le bouton "Arrêter l'enregistrement"
        startRecordingButton.disabled = true;
        stopRecordingButton.disabled = false;
      } catch (error) {
        console.error('Erreur lors de l\'obtention du flux audio :', error);
      }
    }

    // Fonction pour arrêter l'enregistrement
    function stopRecording() {
      if (mediaRecorder && mediaRecorder.state === 'recording') {
        mediaRecorder.stop();
        audioContext.close();
      }

      // Désactivez le bouton "Arrêter l'enregistrement" et activez le bouton "Commencer l'enregistrement"
      stopRecordingButton.disabled = true;
      startRecordingButton.disabled = false;
    }

    // Ajoutez des écouteurs d'événements aux boutons
    startRecordingButton.addEventListener('click', startRecording);
    stopRecordingButton.addEventListener('click', stopRecording);
  </script>
</body>
</html>