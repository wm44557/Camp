<form class="box" action="/_logowanie/?action=register" method="post">
    <h1>Register</h1>
    <input class="loginInput" type="text" name="login2" placeholder="Username">
    <input class="passwordInput" type="password" name="haslo2" placeholder="Password">
    <input class="passwordInput" type="email" name="email2" placeholder="E-mail">
    <input class="radioO" type="radio" value="userFill" name="user2"> <span class="radio">fillUser</span>
    <input class="radioO" type="radio" value="userAdd" name="user2"> <span class="radio">addUser</span>
    <input class=" submit" type="submit" name="Zarejstruj się" value="Register now!">
    <?php
    if (isset($params['infoRegister'])) {
        if ($params['infoRegister'] == 'one') {
            echo '<span style = color:red>User with this login already exists!</span>';
        }
        if ($params['infoRegister'] == 'two') {
            echo '<span style = color:red>EMPTY FIELD !<span>';
        }
    }

    ?>

</form>