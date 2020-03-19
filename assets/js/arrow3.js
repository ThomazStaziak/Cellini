const rArrow5 = document.querySelector("#rArrow5");
const lArrow5 = document.querySelector("#lArrow5");

const irons = [
  "./assets/img/products/SlimLine_Roxo-500x500px.png",
  "./assets/img/products/SlimLine_Solapa-500x500px.png"
];

rArrow5.onclick = () => {
  if (
    irons.indexOf(mainProduct5.getAttribute("src")) > -1 &&
    irons.indexOf(mainProduct5.getAttribute("src")) < 1
  ) {
    mainProduct5.setAttribute(
      "src",
      irons[irons.indexOf(mainProduct5.getAttribute("src")) + 1]
    );
  }
};

lArrow5.onclick = () => {
  if (
    irons.indexOf(mainProduct5.getAttribute("src")) > -1 &&
    irons.indexOf(mainProduct5.getAttribute("src")) != 0
  ) {
    mainProduct5.setAttribute(
      "src",
      irons[irons.indexOf(mainProduct5.getAttribute("src")) - 1]
    );
  }
};

const rArrow6 = document.querySelector("#rArrow6");
const lArrow6 = document.querySelector("#lArrow6");

const irons2 = [
  "./assets/img/products/SmartSolution_Ferro-500x500-px.png",
  "./assets/img/products/SmartSolution_Solapa-500x500px.png"
];

rArrow6.onclick = () => {
  if (
    irons2.indexOf(mainProduct6.getAttribute("src")) > -1 &&
    irons2.indexOf(mainProduct6.getAttribute("src")) < 1
  ) {
    mainProduct6.setAttribute(
      "src",
      irons2[irons2.indexOf(mainProduct6.getAttribute("src")) + 1]
    );
  }
};

lArrow6.onclick = () => {
  if (
    irons2.indexOf(mainProduct6.getAttribute("src")) > -1 &&
    irons2.indexOf(mainProduct6.getAttribute("src")) != 0
  ) {
    mainProduct6.setAttribute(
      "src",
      irons2[irons2.indexOf(mainProduct6.getAttribute("src")) - 1]
    );
  }
};
