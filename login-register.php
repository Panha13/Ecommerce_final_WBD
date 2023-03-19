<?php
// WARNING: I HAVE TO FINISHED THIS TOMORROW 
if (isset($_GET['action'])) {
    $a = $_GET['action'];
    switch ($a) {
        case 'login':
            $uname = $_POST['username'];
            $upass = $_POST['password'];
            $sql = "select user_name, user_id, user_password from tbl_user where user_name='$uname' and user_password='$upass'";

            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            if ($num > 0) {
                $save = 0;
                if (isset($_POST['remember'])) {
                    $save = 1;
                }
                if ($save == 1) {
                    echo "
                    <script>
                    var CookieDate = new Date;
                    CookieDate.setFullYear(CookieDate.getFullYear() +10);
                    document.cookie = 'user_id=" . $row['user_id'] . "; expires=' + CookieDate.toGMTString() + ';';
                    document.cookie = 'user_pf=" . $row['user_pf'] . "; expires=' + CookieDate.toGMTString() + ';';
                    document.cookie = 'user_name=" . $row['user_name'] . "; expires=' + CookieDate.toGMTString() + ';';
                    </script>

                    ";
                } else {
                    $_SESSION["user_id"] = $row['user_id'];
                    $_SESSION["user_pf"] = $row['user_pf'];
                    $_SESSION["user_name"] = $row['user_name'];
                }
                echo '<script type="text/javascript">location.replace("index.php");</script>';
            }
            break;
        case 'register':
            $id = Uid();
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $uname = $_POST['username'];
            $pwd = $_POST['pwd'];
            $cpwd = $_POST['cpwd'];
            if ($pwd == $cpwd) {
                $sql = "insert into tbl_user (user_id,user_firstname,user_lastname,user_email,user_name, user_password)
                    values ('$id','$fname','$lname','$email','$uname', '$pwd')";
                $result = mysqli_query($conn, $sql);
                $_SESSION["uid"] = $id;
                echo '<script type="text/javascript">location.replace("index.php");</script>';
            } else {
            }
            break;
    }
}



?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Login Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="index.php?p=login-register&action=login" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Username</label>
                                <input class="mb-0" type="username" placeholder="Email Address" name="username">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me" name="remember">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="#"> Forgotten pasward?</a>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="index.php?p=login-register&action=register" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>First Name</label>
                                <input class="mb-0" type="text" placeholder="First Name" name="fname">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Last Name</label>
                                <input class="mb-0" type="text" placeholder="Last Name" name="lname">
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address" name="email">
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Username</label>
                                <input class="mb-0" type="text" placeholder="Username" name="username">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password" name="pwd">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password</label>
                                <input class="mb-0" type="password" placeholder="Confirm Password" name="cpwd">
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>