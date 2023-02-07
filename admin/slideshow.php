<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Cards Premium</h4>
    <?php
    include '../class/slideshow.php';
    $sql = "SELECT * FROM tbl_slideshow";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $tbl = "tbl_slideshow";
    $id = "slide_id";
    $name = "slide_title";
    $des = "slide_discount";
    $comp = "Slideshow";
    $me = new Slideshow($conn, $tbl, $id, $name, $des, $comp);

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
                $me->CheckActive(isset($_POST['active']));
                $me->id_val = $_GET['id'];
                $des_val = $_POST['discount'];
                $me->Update($name, $_POST['name']);
                $me->Update("slide_price", $_POST['price']);
                $me->Update("link", $_POST['link']);
                $me->Update("slide_img", "#");
                if ($me->Update($des, $des_val)) {
                    echo "<h4 class='fw-bold py-3 mb-4'>You're Updated Successfully 🎉🎉🎉</h4>";
                }
                break;
            case "4":
                $me->id_val = $_GET['id'];
                $me->DeleteData();
                break;
            case '5':
                $me->CheckActive(isset($_POST['active']));
                $me->name_val = $_POST['name'];
                $me->price = $_POST['price'];
                $me->des_val = $_POST['discount'];
                $me->link = $_POST['link'];
                $me->img = "#";
                $me->num = $num++;
                if ($_POST['name'] != "" || $_POST['des'] != "") {
                    $me->AddSlideshow();
                    echo "<h4 class='fw-bold py-3 mb-4'>You are successfully insert the Slideshow!!!</h4>";
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

    $sql = "select * from tbl_slideshow ORDER BY ordernum limit " . NUMPERPAGE . " offset " . $offset;
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
                        <th class="text-white" scope="col">Title</th>
                        <th class="text-white" scope="col">Price</th>
                        <th class="text-white" scope="col">Discount</th>
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
                            <td id="img-<?= $row['slide_id'] ?>" data-value="<?= $row['slide_img'] ?>"><?= $row['slide_img'] ?></td>
                            <td id="name-<?= $row['slide_id'] ?>" data-value="<?= $row['slide_title'] ?>"><?= $row['slide_title'] ?></td>
                            <td id="price-<?= $row['slide_id'] ?>" data-value="<?= $row['slide_price'] ?>"><?= $row['slide_price'] ?></td>
                            <td id="discount-<?= $row['slide_id'] ?>" data-value="<?= $row['slide_discount'] ?>"><?= substr($row['slide_discount'], 0, 50) ?></td>
                            <td id="link-<?= $row['slide_id'] ?>" data-value="<?= $row['link'] ?>"><?= substr($row['link'], 0, 50) ?></td>
                            <td>
                                <a href="index.php?p=slideshow&action=0&id=<?= $row['slide_id'] ?>&active=<?= $row['active'] == 1 ? 0 : 1 ?>" style="padding-right: 5px;">
                                    <i class="fas fa-<?= ($row['active'] == "1" ? "eye" : "eye-slash") ?>"></i> </a>
                                <a href="index.php?p=slideshow&action=1&id=<?= $row['slide_id'] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                    <i class="fas fa-arrow-up"></i> </a>
                                <a href="index.php?p=slideshow&action=2&id=<?= $row['slide_id'] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
                                    <i class="fas fa-arrow-down"></i> </a>
                                <a href="#" onclick="update(<?= $row['slide_id'] ?>)" data-bs-toggle="modal" data-bs-target="#updateModal" style="padding-right: 5px;">
                                    <i class="fas fa-edit"></i> </a>
                                <a href="#" onclick="del(<?= $row['slide_id'] ?>)" data-bs-toggle="modal" data-bs-target="#deleteModal" style="padding-right: 5px;">
                                    <i class="fas fa-trash"></i> </a>

                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <h4 class="fw-bold py-3 mb-4">You don't have any Slideshow yet 🥲🥲🥲</h4>
    <?php }
    if ($num > NUMPERPAGE) {
    ?>
        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($pg > 1 ? "" : "disabled") ?>">
                    <a class="page-link" href="index.php?slideshow&pg=<?= ($pg > 1 ? $pg - 1 : 1) ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php
                $i = 1;
                for ($i = 1; $i <= $pagenum; $i++) {
                ?>
                    <li class="page-item <?= ($pg == $i ? "active" : "") ?>"><a class="page-link" href="index.php?slideshow&pg=<?= $i ?>">
                            <?= $i ?>
                        </a></li>
                <?php
                }
                ?>
                <li class="page-item <?= ($pg < $pagenum ? "" : "disabled") ?>">
                    <a class="page-link" href="index.php?slideshow&pg=<?= ($pg < $pagenum ? $pg + 1 : $pagenum) ?>">Next</a>
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
                <form action="index.php?p=slideshow&action=5" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="name" placeholder="Product Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Price</label>
                            <input type="text" class="form-control" id="subtitle" name="price" placeholder="Price...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Discount</label>
                            <input type="text" class="form-control" id="" name="discount" placeholder="Discount...">
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
                    Are you sure you want to delete this slideshow?
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
                            <label for="name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Price</label>
                            <input type="text" class="form-control" id="prices" name="price" placeholder="Price...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount...">
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
        document.getElementById("deleteBut").href = "index.php?p=slideshow&action=4&id=" + id;
    }

    function update(id) {
        document.getElementById("form").action = "index.php?p=slideshow&action=3&id=" + id;

        let name = document.getElementById("name-" + id).getAttribute("data-value");
        document.getElementById("name").value = name;
        let price = document.getElementById("price-" + id).getAttribute("data-value");
        document.getElementById("prices").value = price;
        let instock = document.getElementById("discount-" + id).getAttribute("data-value");
        document.getElementById("discount").value = instock;
        let link = document.getElementById("link-" + id).getAttribute("data-value");
        document.getElementById("link").value = link;
    }
</script>