<div class="foo"></div>
<div class="wrap">
    <nav>
        <a href="/_logowanie/?action=create" class="btn1">STWÓRZ ROZMOWĘ</a>
        <a href="/_logowanie/?action=join" class="btn2">DODAJ USERA</a>
        <a href="/_logowanie/?action=leave" class="btn3">OPUŚĆ ROZMOWĘ</a>
        <a href="/_logowanie/?action=users" class="btn4">Wróć</a>
    </nav>
</div>
<div class="contentAdmin">

    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>USERS</th>
                </tr>
            </thead>
        </table>
    </div>
    <table cellpadding="0" cellsapcing="0" border="0">
        <tbody>
            <?php foreach ($params['json'] as $x) :
            ?>
                <tr>
                    <td>
                        <a href="/_logowanie/?action=conversation&id=<?php echo (int) $x->id ?>"><?php echo  $x->id;
                                                                                                    ?></a></td>
                    <td><?php echo $x->name;
                        ?></td>

                    <td><?php if (is_array($x->users)) :
                            foreach ($x->users as $y) :
                                echo $y . "</br>";
                            endforeach;
                        else :
                            echo $x->users;
                        endif;
                        ?>
                    </td>


                </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>
</div>