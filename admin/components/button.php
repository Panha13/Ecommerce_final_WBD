<a href="<?= $pages ?>&action=0&id=<?= $row[$id] ?>&active=<?= ($row['active'] == "1" ? "0" : "1") ?>&name=<?= $row[$name] ?>" id="active-<?= $row[$id] ?>" data-value="<?= $row['active'] ?>" style="padding-right: 5px;">
    <i class=" fas fa-<?= ($row['active'] == "1" ? "eye" : "eye-slash") ?>"></i> </a>
<a href="<?= $pages ?>&action=1&id=<?= $row[$id] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
    <i class="fas fa-arrow-up"></i> </a>
<a href="<?= $pages ?>&action=2&id=<?= $row[$id] ?>&order=<?= $row['ordernum'] ?>" style="padding-right: 5px;">
    <i class="fas fa-arrow-down"></i> </a>

<a href="#" onclick="update(<?= $row[$id] ?>)" data-bs-toggle="modal" data-bs-target="#updateModal" style="padding-right: 5px;">
    <i class="fas fa-edit"></i> </a>
<a href="" onclick="del('<?= $row[$id] ?>','<?= $row[$img] ?>')" data-bs-toggle="modal" data-bs-target="#deleteModal" style="padding-right: 5px;">
    <i class="fas fa-trash"></i> </a>