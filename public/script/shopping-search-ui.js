const PRODUCT_URI =
  "http://localhost/index.php?controller=product&action=index";
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

// exports.createProductlistItem = function (id, name, image, type, price) {
//   var div = document.createElement("div");
//   div.className = "col-sm-6 col-md-6 col-lg-4 col-xl-4 " + price;

//   //div children
//   var div_product = document.createElement("div");
//   div_product.className = "products-single fix";

//   div.appendChild(div_product);

//   //div_product children
//   var div_box_img = createElement("div");
//   div_box_img.className = "box-img-hover";

//   var div_why_text = createElement("div");
//   div_why_text.className = "why-text";

//   div_product.append(div_box_img, div_why_text);

//   //div_box_img children
//   var img = document.createElement("img");
//   img.src = image;
//   img.className = "img-fluid";
//   img.alt = "image";

//   var div_mask_icon = document.createElement("div");
//   div_mask_icon.className = "mask-icon";

//   div_box_img.append(img, div_mask_icon);

//   //div_mask_icon
//   ul_mask = document.createElement("ul");
//   li_mask = document.createElement("li");
//   anchor = document.createElement("a");
//   i = document.createElement("i");

//   anchor.href = goodsLink(id);
//   anchor.dataToggle = "tooltip";
//   anchor.dataPlacement = "right";
//   anchor.title = "view";

//   i.className = "fas fa-eye";

//   ul_mask.append(li_mask);
//   li_maks.append(anchor);
//   anchor.append(i);

//   div_mask_icon.append(ul);

//   //div_why_text children
//   h5 = document.createElement("h5");
//   h4 = document.createElement("h4");

//   h5.textContent = price;
//   h4.textContent = name;

//   div.append(h4, h5);
// };

export function createProductElem({ _id, name, picture, type, price }) {
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

export function createProductTypeElem(type, checked = false) {
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
