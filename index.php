<?php

require_once './templates/header.php'

?>

<div class="level">
    <div class="level-left">
        <h1 class="title">Todo List</h1>
    </div>
    <div class="level-right">
        <a href="create.php" class="button">Create</a>
    </div>
</div>

<hr>

<div class="columns is-centered is-multiline">
    <?php
    $data = $db->table('taks')->get();

    foreach ($data as $item) {
    ?>
        <div class="column is-4">
            <a href="show.php?id=<?= $item->id ?>">
                <div class="card">
                    <div class="card-content">
                        <?= $item->content ?>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>

<?php

require_once './templates/footer.php'

?>