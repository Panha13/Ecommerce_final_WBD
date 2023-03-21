<?php
include('../library/img.php');
$db = new PO('tbl_config');
if (isset($_GET['action'])) {
    $a = $_GET['action'];
    switch ($a) {
        case 'us':
            if (isset($_POST['username'])) {
                $arr = ['username' => $_POST['username']];
                $result = $db->Update($arr, 'config_id=1');
            }
            break;
        case 'pw':
            if (isset($_POST['password'])) {
                $arr = ['password' => $_POST['password']];
                $result = $db->Update($arr, 'config_id=1');
            }
            break;
        case 'fb':
            if (isset($_POST['facebook'])) {
                $arr = ['facebook' => $_POST['facebook']];
                $result = $db->Update($arr, 'config_id=1');
            }
            break;
        case 'pin':
            if (isset($_POST['pinterest'])) {
                $arr = ['pinterest' => $_POST['pinterest']];
                $result = $db->Update($arr, 'config_id=1');
            }
            break;

        case 'logo':
            $destination = "../images/logo/";
            if (isset($_FILES['img'])) {
                include('includes/img2.php');
                if ($ext == "jpg" || $ext == "jpeg" || $ext == "gif" || $ext == "png") {
                    include('includes/img1.php');
                    $arr = ['logo' => $img_val];
                    $result = $db->Update($arr, 'config_id=1');
                    if ($result) {
                        move_uploaded_file($tmp_name, $destination . $img_val);
                        unlink('../images/logo/' . $_GET['img']);
                    }
                } else {
                    $errmsg = "Only image file is allowed to upload!";
                    $p->Dialog($errmsg, "warning");
                }
            }
    }
}


?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Configuration /</span> Cards Basic</h4>
    <table class="table">
        <tbody>
            <?php
            $show = false;
            $db = new PO('tbl_config');
            $rows = $db->Select();
            foreach ($rows as $row) {
                # code...
            ?>
                <tr>
                    <th>Facebook</th>
                    <th id="face" data-value="<?= $row->facebook ?>"><a href="<?= $row->facebook ?>"><?= $row->facebook ?></a></th>
                    <th><a href="#" data-bs-toggle="modal" data-bs-target="#fb">Edit</a></th>
                </tr>
                <tr>
                    <th>Pinterest</th>
                    <th id="pint" data-value="<?= $row->pinterest ?>"><a href="<?= $row->pinterest ?>"><?= $row->pinterest ?></a></th>
                    <th><a href="#" data-bs-toggle="modal" data-bs-target="#pin">Edit</a></th>
                </tr>
                <tr>
                    <th>Username</th>
                    <th id="user" data-value="<?= $row->username ?>"><?= $row->username ?></th>
                    <th><a href="#" data-bs-toggle="modal" data-bs-target="#u">Edit</a></th>
                </tr>
                <tr>
                    <th>Password</th>
                    <input type="hidden" id="pwd" data-value="<?= $row->password ?>">
                    <th>***************************</th>
                    <th><a href="#" data-bs-toggle="modal" data-bs-target="#p">Edit</a></th>
                </tr>
                <tr>
                    <th>Logo</th>
                    <th id="logo" data-value="<?= $row->logo ?>"><img height="50px" src="../images/logo/<?= $row->logo ?>" alt="" srcset=""></th>
                    <th><a href="#" data-bs-toggle="modal" data-bs-target="#l">Edit</a></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- LOGO -->
<div class="modal fade" id="l" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Logo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="lg" action="index.php?p=socialmedia&action=logo" method="post" enctype="multipart/form-data">
                    <img id="logoImg" height="50px" class="mb-5" src="#" alt="" srcset="">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Choose Image</label>
                        <input class="form-control" type="file" id="formFile" name="img">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- // FACEBOOK -->
<div class="modal fade" id="fb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Facebook Link</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?p=socialmedia&action=fb" method="post">
                    <label for="facebookEdit">Your new Facebook Link</label>
                    <input type="text" name="facebook" class="form-control" id="facebookEdit">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- // PINTEREST -->
<div class="modal fade" id="pin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pinterest Link</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?p=socialmedia&action=pin" method="post">
                    <label for="facebookEdit">Your new Pinterest Link</label>
                    <input type="text" name="pinterest" class="form-control" id="pinterestEdit">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //USERNAME -->
<div class="modal fade" id="u" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Username</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?p=socialmedia&action=us" method="post">
                    <label for="facebookEdit">Your new Username</label>
                    <input type="text" name="username" class="form-control" id="usernameEdit">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //PASSWORD -->
<div class="modal fade" id="p" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?p=socialmedia&action=pw" id="changePass" method="post">
                    <label for="facebookEdit">Old Password</label>
                    <input placeholder="Your old password..." type="password" class="form-control" id="oldPassword">
                    <small style="color: rgb(214, 44, 32); margin:15px 0" id="oldText"></small>

                    <label for="facebookEdit">New Password</label>
                    <input placeholder="Your New password..." type="password" class="form-control" id="newPassword" name="password">
                    <small style="color: rgb(214, 44, 32); margin:15px 0" id="newText"></small>

                    <label for="facebookEdit">Confirm Password</label>
                    <input placeholder="Your Confirm password..." type="password" class="form-control" id="confirmPassword">
                    <small style="color: rgb(214, 44, 32); margin:15px 0" id="confirmText"></small>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let facebook = document.getElementById('face').getAttribute('data-value');
    document.getElementById('facebookEdit').value = facebook;

    let pinterest = document.getElementById('pint').getAttribute('data-value');
    document.getElementById('pinterestEdit').value = pinterest;

    let username = document.getElementById('user').getAttribute('data-value');
    document.getElementById('usernameEdit').value = username;

    let logo = document.getElementById('logo').getAttribute('data-value');
    document.getElementById('logoImg').src = "../images/logo/" + logo;
    document.getElementById('lg').action = "index.php?p=socialmedia&action=logo&img=" + logo;

    let oldPass = document.getElementById('oldPassword');
    let newPassword = document.getElementById('newPassword');
    let confirmPassword = document.getElementById('confirmPassword');
    let password = document.getElementById('pwd').getAttribute('data-value');

    document.getElementById("changePass").addEventListener("submit", (e) => {
        if (oldPass.value === password) {
            if (newPassword.value !== "") {
                if (confirmPassword.value === newPassword.value) {

                } else {
                    e.preventDefault();
                    document.getElementById('oldText').innerHTML = "";
                    document.getElementById('confirmText').innerHTML = "Check your password and try again <br />";
                }

            } else {
                e.preventDefault();
                document.getElementById('oldText').innerHTML = "";
                document.getElementById('newText').innerHTML = "Your password atleast 8 letter <br />";

            }
        } else {
            e.preventDefault();
            document.getElementById('oldText').innerHTML = "Check your password and try again <br />";
        }
        console.log(password);
        console.log(oldPass.value);
    });
</script>