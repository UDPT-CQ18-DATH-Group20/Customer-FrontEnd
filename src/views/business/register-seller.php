<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Register Page</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item  active ">
                    <a href="" class="nav-link">
                        <i class="material-icons">person_add</i> Đăng kí
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page">
    <div class="page-header register-page header-filter" filter-color="black"
        style="background-image: url('/assets/img/register.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Đăng kí bán hàng</h2>
                        <div class="card-body">
                            <form class="form" id="register-seller" method="POST" action="?controller=business&action=register"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                    <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Tên tài khoản" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                                </div>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Mật khẩu" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Email..." required="true">
                                            </div>
                                        </div>

                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">phone</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Số điện thoại..." required="true">
                                            </div>
                                        </div>

                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">store</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Tên cửa hàng..." required="true">
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">map</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Địa chỉ..." required="true">
                                            </div>
                                        </div>

                                        <div class="form-group has-default">
                                            <div class="input-group">

                                                <div class="fileinput fileinput-new text-center"
                                                    data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail img-circle">
                                                        <img src="assets/img/placeholder.jpg" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Chọn logo</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="logo" style="z-index:0;" />
                                                        </span>
                                                        <a href="#pablo"
                                                            class="btn btn-danger btn-round fileinput-exists"
                                                            data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                            Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="picture-container">
                                            <h6 class="description">Các giấy phép</h6>

                                            <div class="picture">
                                                <input type="file" name="licenses[]" id="wizard-picture" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="receptionist_name" class="form-control"
                                                    placeholder="Tên lễ tân..." required="true">
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">category</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="goods_type" value=""
                                                    class="form-control tagsinput" placeholder="Loại hàng ..."
                                                    data-role="tagsinput" data-color="info" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">light_mode</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="opening_time" class="form-control timepicker"
                                                    value="8" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bedtime_off</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="closing_time" class="form-control timepicker"
                                                    value="20" required="true">

                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">timer</i>
                                                    </span>
                                                </div>
                                                <input type="text" name="established_date"
                                                    class="form-control datetimepicker" required="true">

                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked=""
                                                    required="true">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                Tôi đồng ý với
                                                <a href="#something">các điểu khoản và điểu kiện</a>.
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button href="#pablo" type="submit"
                                                class="btn btn-primary btn-round mt-4">Đăng ký</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                        <div class="warring-red" id='alert_msg'>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com/">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="https://creative-tim.com/presentation">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com/">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                    document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
        </footer>
    </div>
</div>