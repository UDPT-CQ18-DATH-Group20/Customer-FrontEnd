import { GOODS_API_URI, GOODS_TYPE_PATH, PRODUCTS_PER_PAGE } from "./const.js";

export async function searchProduct(search, types = [], page = 1) {
  let params = new URLSearchParams();
  if (search) {
    params.append("search", search);
  }

  if (types) {
    for (const type of types) {
      console.log(type);
      params.append("type", type);
    }
  }

  params.append("limit", PRODUCTS_PER_PAGE);
  params.append("page", page);

  var request = new Request(GOODS_API_URI + "?" + params, {
    method: "GET",
  });

  let response = await fetch(request);
  let data = [];
  if (response.status === 200) {
    data = await response.json();
  } else alert(response.status + response.statusText);
  return data;
}

export async function allProductTypes() {
  let data = [];

  let response = await fetch(GOODS_API_URI + "/" + GOODS_TYPE_PATH);
  if (response.status === 200) {
    data = await response.json();
  } else alert(response.status + response.statusText);

  return data;
}
