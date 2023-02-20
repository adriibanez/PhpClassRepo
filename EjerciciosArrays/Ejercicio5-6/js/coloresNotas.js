//FUNCIÓN QUE COLOREA LA TABLA DEPENDIENDO DE LA NOTA
window.addEventListener("DOMContentLoaded", (event) => {
  const tds = document.querySelectorAll("td");
  tds.forEach((td) => {
    const nota = td.textContent;

    if (
      nota < 5 ||
      nota === "Muy deficiente" ||
      nota === "Deficiente" ||
      nota === "Insuficiente"
    ) {
      td.style.color = "#F0231F";
    }
    if ((nota > 4 && nota < 7) || nota === "Suficiente" || nota === "Bien") {
      td.style.color = "#F0DD1F";
    }
    if ((nota > 6 && nota < 9) || nota === "Notable") {
      td.style.color = "#1F6AF0";
    }
    if (nota > 8 || nota === "Sobresaliente") {
      td.style.color = "#3DF01F";
    }
  });

  const notaMedia = document.querySelectorAll(".nota");
  notaMedia.forEach((span) => {
    const nota = span.textContent;

    if (
      nota < 5 ||
      nota === "Muy deficiente" ||
      nota === "Deficiente" ||
      nota === "Insuficiente"
    ) {
      span.style.color = "#F0231F";
    }
    if ((nota > 4 && nota < 7) || nota === "Suficiente" || nota === "Bien") {
      span.style.color = "#F0CD1F";
    }
    if ((nota > 6 && nota < 9) || nota === "Notable") {
      span.style.color = "#1F6AF0";
    }
    if (nota > 8 || nota === "Sobresaliente") {
      span.style.color = "#3DF01F";
    }
  });
});
