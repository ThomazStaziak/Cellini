const rArrow1 = document.querySelector("#rArrow1");
const lArrow1 = document.querySelector("#lArrow1");
const rArrow2 = document.querySelector("#rArrow2");
const lArrow2 = document.querySelector("#lArrow2");
const rArrow3 = document.querySelector("#rArrow3");
const lArrow3 = document.querySelector("#lArrow3");

const blender1 = [
  "./assets/img/products/Super-blender-imagens-website/super-blender-vermelho.png",
  "./assets/img/products/Super-blender-imagens-website/super-blender-preto.png",
  "./assets/img/products/Super-blender-imagens-website/super-blender-branco.png",
  "./assets/img/products/Super-blender-imagens-website/super-blender-vinho.png",
  "./assets/img/products/Super-blender-imagens-website/lamina-super-blender.png",
  "./assets/img/products/Super-blender-imagens-website/filtro-branco.png",
  "./assets/img/products/Super-blender-imagens-website/filtro-preto.png",
  "./assets/img/products/Super-blender-imagens-website/filtro-vermelho.png"
];

const blender2 = [
  "./assets/img/products/Superblade-4-imagens-website/sup-blade-4-vermelho.png",
  "./assets/img/products/Superblade-4-imagens-website/sup-blade-4-preto.png",
  "./assets/img/products/Superblade-4-imagens-website/sup-blade-4-branco.png",
  "./assets/img/products/Superblade-4-imagens-website/lamina-super-blade-4.png"
];

const blender3 = [
  "./assets/img/products/Superblade-imagens-website/super-blade-vermelho.png",
  "./assets/img/products/Superblade-imagens-website/super-blade-preto.png",
  "./assets/img/products/Superblade-imagens-website/super-blade-branco.png",
  "./assets/img/products/Superblade-imagens-website/lamina-super-blade.png"
];

rArrow1.onclick = () => {
  if (
    blender1.indexOf(mainProduct.getAttribute("src")) > -1 &&
    blender1.indexOf(mainProduct.getAttribute("src")) < 7
  ) {
    mainProduct.setAttribute(
      "src",
      blender1[blender1.indexOf(mainProduct.getAttribute("src")) + 1]
    );
  }
};

lArrow1.onclick = () => {
  if (
    blender1.indexOf(mainProduct.getAttribute("src")) > -1 &&
    blender1.indexOf(mainProduct.getAttribute("src")) != 0
  ) {
    mainProduct.setAttribute(
      "src",
      blender1[blender1.indexOf(mainProduct.getAttribute("src")) - 1]
    );
  }
};

rArrow2.onclick = () => {
  if (
    blender2.indexOf(mainProduct2.getAttribute("src")) > -1 &&
    blender2.indexOf(mainProduct2.getAttribute("src")) < 3
  ) {
    mainProduct2.setAttribute(
      "src",
      blender2[blender2.indexOf(mainProduct2.getAttribute("src")) + 1]
    );
  }
};

lArrow2.onclick = () => {
  if (
    blender2.indexOf(mainProduct2.getAttribute("src")) > -1 &&
    blender2.indexOf(mainProduct2.getAttribute("src")) != 0
  ) {
    mainProduct2.setAttribute(
      "src",
      blender2[blender2.indexOf(mainProduct2.getAttribute("src")) - 1]
    );
  }
};

rArrow3.onclick = () => {
  if (
    blender3.indexOf(mainProduct3.getAttribute("src")) > -1 &&
    blender3.indexOf(mainProduct3.getAttribute("src")) < 3
  ) {
    mainProduct3.setAttribute(
      "src",
      blender3[blender3.indexOf(mainProduct3.getAttribute("src")) + 1]
    );
  }
};

lArrow3.onclick = () => {
  if (
    blender3.indexOf(mainProduct3.getAttribute("src")) > -1 &&
    blender3.indexOf(mainProduct3.getAttribute("src")) != 0
  ) {
    mainProduct3.setAttribute(
      "src",
      blender3[blender3.indexOf(mainProduct3.getAttribute("src")) - 1]
    );
  }
};
