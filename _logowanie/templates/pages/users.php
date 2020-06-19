<div class="foo"></div>
<div class="wrap">
    <nav>
        <a href="/_logowanie/?action=aktywne" class="btn1">Aktywne rozmowy</a>
        <a href="/" class="btn2">/</a>
        <a href="/_logowanie/" class="btn3">Wróć do panelu</a>
        <a href="/_logowanie/?action=logout" class="btn4">Wyloguj</a>
    </nav>
</div>
<div class="contentAdmin">

    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>LOGIN</th>
                    <th>STATUS</th>
                    <th>ICON</th>
                </tr>
            </thead>
        </table>
    </div>
    <table cellpadding="0" cellsapcing="0" border="0">
        <tbody>
            <?php foreach ($params['json'] as $user) :
            ?>
                <tr>
                    <td><?php echo  $user->login;
                        ?></td>
                    <td><?php echo $user->status;
                        ?></td>
                    <td><img src="<?php echo $user->icon;
                                    ?>"></td>
                </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>
</div>