<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#pablo">Login Page</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/index.php?controller=account&action=register" class="nav-link">
            <i class="material-icons">person_add</i> Đăng kí
          </a>
        </li>
        <li class="nav-item active">
          <a href="/index.php?controller=account&action=login" class="nav-link">
            <i class="material-icons">fingerprint</i> Đăng nhập
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('assets/img/login.jpg'); background-size: cover; background-position: top center;">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
          <form class="form" method="POST" action="/index.php?controller=account&action=sign-in">
            <div class="card card-login card-hidden">
              <div class="card-header card-header-rose text-center">
                <h4 class="card-title">Login</h4>
              </div>
              <div class="card-body ">
                <p class="card-description text-center"></p>
                <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">account_circle</i>
                      </span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="username...">
                  </div>
                </span>
                <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="password...">
                  </div>
                </span>
              </div>
              <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-rose btn-link btn-lg">Lets Go</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>