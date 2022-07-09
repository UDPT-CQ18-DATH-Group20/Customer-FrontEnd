import {
  createProductElem,
  createProductTypeElem,
} from "./shopping-search-ui.js";

import { searchGoods, getGoodsType } from "./shopping-search-ajax.js";
const productGridElem = document.getElementById("product-grid");
const searchBarElem = document.getElementById("search-bar");
const searchBtnElem = document.getElementById("search-btn");
const productTypeDropdown = document.getElementById("product-type");

searchGoods().then(buildProductGrid);
builtTypeDropDown();

searchBarElem.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    builtSearchResult();
  }
});
searchBtnElem.addEventListener("click", function (event) {
  builtSearchResult();
});

function buildProductGrid(goods) {
  let fragment = new DocumentFragment();
  productGridElem.textContent = "";
  for (const good of goods) {
    const goodElem = createProductElem(good);
    fragment.appendChild(goodElem);
  }
  productGridElem.appendChild(fragment);
}

async function builtSearchResult() {
  let searchPhrase = searchBarElem.value;
  let goodTypes = getGoodTypeCheckes();
  console.log(goodTypes);
  let goods = await searchGoods(searchPhrase, goodTypes);

  buildProductGrid(goods);
}

async function builtTypeDropDown() {
  let productTypes = await getGoodsType();
  let fragment = new DocumentFragment();

  for (const productType of productTypes) {
    const productElem = createProductTypeElem(productType);
    fragment.appendChild(productElem);
  }

  productTypeDropdown.appendChild(fragment);
}

function getGoodTypeCheckes() {
  const productTypeCheckBoxes =
    productTypeDropdown.querySelectorAll(".form-check-input");
  let productTypeChoices = [];
  for (const productTypeCheckBox of productTypeCheckBoxes) {
    if (productTypeCheckBox.checked) {
      productTypeChoices.push(productTypeCheckBox.value);
    }
  }

  return productTypeChoices;
}
