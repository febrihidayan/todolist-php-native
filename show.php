<?php

require_once './templates/header.php';

$id = $_GET['id'];

$data = $db->table('taks')->find($id)->first();

if (isset($_GET['delete'])) {
    if ($db->table('taks')->find($id)->delete()) {
        return header("Location:index.php");
    }
}
?>

<div class="level">
    <div class="level-left">
        <h1 class="title">Todo List</h1>
    </div>
    <div class="level-right buttons">
        <a
            href="?id=<?= $id ?>&delete"
            class="button"
            onclick="return confirm('Do you want to delete this item?')"
        >
            Delete
        </a>
        <a href="edit.php?id=<?= $id ?>" class="button">Edit</a>
        <a href="index.php" class="button">Back</a>
    </div>
</div>

<hr>

<div class="content">
    <?= $data->content ?>
</div>
<?php

require_once './templates/footer.php'

?>