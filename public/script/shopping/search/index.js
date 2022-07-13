// import { createProduct, createProductType } from "./ui.js";
import * as ui from "./ui.js";
import * as ajax from "./ajax.js";
import { PAGE_LIMIT, PRODUCTS_PER_PAGE } from "./const.js";
// import { searchProduct, allProductTypes } from "./ajax.js";
const productGridElem = document.getElementById("product-grid");
const searchBarElem = document.getElementById("search-bar");
const searchPhraseElem = document.getElementById("search-phrase");
const searchBtnElem = document.getElementById("search-btn");
const typeCheckboxesElem = document.getElementById("product-type");
const paginationElem = document.getElementById("pagination");
var searchPhrase = "";

// ajax.searchProduct().then(buildProductGrid);
builtSearchResult();
builtTypeCheckboxes();
// builtPagination(6, 10);

searchBarElem.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    searchPhrase = searchBarElem.value;
    searchBarElem.value = "";
    builtSearchResult();
  }
});
searchBtnElem.addEventListener("click", function (event) {
  searchPhrase = searchBarElem.value;
  searchBarElem.value = "";
  builtSearchResult();
});

async function builtSearchResult(page = 1) {
  productGridElem.textContent = "";
  // var searchPhrase;
  // if (searchBarElem.value != "") {
  //   searchPhrase = searchBarElem.value;
  //   searchBarElem.value = "";
  // } else searchPhrase = searchPhraseElem.textContent;

  searchPhraseElem.textContent = searchPhrase;

  var goodTypes = getTypeCheckes();
  try {
    var result = await ajax.searchProduct(searchPhrase, goodTypes, page);
  } catch (e) {
    return alert(e.message);
  }

  var goods = result.data;
  var goodsCount = result.count;
  var numberOfPage = Math.ceil(goodsCount / PRODUCTS_PER_PAGE);

  buildProductGrid(goods);
  paginationElem.textContent = "";
  builtPagination(page, numberOfPage);
}

function buildProductGrid(goods) {
  var fragment = new DocumentFragment();

  for (const good of goods) {
    const goodElem = ui.createProduct(good);
    fragment.appendChild(goodElem);
  }
  productGridElem.appendChild(fragment);
}

async function builtTypeCheckboxes() {
  let productTypes = await ajax.allProductTypes();
  let fragment = new DocumentFragment();

  for (const productType of productTypes) {
    const productElem = ui.createProductType(productType);
    productElem.addEventListener("change", function (e) {
      builtSearchResult();
    });
    fragment.appendChild(productElem);
  }

  typeCheckboxesElem.appendChild(fragment);
}

function getTypeCheckes() {
  const productTypeCheckBoxes =
    typeCheckboxesElem.querySelectorAll(".form-check-input");
  let productTypeChoices = [];
  for (const productTypeCheckBox of productTypeCheckBoxes) {
    if (productTypeCheckBox.checked) {
      productTypeChoices.push(productTypeCheckBox.value);
    }
  }

  return productTypeChoices;
}

function builtPagination(page, numberOfPage) {
  page = Number(page);
  numberOfPage = Number(numberOfPage);
  var start = 1;
  var end = numberOfPage;
  if (numberOfPage >= PAGE_LIMIT) {
    if (Math.ceil(page / PAGE_LIMIT) === Math.ceil(numberOfPage / PAGE_LIMIT)) {
      start = numberOfPage - PAGE_LIMIT + 1;
      end = numberOfPage;
    } else {
      start = Math.floor((page - 1) / PAGE_LIMIT) * PAGE_LIMIT + 1;
      end = start + PAGE_LIMIT - 1;
    }
  }

  // var prevPage = page - 1;
  // var followPage = page + 1;
  var fragment = document.createDocumentFragment();

  // if (page > 1) {
  //   let prevElem = ui.createPageElem("\u00AB", []);
  //   prevElem.addEventListener("click", (e) => builtSearchResult(prevPage));
  //   fragment.append(prevElem);
  // }

  if (page == start && page > 1) {
    start = start - 1;
    end = end - 1;
  }

  if (page == end && page < numberOfPage) {
    start = start + 1;
    end = end + 1;
  }

  if (start > 1) {
    let pageElem = ui.createPageElem("1", []);
    let elipisElem = ui.createPageElem("...", []);

    pageElem.addEventListener("click", (e) => builtSearchResult(1));
    fragment.append(pageElem, elipisElem);
  }

  for (let i = start; i <= end; i++) {
    let _class = page == i ? ["active"] : "";
    let pageElem = ui.createPageElem(i, _class);
    pageElem.addEventListener("click", (e) =>
      builtSearchResult(e.target.textContent)
    );
    fragment.appendChild(pageElem);
  }

  if (page == end && page != numberOfPage) {
    let pageElem = ui.createPageElem(page + 1, "");
    pageElem.addEventListener("click", (e) => builtSearchResult(page + 1));
    fragment.appendChild(pageElem);
  }

  if (end + 1 == numberOfPage) {
    let pageElem = ui.createPageElem(numberOfPage, "");
    pageElem.addEventListener("click", (e) => builtSearchResult(numberOfPage));
    fragment.appendChild(pageElem);
  } else if (end < numberOfPage) {
    let elipisElem = ui.createPageElem("...", []);
    let pageElem = ui.createPageElem(numberOfPage, []);
    pageElem.addEventListener("click", (e) =>
      builtSearchResult(e.target.textContent)
    );
    fragment.append(elipisElem, pageElem);
  }

  // if (page != numberOfPage) {
  //   let prevElem = ui.createPageElem("\u00BB", []);
  //   prevElem.addEventListener("click", (e) => builtSearchResult(followPage));
  //   fragment.append(prevElem);
  // }

  paginationElem.innerHTML = "";
  paginationElem.appendChild(fragment);
}
