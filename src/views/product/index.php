    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= SHOPPING_URI ?>">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="<?= $product->picture ?>" alt="First slide"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?= $product->name ?></h2>
                        <h5><?= $product->price ?></h5>
                        <h4>Loại: <?= $product->type ?></h4>
                        <p>Còn: <?= $product->remains ?> </p>
                        <ul>
                            <li>
                                <form action="<?= ADD_TO_CART_URI . "&id={$product->_id}" ?>" method="POST">
                                    <div class="form-group quantity-box">
                                        <label class="control-label">Quantity</label>
                                        <input id='product-quantity' class="form-control" name="quantity" value="1" min="0" max="100" type="number">
                                    </div>
                                    <div class="price-box-bar">
                                        <div class="cart-and-bay-btn">
                                            <!-- <a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a> -->
                                            <button id="add-to-cart" type="submit" class="btn hvr-hover" data-fancybox-close="">Add to cart</button>
                                        </div>
                                    </div>
                                    <form>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="card card-outline-secondary my-4" style="width: 100%;">
                    <div class="card-header">
                        <h2>Thông tin cửa hàng</h2>
                    </div>
                    <div class="card-body">
                        <div class="media mb-3">
                            <div class="mr-2">
                                <img class="rounded-circle border p-1" width="64" height="64" src="<?= $product->store_id->logo ?>" alt="Logo">
                            </div>
                            <div class="media-body">
                                <p>Tên cửa hàng: <?= $product->store_id->name ?></p>
                                <p>Địa chỉ: <?= $product->store_id->email ?></p>
                                <small class="text-muted">SĐT: <?= $product->store_id->phone ?></small></br>
                                <small class="text-muted">Email: <?= $product->store_id->email ?></small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        <h2>Product Reviews</h2>
                    </div>
                    <div class="card-body">
                        <div class="media mb-3">
                            <div class="mr-2">
                                <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                            </div>
                            <div class="media-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam
                                    inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam
                                    aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                                <small class="text-muted">Posted by Anonymous on 3/1/18</small>
                            </div>
                        </div>
                        <hr>
                        <a href="#" class="btn hvr-hover">Leave a Review</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Detail  -->
    <!-- <script defer type="module" src="script/product/index/index.js"></script> -->