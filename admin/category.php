<?php
if (isset($_GET['a'])) {
    $a = $_GET['a'];
    switch ($a) {
        case '0':
            $name = $_POST['name'];
            $des = $_POST['des'];
            $sql = "insert into tbl_category(cate_name, cate_des) values('$name','$des');";
            mysqli_query($conn, $sql);
            echo "Youre successful added";
            break;
    }
}
$sql = "SELECT * FROM tbl_category";
$result = mysqli_query($conn, $sql);
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span> Cards Basic</h4>
    <button type="button" class="btn btn-primary rounded-circle" style="width:50px;
            position: absolute; bottom: 0; right: 0; 
            font-size: 20px; font-weight: bold;
            margin: 0 35px 35px 0;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i></button>

    <table class="table">
        <thead class="table-dark">
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
                    <td><?= $row['cate_name'] ?></td>
                    <td><?= $row['cate_name'] ?></td>
                    <td>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?p=category&a=0" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="title" name="name" placeholder="Category Name...">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Category Description</label>
                            <input type="text" class="form-control" id="subtitle" name="des" placeholder="Category Description...">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>