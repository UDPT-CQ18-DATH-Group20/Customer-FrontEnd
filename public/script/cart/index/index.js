const cartItemsElem = document.getElementById("cart-items");
const totalBillElem = document.getElementById("total-bill");
const shippingCostElem = document.getElementById("shipping-cost");
const totalPriceElem = document.getElementById("total-price");
var totalPrice = Number(totalPriceElem.textContent);
var shippingCost = 0;

updateOrderSumary();

(function () {
  for (const cartItemElem of cartItemsElem.children) {
    var quantityBoxElem = cartItemElem.querySelector(".quantity-box");
    var inputQuantityElem = quantityBoxElem.querySelector(
      'input[type="number"]'
    );
    var removeProductElem = cartItemElem.querySelector(".remove-pr");
    var removeAnchorElem = removeProductElem.querySelector("a");

    inputQuantityElem.addEventListener(
      "change",
      updateItem.bind(null, cartItemElem.id)
    );
    removeAnchorElem.addEventListener(
      "click",
      removeItem.bind(null, cartItemElem.id)
    );
  }
})();
async function removeItem(good_id) {
  var res = await fetch(
    `/index.php?controller=cart&action=remove-item&good_id=${good_id}`,
    { method: "GET" }
  );

  // if (res.ok) {
  //   let itemElem = document.getElementById(good_id);
  //   let totalPriceElem = itemElem.querySelector(".total-pr");
  //   totalPrice -= Number(
  //     totalPriceElem.getElementsByTagName("p")[0].textContent
  //   );
  //   itemElem.remove();
  //   updateOrderSumary();
  // }
  var msg = await res.json();
  if (res.ok) {
    alert(msg.message);
  } else alert(msg.status, msg.message);

  window.location.reload();
}

async function updateItem(good_id, event) {
  var quantity = Number(event.target.value);

  if (quantity < 1 || !Number.isInteger(quantity)) {
    alert("Quantity must be positive interger");
    window.location.reload();
    return;
  }

  let params = new URLSearchParams();
  params.append("controller", "cart");
  params.append("action", "update-item");
  params.append("good_id", good_id);
  params.append("quantity", quantity);
  console.log("/index.php" + "?" + params);
  var request = new Request("/index.php" + "?" + params, {
    method: "PATCH",
  });

  var res = await fetch(request);

  var msg = await res.json();
  if (res.ok) {
    alert(msg.message);
  } else alert(msg.status, msg.message);

  window.location.reload();
}

async function updateQuantityItem(good_id) {}

function updateOrderSumary() {
  totalPriceElem.textContent = totalPrice;
  shippingCostElem.textContent = shippingCost;
  totalBillElem.textContent = totalPrice + shippingCost;

  if (!cartItemsElem.children.length) {
    let checkOutElem = document.getElementById("checkout-link");
    checkOutElem.classList.add("disabled");
  }
}
