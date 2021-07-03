<?php

require_once './templates/header.php';

$id = $_GET['id'];

$data = $db->table('taks')->find($id)->first();

if (isset($_POST['sumbit'])) {
    $fields = [
        'content' => $_POST['content']
    ];

    if ($db->table('taks')->find($_POST['id'])->update($fields)) {
        return header("Location:show.php?id=".$_POST['id']);
    }
}
?>

<div class="level">
    <div class="level-left">
        <h1 class="title">Todo List</h1>
    </div>
    <div class="level-right buttons">
        <a href="show.php?id=<?= $id ?>" class="button">Show</a>
        <a href="index.php" class="button">Back</a>
    </div>
</div>

<hr>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?>">
    <div class="field">
        <div class="control">
            <textarea type="text" name="content" class="textarea"><?= $data->content ?></textarea>
        </div>
    </div>
    <div class="field">
        <button type="submit" name="sumbit" class="button">Save Change</button>
    </div>
</form>

<?php

require_once './templates/footer.php'

?>