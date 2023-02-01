document.addEventListener("DOMContentLoaded", function () {
  // получим значение времени регистрации из span #date
  const regDate = new Date(
    Number(document.querySelector("#time").textContent) * 1000
  );
  // установим время окончания срока действия акции
  const endOfDiscount = new Date(
    regDate.getFullYear(),
    regDate.getMonth(),
    regDate.getDate() + 1,
    regDate.getHours(),
    regDate.getMinutes(),
    regDate.getSeconds()
  );
  const timerHours = document.querySelector(".hours");
  const timerMinutes = document.querySelector(".minutes");
  const timerSeconds = document.querySelector(".seconds");
  let knockingTimer = false;

  function timer() {
    // запишем время длительность акции в секундах
    const diff = endOfDiscount - new Date();
    if (diff <= 0) {
      clearInterval(knockingTimer);
    }
    // запишем время длительность акции в секундах
    const hours = diff > 0 ? Math.floor((diff / 1000 / 60 / 60) % 24) : 0;
    const minutes = diff > 0 ? Math.floor((diff / 1000 / 60) % 60) : 0;
    const seconds = diff > 0 ? Math.floor((diff / 1000) % 60) : 0;
    timerHours.textContent = hours < 10 ? "0" + hours : hours;
    timerMinutes.textContent = minutes < 10 ? "0" + minutes : minutes;
    timerSeconds.textContent = seconds < 10 ? "0" + seconds : seconds;
  }
  timer();
  knockingTimer = setInterval(timer, 1000);
});
