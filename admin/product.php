<!-- #IMPORTANT: I will add picture when i've done easy thing -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Cards Premium</h4>
    <?php
    $sql = "SELECT * FROM tbl_product";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if (isset($_GET['action'])) {
        $a = $_GET['action'];
        switch ($a) {
            case "0":
                $id = $_GET['id'];
                $active = $_GET['active'];
                $sql = "update tbl_product set active = $active WHERE prod_id = $id;";
                mysqli_query($conn, $sql);
                break;
            case "1":
                $cur_id = $_GET['id'];
                $cur_order = $_GET['order'];
                $sql = "select prod_id,ordernum from tbl_product where ordernum < $cur_order order by ordernum desc limit 1;";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    $row = mysqli_fetch_array($result);
                    $new_id = $row['prod_id'];
                    $new_order = $row['ordernum'];
                    $sql = "update tbl_product set ordernum = $new_order where prod_id = $cur_id";
                    mysqli_query($conn, $sql);
                    $sql = "update tbl_product set ordernum = $cur_order where prod_id = $new_id";
                    mysqli_query($conn, $sql);
                }
                break;
            case "2":
                $cur_id = $_GET['id'];
                $cur_order = $_GET['order'];
                $sql = "select prod_id,ordernum from tbl_product where ordernum > $cur_order order by ordernum asc limit 1;";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    $row = mysqli_fetch_array($result);
                    $new_id = $row['prod_id'];
                    $new_order = $row['ordernum'];
                    $sql = "update tbl_product set ordernum = $new_order where prod_id = $cur_id";
                    mysqli_query($conn, $sql);
                    $sql = "update tbl_product set ordernum = $cur_order where prod_id = $new_id";
                    mysqli_query($conn, $sql);
                }
                break;
            case "3":
                $name = $_POST['name'];
                $des = $_POST['des'];
                $instock = $_POST['instock'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $brand = $_POST['brand'];
                $link = $_POST['link'];
                $active = 0;
                $id = $_GET['id'];
                if (isset($_POST['active'])) {
                    $active = 1;
                }
                echo $sql = "update tbl_product set prod_name='$name', prod_des='$des',prod_instock=$instock, prod_price=$price, brand_id=$brand, cate_id=$category, link='$link', active=$active where prod_id=$id";
                mysqli_query($conn, $sql);
                break;
            case "4":
                $id = $_GET['id'];
                $sql = "delete from tbl_product where prod_id=$id;";
                mysqli_query($conn, $sql);
                break;
            case '5':
                $name = $_POST['name'];
                $des = $_POST['des'];
                $instock = $_POST['instock'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $brand = $_POST['brand'];
                $img = "#";
                $link = $_POST['link'];
                $active = 0;
                if (isset($_POST['active'])) {
                    $active = 1;
                }
                $num++;
                $sql = "insert into tbl_product(prod_name, prod_des, prod_instock, prod_price, cate_id, brand_id, prod_img, link, active, ordernum) values('$name','$des',$instock,$price,$category,$brand,'$img','$link','$active','$num')";
                mysqli_query($conn, $sql);
    ?>
                <h4 class="fw-bold py-3 mb-4">You're Successfully Added 🎉🎉🎉</h4>
    <?php
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

    $sql = "select p.* , cate_name, brand_name from tbl_product as p INNER JOIN tbl_category as c on p.cate_id=c.cate_id INNER JOIN tbl_brand as b on p.brand_id=b.brand_id ORDER BY ordernum limit " . NUMPERPAGE . " offset " . $offset;
    $result = mysqli_query($conn, $sql);
    ?>
    <button type="button" class="btn btn-primary rounded-circle" style="width:50px;
            position: absolute; bottom: 0; right: 0; 
            font-size: 20px; font-weight: bold;
            margin: 0 35px 35px 0;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i></button>
    <?php
    if ($num > 0) {

    ?>
        <div>
            <table class="table mb-5">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white" scope="col">#</th>
                        <th class="text-white" scope="col">Image</th>
                        <th class="text-white" scope="col">Product Name</th>
                        <th class="text-white" scope="col">Description</th>
                        <th class="text-white" scope="col">Category Name</th>
                        <th class="text-white" scope="col">Brand</th>
                        <th class="text-white" scope="col">Instock</th>
                        <th class="text-white" scope="col">Price</th>
                        <th class="text-white" scope="col">Link</th>
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
                            <td id="img-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_img'] ?>"><?= $row['prod_img'] ?></td>
                            <td id="name-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_name'] ?>"><?= $row['prod_name'] ?></td>
                            <td id="des-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_des'] ?>"><?= substr($row['prod_des'], 0, 50) ?></td>
                            <td id="cate-id-<?= $row['prod_id'] ?>" data-value="<?= $row['cate_id'] ?>"><?= $row['cate_name'] ?></td>
                            <td id="brand-id-<?= $row['prod_id'] ?>" data-value="<?= $row['brand_id'] ?>"><?= substr($row['brand_name'], 0, 50) ?></td>
                            <td id="instock-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_instock'] ?>"><?= $row['prod_instock'] ?></td>
                            <td id="price-<?= $row['prod_id'] ?>" data-value="<?= $row['prod_price'] ?>"><?= substr($row['prod_price'], 0, 50) ?></td>
                            <td id="link-<?= $row['prod_id'] ?>" data-value="<?= $row['link'] ?>"><?= substr($row['link'], 0, 50) ?></td>
                            <td>
                                <a href="index.php?p=products&action=0&id=<?= $row['prod_id'] ?>&active=<?= $row['active'] == 1 ? 0 : 1 ?>" style="padding-right: 5px;">
                                    <i class="fas fa-<?= ($row['active'] == "1" ? "eye" : "eye-slash") ?>"></i> </a>
                                <a href="index.php?p=products&action=1&id=<?= $row['prod_id'] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                    <i class="fas fa-arrow-up"></i> </a>
                                <a href="index.php?p=products&action=2&id=<?= $row['prod_id'] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                    <i class="fas fa-arrow-down"></i> </a>
                                <a href="#" onclick="update(<?= $row['prod_id'] ?>)" data-bs-toggle="modal" data-bs-target="#updateModal" style="padding-right: 5px;">
                                    <i class="fas fa-edit"></i> </a>
                                <a href="#" onclick="del(<?= $row['prod_id'] ?>)" data-bs-toggle="modal" data-bs-target="#deleteModal" style="padding-right: 5px;">
                                    <i class="fas fa-trash"></i> </a>

                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <h4 class="fw-bold py-3 mb-4">You don't have any Category yet 🥲🥲🥲</h4>
    <?php }
    if ($num > NUMPERPAGE) {
    ?>
        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($pg > 1 ? "" : "disabled") ?>">
                    <a class="page-link" href="index.php?products&pg=<?= ($pg > 1 ? $pg - 1 : 1) ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php
                $i = 1;
                for ($i = 1; $i <= $pagenum; $i++) {
                ?>
                    <li class="page-item <?= ($pg == $i ? "active" : "") ?>"><a class="page-link" href="index.php?products&pg=<?= $i ?>">
                            <?= $i ?>
                        </a></li>
                <?php
                }
                ?>
                <li class="page-item <?= ($pg < $pagenum ? "" : "disabled") ?>">
                    <a class="page-link" href="index.php?products&pg=<?= ($pg < $pagenum ? $pg + 1 : $pagenum) ?>">Next</a>
                </li>
            </ul>
        </nav>
        <!-- Pagination -->
    <?php
    } ?>
    <!-- Add Category Modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php?p=products&action=5" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="title" name="name" placeholder="Product Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Description</label>
                            <input type="text" class="form-control" id="subtitle" name="des" placeholder="Description...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Instock</label>
                            <input type="text" class="form-control" id="subtitle" name="instock" placeholder="Instock...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Price</label>
                            <input type="text" class="form-control" id="subtitle" name="price" placeholder="Price...">
                        </div>

                        <label for="select" class="form-label">Category Name</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="category">
                                <?php
                                $sql = "select * from tbl_category";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?= $row['cate_id'] ?>><?= $row['cate_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select" class="form-label">Brand Name</label>
                            <select class="form-select" aria-label="Default select example" name="brand">
                                <?php
                                $sql = "select * from tbl_brand";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?= $row['brand_id'] ?>><?= $row['brand_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Link</label>
                            <input type="text" class="form-control" id="subtitle" name="link" placeholder="Link Description...">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" accept="image/*" name="img">
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

    <!-- Update Category Modal  -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="form" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Description</label>
                            <input type="text" class="form-control" id="des" name="des" placeholder="Description...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Instock</label>
                            <input type="text" class="form-control" id="instock" name="instock" placeholder="Instock...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price...">
                        </div>

                        <label for="select" class="form-label">Category Name</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="category" id="category">
                                <?php
                                $sql = "select * from tbl_category";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?= $row['cate_id'] ?>><?= $row['cate_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select" class="form-label">Brand Name</label>
                            <select class="form-select" aria-label="Default select example" id="brand" name="brand">
                                <?php
                                $sql = "select * from tbl_brand";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value=<?= $row['brand_id'] ?>><?= $row['brand_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Link Description...">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" accept="image/*" name="img">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" id="active" checked>
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
</div>
<script>
    function del(id) {
        document.getElementById("deleteBut").href = "index.php?p=products&action=4&id=" + id;
    }

    function update(id) {
        document.getElementById("form").action = "index.php?p=products&action=3&id=" + id;

        let name = document.getElementById("name-" + id).getAttribute("data-value");
        document.getElementById("name").value = name;
        let des = document.getElementById("des-" + id).getAttribute("data-value");
        document.getElementById("des").value = des;
        let instock = document.getElementById("instock-" + id).getAttribute("data-value");
        document.getElementById("instock").value = instock;
        let price = document.getElementById("price-" + id).getAttribute("data-value");
        document.getElementById("price").value = price;
        let link = document.getElementById("link-" + id).getAttribute("data-value");
        document.getElementById("link").value = link;
    }
</script>