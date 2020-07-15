const images = document.querySelectorAll(".c-short-product");
const images2 = document.querySelectorAll(".c-short-product-2");
const images3 = document.querySelectorAll(".c-short-product-3");
const images4 = document.querySelectorAll(".c-short-product-4");
const images5 = document.querySelectorAll(".c-short-product-5");
const images6 = document.querySelectorAll(".c-short-product-6");
const images7 = document.querySelectorAll(".c-short-product-7");
const mainProduct = document.querySelector("#mainProduct");
const mainProduct2 = document.querySelector("#mainProduct2");
const mainProduct3 = document.querySelector("#mainProduct3");
const mainProduct4 = document.querySelector("#mainProduct4");
const mainProduct5 = document.querySelector("#mainProduct5");
const mainProduct6 = document.querySelector("#mainProduct6");
const mainProduct7 = document.querySelector("#mainProduct7");

images.forEach(image => {
  image.onclick = () => {
    mainProduct.setAttribute("src", image.getAttribute("src"));
  };
});

images2.forEach(image => {
  image.onclick = () => {
    mainProduct2.setAttribute("src", image.getAttribute("src"));
  };
});

images3.forEach(image => {
  image.onclick = () => {
    mainProduct3.setAttribute("src", image.getAttribute("src"));
  };
});

images4.forEach(image => {
  image.onclick = () => {
    mainProduct4.setAttribute("src", image.getAttribute("src"));
  };
});

images5.forEach(image => {
  image.onclick = () => {
    mainProduct5.setAttribute("src", image.getAttribute("src"));
  };
});

images6.forEach(image => {
  image.onclick = () => {
    mainProduct6.setAttribute("src", image.getAttribute("src"));
  };
});

images7.forEach(image => {
  image.onclick = () => {
    mainProduct7.setAttribute("src", image.getAttribute("src"));
  };
});
