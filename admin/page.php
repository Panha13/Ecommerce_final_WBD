<?php
if(isset($_GET['action'] )&& $_GET['action']=="1"){
    $pageid=$_GET['pageid'];
    $title =$_POST['txttile'];
    $content=$_POST['txtcontent'];
    $sql="update tbl_page set pagetitle='$title',pagecontent='$content' where pageid=$pageid";
    $result=mysqli_query($conn,$sql);

}
include '../GlobalClass/Product.php';
include '../library/img.php';
$tbl = "tbl_page"
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> /</span> Pages</h4>
    <?php
    $sql = "SELECT * FROM $tbl";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    $pagenum = ceil($num / NUMPERPAGE);

    $sql = "select * from $tbl order by pageid ";
    $result = mysqli_query($conn, $sql);
    ?>
    
    <?php if ($num > 0) { ?>
        <table class="table mb-5">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white" scope="col">No</th>
                    <th class="text-white" scope="col">titile</th>
                    <th class="text-white" scope="col"> content</th>
                    <th class="text-white" scope="col"> Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$row['pagetitle']?></td>
                        <td><?=substr(htmlspecialchars($row['pagecontent']),0,50)?></td>

                        <td>
                         <a href="index.php?p=pageeditform&pageid=<?=$row['pageid']?>"   style="padding-right: 5px;">
                                <i class="fas fa-edit"></i> </a>
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
        <!-- Pagination -->
    <?php
    } ?>
    <!-- TODO: Upload photo to database and making it available on folder normal and thumbnail -->

</div>
<script>
    
</script>