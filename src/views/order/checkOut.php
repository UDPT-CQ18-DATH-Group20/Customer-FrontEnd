
<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <form class="mt-3 collapse review-form-box" id="formLogin">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword" placeholder="Password"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Login</button>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    
                    <form class="mt-3 collapse review-form-box" id="formRegister">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">First Name</label>
                                <input type="text" class="form-control" id="InputName" placeholder="First Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Last Name</label>
                                <input type="text" class="form-control" id="InputLastname" placeholder="Last Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword1" placeholder="Password"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Register</button>
                    </form>
                </div>
            </div>
            <form class="needs-validation" action="index.php?controller=order&action=createOrder" method="POST"novalidate>
                <div class="row">
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Billing address</h3>
                            </div>
                            <!-- <form class="needs-validation" novalidate> -->
                                <div class="mb-3">
                                    <label for="receiver">Receiver</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="receiver" name="receiver" placeholder="" required>
                                        <div class="invalid-feedback" style="width: 100%;"> Receiver is required. </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="" required>
                                    <div class="invalid-feedback"> Phone is required. </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email Address </label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address </label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="" required>
                                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                                </div>
                                <hr class="mb-1"> 
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <div class="title-left">
                                        <h3>Your order</h3>
                                    </div>
                                    <div class="d-flex">
                                        <div class="font-weight-bold">Product</div>
                                        <div class="ml-auto font-weight-bold">Total</div>
                                    </div>
                                    <hr class="my-1">
                                    <?php if(isset($cart)): ?>
                                        <?php
                                            $grand_total = 0;
                                            foreach ($cart->items as $item) 
                                            {
                                                $grand_total += $item->sum_amount;
                                        ?>
                                            <div class="d-flex">
                                                <h4><?=$item->name?></h4>
                                                <div class="ml-auto font-weight-bold"><?=$item->sum_amount?></div>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                    <?php endif; ?>
                                    <hr class="my-1">
                                    <div class="d-flex gr-total">
                                        <h5>Grand Total</h5>
                                        <div class="ml-auto h5">
                                            <?php if(isset($grand_total)): ?>
                                                <?=$grand_total?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <hr> </div>
                            </div>
                            <div class="col-12 d-flex shopping-box"> <button type="submit" class="ml-auto btn hvr-hover">Place Order</button> </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <?php if(isset($response)): ?>
    <div class="breadcrumb">
        <li class="breadcrumb-item"><?= $response->result ?></li>
    </div>
    <?php endif; ?>
    <!-- End Cart -->