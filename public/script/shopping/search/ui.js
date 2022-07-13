import { PRODUCT_URI, PAGE_LIMIT, PRODUCTS_PER_PAGE } from "./const.js";
const PRODUCT_TEMPLATE = (function () {
  var htmlFragment =
    '<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 product">' +
    '<div class="products-single fix">' +
    '<div class="box-img-hover">' +
    '<div class="type-lb">' +
    '<p class="new product-type">New</p>' +
    "</div>" +
    '<img class="product-image" width=370 height=350 src="images/img-pro-03.jpg" class="img-fluid" alt="Image">' +
    "</div>" +
    '<div class="mask-icon">' +
    "<ul>" +
    '<li><a href="#" class="product-link" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>' +
    "</ul>" +
    "</div>" +
    '<div class="why-text">' +
    '<h4 class="product-name"></h4>' +
    '<h5 class="product-price"></h5>' +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>";
  var parser = new DOMParser();
  var doc = parser.parseFromString(htmlFragment, "text/html");

  return doc.querySelector(".product");
})();

export function createProduct({ _id, name, picture, type, price }) {
  const newProductElem = PRODUCT_TEMPLATE.cloneNode(true);
  const nameElem = newProductElem.querySelector(".product-name");
  const imageElem = newProductElem.querySelector(".product-image");
  const typeElem = newProductElem.querySelector(".product-type");
  const priceElem = newProductElem.querySelector(".product-price");
  const linkElem = newProductElem.querySelector(".product-link");

  nameElem.textContent = name;
  imageElem.src = picture;
  typeElem.textContent = type;
  priceElem.textContent = "$" + price;
  linkElem.href = PRODUCT_URI + "&id=" + _id;

  return newProductElem;
}

export function createProductType(type, checked = false) {
  var productTypeElem = document.createElement("div");
  productTypeElem.classList.add("form-check-inline");
  var checkboxElem = document.createElement("input");
  var labelElem = document.createElement("label");
  checkboxElem.id = type + "_type";
  checkboxElem.type = "checkbox";
  checkboxElem.classList.add("form-check-input");
  checkboxElem.value = type;
  labelElem.classList.add("form-check-label");
  labelElem.for = type + "_type";
  labelElem.textContent = type;

  if (checked) {
    checkboxElem.checked = true;
  }

  productTypeElem.append(checkboxElem, labelElem);

  return productTypeElem;
}

export function createPageElem(text, activeClass) {
  var liElem = document.createElement("li");
  var aElem = document.createElement("a");

  if (activeClass) {
    activeClass.forEach(function (_class) {
      liElem.classList.add(_class);
    });
  }
  liElem.classList.add("page-item");
  aElem.classList.add("page-link");
  // aElem.href = `javascript:builtSearchResult()`;
  aElem.textContent = text;
  liElem.appendChild(aElem);

  return liElem;
}
