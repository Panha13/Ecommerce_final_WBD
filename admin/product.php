<?php
include '../GlobalClass/Product.php';
$tbl = "tbl_product";
$comp = "Product";
$id = "prod_id";
$name = "prod_name";
$des = "prod_des";
$instock = "prod_instock";
$price = "prod_price";
$img = "prod_img";
$p = new Product($conn, $tbl, $id, $comp);
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
                $p->Show($_GET['id'], $_GET['active']);
                break;
            case "1":
                $p->Move($_GET['id'], $_GET['order'], '<', 'desc');
                break;
            case "2":
                $p->Move($_GET['id'], $_GET['order'], '>', 'asc');
                break;
            case "3":
                $active = $p->CheckActive(isset($_POST['active']));
                $p->id_val = $_GET['id'];
                $p->Update("$name=" . $_POST['name']);
                $p->Update("$des=" . $_POST['des']);
                $p->Update("$instock=" . $_POST['instock']);
                $p->Update("$price=" . $_POST['price']);
                $p->Update("$img=" . $_POST['img']);
                $p->Update("link=" . $_POST['link']);
                $p->Update("active=" . $active);
                break;
            case "4":
                $me->DeleteData($_GET['id']);
                break;
            case '5':
                $name_val = $_POST['name'];
                $des_val = $_POST['des'];
                $instock_val = $_POST['instock'];
                $price_val = $_POST['price'];
                $cate_id = $_POST['cate_id'];
                $brand_id = $_POST['brand_id'];
                $link = $_POST['link'];
                $img_val = $_POST['img'];
                $num++;
                $active = $me->CheckActive(isset($_POST['active']));
                $sql = "insert into $tbl ($name, $des, $instock,$price,cate_id, brand_id, link, $img,active,ordernum)
                values($name_val,$des_val,$instock_val,$price_val,$cate_id,$brand_id, $link, $img_val, $active,$num);";
                echo $sql;
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $p->Dialog();
                } else {
                    $p->Dialog();
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

    $sql = "select p.*, c.cate_name, b.brand_name from $tbl as p left join 
    tbl_category as c on c.cate_id=p.cate_id left join 
    tbl_brand as b on b.brand_id=p.brand_id
    order by ordernum limit " . NUMPERPAGE . " offset " . $offset;
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
                    <th class="text-white" scope="col">Image</th>
                    <th class="text-white" scope="col"><?= $comp ?> Name</th>
                    <th class="text-white" scope="col"><?= $comp ?> Description</th>
                    <th class="text-white" scope="col">Category</th>
                    <th class="text-white" scope="col">Brand</th>
                    <th class="text-white" scope="col"><?= $comp ?> Instock</th>
                    <th class="text-white" scope="col"><?= $comp ?> Price</th>
                    <th class="text-white" scope="col"><?= $comp ?> Link</th>
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
                        <td id="img-<?= $row[$id] ?>" data-value="<?= $row[$img] ?>"><?= $row[$img] ?></td>
                        <td id="name-<?= $row[$id] ?>" data-value="<?= $row[$name] ?>"><?= strlen($row[$name]) > 10 ? substr($row[$name], 0, 10) . '...' : substr($row[$name], 0, 10) ?></td>
                        <td id="des-<?= $row[$id] ?>" data-value="<?= $row[$des] ?>"><?= strlen($row[$des]) > 10 ? substr($row[$des], 0, 10) . '...' : substr($row[$des], 0, 10) ?></td>
                        <td id="cate-<?= $row[$id] ?>" data-value="<?= $row['cate_name'] ?>"><?= strlen($row['cate_name']) > 10 ? substr($row['cate_name'], 0, 10) . '...' : substr($row['cate_name'], 0, 10) ?></td>
                        <td id="brand-<?= $row[$id] ?>" data-value="<?= $row['brand_name'] ?>"><?= strlen($row['brand_name']) > 10 ? substr($row['brand_name'], 0, 10) . '...' : substr($row['brand_name'], 0, 10) ?></td>
                        <td id="instock-<?= $row[$id] ?>" data-value="<?= $row[$instock] ?>"><?= $row[$instock] ?></td>
                        <td id="price-<?= $row[$id] ?>" data-value="<?= $row[$price] ?>"><?= $row[$price] ?></td>
                        <td id="link-<?= $row[$id] ?>" data-value="<?= $row['link'] ?>"><a href="<?= $row['link'] ?>"><?= strlen($row['link']) > 10 ? substr($row['link'], 0, 10) . '...' : substr($row['link'], 0, 10) ?></a> </td>
                        <td>
                            <a href=" index.php?p=products&action=0&id=<?= $row[$id] ?>&active=<?= ($row['active'] == "1" ? "0" : "1") ?>" id="active-<?= $row[$id] ?>" data-value="<?= $row['active'] ?>" style="padding-right: 5px;">
                                <i class=" fas fa-<?= ($row['active'] == "1" ? "eye" : "eye-slash") ?>"></i> </a>
                            <a href="index.php?p=products&action=1&id=<?= $row[$id] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                <i class="fas fa-arrow-up"></i> </a>
                            <a href="index.php?p=products&action=2&id=<?= $row[$id] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                <i class="fas fa-arrow-down"></i> </a>
                            <a href="#" onclick="update(<?= $row[$id] ?>)" data-bs-toggle="modal" data-bs-target="#updateModal" style="padding-right: 5px;">
                                <i class="fas fa-edit"></i> </a>
                            <a href="#" onclick="del(<?= $row[$id] ?>)" data-bs-toggle="modal" data-bs-target="#deleteModal" style="padding-right: 5px;">
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
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($pg > 1 ? "" : "disabled") ?>">
                    <a class="page-link" href="index.php?p=products&pg=<?= ($pg > 1 ? $pg - 1 : 1) ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php
                $i = 1;
                for ($i = 1; $i <= $pagenum; $i++) {
                ?>
                    <li class="page-item <?= ($pg == $i ? "active" : "") ?>"><a class="page-link" href="index.php?p=products&pg=<?= $i ?>">
                            <?= $i ?>
                        </a></li>
                <?php
                }
                ?>
                <li class="page-item <?= ($pg < $pagenum ? "" : "disabled") ?>">
                    <a class="page-link" href="index.php?p=products&pg=<?= ($pg < $pagenum ? $pg + 1 : $pagenum) ?>">Next</a>
                </li>
            </ul>
        </nav>
        <!-- Pagination -->
    <?php
    } ?>
    <!-- TODO: Upload photo to database and making it available on folder normal and thumbnail -->
    <!-- Add products Modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add <?= $comp ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Name</label>
                            <input type="text" class="form-control" name="name" placeholder="<?= $comp ?> Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label"><?= $comp ?> Description</label>
                            <input type="text" class="form-control" name="des" placeholder="<?= $comp ?> Description...">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Instock</label>
                            <input type="text" class="form-control" name="instock" placeholder="<?= $comp ?> Instock...">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Price</label>
                            <input type="text" class="form-control" name="price" placeholder="<?= $comp ?> Price...">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example">
                                <?php
                                $sql = "select * from tbl_category";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?= $row['cate_id'] ?>><?= $row['cate_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Brand</label>
                            <select class="form-select" aria-label="Default select example">
                                <?php
                                $sql = "select * from tbl_brand";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?= $row['brand_id'] ?>><?= $row['brand_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Link</label>
                            <input type="text" class="form-control" name="name" placeholder="<?= $comp ?> Link...">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Chhose Image</label>
                            <input type="file" accept="image/*" class="form-control" name="img">
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
    <!-- Add products Modal  -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Update <?= $comp ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php?p=category&action=5" id="form" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Name</label>
                            <input type="text" id="inputName" class="form-control" name="name" placeholder="<?= $comp ?> Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label"><?= $comp ?> Description</label>
                            <input type="text" id="inputDes" class="form-control" name="des" placeholder="<?= $comp ?> Description...">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Instock</label>
                            <input type="text" id="inputStock" class="form-control" name="instock" placeholder="<?= $comp ?> Instock...">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Price</label>
                            <input type="text" id="inputPrice" class="form-control" name="price" placeholder="<?= $comp ?> Price...">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Category</label>
                            <select class="form-select" id="category" aria-label="Default select example">
                                <?php
                                $sql = "select * from tbl_category";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?= $row['cate_id'] ?>><?= $row['cate_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Brand</label>
                            <select class="form-select" id="brand" aria-label="Default select example">
                                <?php
                                $sql = "select * from tbl_brand";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?= $row['brand_id'] ?>><?= $row['brand_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label"><?= $comp ?> Link</label>
                            <input type="text" class="form-control" id="link" name="inputLink" placeholder="<?= $comp ?> Link...">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Chhose Image</label>
                            <input type="file" accept="image/*" class="form-control" id="inputImage" name="img">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Enable</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add products Modal  -->
</div>
<script>
    function del(id) {
        document.getElementById("deleteBut").href = "index.php?p=products&action=4&id=" + id;
    }

    function update(id) {
        document.getElementById("form").action = "index.php?p=products&action=3&id=" + id;
        let name = document.getElementById("name-" + id).getAttribute("data-value");
        document.getElementById("inputName").value = name;
        let des = document.getElementById("des-" + id).getAttribute("data-value");
        document.getElementById("inputDes").value = des;
        let instock = document.getElementById("instock-" + id).getAttribute("data-value");
        document.getElementById("inputStock").value = instock;
        let price = document.getElementById("price-" + id).getAttribute("data-value");
        document.getElementById("inputPrice").value = price;
        let link = document.getElementById("link-" + id).getAttribute("data-value");
        document.getElementById("inputLink").value = link;
        let img = document.getElementById("img-" + id).getAttribute("data-value");
        document.getElementById("inputImg").value = img;
        if (document.getElementById("active-" + id).getAttribute("data-value") == "0") {
            document.getElementById("active").checked = false;
        } else {
            document.getElementById("active").checked = true;
        }

    }
</script>