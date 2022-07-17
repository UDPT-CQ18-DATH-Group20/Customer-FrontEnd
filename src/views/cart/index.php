<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            <?php
                            foreach ($items as $item) : ?>
                                <tr id="<?= $item->goods_id ?>">
                                    <td class="thumbnail-img">
                                        <a href="<?= PRODUCT_URI . "&id=" . $item->goods_id ?>">
                                            <img class=" img-fluid" src="<?= $item->picture ?>" alt="" width="50" height="50" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            <?= $item->name ?>
                                        </a>
                                    </td>

                                    <td class="quantity-box"><input type="number" size="4" value="<?= $item->quantity ?>" min="1" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p><?= $item->sum_amount ?></p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Total Price</h4>
                        <div id="total-price" class="ml-auto font-weight-bold"><?= $total_amount ?></div>
                    </div>
                    <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div id="shipping-cost" class="ml-auto font-weight-bold"></div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex gr-total">
                        <h5>Total Bill</h5>
                        <div id="total-bill" class="ml-auto h5"></div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex shopping-box"><a href="<?= CHECK_OUT_URI ?>" id="checkout-link" class="ml-auto btn hvr-hover">Checkout</a> </div>
        </div>
    </div>
</div>
<script defer src="script/cart/index/index.js"></script>