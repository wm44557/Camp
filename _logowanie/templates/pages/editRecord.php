<div class=box>
    <h3> EDYCJA </h3>
    <div>
        <?php if (!empty($params['recordOne'])) : ?>
            <?php $recordOne = $params['recordOne']; ?>
            <form class="note-form" action="/_logowanie/?action=editRecord&id=<?php echo $recordOne['id'] ?>" method="post">
                <input name="id" type="hidden" value="<?php echo $recordOne['id'] ?>" />
                <ul class="editUL">
                    <li>
                        <label>Login <?php echo $recordOne['userName'] ?><span class="required">*</span></label>
                    </li>

                    <li>
                        <label>Password</label>
                        <input type="text" name="userPassEdit" class="editRecord" value="<?php echo $recordOne['pass'] ?>" />
                    </li>
                    <li>
                        <label>Email</label>
                        <input type="text" name="userEmailEdit" class="editRecord" value="<?php echo $recordOne['email'] ?>" />
                    </li>
                    <li>
                        <label>Url do zdjęcia</label>
                        <input type="text" name="urlFoto" class="editRecord" value="<?php echo $recordOne['urlFoto'] ?>" />
                    </li>
                    <li>
                        <input class="submit" type="submit" name="Zaloguj się" value="Edytuj">
                    </li>
                </ul>
            </form>
            <button class="button1"><a href="/_logowanie/">
                    Back</a></button>
        <?php else : ?>
            <div>Brak danych do wyświetlenia</div>
            <a href="/_logowanie/"><button>Powrót</button></a>
        <?php endif; ?>
    </div>
</div>