<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($pg > 1 ? "" : "disabled") ?>">
            <a class="page-link" href="<?= $pages ?>&pg=<?= ($pg > 1 ? $pg - 1 : 1) ?>" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php
        $i = 1;
        for ($i = 1; $i <= $pagenum; $i++) {
        ?>
            <li class="page-item <?= ($pg == $i ? "active" : "") ?>"><a class="page-link" href="<?= $pages ?>&pg=<?= $i ?>">
                    <?= $i ?>
                </a></li>
        <?php
        }
        ?>
        <li class="page-item <?= ($pg < $pagenum ? "" : "disabled") ?>">
            <a class="page-link" href="<?= $pages ?>&pg=<?= ($pg < $pagenum ? $pg + 1 : $pagenum) ?>">Next</a>
        </li>
    </ul>
</nav>