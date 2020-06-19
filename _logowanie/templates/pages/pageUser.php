<div class="content">


    <?php
    echo "<p>Witaj " . $params['login'] . "!</p>";

    echo "<p>Email " . $params['email'] . "!</p>";
    ?>

    <button class="button1"><a href="/_logowanie/?action=users">Lista użytkowników</a></button>

    <button class="button1"> <a href="/_logowanie/?action=editRecord&id=<?php echo (int) $_SESSION['id'] ?>">Edytuj dane</a></button>

    <button class="button1"><a href="/_logowanie/?action=logout">Logout</a></button>
</div>