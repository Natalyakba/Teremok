

$(document).ready(function () {
   $('.teremok').click(function (event) {
      $(this).toggleClass('active').next().slideToggle(300);
   });
});


// document.addEventListener("DOMContentLoaded", function () {
//    var audio = document.getElementById("music");
//    audio.play();
// });

document.addEventListener("DOMContentLoaded", function () {
   var audio = document.getElementById("music");
   var toggleButton = document.getElementById("toggleButton");

   toggleButton.addEventListener("click", function () {
      if (audio.paused) {
         audio.play();
         toggleButton.textContent = 'stop';
      } else {
         audio.pause();
         toggleButton.textContent = 'play';
      }
   });
});







document.getElementById("quizForm").addEventListener("submit", function (event) {
   event.preventDefault(); // Предотвращаем отправку формы

   var score = 0;
   var answers = {
      question1: "C",
      question2: "B"
   };

   for (var question in answers) {
      var selectedAnswer = document.querySelector("input[name=" + question + "]:checked");
      if (selectedAnswer) {
         if (selectedAnswer.value === answers[question]) {
            score++;
         }
      }
   }

   var resultElement = document.getElementById("result");
   resultElement.innerHTML = "Ваш результат: " + score + " из " + Object.keys(answers).length;

});
