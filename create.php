<?php

require_once './templates/header.php';

if (isset($_POST['sumbit'])) {
    $fields = [
        'content' => $_POST['content']
    ];

    if ($db->table('taks')->insert($fields)) {
        return header("Location:index.php");
    }
}

?>

<div class="level">
    <div class="level-left">
        <h1 class="title">Todo List</h1>
    </div>
    <div class="level-right">
        <a href="index.php" class="button">Back</a>
    </div>
</div>

<hr>

<form action="" method="post">
    <div class="field">
        <div class="control">
            <textarea type="text" name="content" class="textarea"></textarea>
        </div>
    </div>
    <div class="field">
        <button type="submit" name="sumbit" class="button">Save</button>
    </div>
</form>

<?php

require_once './templates/footer.php'

?>