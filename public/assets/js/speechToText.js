export function speechtotext(input, button) {
   button.addEventListener('click', function(event) {
      event.preventDefault(); // Ajoutez des parenthèses ici

      var speech = true;
      window.SpeechRecognition = window.webkitSpeechRecognition;

      const recognition = new SpeechRecognition();
      recognition.interimResults = true;

      recognition.addEventListener('result', e => {
         const transcript = Array.from(e.results)
            .map(result => result[0])
            .map(result => result.transcript)
            .join('')

         input.value = transcript;
      });

      if (speech == true) {
         recognition.start();
      }
   })
}