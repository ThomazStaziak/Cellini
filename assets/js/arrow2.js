const rArrow4 = document.querySelector("#rArrow4");
const lArrow4 = document.querySelector("#lArrow4");

const churns = [
  "./assets/img/products/batedeira-vermelha.png",
  "./assets/img/products/batedeira-preta.png",
  "./assets/img/products/batedeira-branca.png",
  "./assets/img/products/batedores-de-massa.png",
  "./assets/img/products/espatula-vermelha.png",
  "./assets/img/products/espatula-branca.png",
  "./assets/img/products/espatula-preta.png"
];

rArrow4.onclick = () => {
  if (
    churns.indexOf(mainProduct4.getAttribute("src")) > -1 &&
    churns.indexOf(mainProduct4.getAttribute("src")) < 6
  ) {
    mainProduct4.setAttribute(
      "src",
      churns[churns.indexOf(mainProduct4.getAttribute("src")) + 1]
    );
  }
};

lArrow4.onclick = () => {
  if (
    churns.indexOf(mainProduct4.getAttribute("src")) > -1 &&
    churns.indexOf(mainProduct4.getAttribute("src")) != 0
  ) {
    mainProduct4.setAttribute(
      "src",
      churns[churns.indexOf(mainProduct4.getAttribute("src")) - 1]
    );
  }
};
