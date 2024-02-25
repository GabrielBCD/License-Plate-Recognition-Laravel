function mudarDisplay() {
  const display = document.querySelector(".table-modificacoes");
  display.style.display = "block";
}

const buttonDisplay = document.querySelector(".button-test");

//event
buttonDisplay.addEventListener("click", () => {
  mudarDisplay();
});
