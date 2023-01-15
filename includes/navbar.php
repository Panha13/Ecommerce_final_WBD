<!-- Begin Header Bottom Area -->
<div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Header Bottom Menu Area -->
                <div class="hb-menu">
                    <nav class="d-flex justify-content-between">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="dropdown-holder">
                                    <a href="index.php?p=components">Components</a>
                                <ul class="hb-dropdown">
                                    <li>
                                        <a href="index.php?p=components">CPU</a>
                                    </li>
                                    <li>
                                        <a href="index.php?p=components">Hardware</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="index.php?p=laptop">Laptop</a>
                            </li>
                            <li>
                                <a href="index.php?p=accessories">Accessories</a>
                            </li>
                            <li>
                                <a href="index.php?p=about_us">About Us</a>
                            </li>
                            <li>
                                <a href="index.php?p=contact_us">Contact Us</a>
                            </li>
                        </ul>
                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login_modal">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                        </ul>
                    </nav>
                    
                </div>
                
                <!-- Header Bottom Menu Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Header Bottom Area End Here -->
<!-- Begin Mobile Menu Area -->
<div class="mobile-menu-area d-lg-none d-xl-none col-12">
    <div class="container"> 
        <div class="row">
            <div class="mobile-menu">
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area End Here -->

<!-- Modal Login -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <form action="#" >
                <div class="login-form">
                    <h4 class="login-title">Login</h4>
                    <div class="row">
                        <div class="col-md-12 col-12 mb-20">
                            <label>Email Address*</label>
                            <input class="mb-0" type="email" placeholder="Email Address">
                        </div>
                        <div class="col-12 mb-20">
                            <label>Password</label>
                            <input class="mb-0" type="password" placeholder="Password">
                        </div>
                        <div class="col">
                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                <input type="checkbox" id="remember_me">
                                <label for="remember_me">Remember me</label>
                            </div>
                        </div>
                        <div class="col mt-10 mb-20 text-left text-md-right">
                            <a href="#"> Forgotten pasward?</a>
                        </div>
                        <div class="col-12">
                            <button class="register-button mt-0">Login</button>
                        </div>
                        <div class="col mt-25 text-center">
                            <p>Not registered? <a href="#" data-toggle="modal" data-target="#register_modal">Create an account</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Register -->
<div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body ">
            <form action="#">
                <div class="login-form">
                    <h4 class="login-title">Register</h4>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-20">
                            <label>First Name</label>
                            <input class="mb-0" type="text" placeholder="First Name">
                        </div>
                        <div class="col-md-6 col-12 mb-20">
                            <label>Last Name</label>
                            <input class="mb-0" type="text" placeholder="Last Name">
                        </div>
                        <div class="col-md-6 col-12 mb-20">
                            <label>Username</label>
                            <input class="mb-0" type="email" placeholder="Username">
                        </div>
                        <div class="col-md-6 col-12 mb-5">
                            <label>Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Other</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-20">
                            <label>Address</label>
                            <input class="mb-0" type="email" placeholder="Address">
                        </div>
                        
                        <div class="col-md-12 mb-20">
                            <label>Email Address*</label>
                            <input class="mb-0" type="email" placeholder="Email Address">
                        </div>
                        <div class="col-md-6 mb-20">
                            <label>Password</label>
                            <input class="mb-0" type="password" placeholder="Password">
                        </div>
                        <div class="col-md-6 mb-20">
                            <label>Confirm Password</label>
                            <input class="mb-0" type="password" placeholder="Confirm Password">
                        </div>
                        <div class="col-12">
                            <button class="register-button mt-0">Register</button>
                        </div>
                        <div class="col mt-25 text-center">
                            <p>Already have an account? <a href="#" data-toggle="modal" data-target="#login_modal">Log in</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>