const GOODS_URI = "/api/goods";
const GOODS_TYPE_URI = "/api/goods/type";
const LIMIT = 100;
const SKIP = 0;

export async function searchGoods(search, types = []) {
  let params = new URLSearchParams();
  if (search) {
    params.append("search", search);
  }
  console.log(search);

  if (types) {
    for (const type of types) {
      console.log(type);
      params.append("type", type);
    }
  }

  params.append("limit", LIMIT);
  params.append("skip", SKIP);

  var request = new Request(GOODS_URI + "?" + params, {
    method: "GET",
  });

  let response = await fetch(request);
  let data = [];
  if (response.status === 200) {
    data = await response.json();
  } else alert(response.status + response.statusText);
  return data;
}

export async function getGoodsType() {
  let data = [];

  let response = await fetch(GOODS_TYPE_URI);
  if (response.status === 200) {
    data = await response.json();
  } else alert(response.status + response.statusText);

  return data;
}
