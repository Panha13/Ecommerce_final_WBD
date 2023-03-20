<?php
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

        default:
            # code...
            break;
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
            $row = $db->Select();
            $result = $row->fetch();
            ?>
            <tr>
                <th>Facebook</th>
                <th id="face" data-value="<?= $result->facebook ?>"><a href="<?= $result->facebook ?>"><?= $result->facebook ?></a></th>
                <th><a href="#" data-bs-toggle="modal" data-bs-target="#fb">Edit</a></th>
            </tr>
            <tr>
                <th>Pinterest</th>
                <th id="face" data-value="<?= $result->pinterest ?>"><a href="<?= $result->pinterest ?>"><?= $result->pinterest ?></a></th>
                <th><a href="#" data-bs-toggle="modal" data-bs-target="#pin">Edit</a></th>
            </tr>
            <tr>
                <th>Username</th>
                <th id="user" data-value="<?= $result->username ?>"><?= $result->username ?></th>
                <th><a href="#" data-bs-toggle="modal" data-bs-target="#u">Edit</a></th>
            </tr>
            <tr>
                <th>Password</th>
                <input type="hidden" id="pwd" data-value="<?= $result->password ?>">
                <th>*************************************</th>
                <th><a href="#" data-bs-toggle="modal" data-bs-target="#p">Edit</a></th>
            </tr>
        </tbody>
    </table>
</div>
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