<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz Logowania</title>
    <link rel="stylesheet" href="/_logowanie/public/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="message">

        <?php if (!empty($params['registerInfo'])) {

            if (($params['registerInfo']) == 'done') {
                echo 'REGISTER SUCCESS';
            }
        } ?>
    </div>
    <div class="page">
        <?php require_once("templates/pages/$page.php"); ?>
    </div>

</body>

</html