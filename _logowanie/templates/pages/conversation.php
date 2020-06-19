<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<?php foreach ($params['json'] as $x) :
?> <?php $count = 0; ?>
    <?php if (is_array($x)) : ?>
        <?php foreach ($x as $y) : ?>
            <?php if ($count < 10) : ?>
                <?php $tab[$count] = $y; ?>
                <?php $count = $count + 1;
                "</br>"; ?>
            <?php endif; ?>

        <?php endforeach; ?>

    <?php endif; ?>

<?php endforeach;
?>

<div class="box">

    <div id="target" class="chatbox">
        <?php foreach (array_reverse($tab) as $y) : ?>

            <?php if ($_SESSION['id'] == $y->chat_id) : ?>
                <?php if ($_SESSION['user'] == $y->login) : ?>

                    <div class="mg0"><?php echo 'User: ' . $y->login . '__: ' . $y->message . '______id:_' . $y->id; ?> </div>
                <?php else : ?>
                    <div class="mg1"><?php echo 'User: ' . $y->login . '__: ' . $y->message . '______id:_' . $y->id; ?> </div>

                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>


    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var sec = setInterval(function() {
                $("div#target").load("/_logowanie/?action=conversationn");
            }, 500);
        });
    </script>
    <form class=" note-form" action="/_logowanie/?action=conversation&id=<?php echo $_SESSION['id'] ?>" method="post">
        <ul class="editUL">
            <li>
                <input type="text" name="send" class="send" value="" placeholder="Wpisz treść wiadomości" />
            </li>
            <li>
                <input class="submit" type="submit" name="Zaloguj się" value="Wyślij wiadomość">
            </li>
            <li>
                <button class="button2"><a href="/_logowanie/?action=aktywne">Wróć</a></button>
            </li>
        </ul>
    </form>
</div>