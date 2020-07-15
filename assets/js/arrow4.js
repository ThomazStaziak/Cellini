const rArrow7 = document.querySelector("#rArrow7");
const lArrow7 = document.querySelector("#lArrow7");

const fans = [
  "./assets/img/products/Ventilador01.png",
  "./assets/img/products/Ventilador02.png",
  "./assets/img/products/Ventilador03.png",
  "./assets/img/products/Ventilador04.png"
];

rArrow7.onclick = () => {
  if (
    fans.indexOf(mainProduct7.getAttribute("src")) > -1 &&
    fans.indexOf(mainProduct7.getAttribute("src")) < 3
  ) {
    mainProduct7.setAttribute(
      "src",
      fans[fans.indexOf(mainProduct7.getAttribute("src")) + 1]
    );
  }
};

lArrow7.onclick = () => {
  if (
    fans.indexOf(mainProduct7.getAttribute("src")) > -1 &&
    fans.indexOf(mainProduct7.getAttribute("src")) != 0
  ) {
    mainProduct7.setAttribute(
      "src",
      fans[fans.indexOf(mainProduct7.getAttribute("src")) - 1]
    );
  }
};