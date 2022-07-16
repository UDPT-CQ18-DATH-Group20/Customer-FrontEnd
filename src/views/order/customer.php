 <!-- Start All Title Box -->
 <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Products</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($response as $order) 
                                    {
                                ?>
                                    <tr>
                                        <td class="name-pr">
                                            <?=$order->receiver_name?>
                                        </td>
                                        <td class="name-pr">
                                            <?=$order->phone?>
                                        </td>
                                        <td class="name-pr">
                                            <?=$order->email?>
                                        </td>
                                        <td class="name-pr">
                                            <?=$order->address?>
                                        </td>
                                        <td class="name-pr">
                                            <?php
                                                foreach ($order->items as $item) 
                                                {
                                            ?>
                                                <?=$item->name?><br>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="name-pr">
                                            <?php
                                                foreach ($order->items as $item) 
                                                {
                                            ?>
                                                <?=$item->quantity?><br>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="price-pr">
                                            <p>
                                            <?php
                                                foreach ($order->items as $item) 
                                                {
                                            ?>
                                                <?=$item->sum_amount?><br>
                                            <?php
                                                }
                                            ?>
                                            </p>
                                        </td>
                                        <td class="price-pr">
                                            <?=$order->total_amount?>
                                        </td>
                                        <td class="name-pr">
                                            <?=$order->status?>
                                        </td>
                                        <td class="remove-pr">
                                            <a href="#">
                                        <i class="fa fa-shopping-bag"></i>
                                    </a>
                                        </td>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <div style="float:right">
                            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- End Cart -->