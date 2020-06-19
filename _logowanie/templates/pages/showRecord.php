<div class="box">
    <?php $recordOne = $params['recordOne'] ?? null ?>
    <?php if ($recordOne) : ?>

        <ul>
            <li>ID: <?php echo $recordOne['id'] ?></li>
            <li>Tytuł: <?php echo $recordOne['userName'] ?></li>
            <li>Opis: <?php echo $recordOne['pass'] ?></li>
            <li>Zapisano: <?php echo $recordOne['email'] ?></li>
        </ul>

        <button class="button1"> <a href="/_logowanie/?action=editRecord&id=<?php echo $recordOne['id'] ?>">EDIT </a></button>

    <?php else : ?>
        <div>
            Brak notatki do wyświetlenia
        </div>
    <?php endif; ?>
    <button class="button1"><a href="/_logowanie/">
            Back to List</a></button>
</div>