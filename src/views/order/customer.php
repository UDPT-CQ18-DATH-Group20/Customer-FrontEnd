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
                                     <?php if($order->status==="Received"):?>
                                     <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                         data-id="<?=$order->_id?>" data-whatever='<?= json_encode($order->items)?>'>Đánh giá</a>
                                     <?php endif;?>
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

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="product-name">
                         Ssssssssss
                     </div>
                     <div class="form-group">
                         <input type="number" name="inputName" id="rate" class="rating text-warning"
                             data-clearable="remove" value="5" />
                         <input type="text" class="form-control" id="recipient-name">
                     </div>
                     <button type="button" class="btn btn-primary">Send message</button>
                 </form>
                 <hr>
                 <form>
                     <div class="product-name">
                         Ssssssssss
                     </div>
                     <div class="form-group">
                         <input type="number" name="inputName" id="rate" class="rating text-warning"
                             data-clearable="remove" value="5" />
                         <input type="text" class="form-control" id="recipient-name">
                         <button type="button" class="btn btn-primary">Send message</button>
                     </div>

                 </form>
                 <hr>
             </div>
             <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div> -->
         </div>
     </div>
 </div>

 <!-- <?php foreach ($response as $order):?>
    <?php if($order->status==="Received"):?>
        <div class="modal fade" id="comment<?=$order->_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
 <?php endforeach;?> -->