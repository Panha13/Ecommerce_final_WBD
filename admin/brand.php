<?php
$db = new PO('tbl_brand');
include '../GlobalClass/Globals.php';
$pages = "index.php?p=brand";
$tbl = "tbl_brand";
$comp = "Brand";
$id = "brand_id";
$name = "brand_name";
$des = "brand_des";
$p = new Globals($conn, $tbl, $id, $comp);
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= $comp ?> /</span> Cards Premium</h4>
    <?php
    $sql = "SELECT * FROM $tbl";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if (isset($_GET['action'])) {
        $a = $_GET['action'];
        switch ($a) {
            case "0":
                $p->Show($_GET['id'], $_GET['active'], $_GET['name']);
                break;
            case "1":
                $p->Move($_GET['id'], $_GET['order'], '<', 'desc', "Up");
                break;
            case "2":
                $p->Move($_GET['id'], $_GET['order'], '>', 'asc', "Down");
                break;
            case "3":
                //TODO: Let it can update with picute
                $active = $p->CheckActive(isset($_POST['active']));
                $arr = [$name => $_POST['name'], $des => $_POST['des'], 'active' => $active];
                $result = $db->Update($arr, $id . '=' . $_GET['id']);
                if ($result) $p->Dialog("Updated Successfully 🎉🎉🎉", "primary");
                break;
            case "4":
                $p->Delete($_GET['id']);
                break;
            case '5':
                $name_val = $_POST['name'];
                $des_val = $_POST['des'];
                $num++;
                $active = $p->CheckActive(isset($_POST['active']));
                $sql = "insert into $tbl($name,$des, active, ordernum) values('$name_val','$des_val',$active,$num);";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $p->Dialog("Insert $comp Successfully 🎉🎉🎉", "primary");
                } else {
                    $p->Dialog("Insert $comp Failed 🥲🥲🥲", "danger");
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

    $sql = "select * from $tbl order by ordernum limit " . NUMPERPAGE . " offset " . $offset;
    $result = mysqli_query($conn, $sql);
    ?>
    <button type="button" class="btn btn-primary rounded-circle" style="width:50px;
        position: absolute; bottom: 0; right: 0; 
        font-size: 20px; font-weight: bold;
        margin: 0 35px 35px 0;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        " data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa-solid fa-plus"></i></button>

    <?php if ($num > 0) { ?>
        <table class="table mb-5">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white" scope="col">#</th>
                    <th class="text-white" scope="col"><?= $comp ?> Name</th>
                    <th class="text-white" scope="col"><?= $comp ?> Description</th>
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
                        <td id="name-<?= $row[$id] ?>" data-value="<?= $row[$name] ?>"><?= strlen($row[$name]) > 20 ? substr($row[$name], 0, 20) . '...' : substr($row[$name], 0, 20) ?></td>
                        <td id="des-<?= $row[$id] ?>" data-value="<?= $row[$des] ?>"><?= strlen($row[$des]) > 20 ? substr($row[$des], 0, 20) . '...' : substr($row[$des], 0, 20) ?></td>
                        <td>
                            <a id="active-<?= $row[$id] ?>" data-value="<?= $row['active'] ?>" href="<?= $pages ?>&action=0&id=<?= $row[$id] ?>&active=<?= ($row['active'] == "1" ? "0" : "1") ?>&name=<?= $row[$name] ?>" style="padding-right: 5px;">
                                <i class=" fas fa-<?= ($row['active'] == "1" ? "eye" : "eye-slash") ?>"></i> </a>
                            <a href="<?= $pages ?>&action=1&id=<?= $row[$id] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                <i class="fas fa-arrow-up"></i> </a>
                            <a href="<?= $pages ?>&action=2&id=<?= $row[$id] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                <i class="fas fa-arrow-down"></i> </a>
                            <a href="#" onclick="update(<?= $row[$id] ?>)" data-bs-toggle="modal" data-bs-target="#updateModal" style="padding-right: 5px;">
                                <i class="fas fa-edit"></i> </a>
                            <a href="" onclick="del('<?= $row[$id] ?>')" data-bs-toggle="modal" data-bs-target="#deleteModal" style="padding-right: 5px;">
                                <i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h4 class="fw-bold py-3 mb-4">You don't have any <?= $comp ?> yet 🥲🥲🥲</h4>
    <?php }
    if ($num > NUMPERPAGE) {
    ?>
        <!-- Pagination -->
        <?php include 'components/pagination.php' ?>
        <!-- Pagination -->
    <?php
    } ?>
    <!-- TODO: Upload photo to database and making it available on folder normal and thumbnail -->

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this <?= $comp ?>?
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
    <!-- Update products Modal  -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $comp ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= $pages ?>&action=5" id="form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Name</label>
                            <input type="text" id="inputName" class="form-control" name="name" placeholder="<?= $comp ?> Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label"><?= $comp ?> Description</label>
                            <textarea name="des" id="inputDes" class="form-control" placeholder="Description..." cols="10" rows="4"></textarea>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="inputActive" name="active" checked>
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
    <!-- Add products Modal  -->
</div>
<script>
    function del(id) {
        document.getElementById("deleteBut").href = "<?= $pages ?>&action=4&id=" + id;
    }

    function update(id) {
        document.getElementById("form").action = "<?= $pages ?>&action=3&id=" + id;
        let name = document.getElementById("name-" + id).getAttribute("data-value");
        document.getElementById("inputName").value = name;
        let des = document.getElementById("des-" + id).getAttribute("data-value");
        document.getElementById("inputDes").value = des;
        let link = document.getElementById("link-" + id).getAttribute("data-value");
        document.getElementById("inputLink").value = link;
        if (document.getElementById("active-" + id).getAttribute("data-value") === "0") {
            document.getElementById("inputActive").checked = false;
        } else {
            document.getElementById("inputActive").checked = true;
        }

    }
</script>