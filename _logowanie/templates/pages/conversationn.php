<?php foreach ($params['json'] as $x) :
?> <?php $count = 0; ?>
    <?php if (is_array($x)) : ?>
        <?php foreach ($x as $y) : ?>
            <?php if ($count < 10) : ?>
                <?php if ($_SESSION['id'] == $y->chat_id) : ?>

                    <?php $tab[$count] = $y; ?>
                    <?php $count = $count + 1;
                    "</br>"; ?>
                <?php endif; ?>

            <?php endif; ?>

        <?php endforeach; ?>

    <?php endif; ?>

<?php endforeach;
?>

<div id="target" class="chatbox">
    <?php if (!empty($tab)) : ?>

        <?php foreach (array_reverse($tab) as $y) : ?>

            <?php if ($_SESSION['id'] == $y->chat_id) : ?>
                <?php if ($_SESSION['user'] == $y->login) : ?>

                    <div class="mg0"><?php echo 'User: ' . $y->login . '__: ' . htmlentities($y->message) . '______id:_' . $y->id; ?> </div>
                <?php else : ?>
                    <div class="mg1"><?php echo 'User: ' . $y->login . '__: ' . htmlentities($y->message) . '______id:_' . $y->id; ?> </div>

                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</div>