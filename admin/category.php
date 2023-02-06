<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> Cards Premium</h4>
    <?php
    include '../class/global.php';
    $sql = "SELECT * FROM tbl_category";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $tbl = "tbl_category";
    $id = "cate_id";
    $name = "cate_name";
    $des = "cate_des";
    $comp = "Category";
    $active = "active";
    $me = new SuperClass($conn, $tbl, $id, $name, $des, $comp);

    if (isset($_GET['action'])) {
        $a = $_GET['action'];
        switch ($a) {
            case "0":
                $me->id_val = $_GET['id'];
                $me->active = "active=" . $_GET['active'];
                $me->Show();
                break;
            case "1":
                $me->cur_id = $_GET['id'];
                $me->cur_order = $_GET['order'];
                $me->operation = '<';
                $me->order = "desc";
                $me->Move();
                break;
            case "2":
                $me->cur_id = $_GET['id'];
                $me->cur_order = $_GET['order'];
                $me->operation = '>';
                $me->order = "asc";
                $me->Move();
                break;
            case "3":
                $name_val =  $_POST['name'];
                $des_val = $_POST['des'];
                $me->active = $me->CheckActive(isset($_POST['active']));
                $me->id_val = $_GET['id'];
                $me->Update($name, $name_val);
                if ($me->Update($des, $des_val)) {
                    echo "<h4 class='fw-bold py-3 mb-4'>You're Updated Successfully 🎉🎉🎉</h4>";
                }
                break;
            case "4":
                $me->id_val = $_GET['id'];
                $me->DeleteData();
                break;

            case '5':
                $me->name_val = $_POST['name'];
                $me->des_val = $_POST['des'];
                $me->num = $num++;
                $me->active = $me->CheckActive(isset($_POST['active']));
                if ($_POST['name'] != "" || $_POST['des'] != "") {
                    $me->InsertData();
                } else {
                    echo "<h4 class='fw-bold py-3 mb-4'>You have to insert value!!!</h4>";
                }
                break;
        }
    }

    $pagenum = ceil($num / NUMPERPAGE);
    $offset = 0;
    $pg = 1;
    if (isset($_GET['pg'])) {
        $pg = $_GET['pg'];
        $offset = NUMPERPAGE * ($pg - 1);
    }

    $sql = "select * from tbl_category order by ordernum limit " . NUMPERPAGE . " offset " . $offset;
    $result = mysqli_query($conn, $sql);
    ?>
    <button type="button" class="btn btn-primary rounded-circle" style="width:50px;
            position: absolute; bottom: 0; right: 0; 
            font-size: 20px; font-weight: bold;
            margin: 0 35px 35px 0;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i></button>
    <?php if ($num > 0) { ?>
        <table class="table mb-5">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white" scope="col">#</th>
                    <th class="text-white" scope="col">Category Name</th>
                    <th class="text-white" scope="col">Description</th>
                    <th class="text-white" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {

                ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td id="name-<?= $row['cate_id'] ?>" data-value="<?= $row['cate_name'] ?>"><?= $row['cate_name'] ?></td>
                        <td id="des-<?= $row['cate_id'] ?>" data-value="<?= $row['cate_des'] ?>"><?= substr($row['cate_des'], 0, 50) . '...' ?></td>
                        <td>
                            <a href=" index.php?p=category&action=0&id=<?= $row['cate_id'] ?>&active=<?= ($row['active'] == "1" ? "0" : "1") ?>" id="active-<?= $row['cate_id'] ?>" data-value="<?= $row['active'] ?>" style="padding-right: 5px;">
                                <i class=" fas fa-<?= ($row['active'] == "1" ? "eye" : "eye-slash") ?>"></i> </a>
                            <a href="index.php?p=category&action=1&id=<?= $row['cate_id'] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                <i class="fas fa-arrow-up"></i> </a>
                            <a href="index.php?p=category&action=2&id=<?= $row['cate_id'] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                <i class="fas fa-arrow-down"></i> </a>
                            <a href="#" onclick="update(<?= $row['cate_id'] ?>)" data-bs-toggle="modal" data-bs-target="#updateModal" style="padding-right: 5px;">
                                <i class="fas fa-edit"></i> </a>
                            <a href="#" onclick="del(<?= $row['cate_id'] ?>)" data-bs-toggle="modal" data-bs-target="#deleteModal" style="padding-right: 5px;">
                                <i class="fas fa-trash"></i> </a>

                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h4 class="fw-bold py-3 mb-4">You don't have any Category yet 🥲🥲🥲</h4>
    <?php }
    if ($num > NUMPERPAGE) {
    ?>
        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($pg > 1 ? "" : "disabled") ?>">
                    <a class="page-link" href="index.php?p=category&pg=<?= ($pg > 1 ? $pg - 1 : 1) ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php
                $i = 1;
                for ($i = 1; $i <= $pagenum; $i++) {
                ?>
                    <li class="page-item <?= ($pg == $i ? "active" : "") ?>"><a class="page-link" href="index.php?p=category&pg=<?= $i ?>">
                            <?= $i ?>
                        </a></li>
                <?php
                }
                ?>
                <li class="page-item <?= ($pg < $pagenum ? "" : "disabled") ?>">
                    <a class="page-link" href="index.php?p=category&pg=<?= ($pg < $pagenum ? $pg + 1 : $pagenum) ?>">Next</a>
                </li>
            </ul>
        </nav>
        <!-- Pagination -->
    <?php
    } ?>
    <!-- TODO: Upload photo to database and making it available on folder normal and thumbnail -->
    <!-- Add Category Modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php?p=category&action=5" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="title" name="name" placeholder="Category Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Category Description</label>
                            <input type="text" class="form-control" id="subtitle" name="des" placeholder="Category Description...">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Enable</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Category Modal  -->

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="#" id="deleteBut" class="btn btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm Delete Modal -->
    <!-- TODO: Update on Photo -->
    <!-- Update Category Modal  -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="form" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Category Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Category Description</label>
                            <input type="text" class="form-control" id="inputDes" name="des" placeholder="Category Description...">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                            <label class="form-check-label" for="active">Enable</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Category Modal  -->
</div>
<script>
    function del(id) {
        document.getElementById("deleteBut").href = "index.php?p=category&action=4&id=" + id;
    }

    function update(id) {
        document.getElementById("form").action = "index.php?p=category&action=3&id=" + id;
        let name = document.getElementById("name-" + id).getAttribute("data-value");
        document.getElementById("inputName").value = name;
        let des = document.getElementById("des-" + id).getAttribute("data-value");
        document.getElementById("inputDes").value = des;
        if (document.getElementById("active-" + id).getAttribute("data-value") == "0") {
            document.getElementById("active").checked = false;
        } else {
            document.getElementById("active").checked = true;
        }

    }
</script>