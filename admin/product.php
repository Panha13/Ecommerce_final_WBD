<?php
if (isset($_GET['a'])) {
    $a = $_GET['a'];
    switch ($a) {
        case '0':
            break;
    }
}

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span> Cards Basic</h4>
    <button type="button" class="btn btn-primary rounded-circle" style="width: 50px; height:50px;
            position: absolute; bottom: 0; right: 0; 
            margin: 0 35px 35px 0;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            " data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th class="text-white" scope="col">#</th>
                <th class="text-white" scope="col">First</th>
                <th class="text-white" scope="col">Last</th>
                <th class="text-white" scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
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
                    <form action="index.php?p=products&a=0" method="post">
                        <div class="mb-3">
                            <label for="title" class="form-label">Porduct Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Porduct Title...">
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Porduct Subtitle</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Porduct Subtitle...">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Porduct Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Porduct Price...">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Porduct Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Porduct Title...">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Porduct Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Porduct Title...">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Porduct Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Porduct Title...">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>