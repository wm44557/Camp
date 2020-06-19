<div class="contentAdmin">

    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>LOGIN</th>
                    <th>PASSWORD</th>
                    <th>EMAIL</th>
                    <th>ACTION</th>
                </tr>
            </thead>
        </table>
    </div>
    <table cellpadding="0" cellsapcing="0" border="0">
        <tbody>
            <?php foreach ($params['tableUsers'] ?? [] as $user) : ?>
                <tr>
                    <td><?php echo  $user['userName'] ?></td>
                    <td><?php echo $user['pass'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td>
                        <button class="buttonMini"> <a href="/_logowanie/?action=showRecord&id=<?php echo (int) $user['id'] ?>">Options</a></button>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="admin"><button class="button1"><a href="/_logowanie/?action=logout">Logout</a></button></div>
</div>